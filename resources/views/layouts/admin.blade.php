<!DOCTYPE html>
<html>
@php
// $setting = App\Models\Setting::first();
@endphp
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!--[if IE]>
  <link rel="shortcut icon" href="/favicon.ico" type="image/vnd.microsoft.icon">
  <![endif]-->
  <title> Admin Panel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
  <link rel="stylesheet" href="{{asset('admin/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('admin/css/ionicons.min.css')}}">
  <!-- Admin Theme style -->
  <link rel="stylesheet" href="{{asset('admin/css/AdminLTE.css')}}">
  <link rel="stylesheet" href="{{asset('admin/css/skin-black.css')}}">
   <link rel="stylesheet" href="{{asset('admin/css/fontawesome-iconpicker.min.css')}}">
  <!-- Select 2 -->
  <link rel="stylesheet" href="{{asset('admin/css/select2.min.css')}}">
  <!-- DataTable -->
  <link rel="stylesheet" href="{{asset('admin/css/datatables.min.css')}}">

  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

 <!-- JQVMap -->
 <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
 
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <link rel="stylesheet" href="{{ asset('admin/css/admin.css') }}">

  @yield('styles')
    <style>
      .content-header {
        position: relative;
        padding: 15px 15px 15px 15px;
      }
      .box-img {
        width: 100px;
      }
    </style>
</head>
<body class="hold-transition skin-black sidebar-mini">
@if ($auth)
<div class="wrapper">
  <!-- Main Header -->
  <header class="main-header">
    <!-- Logo -->
    <a href="{{url('/')}}" class="logo" title="{{$setting->welcome_txt}}">
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">
        @if ($setting)
        <img src="{{asset('/admin/images/logo/'.$setting->logo)}}" class="ad-logo img-responsive" alt="{{$setting->welcome_txt}}">
        @endif
      </span>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <a href="{{url('/')}}" class="btn visit-btn" target="_blank" title="Visit Site">Visit Site <i class="fa fa-arrow-circle-o-right"></i></a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">{{$auth->name}}</span>
              <i class="fa fa-user hidden-lg hidden-md hidden-sm"></i>
            </a>
            <ul class="dropdown-menu">
              <!-- Menu Body -->
              <li><a href="{{route('admin.profile')}}" title="Profile">Profile</a></li>
              <li>
                <a href="{{ route('logout') }}" title="Logout"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left info">
          <h4>{{$auth->name}}</h4>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Main Sections</li>
        @if ($auth->role == 'A')
          <!-- Optionally, you can add icons to the links -->
          <li class="{{$dash}}"><a href="{{url('/admin/dashboard')}}" title="Dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
          <li class="{{$users}}"><a href="{{url('/admin/users')}}" title="Users"><i class="fa fa-users"></i> <span>Users</span></a></li>
          <li class="{{$product}}"><a href="{{route('admin.products.index')}}" title="Product"><i class="fa fa-shop"></i> <span>Product</span></a></li>
          <li class="{{$disc}}"><a href="{{route('admin.discounts.index')}}" title="Discount"><i class="fa fa-percent"></i> <span>Discount</span></a></li>
          <li class="{{$comorder}}"><a href="{{route('admin.order_completed.index')}}" title="Orders Completed"><i class="fa fa-cart-plus"></i> <span>Orders Completed</span></a></li>
          <li class="{{$pandorder}}"><a href="{{route('admin.order_panding.index')}}" title="Panding Orders"><i class="fa fa-shopping-cart"></i> <span>Panding Orders</span></a></li>
          <li class="{{$pay}}"><a href="{{url('/admin/payments')}}" title="Payments"><i class="fa fa-money-bill"></i> <span>Payments</span></a></li>
          <li class="{{$acc}}"><a href="{{url('/admin/accounts')}}" title="Accounts"><i class="fa fa-university"></i> <span>Accounts</span></a></li>
          <li class="{{$wallet}}"><a href="{{url('/admin/wallets')}}" title="Wallets"><i class="fa fa-wallet"></i> <span>Wallets</span></a></li>
          <li class="@yield('reports')"><a href="{{url('/admin/reports')}}" title="Wallets"><i class="fa fa-poll"></i> <span>Reports</span></a></li>

        @elseif ($auth->role == 'S')
          
        @endif
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @if (Session::has('added'))
      <div class="alert alert-success sessionmodal">
        {{session('added')}}
      </div>
    @elseif (Session::has('updated'))
      <div class="alert alert-info sessionmodal">
        {{session('updated')}}
      </div>
    @elseif (Session::has('deleted'))
      <div class="alert alert-danger sessionmodal">
        {{session('deleted')}}
      </div>
    @elseif (Session::has('error'))
      <div class="alert alert-danger sessionmodal">
        {{session('error')}}
      </div>
      @elseif ($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger sessionmodal" role="alert">{{$error}}</div>
                    @endforeach
               
    @endif
    
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{$page_header}}
        {{-- <small>Optional description</small> --}}
      </h1>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
      @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Main Footer -->
  <footer class="main-footer">
      {{-- @php
      $copyright = \DB::table('copyrighttexts')->first()->name;
      @endphp --}}
    <!-- Default to the left -->
    <strong>

        {{-- {{ $copyright }} --}}

    </strong>
  </footer>
