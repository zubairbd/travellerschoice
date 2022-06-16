<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\User;
use Carbon\Carbon;
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
        return view('frontend.agents.profile.index');
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

        // Images Upload
        // $file = explode(';', $request->feature_image);
        // $file = explode('/', $file[0]);
        // $file_ex = end($file);
        // $image_name = 'product-'.time().uniqid();
        // $file_name = $image_name . '.'. $file_ex ;

        // $product = Profile::create([
        //     'category_id'   => $request->category_id,
        //     'subcategory_id'   => $request->subcategory_id,
        //     'brand_id'   => $request->brand_id,
        //     'product_name'   => $request->product_name,
        //     'product_slug' => Str::slug($request->product_name),
        //     'product_code'    => $productCode,
        //     'product_quantity'    => $request->product_quantity,
        //     'summary'    => $request->summary,
        //     'description'    => $request->description,
        //     'price'    => $request->price,
        //     'discount'    => $request->discount,
        //     'size'    => $request->size,
        //     'image_two'    => $request->image_two,
        //     'status'    => $request->status,
        // ]);

        // if(strlen($request->feature_image) > 100){
        //     Image::make($request->feature_image)->save(public_path('uploads/images/products/') . $file_name);

        //     $imgUrl = "http://127.0.0.1:8000/uploads/images/products/". $file_name;

        //     $product->feature_image = $imgUrl;
        // }
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
    public function update(Request $request, $id)
    {
        request()->validate([
            'name'      => 'required|string|max:250',
            'email'     => 'required|string|email|max:250',
            'photo'     => 'image|mimes:jpg,png,jpeg',
        ]);

          if(isset($request->status)){
              $status = true;
          }else{
              $status = false;
          }

          $user = User::findOrFail(Auth::id());

          if ($request->hasFile('photo')) {

              if(file_exists(public_path('backend/images/profile/') . $user->photo) && ($user->photo != 'backend/images/profile/default.png')){
                  unlink(public_path('backend/images/profile/') . $user->photo);
              }
              $imageName = 'photo-'.time().uniqid().'.'.$request->photo->getClientOriginalExtension();
              $request->photo->move(public_path('backend/images/profile/'), $imageName);
          }else{
              $imageName = $user->photo;
          }

          $user->update([
              'name'      => $request->name,
              'email'     => $request->email,
              'city'     => $request->city,
              'mobile'     => $request->mobile,
              'photo'     => $imageName,
              'status'    => $status
          ]);

          $notification = [
              'message' => 'Profile updated successfully!'
          ];

          if (request('status')) {
              return back()->with($notification);
          } else {
            //   Auth::logout();
            //   return redirect()->route('login');
            return back()->with($notification);
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



    public function imageUpload(Request $request){
        
        
        $user = User::findOrFail(Auth::id());
        request()->validate([
            
            'photo'     => 'required|image|mimes:jpg,png,jpeg'
        ]);
        
        if ($request->hasFile('photo')) {

            if(file_exists(public_path('frontend/assets/images/profiles/') . $user->photo) && ($user->photo != 'frontend/assets/images/profiles/profile.png')){
                unlink(public_path('frontend/assets/images/profiles/') . $user->photo);
            }
            $imageName = 'photo-'.time().uniqid().'.'.$request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('frontend/assets/images/profiles/'), $imageName);
        }else{
            $imageName = $user->photo;
        }

        $user->update([
            'photo'=> $imageName,
            ]);

            return back()->with(['message' => 'Images upload successfully.']);
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

        return back()->with(['message' => 'Password changed successfully.']);
    }
}
