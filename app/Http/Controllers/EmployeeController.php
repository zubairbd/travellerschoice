<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Passenger;
use Illuminate\Http\Request;
use PDF;
use Picqer;
use DNS1D;
use DNS2D;
use QrCode;

class EmployeeController extends Controller
{
    // Display user data in view
    public function showEmployees(){
        $passengers = Passenger::all();
        $barcodes = DNS1D::getBarcodeHTML('4445645656', 'CODE11');
        return view('index', compact('passengers','barcodes'));
      }


      // Generate PDF
    public function createPDF() {
      // retreive all records from db
      $data = Employee::all();

      // share data to view
      view()->share('employee',$data);
      $pdf = PDF::loadView('pdf_view', $data);

      // download PDF file with download method
      return $pdf->stream('pdf_file.pdf');
      // return $pdf->download('pdf_file.pdf');
    }
    public function createprint(){
      $employee = Employee::all();
      return view('print', compact('employee'));
    }




    //Ins Generate PDF
    public function edit($id) {
      // retreive all records from db
      $data = Passenger::findOrFail($id);

      // Barcode Generate
      $barcodes = base64_encode(QrCode::format('svg')->size(108)->errorCorrection('L')->generate('
Effective Date: '.$data->effective_date.'
Termination Date: '.$data->termination_date.'
Home Country: Bangladesh
Destination Country(ies): Saudi Arabia
Insurance Type: KSA Covid-19 Saver (Kingdom of Saudi Arabia)
Name: '.$data->name.'
Policy No: '.$data->policy_number.'
Date of Birth: '.$data->dob.'
Passport: '.$data->pp_number.'
Citizenship: Bangladesh
Website: https://www.worldtrips.com
      '));

      // share data to view
      // view()->share('employee',$data);
      $pdf = PDF::loadView('pdf_view', compact('data', 'barcodes'));

      // download PDF file with download method
      return $pdf->stream('pdf_file.pdf');
      // return $pdf->download('pdf_file.pdf');

      // return view('print',compact('data'));
    }




    // View
    public function show($id) {
      // retreive all records from db
      $data = Passenger::findOrFail($id);

      // Barcode Generate
      $barcodes = base64_encode(QrCode::format('svg')->size(108)->errorCorrection('L')->generate('
Effective Date: '.$data->effective_date.'
Termination Date: '.$data->termination_date.'
Home Country: Bangladesh
Destination Country(ies): Saudi Arabia
Insurance Type: KSA Covid-19 Saver (Kingdom of Saudi Arabia)
Name: '.$data->name.'
Policy No: '.$data->policy_number.'
Date of Birth: '.$data->dob.'
Passport: '.$data->pp_number.'
Citizenship: Bangladesh
Website: https://www.worldtrips.com
      '));

      // share data to view
      // view()->share('employee',$data);
      $pdf = PDF::loadView('pdf_view', compact('data', 'barcodes'));

      // download PDF file with download method
      return $pdf->download($data->pp_number);

      // return view('print',compact('data'));
    }
}