</div>
@endif
<!-- ./wrapper -->
<!-- REQUIRED JS SCRIPTS -->
<!-- jQuery 3 -->

<script src="{{asset('admin/js/jquery.min.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{{-- <script src=”https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js”></script> --}}


<!-- Bootstrap 3.3.7 -->
<script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
<!-- DataTable -->
<script src="{{asset('admin/js/datatables.min.js')}}"></script>
<!-- Select2 -->
<script src="{{asset('admin/js/select2.full.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/js/adminlte.min.js')}}"></script>

<script src="{{asset('admin/js/fontawesome-iconpicker.min.js')}}"></script>


<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>



<script>
  $(function () {
    $( document ).ready(function() {
       $('.sessionmodal').addClass("active");
       setTimeout(function() {
           $('.sessionmodal').removeClass("active");
      }, 4500);
    });

    $('#example1').DataTable({
      "sDom": "<'row'><'row'<'col-md-4'l><'col-md-4'B><'col-md-4'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
      buttons: [
            {
               extend: 'print',
               exportOptions: {
                   columns: ':visible'
               }
            },
            'csvHtml5',
            'excelHtml5',
            'colvis',
          ]
    });

    $('#questions_table').DataTable({
      "sDom": "<'row'><'row'<'col-md-4'l><'col-md-4'B><'col-md-4'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
      buttons: [
        {
           extend: 'print',
           exportOptions: {
               columns: ':visible'
           }
        },
        'csvHtml5',
        'excelHtml5',
        'colvis',
      ],
      columnDefs: [
        { targets: [7,8,9,10], visible: false},
      ]
    });

    $('#search').DataTable({
      'paging'      : false,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : false,
      'info'        : false,
      'autoWidth'   : true,
      "sDom": "<'row'><'row'<'col-md-4'B><'col-md-8'f>r>t<'row'>",
      buttons: [
            {
               extend: 'print',
               exportOptions: {
                   columns: ':visible'
               }
            },
            'excelHtml5',
            'csvHtml5',
            'colvis',
          ]
    });

    $('#topTable').DataTable({
      "order": [[ 5, "desc" ]],
      "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]],
      "sDom": "<'row'><'row'<'col-md-4'l><'col-md-4'B><'col-md-4'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
      buttons: [
            {
               extend: 'print',
               exportOptions: {
                   columns: ':visible'
               }
            },
            'excelHtml5',
            'csvHtml5',
            'colvis',
          ]
    });
    //Initialize Select2 Elements
    $('.select2').select2()
    $('.currency-icon-picker').iconpicker({
      title: 'Currency Symbols',
      icons: ['fa fa-dollar', 'fa fa-euro', 'fa fa-gbp', 'fa fa-ils', 'fa fa-inr', 'fa fa-krw', 'fa fa-money', 'fa fa-rouble', 'fa fa-try'],
      selectedCustomClass: 'label label-primary',
      mustAccept: true,
      placement: 'topRight',
      showFooter: false,
      hideOnSelect: true
    });
  });



</script>


 {{-- @if($setting->right_setting == 1)
  <script type="text/javascript" language="javascript">
   // Right click disable
    $(function() {
    $(this).bind("contextmenu", function(inspect) {
    inspect.preventDefault();
    });
    });
      // End Right click disable
  </script>
@endif

@if($setting->element_setting == 1)
<script type="text/javascript" language="javascript">
//all controller is disable
      $(function() {
      var isCtrl = false;
      document.onkeyup=function(e){
      if(e.which == 17) isCtrl=false;
}

      document.onkeydown=function(e){
       if(e.which == 17) isCtrl=true;
      if(e.which == 85 && isCtrl == true) {
     return false;
    }
 };
      $(document).keydown(function (event) {
       if (event.keyCode == 123) { // Prevent F12
       return false;
  }
      else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I
     return false;
   }
 });
});
     // end all controller is disable
 </script>


@endif --}}





@yield('scripts')
</body>
</html>
