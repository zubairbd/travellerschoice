@extends('layouts.frontend-master')

@section('content')
<div class="rs-my-account pt-110 pb-120 md-pt-60 md-pb-80">
    <div class="container">
        <div class="row justify-content-center">
           <div class="col-lg-6 md-mb-50">
                <h2 class="title pb-30 md-pb-15">Reset Password</h2>
               <div class="rs-login">
                   
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                   <div class="form-group mb-30">
                       <label>Email address<span>*</span></label>
                       <input type="email"  id="email" name="email" class="form-control-mod  @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus> 
                       @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                       
                   </div>
                   <button class="add-btn" type="submit">Send Password Reset Link</button>
                    
                   
                </form>
               </div>
           </div>
           
        </div>
    </div>
</div>
@endsection
