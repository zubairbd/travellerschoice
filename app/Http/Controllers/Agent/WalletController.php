<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Insurance;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    // Agent Insurance Payments
    public function insurancePayment($policy_number){
        $insurance = Insurance::where('policy_number', $policy_number)->first();
        $price = Product::where('slug', $insurance->insurance_type)->first();
        $prices = $price->price - insurancePrice() ;
        return view('frontend.agents.insurance-payment',compact('insurance', 'prices'));
    }

    // Agent Insurance Payments Submit
    public function insurancePaymentSubmit(Request $request){
        $request->validate([
            'insurance_id' => 'required|unique:payments',
            
          ]);
          $currentuserID = Auth::user()->id;

          $wallet = walletBalance();

          if($wallet > $request->amount - 1 ){

            $payment = new Payment();
    
            $payment->insurance_id = $request->insurance_id;
            $payment->account_number = $currentuserID;
            $payment->user_id = $currentuserID;
            $payment->amount = $request->amount;
            $payment->payment_type = "Wallet";

            $payment->save();

            if($payment){
                $insStatus = Insurance::where('id', $request->insurance_id)->first();
                $insStatus->status = 1;
                $insStatus->save();
            }
            

            return redirect()->route('agent.insurance.list')->with('success', 'Payment successfully done!');
        }else{
            return back()->with('error', 'Wallet Amount Due');
        }
    }


    // Agent Wallet List
    public function walletIndex()
    {
        $currentuserid = Auth::user()->id;
        
        $wallets = Wallet::where('agent_id', $currentuserid)->orderBy('id', 'DESC')->limit(5)->get();
        return view('frontend.agents.wallet.index', compact('wallets'));
    }


    // Agent wallet Deposit
    public function walletDeposit()
    {
        $user = Auth::user()->id;
        $account = Account::where('user_id', $user)->where('status', 1)->first();

        return view('frontend.agents.wallet.deposit', compact('account'));
    }



    //  Agent wallet Deposit Store
    public function walletDepositStore(Request $request){
        $request->validate([
            'account_number' => 'required',
            'amount' => 'required',
          ]);

        $user = Auth::user()->id;
        $account = Account::where('user_id', $user)->where('status', 1)->first();

        $currentuserID = Auth::user()->id;

        $doposit = new Wallet();

        $doposit->agent_id = $currentuserID;
        $doposit->amount = $request->amount;
        $doposit->account_number = $account->account_number;
        $doposit->trxid = $request->trxid;
        
        $save = $doposit->save();

        


        if($account){
            $save;
            return redirect()->route('agent.wallet.index')->with('success', 'Wallet Deposit successfully done!');
        }else{
            return back()->with('error','Your Account Not Active.');
        }
            
        
        
    }





}




