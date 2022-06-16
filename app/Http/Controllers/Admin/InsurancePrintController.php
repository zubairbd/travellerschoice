<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Insurance;
use Illuminate\Http\Request;
use PDF;
use QrCode;

class InsurancePrintController extends Controller
{
    // Agent Insurance Print Worldtrip

    // Worldtrips

    public function insurancePrintWorltrip($id)
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

public function insurancePrintWecare($id){
        
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
