<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Insurance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use PDF;
use QrCode;

class DashboardController extends Controller
{

    // Agent Dashboard
    public function dashboard()
    {
        $user_latest = User::where('id', '!=', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('frontend.agents.dashboard', compact('user_latest'));
    }

    // Agent Insurance List
    public function insuranceList()
    {
        $currentuserid = Auth::user()->id;
        
        $insuranceList = Insurance::where('creator', $currentuserid)->orderBy('id', 'DESC')->get();
        return view('frontend.agents.insurance-list', compact('insuranceList'));
    }


    // Agent Insurance Create
    public function insuranceCreate()
    {
        return view('frontend.agents.insurance-create');
    }


    // Agent Insurance Store
    public function insuranceStore(Request $request)
    {
        $input = $request->all();
        $request->validate([
            'insurance_type' => 'required',
            'destination' => 'required',
            'name' => 'required|string',
            'pp_number' => 'required',
            'dob' => 'required',
            'effective_date' => 'required',
            'termination_date' => 'required',
            'policy_number' => 'unique:insurances,policy_number',
          ]);
        $randomId       =   rand(2,9);
        $insuranceId = IdGenerator::generate(['table' => 'insurances', 'reset_on_prefix_change' => true,'field'=>'policy_number', 'length' => 8, 'prefix' =>'VS12']);
        $weCare = IdGenerator::generate(['table' => 'insurances', 'reset_on_prefix_change' => true,'field'=>'policy_number', 'length' => 9, 'prefix' =>'WC-93']);

        // $formattedDate = Carbon::parse($request->effective_date)->format('dd-mm-yy');
        // $newDateFormat3 = \Carbon\Carbon::parse($request->effective_date)->format('dd/mm/yyyy');
        
        // $input['effective_date'] = $newDateFormat3;
        if($request->insurance_type == 'Worldtrips'){
            $input['policy_number'] =  $insuranceId.$randomId;
        }elseif($request->insurance_type == 'WeCare'){
            $input['policy_number'] = $weCare.$randomId;
        }

        $input['creator'] = Auth::user()->id;
        $insurance = Insurance::create($input);
        $payID = $insurance->pp_number;
        return redirect()->route('agent.insurance.payment', $payID)->with('success', 'Travel Insurance applyed successfully! Please payment for download insurance certificate');
    }


    // Agent Insurance Print Worldtrip

    // Worldtrips

    public function insuranceWorltrip($id)
    {
         // retreive all records from db
      //$data = Insurance::findOrFail($id);
      $data = Insurance::where('policy_number','=',$id)->first();

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


// Agent Insurance Wecare

public function insuranceWecare($id){
        
    $data = Insurance::where('policy_number','=',$id)->first();

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
    return $pdf->download($data->pp_number.'.pdf');

}








}
