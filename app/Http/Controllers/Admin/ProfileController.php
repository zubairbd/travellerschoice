<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id',Auth::id())->first();

        return view('admin.settings.profile', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        request()->validate([
            'name'      => 'required|string|max:250',
            'email'     => 'required|string|email|max:250',
            'photo'     => 'image|mimes:jpg,png,jpeg'
        ]);

          if(isset($request->status)){
              $status = true;
          }else{
              $status = false;
          }

          $user = User::findOrFail(Auth::id());

          if ($request->hasFile('photo')) {

              if(file_exists(public_path('frontend/assets/images/profiles/') . $user->photo) && ($user->photo != 'frontend/assets/images/profiles/default.png')){
                  unlink(public_path('frontend/assets/images/profiles/') . $user->photo);
              }
              $imageName = 'photo-'.time().uniqid().'.'.$request->photo->getClientOriginalExtension();
              $request->photo->move(public_path('frontend/assets/images/profiles/'), $imageName);
          }else{
              $imageName = $user->photo;
          }

          $user->update([
              'name'      => $request->name,
              'email'     => $request->email,
              'username'     => $request->username,
              'photo'     => $imageName,
              'status'    => $status
          ]);

          $notification = [
              'added' => 'Profile updated successfully!'
          ];

          if (request('status')) {
              return back()->with($notification);
          } else {
              Auth::logout();
              return redirect()->route('login');
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changePassword(Request $request)
    {
        if (!(Hash::check($request->get('currentpassword'), Auth::user()->password))) {
            return back()->with([
                'error'    => 'Your current password does not matches with the password you provided! Please try again.',
                'alert-type' => 'error'
            ]);
        }

        if(strcmp($request->get('currentpassword'), $request->get('newpassword')) == 0){
            return back()->with([
                'error'    => 'New Password cannot be same as your current password! Please choose a different password.',
                'alert-type' => 'error'
            ]);
        }

        $this->validate($request, [
            'currentpassword' => 'required',
            'newpassword'     => 'required|string|min:4|confirmed',
        ]);

        $user = User::findOrFail(Auth::id());
        $user->password = bcrypt($request->get('newpassword'));
        $user->save();

        return back()->with(['added' => 'Password changed successfully.']);
    }
}
