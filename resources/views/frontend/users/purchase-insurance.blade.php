@extends('layouts.frontend-master')
@section('dashboard')current-menu-item @endsection
@section('purchase-insurance')active @endsection
@section('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                        <div class="purchase-list">
                            <h2>Insurance Purchase List</h2>
                            <table id="example" class="table table-striped table-bordered" width="100%">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Policy No.</th>
                                        <th>Name</th>
                                        <th>Passport</th>
                                        <th>Destination</th>
                                        <th>Flight Date</th>
                                        <th>Status</th>
                                        <th>Insurance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($purchaseHistory as $ins)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td class="invoice">{{$ins->policy_number}}</td>
                                        <td>{{$ins->name}}</td>
                                        <td>{{$ins->pp_number}}</td>
                                        <td>{{$ins->destination}}</td>
                                        {{-- <td>{{$ins->effective_date}}</td> --}}
                                        <td class="amount">300</td>
                                        <td>
                                            @if (!empty($ins->payments->passenger_id))
                                                <span class="btn btn-success btn-sm">Paid</span>
                                            @else
                                                <a href="{{route('user.insurance.payment',$ins->pp_number)}}" class="btn btn-danger btn-sm">Unpaid</a>
                                                <button class="btn btn-primary" id="bKash_button">Pay with bKash</button>
                                            @endif
                        
                                        </td>
                                        <td>
                                            @if ($ins->status == 1)
                                                @if ($ins->insurance_type == 'Worldtrips')
                                                <a href="{{route('user.insurance.worldtrips',$ins->id)}}" class="btn btn-warning btn-sm">Download</a>
                                                @elseif ($ins->insurance_type == 'WeCare')
                                                <a href="{{route('user.insurance.wecare',$ins->id)}}" class="btn btn-warning btn-sm">Download</a>
                                                @endif
                                                
                                            @else
                                                
                                                @if (!empty($ins->payments->passenger_id))
                                                    <span class="btn btn-primary btn-sm">Processing</span>
                                                @else
                                                    <span class="btn btn-danger btn-sm">Panding</span>
                                                @endif
                                            @endif
                                            
                                            
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                    
                                </tbody>
                            </table>
                            
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
<script src="https://code.jquery.com/jquery-1.8.3.min.js"
        integrity="sha256-YcbK69I5IXQftf/mYD8WY0/KmEDCv1asggHpJk1trM8=" crossorigin="anonymous"></script>

<script id="myScript"
        src="https://scripts.sandbox.bka.sh/versions/1.2.0-beta/checkout/bKash-checkout-sandbox.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.js"></script>

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
        paymentRequest = {amount: $('.amount').text(), intent: 'sale', invoice: $('.invoice').text()};
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
                            window.location.href = "{!! route('user.insurance.purchase') !!}";
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