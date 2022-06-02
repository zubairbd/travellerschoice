@extends('layouts.frontend-master')
@section('dashboard')current-menu-item @endsection
@section('dashboards')active @endsection
@section('styles')

@endsection
@section('content')
     <!-- Team Start -->
     <div class="rs-team-Single pt-120 pb-100 md-pt-80 md-pb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('frontend.users.partials.sidebar')
                </div>
                <div class="col-lg-9 sm-pt-30">
                    <div class="btm-info-team">
                    <div class="dash-info">
                        <span>Welcome to</span><h2 class="title">{{Auth::user()->name}}</h2>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->

@endsection
@section('scripts')
    <script>

        
    </script>
@endsection