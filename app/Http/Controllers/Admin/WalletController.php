<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function walletsIndex(){
        $wallets = Wallet::latest()->get();
        $users = User::pluck('name', 'id');
        $accounts = Account::pluck('account_number', 'account_number');

        return view('admin.wallets.index', compact('wallets', 'users', 'accounts'));
    }

    // wallet Deposit edit
    public function walletsEdit(Request $request, $id){
        $request->validate([
            'account_number' => 'required',
            'amount' => 'required',
          ]);

        $doposit = Wallet::findOrFail($id);

        $doposit->agent_id = $request->agent_id;
        $doposit->amount = $request->amount;
        $doposit->account_number = $request->account_number;
        $doposit->trxid = $request->trxid;
        $doposit->save();
        
        return back()->with('added', 'Wallet updated successfully done!');
    }









    public function walletsStatus($id, $status){
        $wallet = Wallet::find($id);
        $wallet->status = $status;
        $wallet->save();
        
        return response()->json(['message'=>'Wallet status change successfully.']);
    }

    public function destroy($id)
    {
        $wallet = Wallet::findOrFail($id);
        $wallet->delete();
        return back()->with('deleted', 'Wallet has been deleted');
    }
}
