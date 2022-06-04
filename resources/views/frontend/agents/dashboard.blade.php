@extends('layouts.agent-master')
@section('dashboard') active @endsection
@section('styles')
<!-- Custom styles for this page -->
<link href="{{asset('frontend')}}/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<style>
    .table td, .table th {
        padding: 0.3rem;
        vertical-align: top;
        border-top: 1px solid #e3e6f0;
    }
</style>
@endsection
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Insurance</h1>
        <a href="{{route('agent.insurance.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Create New Insurance</a>
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