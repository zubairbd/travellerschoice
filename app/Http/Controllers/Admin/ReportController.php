<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Insurance;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    // Index
    public function reportIndex(Request $request){
        // $insurance = Insurance::count();
        $user_latest = User::where('id', '!=', Auth::id())->orderBy('created_at', 'desc')->get();
        $users = User::orderBy('id', 'DESC')->get();


        $insurance = Insurance::where( function($query) use($request){
            return $request->id ?
                   $query->from('insurances')->where('creator',$request->id) : '';
       })
       ->where(function($query) use($request){
        return $request->slug ?
               $query->from('insurances')->where('insurance_type',$request->slug) : '';
        })

        ->where(function($query) use($request){
            return $request->effective_date ?
                   $query->from('insurances')->where('effective_date',$request->effective_date) : '';
            })
       
       ->count();

       $paymentCount = Payment::where( function($query) use($request){
        return $request->id ?
               $query->from('payments')->where('user_id',$request->id) : '';
        })
        
        ->sum('amount');

        $insuranceCompleted = Payment::where( function($query) use($request){
            return $request->id ?
                   $query->from('payments')->where('user_id',$request->id) : '';
            })
            ->count();
            
       $selected_id = [];
       $selected_id['id'] = $request->id;
       $selected_id['insurance_type'] = $request->slug;
   
        return view('admin.reports.index', compact('insurance','user_latest', 'users', 'selected_id', 'paymentCount', 'insuranceCompleted'));
    }


    // Find





}
