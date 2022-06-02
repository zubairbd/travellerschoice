<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\PassengerImport;
use App\Imports\PassengerPaymentImport;
use App\Models\Passenger;
use App\Models\User;
use Carbon\Carbon;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Excel;

class PandingOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $passengers = Passenger::orderBy('id','DESC')->where('status', 0)->get();
        $users = User::pluck('name', 'id');
        return view('admin.panding_orders.index', compact('passengers', 'users'));
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
        $passengerId = IdGenerator::generate(['table' => 'passengers', 'reset_on_prefix_change' => true,'field'=>'policy_number', 'length' => 8, 'prefix' =>'VS12']);
        $weCare = IdGenerator::generate(['table' => 'passengers', 'reset_on_prefix_change' => true,'field'=>'policy_number', 'length' => 10, 'prefix' =>'WC-167542']);
        // $formattedDate = Carbon::parse($request->effective_date)->format('dd-mm-yy');
        // $newDateFormat3 = \Carbon\Carbon::parse($request->effective_date)->format('dd/mm/yyyy');
        $input['policy_number'] = $passengerId.$randomId;
        // $input['effective_date'] = $newDateFormat3;
        $passenger = Passenger::create($input);

        return back()->with('added', 'Passenger has been added');

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
        //
        $passenger = Passenger::findOrFail($id);

        $request->validate([
          'policy_number' => 'required|string|max:255',
          'name' => 'required|string|max:255',
        ]);


        $passenger->policy_number = $request->policy_number;
        $passenger->name = $request->name;
        $passenger->dob = $request->dob;
        $passenger->pp_number = $request->pp_number;
        $passenger->effective_date = $request->effective_date;
        $passenger->termination_date = $request->termination_date;
        $passenger->destination = $request->destination;
        $passenger->updated_at = $request->updated_at;

        $passenger->save();

        return back()->with('updated','Passenger updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $passenger = Passenger::findOrFail($id);
        $passenger->delete();
        return back()->with('deleted', 'Passenger has been deleted');
    }




    public function importExcelToDB(Request $request)
    {
        
        Excel::import(new PassengerImport,$request->file);
        return back()->with('added','Passergers Imported Successfully!');

        // if($request->hasFile('file')){
        //     $path = $request->file('file')->getRealPath();
        //     $data = Excel::import($path)->get();

        //     return $data;
        // }


    }

    public function paymentImportExcelToDB(Request $request)
    {
        
        Excel::import(new PassengerPaymentImport,$request->file);
        return back()->with('added','Payment Imported Successfully!');

    }

    // public function insStatus(Request $request)
    // {
    //     $passenger = Passenger::find($request->passenger_id);
    //     $passenger->status = $request->status;
    //     $passenger->save();
  
    //     // return response()->json(['success'=>'Insurance status change successfully.']);
    //     return \Response::json($response);

    
    // }

    public function insStatus($id, $status){
        $passenger = Passenger::find($id);
        $passenger->status = $status;
        $passenger->save();
        
        return response()->json(['message'=>'Insurance status change successfully.']);
    }

}