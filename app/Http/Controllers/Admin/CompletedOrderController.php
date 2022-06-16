<?php

namespace App\Http\Controllers\Admin;

use App\Models\Insurance;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;


class CompletedOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $insurances = Insurance::orderBy('id','DESC')->where('status', 1)->get();
        $users = User::pluck('name', 'id');
        $products = Product::pluck('name', 'slug');
        return view('admin.order_completed.index', compact('insurances', 'users', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.order_completed.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $request->validate([
            'name' => 'required|string',
  
          ]);
        $randomId       =   rand(2,9);
        $InsuranceId = IdGenerator::generate(['table' => 'insurances', 'reset_on_prefix_change' => true,'field'=>'policy_number', 'length' => 8, 'prefix' =>'VS12']);
        $weCare = IdGenerator::generate(['table' => 'insurances', 'reset_on_prefix_change' => true,'field'=>'policy_number', 'length' => 9, 'prefix' =>'WC-93']);
        // $formattedDate = Carbon::parse($request->effective_date)->format('dd-mm-yy');
        // $newDateFormat3 = \Carbon\Carbon::parse($request->effective_date)->format('dd/mm/yyyy');
        if($request->insurance_type == 'Worldtrips'){
            $input['policy_number'] =  $InsuranceId.$randomId;
        }elseif($request->insurance_type == 'WeCare'){
            $input['policy_number'] = $weCare.$randomId;
        }
        // $input['effective_date'] = $newDateFormat3;
        $insurance = Insurance::create($input);

        return back()->with('added', 'Insurance has been added');
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
        $insurance = Insurance::findOrFail($id);

        $request->validate([
        //   'policy_number' => 'required|string|max:255',
          'name' => 'required|string|max:255',
        ]);


        $randomId       =   rand(2,9);
        $insuranceId = IdGenerator::generate(['table' => 'Insurances', 'reset_on_prefix_change' => true,'field'=>'policy_number', 'length' => 8, 'prefix' =>'VS12']);
        $weCare = IdGenerator::generate(['table' => 'Insurances', 'reset_on_prefix_change' => true,'field'=>'policy_number', 'length' => 9, 'prefix' =>'WC-93']);
        
        $insurance->name = $request->name;
        $insurance->dob = $request->dob;
        $insurance->pp_number = $request->pp_number;
        $insurance->effective_date = $request->effective_date;
        $insurance->termination_date = $request->termination_date;
        $insurance->destination = $request->destination;
        $insurance->insurance_type = $request->insurance_type;
        $insurance->updated_at = $request->updated_at;

        if($insurance->isDirty('insurance_type')){
            if($request->insurance_type == 'Worldtrips'){
                $insurance->policy_number =  $insuranceId.$randomId;
            }elseif($request->insurance_type == 'WeCare'){
                $insurance->policy_number = $weCare.$randomId;
            }
         }

        $insurance->save();

        return back()->with('updated','Insurance updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Insurance = Insurance::findOrFail($id);
        $Insurance->delete();
        return back()->with('deleted', 'Insurance has been deleted');
    }

    


    // Status Change
    public function insStatus($id, $status){
        
            $insurance = Insurance::find($id);
            $insurance->status = $status;
            $insurance->save();
            
            return response()->json(['message'=>'Insurance status change successfully.']);
        }
    }
