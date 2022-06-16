<?php

namespace App\Http\Controllers\Admin;

use App\Imports\InsuranceImport;
use App\Models\Insurance;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Excel;
use Illuminate\Support\Facades\DB;

class PandingOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $insurances = Insurance::orderBy('id','DESC')->where('status', 0)->get();
        $products = Product::pluck('name', 'slug');

        $users = User::pluck('name', 'id');
        // $products = DB::table("products")
        //          ->select("slug", DB::raw("CONCAT(name, ' - ', slug) as product"))
        //          ->pluck("product", "slug", );

        return view('admin.panding_orders.index', compact('insurances', 'users', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.panding_orders.create');
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
        $insuranceId = IdGenerator::generate(['table' => 'insurances', 'reset_on_prefix_change' => true,'field'=>'policy_number', 'length' => 8, 'prefix' =>'VS12']);
        $weCare = IdGenerator::generate(['table' => 'insurances', 'reset_on_prefix_change' => true,'field'=>'policy_number', 'length' => 9, 'prefix' =>'WC-93']);

        if($request->insurance_type == 'Worldtrips'){
            $input['policy_number'] = $insuranceId.$randomId;
        }elseif($request->insurance_type == 'WeCare'){
            $input['policy_number'] = $weCare.$randomId;
        }

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
        $insurance = Insurance::findOrFail($id);
        $insurance->delete();
        return back()->with('deleted', 'Insurance has been deleted');
    }


    public function importExcelToDB(Request $request)
    {
        
        Excel::import(new InsuranceImport,$request->file);
        return back()->with('added','Passergers Imported Successfully!');

        // if($request->hasFile('file')){
        //     $path = $request->file('file')->getRealPath();
        //     $data = Excel::import($path)->get();

        //     return $data;
        // }


    }

    


    public function insStatus($id, $status){
        $insurance = Insurance::find($id);
        $insurance->status = $status;
        $insurance->save();
        
        return response()->json(['message'=>'Insurance status change successfully.']);
    }
}
