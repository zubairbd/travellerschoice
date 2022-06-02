<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $user_latest = User::where('id', '!=', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('frontend.agents.dashboard', compact('user_latest'));
    }
}
