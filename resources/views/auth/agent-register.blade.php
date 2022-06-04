@extends('layouts.frontend-master')
@section('title') Agent Registration @endsection

@section('content')
<div class="rs-my-account pt-110 pb-120 md-pt-60 md-pb-80">
    <div class="container">
        <div class="row justify-content-center">
           <div class="col-lg-6">
                <h2 class="title pb-30 md-pb-15">Agent Registration</h2>
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                @if(count($errors) > 0 )
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <ul class="p-0 m-0" style="list-style: none;">
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="rs-login">
                    <form method="POST" action="{{ route('agent.registration.submit') }}">
                        @csrf
                    <div class="form-group">
                        <label>Full Name<span></span></label>
                        <input id="name" name="name" class="form-control-mod @error('name') is-invalid @enderror" type="text"> 
                    </div>
                    <div class="form-group">
                        <label>Email address<span>*</span></label>
                        <input id="email" name="email" class="form-control-mod form-control @error('email') is-invalid @enderror" type="email"> 
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Passowrd<span>*</span></label>
                        <input id="password" name="password" class="form-control-mod @error('password') is-invalid @enderror" type="password"> 
                    </div>
                    <div class="form-group">
                        <label>Confirm Passowrd<span>*</span></label>
                        <input id="password_confirmation" name="password_confirmation" class="form-control-mod" type="password"> 
                    </div>
                    
                    <button class="add-btn" type="submit">Register</button>

                    <a href="{{url('login')}}" class="btn btn-warning float-right">Already Register</a>
                </form>
                </div>
           </div> 
        </div>
    </div>
</div>
@endsection
