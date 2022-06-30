<?php

namespace App\Http\Controllers;

use App\Models\Vaccine;
use Illuminate\Http\Request;

class SurokkhaController extends Controller
{
    //
    public function surokkha(Request $request){
        $urlID = $request->id;
        $vaccine = Vaccine::where('url', $urlID)->first();

        return view('frontend.certificate-verify', compact('vaccine'));
    }
    
    //
    public function certificate(){
        return view('frontend.certificate.index');
    }
    //
    

    public function certificateForeigners(Request $request){
        $urlID = $request->s;
        $vaccine = $urlID == 1;

        return view('frontend.certificate.foreigners', compact('vaccine'));
    }
    

    public function verify(){
        return view('frontend.verify.index');
    }

    public function verifyForeigners(Request $request){
        $urlID = $request->s;
        $vaccine = $urlID == 1;

        return view('frontend.verify.foreigners', compact('vaccine'));
    }


    public function Search(Request $request)
    {
        $request->validate([
            'passport' => 'required',
            // 'certificate_number' => 'required',
        ]);
       
        $search = Vaccine::where('passport', $request->input('passport'))
        // ->where('certificate_number', $request->input('certificate_number'))
        ->get();

        return success_response($search, 'আপনার ভ্যাকসিন সনদপত্র যাচাই সম্পন্ন হয়েছে');
    
        
        
    }

}
