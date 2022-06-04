@extends('layouts.agent-master')@section('dashboard')current-menu-item @endsection
@section('wallet') active @endsection
@section('styles')
<!-- Custom styles for this page -->
<link href="{{asset('frontend')}}/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<style>
    .table td, .table th {
        padding: 0.3rem;
        vertical-align: top;
        border-top: 1px solid #e3e6f0;
    }
    .table thead th {
        vertical-align: bottom;
        border-bottom: 1px solid #e3e6f0;
    }
    .table {
        color: #070913;
        font-size: 12px;
    }
    #dataTable_length {
        font-size: 14px;
    }
    #dataTable_filter {
        font-size: 14px;
    }
    #dataTable_info {
        font-size: 14px;
    }
    .pagination {
        font-size: 12px;
    }
</style>
@endsection
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Wallet History</h1>
        <a href="{{route('agent.wallet.deposit')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Deposit Wallet</a>
    </div>
    @php
        $balance = App\Models\Wallet::where('status', 1)->sum('amount');
    @endphp
    <h3 class="alert alert-info">Balance: {{ $balance}}</h3>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        {{-- <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Insurance List</h6>
        </div> --}}
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            
                            <th>Deposit Date</th>
                            <th>Account Number</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                   
                    <tbody>
                        @foreach ($wallets as  $wallet)
                        <tr>
                            
                            <td>{{$wallet->created_at->format('d/m/Y')}}</td>
                            <td>{{$wallet->account_number}}</td>
                            <td>{{$wallet->amount}}</td>
                            <td>{{$wallet->status == 1 ? 'Active' : 'Panding'}}</td>
                            
                            
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
@section('scripts')
    <!-- Page level plugins -->
    <script src="{{asset('frontend')}}/assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{asset('frontend')}}/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('frontend')}}/assets/js/demo/datatables-demo.js"></script>
    <script>

        
    </script>
@endsection