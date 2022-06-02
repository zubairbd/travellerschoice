<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
   
    public function dashboard()
    {
        $user_latest = User::where('id', '!=', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('frontend.dashboard', compact('user_latest'));
    }

    public function userProfile(){
        return view('frontend.users.profile');
    }
    
    public function userProfileupdate(Request $request){
        $user = Auth::user();
        $input = $request->all();
        if(!empty($request->input('password'))) {
            $new_password = bcrypt($request->input('password'));
            $user->password = $new_password;
            $user->save();
          }
          
        if ($request->hasFile('images')) {

            // if(file_exists(public_path('frontend/assets/images/users/') . $user->images) && ($user->images != 'frontend/assets/images/users/images.png')){
            //     unlink(public_path('frontend/assets/images/users/') . $user->images);
            // }
            $imageName = 'photo-'.time().uniqid().'.'.$request->images->getClientOriginalExtension();
            $request->images->move(public_path('frontend/assets/images/users/'), $imageName);
        }else{
            $imageName = $user->images;
        }
        $user->update([
              'name' => $input['name'],
              'password' => bcrypt($input['password']),
              'mobile' => $input['mobile'],
              'address' => $input['address'],
              'city' => $input['city'],
              'images' =>  $imageName,
            ]);

        return back()->with('success', 'User Update Successfully!');

    }

}
