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
                                <div class="page-header-icon"><i class="fa fa-wallet"></i><circle cx="12" cy="7" r="4"></circle></svg></div>
                                Wallet - Account Details
                            </h1>
                        </div>
                        <div class="col-auto mb-3">
                            <a href="{{route('agent.wallet.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-list fa-sm text-white-50"></i> Transaction history</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Content Row -->
        <div class="row">
            <div class="px-4">
                @include('partials.messages')
            </div>
            <div class="col-xl-12 col-lg-10">
                
                <!-- Area Chart -->
                <div class="card shadow mb-4">
                    {{-- <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Area Chart</h6>
                    </div> --}}
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item"><b>Account Name:</b> {{$account->account_name}}</li>
                            <li class="list-group-item"><b>Account Number:</b> {{$account->account_number}}</li>
                            <li class="list-group-item"><b>Account Status:</b> {{$account->status == 1 ? 'Active' : 'Inactive' }}</li>
                            <li class="list-group-item"><b>Organization:</b> {{$account->user->organization}}</li>
                            <li class="list-group-item"><b>Mobile:</b> {{$account->user->mobile}}</li>
                            <li class="list-group-item"><b>City:</b> {{$account->user->city}}</li>
                            
                          </ul>
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