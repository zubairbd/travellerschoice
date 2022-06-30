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
                                Wallet - Deposit
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
                        <form method="post" action="{{route('agent.wallet.deposit.store')}}">
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                                    
                                    <div class="form-group">
                                        <label for="amount">Deposit Amount</label>
                                        <input type="text" name="amount" class="form-control" id="amount" placeholder="Deposit Amount">
                                    </div>
                                    <div class="form-group">
                                        <label for="account_number">Account Number</label>
							@if($account->account_number)
                                        <input type="text" name="account_number" class="form-control" id="account_number" value="{{$account->account_number}}" readonly>
							@else
							<input type="text" name="account_number" class="form-control" id="account_number" readonly>
							@endif
                                    </div>
                                    <div class="form-group">
                                        <label for="trxid">TxrID</label>
                                        <input type="text" name="trxid" class="form-control" id="trxid" placeholder="TxrID">
                                    </div>



                                    <button type="submit" class="btn btn-primary float-right">Deposit Now</button>
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