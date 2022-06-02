<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Excel;
use App\Imports\PassengerImport;
use App\Models\Passenger;
use App\Models\Payment;
use PDF;
use QrCode;

class InsuranceController extends Controller
{
    
   // Defaul Insurance Buy
   public function travelInsurance(){
    return view('frontend.insurances.travel-insurance');
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
            'policy_number' => 'unique:passengers,policy_number',
          ]);
        $randomId       =   rand(2,9);
        $passengerId = IdGenerator::generate(['table' => 'passengers', 'reset_on_prefix_change' => true,'field'=>'policy_number', 'length' => 8, 'prefix' =>'VS12']);
        $weCare = IdGenerator::generate(['table' => 'passengers', 'reset_on_prefix_change' => true,'field'=>'policy_number', 'length' => 9, 'prefix' =>'WC-93']);

        // $formattedDate = Carbon::parse($request->effective_date)->format('dd-mm-yy');
        // $newDateFormat3 = \Carbon\Carbon::parse($request->effective_date)->format('dd/mm/yyyy');
        
        // $input['effective_date'] = $newDateFormat3;
        if($request->insurance_type == 'Worldtrips'){
            $input['policy_number'] =  $passengerId.$randomId;
        }elseif($request->insurance_type == 'WeCare'){
            $input['policy_number'] = $weCare.$randomId;
        }

        $input['creator'] = Auth::user()->id;
        $passenger = Passenger::create($input);
        $payID = $passenger->pp_number;
        return redirect()->route('user.insurance.payment', $payID)->with('success', 'Travel Insurance applyed successfully! Please payment for download insurance certificate');
    }

    // Worldtrips Insurance Buy
    public function worldtripsBuy(){
        return view('frontend.insurances.insurance-worldtrips');
    }


    // WeCare Insurance Buy
    public function wecareBuy(){
        return view('frontend.insurances.insurance-wecare');
    }



    // Insurance Purchase
    public function purchaseInsurance(){
        $currentuserid = Auth::user()->id;
        
        $purchaseHistory = Passenger::with('payments')->where('creator', $currentuserid)->orderBy('id', 'DESC')->get();
        $payment = Passenger::withCount('payments')->get();
        return view('frontend.users.purchase-insurance',compact('purchaseHistory','payment'));
    }


    // Payments
    public function insurancePayment($pp_number){
        $passenger = Passenger::where('pp_number', $pp_number)->first();
        return view('frontend.insurances.insurance-payment',compact('passenger'));
    }
    // Payments
    public function insurancePaymentsubmit(Request $request){
        $request->validate([
            'passenger_id' => 'required',
            'account_number' => 'required',
          ]);
        $data = $request->all();
        Payment::create($data);
        return redirect()->route('user.insurance.purchase')->with('success', 'Payment successfully done! Please wait for apporoval');
    }










    
    // Insurance Download
    public function wecareInsurance($id){
        
        $data = Passenger::findOrFail($id);

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
      //$data = Passenger::findOrFail($id);
      $data = Passenger::where('id','=',$id)->where('status',1)->first();

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
