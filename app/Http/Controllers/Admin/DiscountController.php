<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discounts = Discount::orderBy('id','DESC')->get();
        return view('admin.discounts.index', compact('discounts'));
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
        $request->validate([
            'campaign_name'=> 'required',
            'amount'=> 'required',
            'role'=> 'required',
        ]);

        $discount = new Discount();
        
        $discount->campaign_name = $request->campaign_name;
        $discount->amount = $request->amount;
        $discount->role = $request->role;
        $discount->status = $request->status;
        $discount->save();
        
        return back()->with('added', 'Discount has been added');
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
        $discount = Discount::findOrFail($id);
        
        $discount->campaign_name = $request->campaign_name;
        $discount->amount = $request->amount;
        $discount->role = $request->role;
        $discount->status = $request->status;
        $discount->save();
        
        return back()->with('added', 'Discount has been added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $discount = Discount::findOrFail($id);
        $discount->delete();
        return back()->with('deleted', 'Discount has been deleted');
    
    }
}
