<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Passenger;
use App\Models\Payment;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    // Agent Insurance Payments
    public function insurancePayment($pp_number){
        $insurance = Passenger::where('pp_number', $pp_number)->first();
        return view('frontend.agents.insurance-payment',compact('insurance'));
    }

    // Agent Insurance Payments Submit
    public function insurancePaymentSubmit(Request $request){
        $request->validate([
            'passenger_id' => 'required',
            
          ]);
          $currentuserID = Auth::user()->id;

          $wallet = walletBalance();

          if($wallet >= 299){

            $payment = new Payment();
    
            $payment->passenger_id = $request->passenger_id;
            $payment->account_number = $currentuserID;
            $payment->user_id = $currentuserID;
            $payment->amount = 300;
            $payment->payment_type = "Wallet";

            $payment->save();

            
            return redirect()->route('agent.insurance.list')->with('success', 'Payment successfully done!');
        }else{
            return back()->with('error', 'Wallet Amount Due');
        }
    }


    // Agent Wallet List
    public function walletIndex()
    {
        $currentuserid = Auth::user()->id;
        
        $wallets = Wallet::where('agent_id', $currentuserid)->orderBy('id', 'DESC')->get();
        return view('frontend.agents.wallet.index', compact('wallets'));
    }


    // Agent wallet Deposit
    public function walletDeposit()
    {
        return view('frontend.agents.wallet.deposit');
    }



    //  Agent wallet Deposit Store
    public function walletDepositStore(Request $request){
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





}




