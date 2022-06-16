<?php

use App\Models\Discount;
use App\Models\Insurance;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;

if (! function_exists('walletBalance')) {

    function walletBalance(){
        $id = Auth::user()->id;
        $wallet = Wallet::where('agent_id', $id)->where('status', 1)->sum('amount');
        $ins = Payment::where('user_id', $id)->where('payment_type', 'Wallet')->sum('amount');
        $walletBalanace = $wallet - $ins;

        return $walletBalanace;
    }


    function totalInsApplied(){
        $id = Auth::user()->id;
        $insurance = Insurance::where('creator', $id)->count();
        return $insurance;
    }

    function totalInsPayment(){
        $id = Auth::user()->id;
        $payments = Payment::where('user_id', $id)->where('payment_type', 'Wallet')->sum('amount');
        return $payments;
    }

    function walletPandingBalance(){
        $id = Auth::user()->id;
        $wallet = Wallet::where('agent_id', $id)->where('status', 0)->sum('amount');

        return $wallet;
    }

    function insurancePrice(){
        $id = Auth::user()->role;

        $discount = Discount::where('role', $id)->sum('amount');

        return $discount;
    }

  

    // Admin

    function totalPayment(){
        $payments = Payment::sum('amount');
        return $payments;
    }

    function walletPaymentReceived(){
        $wallet = Wallet::where('status', 1)->sum('amount');

        return $wallet;
    }
    function totalInsCompleted(){
        // $insurance = Insurance::with('payments')->sum();
        $payments = Payment::count();
        return $payments;
    }

}


