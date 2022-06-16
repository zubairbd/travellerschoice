@extends('layouts.agent-master')
@section('profile.index') active @endsection
@section('styles')
<!-- Custom styles for this page -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<style>
    .table td, .table th {
        padding: 0.3rem;
        vertical-align: top;
        border-top: 1px solid #e3e6f0;
    }
    span {
        content: "\09F3";
        }
</style>
@endsection
@section('content')
<div class="container-fluid">

    <!-- Content Row -->
    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></div>
                                Account Settings - Profile
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        <!-- Main page content-->
        <div class="container-xl px-4 mt-4">
            <!-- Account page navigation-->
            {{-- <nav class="nav nav-borders">
                <a class="nav-link active ms-0" href="{{route('agent.profile.index')}}">Profile</a>
                <a class="nav-link" href="account-billing.html">Billing</a>
                <a class="nav-link" href="account-security.html">Security</a>
                <a class="nav-link" href="account-notifications.html">Notifications</a>
            </nav> 
            <hr class="mt-0 mb-4">--}}
            <div class="row">
                @if(session()->has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('message') }}
                    </div>
                @endif
                @if(session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session()->get('error') }}
                    </div>
                @endif
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">{{$error}}</div>
                    @endforeach
                @endif
                <div class="col-xl-4">
                    <!-- Profile picture card-->
                    <div class="card mb-4 mb-xl-0">
                        <div class="card-header">Profile Picture</div>
                        <div class="card-body text-center">

                           
                            <form action="{{ route('agent.profile.photo') }}" method="POST" enctype="multipart/form-data" role="form">
                                @csrf
                                <div class="avatar-upload">
                                  <div class="avatar-edit">
                                      <input type='file' name="photo" id="imageUpload" accept=".png, .jpg, .jpeg" />
                                      <label for="imageUpload"></label>
                                  </div>
                                  <div class="avatar-preview">
                                    @if (auth()->user()->photo == null)
                                      <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);">
                                       
                                        @else
                                        <div id="imagePreview" style="background-image: url({{asset('frontend/assets/images/profiles/'.auth()->user()->photo)}});">
                                    @endif
                                      </div>
                                  </div>
                              </div>
                            {{-- <input type="file" name="photo" id="newsimage"> --}}
                                 
                            <!-- Profile picture image-->
                            {{-- <img class="img-account-profile rounded-circle mb-2" src="{{asset('frontend')}}/assets/images/profiles/profile-1.png" alt="">
                            <!-- Profile picture help block-->
                            <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div> --}}
                            <!-- Profile picture upload button-->
                            <button class="btn btn-primary" type="submit">Upload new image</button>
                            </form>
                        </div>
                    </div>
                    <!-- Password change card-->
                    <div class="card mb-4 mb-xl-0">
                        <div class="card-header">Password Change</div>
                        <div class="card-body">

                            <form method="POST" action="{{route('agent.profile.changepassword')}}">
                                @csrf 
                               <!-- Form Row-->
                               <div class="mb-3">
                                    <label class="small mb-1" for="currentpassword">Old Password</label>
                                    <input class="form-control" name="currentpassword" id="currentpassword" type="password" placeholder="Enter your old password">
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1" for="newpassword">New Password</label>
                                    <input class="form-control" name="newpassword" id="newpassword" type="password" placeholder="Enter your new password">
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1" for="newpasconfirm">Confirm Password</label>
                                    <input class="form-control" name="newpassword_confirmation" id="newpasconfirm" type="password" placeholder="Enter your confirm password">
                                </div>
                               
                               <!-- Save changes button-->
                               <button class="btn btn-primary" type="submit">Changes Password</button>
                           </form>
                        </div>
                    </div>
                </div>
                
                <div class="col-xl-8">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">Account Details</div>
                        <div class="card-body">
                            <form method="POST" action="{{route('agent.profile.update',auth()->user()->id)}}">
                                 @csrf
                                @method('patch') 
                                <!-- Form Group (username)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="name">Full Name</label>
                                    <input class="form-control" name="name" type="text" placeholder="Enter your username" value="{{auth()->user()->name}}">
                                </div>
                                <!-- Form Row-->
                                {{-- <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName">First name</label>
                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" value="Valerie">
                                    </div>
                                    <!-- Form Group (last name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName">Last name</label>
                                        <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" value="Luna">
                                    </div>
                                </div> --}}
                                <!-- Form Row        -->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (organization name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputOrgName">Organization name</label>
                                        <input class="form-control" id="inputOrgName" type="text" placeholder="Enter your organization name" value="{{auth()->user()->organization}}">
                                    </div>
                                    <!-- Form Group (location)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="city">Location</label>
                                        <input class="form-control" name="city" type="text" placeholder="Enter your location" value="{{auth()->user()->city}}">
                                    </div>
                                </div>
                                <!-- Form Row-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="email">Email address</label>
                                    <input class="form-control" name="email" type="email" placeholder="Enter your email address" value="{{auth()->user()->email}}">
                                </div>
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="mobile">Phone number</label>
                                        <input class="form-control" name="mobile" type="tel" placeholder="Enter your phone number" value="{{auth()->user()->mobile}}">
                                    </div>
                                    <!-- Form Group (birthday)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="dob">Birthday</label>
                                        <input class="form-control" name="dob" type="text" id="dob" name="birthday" placeholder="Enter your birthday" value="{{auth()->user()->dob}}">
                                    </div>
                                </div>
                                <!-- Save changes button-->
                                <button class="btn btn-primary" type="submit">Save changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    

</div>

@endsection
@section('scripts')
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <!-- Page level plugins -->
    <script src="{{asset('frontend')}}/assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{asset('frontend')}}/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('frontend')}}/assets/js/demo/datatables-demo.js"></script>
    <script>
        


  $(document).ready(function() {
     
      $("#dob").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: "dd/mm/yy",
        autoclose: true,
        yearRange: '1950:2022',
    });
    });
    </script>
@endsection