<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Account::orderBy('id', 'DESC')->get();
        $users = User::pluck('name', 'id');
        return view('admin.accounts.index', compact('accounts', 'users'));
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
        
        $accuntNumber = IdGenerator::generate(['table' => 'accounts', 'reset_on_prefix_change' => true,'field'=>'account_number', 'length' => 8, 'prefix' =>'TC22']);
        
        $accountCheck = Account::where('user_id', $request->user_id)->first();
        
        $account = new Account();

        if(!$accountCheck){
            if($request->status == 1){

                $account->account_number = $accuntNumber;
                $account->account_name = $request->account_name;
                $account->user_id = $request->user_id;
                $account->status = $request->status;
                $account->save();
    
                return back()->with('added', 'Account successfully done!');
            }else{
                $account->account_name = $request->account_name;
                $account->user_id = $request->user_id;
                $account->status = $request->status;
                $account->save();
                
                return back()->with('error', 'Account is not actived!');
            }
        }else{
            return back()->with('error', 'Account is already exist!');
        }
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
        $request->validate([
            'user_id' => 'required|unique:accounts,user_id,'.$id
        ]);


        $account = Account::findOrFail($id);
        
        $account->account_name = $request->account_name;
        $account->user_id = $request->user_id;
        $account->status = $request->status;
        $account->save();

        return back()->with('added', 'Account successfully updated!');
       

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $account = Account::findOrFail($id);
        $account->delete();
        return back()->with('deleted', 'Account has been deleted');
    }


    public function accountActive(Request $request, $id){

        $account = Account::findOrFail($id);
        
        $accuntNumber = IdGenerator::generate(['table' => 'accounts', 'reset_on_prefix_change' => true,'field'=>'account_number', 'length' => 8, 'prefix' =>'TC22']);
        
        if($account->account_number == null){
            if($request->status == 1){

                $account->account_number = $accuntNumber;
                $account->status = $request->status;
                $account->save();
    
                return back()->with('added', 'Account successfully done!');
            }else{
                return back()->with('added', 'Account successfully created!');
            }
        }else{
            return back()->with('error', 'Account is already actived!');
        }
        
    }
}
