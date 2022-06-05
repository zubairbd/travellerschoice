@extends('layouts.frontend-master')
@section('travel-insurance')current-menu-item @endsection
@section('styles')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"/>
@endsection
@section('content')
      <!-- Counter Section Start -->
      <div class="rs-contact-wrap bg5 pt-80 pb-390 md-pt-80">
        <div class="container">
          <div class="sec-title2 text-center mb-30">
              <span class="sub-text style-bg white-color">Payment Form</span>
              <h2 class="title white-color">
                 Pay your insurance fee
              </h2>
          </div>           
        </div>
     </div>
     <!-- Counter Section End -->
 <!-- Video Section End -->
 <div class="rs-travelform-wrap style2 inner pb-120 md-pb-80">
    <div class="container">
        <div class="row justify-content-center margin-0 gray-color">
            <div class="col-lg-8 padding-0">
                <div class="rs-requset"> 
                
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
                    {{-- <div id="form-messages"></div> --}}
                    <form method="post" action="{{route('user.insurance.payment.submit')}}">
                        @csrf
                        <fieldset>
                            <div class="row">
                                <input class="from-control" type="hidden" name="passenger_id" value="{{$passenger->id}}">
                                <div class="col-lg-12 mb-30 col-md-12 col-sm-12">
                                    <input class="from-control" type="text" value="{{$passenger->policy_number}}" placeholder="Name" disabled>
                                </div> 
                                <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                    <input class="from-control" type="text" value="{{$passenger->name}}" placeholder="Name" disabled>
                                </div> 
                                <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                    <input class="from-control" type="text" value="{{$passenger->pp_number}}" disabled>
                                </div>
                                <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                    <input class="from-control" type="text" id="account_number" name="account_number" placeholder="Mobile Banking Number">
                                </div>
                                <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                    <select class="from-control select2" name="payment_type">
                                        <option value="Bkash">Bkash</option>
                                        <option value="Rocket">Rocket</option>
                                        <option value="Nagad">Nagad</option>
                                        <option value="Upay">Upay</option>
                                        <option value="Ucash">Ucash</option>
                                      </select>
                                </div> 
                            </div>
                            
                            <div class="btn-part">
                              <input class="submit sub-small" type="submit" value="Pay Now">
                            </div> 
                        </fieldset>
                    </form> 
                    
                </div>
            </div>
        </div>
    </div> 
</div>
<!-- Video Section End -->

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
        yearRange: '1950:2000',
    });
    });
  
    
  </script>
@endsection