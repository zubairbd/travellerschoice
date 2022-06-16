@extends('layouts.frontend-master')
@section('travel-insurance')current-menu-item @endsection
@section('styles')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"/>

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <meta name="csrf-token" content="{{ csrf_token() }}">

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
                    {{-- <form method="post" action="{{route('user.insurance.payment.submit')}}">
                        @csrf --}}
                        <fieldset>
                            <div class="row">
                                <input class="from-control" type="hidden" name="Insurance_id" value="{{$Insurance->id}}">
                                <div class="col-lg-12 mb-30 col-md-12 col-sm-12">
                                    <input class="from-control invoice" type="text" value="{{$Insurance->policy_number}}" placeholder="Name" disabled>
                                </div> 
                                <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                    <input class="from-control" type="text" value="{{$Insurance->name}}" placeholder="Name" disabled>
                                </div> 
                                <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                    <input class="from-control" type="text" value="{{$Insurance->pp_number}}" disabled>
                                </div>
                                <div class="col-lg-6 mb-30 col-md-6 col-sm-6">
                                    <input class="from-control amount" type="text" name="amount" value="300" disabled>
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
                            <button class="btn btn-primary" id="bKash_button">Pay with bKash</button>
                            <div class="btn-part">
                              <input class="submit sub-small" type="submit" value="Pay Now">
                            </div> 
                        </fieldset>
                    {{-- </form>  --}}
                    
                </div>
            </div>
        </div>
    </div> 
</div>
<!-- Video Section End -->

@endsection
@section('scripts')
<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script src="https://code.jquery.com/jquery-1.8.3.min.js"
        integrity="sha256-YcbK69I5IXQftf/mYD8WY0/KmEDCv1asggHpJk1trM8=" crossorigin="anonymous"></script>

<script id="myScript"
        src="https://scripts.sandbox.bka.sh/versions/1.2.0-beta/checkout/bKash-checkout-sandbox.js"></script>


<script>
     var accessToken = '';
        
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    
            $.ajax({
                url: "{!! route('token') !!}",
                type: 'POST',
                contentType: 'application/json',
                success: function (data) {
                    console.log('got data from token  ..');
                    console.log(JSON.stringify(data));
    
                    accessToken = JSON.stringify(data);
                },
                error: function () {
                    console.log('error');
    
                }
            });
    
            var paymentConfig = {
                createCheckoutURL: "{!! route('createpayment') !!}",
                executeCheckoutURL: "{!! route('executepayment') !!}"
            };
    
    
            var paymentRequest;
            paymentRequest = {amount: $('.amount').val(), intent: 'sale', invoice: $('.invoice').val()};
            console.log(JSON.stringify(paymentRequest));
    
            bKash.init({
                paymentMode: 'checkout',
                paymentRequest: paymentRequest,
                createRequest: function (request) {
                    console.log('=> createRequest (request) :: ');
                    console.log(request);
    
                    $.ajax({
                        url: paymentConfig.createCheckoutURL + "?amount=" + paymentRequest.amount + "&invoice=" + paymentRequest.invoice,
                        type: 'GET',
                        contentType: 'application/json',
                        success: function (data) {
                            console.log('got data from create  ..');
                            console.log('data ::=>');
                            console.log(JSON.stringify(data));
    
                            var obj = JSON.parse(data);
    
                            if (data && obj.paymentID != null) {
                                paymentID = obj.paymentID;
                                bKash.create().onSuccess(obj);
                            }
                            else {
                                console.log('error');
                                bKash.create().onError();
                            }
                        },
                        error: function () {
                            console.log('error');
                            bKash.create().onError();
                        }
                    });
                },
    
                executeRequestOnAuthorization: function () {
                    console.log('=> executeRequestOnAuthorization');
                    $.ajax({
                        url: paymentConfig.executeCheckoutURL + "?paymentID=" + paymentID,
                        type: 'GET',
                        contentType: 'application/json',
                        success: function (data) {
                            console.log('got data from execute  ..');
                            console.log('data ::=>');
                            console.log(JSON.stringify(data));
    
                            data = JSON.parse(data);
                            if (data && data.paymentID != null) {
                                alert('[SUCCESS] data : ' + JSON.stringify(data));
                                window.location.href = "{!! route('orders.index') !!}";
                            }
                            else {
                                bKash.execute().onError();
                            }
                        },
                        error: function () {
                            bKash.execute().onError();
                        }
                    });
                }
            });
    
            console.log("Right after init ");
        });
    
        function callReconfigure(val) {
            bKash.reconfigure(val);
        }
    
        function clickPayButton() {
            $("#bKash_button").trigger('click');
        }


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