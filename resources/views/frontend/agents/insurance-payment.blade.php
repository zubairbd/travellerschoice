@extends('layouts.agent-master')
@section('insurance.list')active @endsection
@section('styles')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"/>
@endsection
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Insurance</h1>
        <a href="{{route('agent.insurance.list')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-list fa-sm text-white-50"></i> Insurance List</a>
    </div>
    @if (session()->has('success'))
    <div class="alert alert-success">
        @if(is_array(session('success')))
            <ul>
                @foreach (session('success') as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        @else
            {{ session('success') }}
        @endif
    </div>
    @endif
    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-lg-10">

            <!-- Area Chart -->
            <div class="card shadow mb-4">
                {{-- <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Area Chart</h6>
                </div> --}}
                <div class="card-body">
                    <form method="post" action="{{route('agent.payment.submit')}}">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                
                                <div class="form-group">
                                    <label for="name">Policy Number</label>
                                    <input type="text" disabled class="form-control" id="name" value="{{$insurance->policy_number}}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Full Name</label>
                                    <input type="text" disabled class="form-control" id="name" value="{{$insurance->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="pp_number">Passport Number</label>
                                    <input type="text" disabled class="form-control" id="pp_number" value="{{$insurance->pp_number}}">
                                </div>
                                <div class="form-group">
                                    <label for="pp_number">Payment Amount</label>
                                    <input type="text" disabled class="form-control" id="pp_number" value="300">
                                </div>
                               
                                <button type="submit" class="btn btn-primary float-right">Pay</button>
                            </div>
                        </div>
                      </form>
                </div>
            </div>

        </div>

     
    </div>
    

</div>

@endsection
@section('scripts')
<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script>
//jQuery Datepicker adding days
$(document).ready(function() {
      $("#effective_date").datepicker({
          changeMonth: true,
          showOtherMonths: true,
          selectOtherMonths: true,
          format: "dd/mm/yyyy",
          autoclose: true,
          onSelect: function(selectedDate) {
              //$("#cal4").datepicker("setDate", selectedDate);
              var date = $(this).datepicker("getDate");
              date.setDate(date.getDate() + 29);
              $("#termination_date").datepicker("setDate", date);
              $("#termination_date").datepicker( "option", "minDate", selectedDate );
          }
      });
      $("#termination_date").datepicker({
        
          showOtherMonths: true,
          selectOtherMonths: true,
          format: "dd/mm/yyyy",
          autoclose: true,
          onSelect: function(selectedDate) {
              $("#effective_date").datepicker( "option", "maxDate", selectedDate );
          }
      });
  
      $("#dob").datepicker({
        changeMonth: true,
        changeYear: true,
        format: "dd/mm/yyyy",
        autoclose: true,
        yearRange: '1950:2022',
    });
    });
        
    </script>
@endsection