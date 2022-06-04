<?php

use App\Models\Payment;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;

if (! function_exists('walletBalance')) {

    function walletBalance()
    {
        $id = Auth::user()->id;

        $wallet = Wallet::where('agent_id', $id)->where('status', 1)->sum('amount');
        $ins = Payment::where('user_id', $id)->where('payment_type', 'Wallet')->sum('amount');
        $walletBalanace = $wallet - $ins;

        return $walletBalanace;
    }
}

