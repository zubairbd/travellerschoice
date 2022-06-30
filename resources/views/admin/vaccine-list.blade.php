@extends('layouts.admin-master')
@section('dashboard')current-menu-item @endsection
@section('vaccine-list') active @endsection
@section('styles')
<!-- Custom styles for this page -->
<link href="{{asset('backend')}}/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
    <main>

        <!-- Page Heading -->
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i class="fa fa-list"></i><circle cx="12" cy="7" r="4"></circle></svg></div>
                                Vaccine List
                            </h1>
                        </div>
                        <div class="col-auto mb-3">
                            <a href="{{route('admin.vaccines.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-plus fa-sm text-white-50"></i> Create New Vaccine</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        <div class="px-4">
            @include('partials.messages')
        </div>
        
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
                                <th>SL</th>
                                {{-- <th>Flight Date</th> --}}
                                <th>Certificate No.</th>
                                <th>Name</th>
                                <th>Passport</th>
                                <th>Vaccine Name</th>
                                <th>Payment Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    
                        <tbody>
                            @foreach ($vaccines as $index => $vax)
                            <tr>
                                <td>{{$index+1}}</td>
                                {{-- <td>{{date('d/m/Y', strtotime($insurance->effective_date))}}</td> --}}
                                <td>BD{{$vax->certificate_number}}</td>
                                <td>{{$vax->name}}</td>
                                <td>{{$vax->passport}}</td>
                                <td>{{$vax->vaccine_name}}</td>
                                <td>{{$vax->status == 1 ? 'Active' : 'Inactive'}}</td>
                                <td>
                                    <a href="{{route('admin.vaccines.edit',$vax->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>
                                    <a href="{{url('foreigner-verify-online?id='.$vax->url)}}" class="btn btn-success btn-xs"><i class="fa fa-eye"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-danger btn-xs" onclick="event.preventDefault();
                                    document.getElementById('agent-delete-form-{{$vax->id}}').submit();"><i class="fa fa-trash"></i></a>

                                    <form id="agent-delete-form-{{$vax->id}}" action="{{ route('admin.vaccines.destroy',$vax->id) }}" method="POST" style="display: none;">
                                        @csrf 
                                        @method('DELETE')
                                    </form>
                                    
                                </td>
                                
                                
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
    <script src="{{asset('backend')}}/assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{asset('backend')}}/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('backend')}}/assets/js/demo/datatables-demo.js"></script>
    <script>

        
    </script>
@endsection