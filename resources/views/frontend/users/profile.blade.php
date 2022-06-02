@extends('layouts.frontend-master')
@section('dashboard')current-menu-item @endsection
@section('purchase-insurance')active @endsection
@section('styles')
    
    {{-- <link rel="stylesheet" href="{{asset('frontend')}}/assets/js/datatables.min.css"/> --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.css"/>


@endsection
@section('content')
     <!-- Team Start -->
     <div class="rs-team-Single pt-120 pb-100 md-pt-80 md-pb-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('frontend.users.partials.sidebar')
                    
                </div>
                <div class="col-lg-9 col-md-9 sm-pt-30">
                    
                    <div class="btm-info-team">
                        <div class="user-profile">
                            @if(session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session()->get('success') }}
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

                            <form method="post" action="{{route('user.profile.update',auth()->user()->id)}}">
                                @csrf
                                @method('patch')
                            <fieldset>
                                <div class="row">
                                    <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                        <input class="from-control" type="text" id="name" name="name" value="{{auth()->user()->name}}" placeholder="Name">
                                    </div> 
                                    <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                        <input class="from-control" type="text" id="mobile" name="mobile" value="{{auth()->user()->mobile}}" placeholder="Mobile">
                                    </div>
                                    <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                        <input class="from-control" type="password" id="password" name="password" placeholder="New Password">
                                    </div>
                                    
                                    <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                        <input class="from-control" type="text" id="city" name="city" value="{{auth()->user()->city}}" placeholder="City">
                                    </div> 
                                   
                                    <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                        <textarea class="from-control" name="address" id="" cols="30" rows="2" placeholder="Your Address">{{auth()->user()->address}}</textarea>
                                    </div>
                                </div>
                                <div class="btn-part">
                                  <input class="submit sub-small" type="submit" value="Submit Now">
                                </div> 
                            </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->

@endsection
@section('scripts')
{{-- <script type="text/javascript" src="{{asset('frontend')}}/assets/js/datatables.min.js"></script> --}}

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.js"></script>

    <script>
      $(document).ready(function() {
            $('#example').DataTable({
                responsive: true,
                "lengthChange": false,
                "ordering": false,
                "searching": true,
            } );

            
      });
    </script>
@endsection