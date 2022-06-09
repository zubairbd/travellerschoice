@extends('layouts.frontend-master')

@section('content')
<div class="rs-my-account pt-110 pb-120 md-pt-60 md-pb-80">
    <div class="container">
        <div class="row justify-content-center">
           <div class="col-lg-6">
                <h2 class="title pb-30 md-pb-15">Reset Password</h2>
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                
                <div class="rs-login">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group">
                        <label>Email address<span>*</span></label>
                        <input id="email" name="email" class="form-control-mod form-control @error('email') is-invalid @enderror" type="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus> 
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Passowrd<span>*</span></label>
                        <input id="password" name="password" class="form-control-mod @error('password') is-invalid @enderror" type="password" required autocomplete="new-password"> 
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label>Confirm Passowrd<span>*</span></label>
                        <input id="password_confirmation" name="password_confirmation" class="form-control-mod" type="password" required autocomplete="new-password"> 
                    </div>
                    
                    <button class="add-btn" type="submit">Reset Password</button>

                    
                </form>
                </div>
           </div> 
        </div>
    </div>
</div>
@endsection
