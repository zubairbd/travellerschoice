@extends('layouts.agent-master')
@section('dashboard')current-menu-item @endsection
@section('dashboards')active @endsection
@section('styles')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"/>
@endsection
@section('content')
<div class="container-fluid">
    <main>
    <!-- Page Heading -->
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i class="fa fa-list"></i><circle cx="12" cy="7" r="4"></circle></svg></div>
                                Insurance List - Create
                            </h1>
                        </div>
                        <div class="col-auto mb-3">
                            <a href="{{route('agent.insurance.list')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-list fa-sm text-white-50"></i> Insurance List</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="px-4">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">{{$error}}</div>
                @endforeach
            @endif
        </div>
       
        <!-- Content Row -->
        <div class="row">
            
            <div class="col-xl-12 col-lg-10">

                <!-- Area Chart -->
                <div class="card shadow mb-4">
                
                    <div class="card-body">
                        <form method="post" action="{{route('agent.insurance.store')}}">
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                
            
                                    <div class="form-group">
                                        <label for="insurance_type">Insurance Type</label>
                                            <select class="from-control custom-select" name="insurance_type" id="insurance_type">
                                            <option selected>Select Insurance Type</option>
                                            <option value="Worldtrips">Worldtrips</option>
                                            <option value="WeCare">We Care</option>
                                            <option value="Dubai">Dubai Insurance</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="destination">Departure Country</label>
                                        <select class="custom-select" name="destination">
                                            <option selected>Select Departure Country</option>
                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                            <option value="Oman">Oman</option>
                                            <option value="United Arab Emirates">UAE</option>
                                            <option value="Qatar">Qatar</option>
                                            <option value="Kuwait">Kuwait</option>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Full Name</label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Full Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="pp_number">Passport Number</label>
                                        <input type="text" name="pp_number" class="form-control" id="pp_number" placeholder="Passport Number">
                                    </div>
                                    <div class="form-group">
                                        <label for="dob">Date of birth</label>
                                        <input type="text" name="dob" class="form-control" id="dob" placeholder="Date of birth">
                                    </div>
                                    <div class="form-group">
                                        <label for="effective_date">Flight Date</label>
                                            <input type="text" name="effective_date" class="form-control" id="effective_date" placeholder="Flight Date">
                                    </div>
                                    <div class="form-group">
                                        {{-- <label for="termination_date">Insurance Expire Date</label> --}}
                                            <input type="hidden" name="termination_date" class="form-control" id="termination_date" value="">
                                    </div>



                                    <button type="submit" class="btn btn-primary float-right">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        
        </div>
    </main>

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
          dateFormat: "dd/mm/yy",
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
          dateFormat: "dd/mm/yy",
          autoclose: true,
          onSelect: function(selectedDate) {
              $("#effective_date").datepicker( "option", "maxDate", selectedDate );
          }
      });
  
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