<?php

namespace App\Http\Controllers\admin;

use App\Models\Vaccine;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class VaccineRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vaccines = Vaccine::orderBy('id', 'DESC')->get();

        return view('admin.vaccine-list',compact('vaccines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vaccine-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'gender' => 'required',
            'dob_day' => 'required',
            'dob_month' => 'required',
            'dob_year' => 'required',
            'first_dose' => 'required',
            'second_dose' => 'required',
            'vaccine_name' => 'required',
            'vaccine_center' => 'required',
        ]);

        $randomId       =   rand(11,99);
        $certNumber = IdGenerator::generate(['table' => 'vaccines', 'reset_on_prefix_change' => true,'field'=>'certificate_number', 'length' => 8, 'prefix' =>'607925']);
        
        $vaccine = new Vaccine();
    
        $vaccine->url = Crypt::encryptString($request->name);
        $vaccine->certificate_number = $certNumber.$randomId;
        $vaccine->nid = $request->nid;
        $vaccine->passport = $request->passport;
        $vaccine->name = $request->name;
        $vaccine->nationality = $request->nationality;
        $vaccine->gender = $request->gender;
        $vaccine->dob_day = $request->dob_day;
        $vaccine->dob_month = $request->dob_month;
        $vaccine->dob_year = $request->dob_year;
        $vaccine->first_dose = $request->first_dose;
        $vaccine->second_dose = $request->second_dose;
        $vaccine->boster_dose = $request->boster_dose;
        $vaccine->vaccine_name = $request->vaccine_name;
        $vaccine->vaccine_name_boster = $request->vaccine_name_boster;
        $vaccine->vaccine_center = $request->vaccine_center;
        $vaccine->user = $request->user;
        
        $vaccine->save();

        return redirect()->route('admin.vaccines.index')->with('success', 'Vaccine Registration Successfully!');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vaccine = Vaccine::findOrFail($id);

        return view('admin.vaccine-edit', compact('vaccine'));
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
        $request->validate([
            'name' => 'required|string',
        ]);

        $vaccine = Vaccine::findOrFail($id);
    
        $vaccine->url = Crypt::encryptString($request->name);
        $vaccine->nid = $request->nid;
        $vaccine->passport = $request->passport;
        $vaccine->name = $request->name;
        $vaccine->nationality = $request->nationality;
        $vaccine->dob_day = $request->dob_day;
        $vaccine->dob_month = $request->dob_month;
        $vaccine->dob_year = $request->dob_year;
        $vaccine->gender = $request->gender;
        $vaccine->first_dose = $request->first_dose;
        $vaccine->second_dose = $request->second_dose;
        $vaccine->boster_dose = $request->boster_dose;
        $vaccine->vaccine_name = $request->vaccine_name;
        $vaccine->vaccine_name_boster = $request->vaccine_name_boster;
        $vaccine->vaccine_center = $request->vaccine_center;
        $vaccine->user = $request->user;
        
        $vaccine->save();

        return redirect()->route('admin.vaccines.index')->with('success', 'Vaccine Registration update Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vaccine = Vaccine::findOrFail($id);
        $vaccine->delete();
        return back()->with('success', 'Vaccine has been deleted');
    }
}
