<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function walletsIndex(){
        $wallets = Wallet::latest()->get();
        return view('admin.wallets.index', compact('wallets'));
    }

    // wallet Deposit edit
    public function walletsEdit(Request $request){
        $request->validate([
            'account_number' => 'required',
            'amount' => 'required',
          ]);

        $currentuserID = Auth::user()->id;

        $doposit = new Wallet();

        $doposit->agent_id = $currentuserID;
        $doposit->amount = $request->amount;
        $doposit->account_number = $request->account_number;
        $doposit->trxid = $request->trxid;
        $doposit->save();
        
        return redirect()->route('agent.wallet.index')->with('success', 'Wallet Deposit successfully done!');
    }


    public function walletsStatus($id, $status){
        $wallet = Wallet::find($id);
        $wallet->status = $status;
        $wallet->save();
        
        return response()->json(['message'=>'Wallet status change successfully.']);
    }

    public function destroy($id)
    {
        //
    }
}
