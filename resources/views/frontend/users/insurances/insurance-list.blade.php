@extends('layouts.frontend-master')
@section('dashboard')current-menu-item @endsection
@section('purchase-insurance')active @endsection
@section('styles')
    
    {{-- <link rel="stylesheet" href="{{asset('frontend')}}/assets/js/datatables.min.css"/> --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.css"/>

    <style>
        .purchase-list h2 {
	position: relative;
	top: 20px;
	left: 20px;
	font-size: 22px;
}
    </style>
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
                                            @if (!empty($ins->payments->Insurance_id))
                                                <span class="btn btn-success btn-sm">Paid</span>
                                            @else
                                                <a href="{{route('user.insurance.payment',$ins->pp_number)}}" class="btn btn-danger btn-sm">Unpaid</a>
                                                
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
                                                
                                                @if (!empty($ins->payments->insurance_id))
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

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.js"></script>

@endsection