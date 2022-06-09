@extends('layouts.frontend-master')

@section('content')
<div class="rs-my-account pt-110 pb-120 md-pt-60 md-pb-80">
    <div class="container">
        <div class="row justify-content-center">
           <div class="col-lg-6 md-mb-50">
                <h2 class="title pb-30 md-pb-15">Login</h2>
               <div class="rs-login">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                   <div class="form-group mb-30">
                       <label>Username or email address<span>*</span></label>
                       <input id="email" name="email" class="form-control-mod @error('email') is-invalid  @enderror" type="text" value="{{ old('email') }}"> 
                       @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                       <label>Password <span>*</span></label>
                       <input id="password" name="password" class="form-control-mod @error('password') is-invalid @enderror" type="password">
                   </div>
                   <button class="add-btn" type="submit">Log In</button>
                    <label>
                        <input class="woocommerce-form__input woocommerce-form__input-checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span>Remember me</span>
                    </label>
                   <div class="last-password pt-30">
                        <a href="{{ route('password.request') }}">Lost your password?</a>
                        <a style="float: right" class="btn btn-warning" href="{{url('register')}}">Register</a>
                    </div>
                </form>
               </div>
           </div>
           
        </div>
    </div>
</div>
@endsection
