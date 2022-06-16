<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\InsurancePaymentImport;
use App\Models\Insurance;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::with('insurance')->orderBy('id', 'DESC')->get();
        $insurance = Insurance::with('payment')->pluck('policy_number', 'id');

        return view('admin.payments.index', compact('payments', 'insurance'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.payments.create');
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
        //
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
        $payment = Payment::findOrFail($id);
        $request->validate([
            'passenger_id' => "unique:payments,passenger_id".$id,
            'account_number' => 'required',
          ]);
        $data = $request->all();
        $payment->update($data);

        return back()->with('added', 'Payment successfully done!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();
        return back()->with('deleted', 'Payment has been deleted');
    }

    public function paymentImportExcelToDB(Request $request)
    {
        
        Excel::import(new InsurancePaymentImport,$request->file);
        return back()->with('added','Payment Imported Successfully!');

    }

    public function autocomplete(Request $request)
    {
        $data = Insurance::select("pp_number")
                ->where("pp_number","LIKE","%{$request->query}%")
                ->get();
   
        return response()->json($data);
    }
    
}
