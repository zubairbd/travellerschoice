<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Excel;
use App\Imports\InsuranceImport;
use App\Models\Insurance;
use App\Models\Payment;
use App\Models\Product;
use PDF;
use QrCode;

class InsuranceController extends Controller
{
    
// Defaul Insurance Buy
public function travelInsurance(){
    $products = Product::latest()->get();
    return view('frontend.users.insurances.apply', compact('products'));
}

   // Defaul Insurance Buy
    public function store(Request $request)
    {
        $input = $request->all();
        $request->validate([
            'name' => 'required|string',
            'pp_number' => 'required',
            'dob' => 'required',
            'effective_date' => 'required',
            'policy_number' => 'unique:insurances,policy_number',
          ]);
        $randomId       =   rand(2,9);
        $worldTrips = IdGenerator::generate(['table' => 'insurances', 'reset_on_prefix_change' => true,'field'=>'policy_number', 'length' => 8, 'prefix' =>'VS12']);
        $weCare = IdGenerator::generate(['table' => 'insurances', 'reset_on_prefix_change' => true,'field'=>'policy_number', 'length' => 9, 'prefix' =>'WC-93']);

        // $formattedDate = Carbon::parse($request->effective_date)->format('dd-mm-yy');
        // $newDateFormat3 = \Carbon\Carbon::parse($request->effective_date)->format('dd/mm/yyyy');
        
        // $input['effective_date'] = $newDateFormat3;
        if($request->insurance_type == 'Worldtrips'){
            $input['policy_number'] =  $worldTrips.$randomId;
        }elseif($request->insurance_type == 'WeCare'){
            $input['policy_number'] = $weCare.$randomId;
        }

        $input['creator'] = Auth::user()->id;
        $insurance = Insurance::create($input);
        $payID = $insurance->pp_number;
        return redirect()->route('user.insurance.payment', $payID)->with('success', 'Travel Insurance applyed successfully! Please payment for download insurance certificate');
    }



    // Insurance Purchase
    public function purchaseInsurance(){
        $currentuserid = Auth::user()->id;
        
        $purchaseHistory = Insurance::with('payments')->where('creator', $currentuserid)->orderBy('id', 'DESC')->get();
        $payment = Insurance::withCount('payments')->get();
        return view('frontend.users.insurances.insurance-list',compact('purchaseHistory','payment'));
    }


    // Insurance Payments
    public function insurancePayment($pp_number){
        $insurance = Insurance::where('pp_number', $pp_number)->first();
        $price = Product::where('slug', $insurance->insurance_type)->first();
        $prices = $price->price - insurancePrice() ;
        return view('frontend.users.insurances.payment',compact('insurance', 'prices'));
    }

    // Payments
    public function insurancePaymentsubmit(Request $request){
        $request->validate([
            'Insurance_id' => 'required',
            'account_number' => 'required',
          ]);
        $data = $request->all();
        Payment::create($data);
        return redirect()->route('user.insurance.purchase')->with('success', 'Payment successfully done! Please wait for apporoval');
    }










    
    // Insurance Download
    public function wecareInsurance($id){
        
        $data = Insurance::findOrFail($id);

        // Barcode Generate
        $barcodes = base64_encode(QrCode::format('svg')->size(108)->errorCorrection('L')->generate('
  Effective Date: '.date('d/m/Y', strtotime($data->effective_date)).'
  Termination Date: '.date('d/m/Y', strtotime($data->termination_date)).'
  Home Country: Bangladesh
  Destination Country: '.$data->destination.'
  Name: '.$data->name.'
  Policy No: '.$data->policy_number.'
  Date of Birth: '.date('d/m/Y', strtotime($data->dob)).'
  Passport: '.$data->pp_number.'
  Citizenship: Bangladesh
  COVID 19: Coverd same as any other illness to the above mentioned medical maximum.
  WeCare Center Assistance, 205 Clarks Road, Gurgaon, New Delhi India.
  Tel:+971 9511458978. Fax: 011-30742601
  Website: https://wecare-center.com
        '));
  
        // share data to view
        // view()->share('employee',$data);
        $pdf = PDF::loadView('admin.insurance.wecare', compact('data', 'barcodes'));
  
        // download PDF file with download method
        return $pdf->stream($data->pp_number.'.pdf');
    
    }


    // Worldtrips

    public function worldtripsInsurance($id)
    {
         // retreive all records from db
      //$data = Insurance::findOrFail($id);
      $data = Insurance::where('id','=',$id)->where('status',1)->first();

      // Barcode Generate
      $barcodes = base64_encode(QrCode::format('svg')->size(108)->errorCorrection('L')->generate('
Effective Date: '.date('F d, Y', strtotime($data->effective_date)).'
Termination Date: '.date('F d, Y', strtotime($data->termination_date)).'
Home Country: Bangladesh
Destination Country(ies): Saudi Arabia
Insurance Type: KSA Covid-19 Saver (Kingdom of Saudi Arabia)
Name: '.$data->name.'
Policy No: '.$data->policy_number.'
Date of Birth: '.date('d/m/Y', strtotime($data->dob)).'
Passport: '.$data->pp_number.'
Citizenship: Bangladesh
Website: https://www.worldtrips.com
      '));

      // share data to view
      // view()->share('employee',$data);
      $pdf = PDF::loadView('pdf_view', compact('data', 'barcodes'));

      // download PDF file with download method
      return $pdf->download($data->pp_number.'.pdf');
    }



}
