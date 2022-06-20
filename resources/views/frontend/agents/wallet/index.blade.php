@extends('layouts.agent-master')@section('dashboard')current-menu-item @endsection
@section('wallet') active @endsection
@section('styles')
<!-- Custom styles for this page -->
<link href="{{asset('frontend')}}/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<style>
    .table td, .table th {
        padding: 0.6rem;
        vertical-align: top;
        border-top: 1px solid #e3e6f0;
    }
    .table thead th {
        vertical-align: bottom;
        border-bottom: 1px solid #e3e6f0;
    }
    .table {
        /* color: #070913; */
        font-size: 14px;
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
    <main>
        <!-- Page Heading -->
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i class="fa fa-wallet"></i><circle cx="12" cy="7" r="4"></circle></svg></div>
                                Wallet - Transaction history
                            </h1>
                        </div>
                        @php
                            $auth = Auth::user()->id;
                            $account = \App\Models\Account::where('user_id', $auth)->first();
                        @endphp
                
                        <div class="col-auto mb-3">
                            @if (!$account)
                                <a href="{{route('agent.account.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-university fa-sm text-white-50"></i> Account Opening</a>
                            @else
                                <a href="{{route('agent.account.show',$account)}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                    class="fas fa-university fa-sm text-white-50"></i> Account Details</a>
                                
                                <a href="{{route('agent.wallet.deposit')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                    class="fas fa-plus fa-sm text-white-50"></i> Wallet Deposit</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </header>
        @php
            $balance = App\Models\Wallet::where('status', 1)->sum('amount');
        @endphp
        <h3 class="alert alert-info">Balance: {{ walletBalance() }}</h3>
        <!-- DataTales Example -->

        <div class="px-4">
            @include('partials.messages')
        </div>
        
        <div class="card shadow mb-4">
            {{-- <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Insurance List</h6>
            </div> --}}
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Deposit Date</th>
                            <th scope="col">Account No.</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Status</th>
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
    </main>
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