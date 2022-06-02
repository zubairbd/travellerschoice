<?php

namespace App\Http\Controllers;

use App\Models\Passenger;
use Illuminate\Http\Request;
use PDF;
use QrCode;

class InsuranceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $passengers = Passenger::latest()->get();
        return view('admin.insurance.index', compact('passengers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         // retreive all records from db
      $data = Passenger::findOrFail($id);

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // retreive all records from db
      $data = Passenger::findOrFail($id);

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
      return $pdf->stream($data->pp_number.'.pdf');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function weCare($id)
    {
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
      return $pdf->stream('pdf_file.pdf');
    }



    








}