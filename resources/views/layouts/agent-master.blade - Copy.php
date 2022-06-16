<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Travellers Choice - @yield('title', 'Travel Destination Management')</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend')}}/assets/images/favicon.png">
    <!-- Custom fonts for this template-->
    <link href="{{asset('frontend')}}/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('frontend')}}/assets/css/sb-admin-pro.css" rel="stylesheet">
    <link href="{{asset('frontend')}}/assets/css/sb-admin-2.min.css" rel="stylesheet">
    @yield('styles')
    <style>
         .sidebar-brand-text.mx-3 img {
            width: 170px;
        }
        .btn-orange {
            color: #fff;
            background-color: #f76400;
            border-color: #f76400;
        }
        .btn-orange:hover {
        color: #fff;
        background-color: #d25500;
        border-color: #c65000;
        }
        .btn-check:focus + .btn-orange, .btn-orange:focus {
        color: #fff;
        background-color: #d25500;
        border-color: #c65000;
        box-shadow: 0 0 0 0.25rem rgba(248, 123, 38, 0.5);
        }
        .btn-check:checked + .btn-orange, .btn-check:active + .btn-orange, .btn-orange:active, .btn-orange.active, .show > .btn-orange.dropdown-toggle {
        color: #fff;
        background-color: #c65000;
        border-color: #b94b00;
        }
        .btn-check:checked + .btn-orange:focus, .btn-check:active + .btn-orange:focus, .btn-orange:active:focus, .btn-orange.active:focus, .show > .btn-orange.dropdown-toggle:focus {
        box-shadow: 0 0 0 0.25rem rgba(248, 123, 38, 0.5);
        }
        .btn-orange:disabled, .btn-orange.disabled {
        color: #fff;
        background-color: #f76400;
        border-color: #f76400;
        }

        .btn-group-sm > .btn, .btn-xs {
            padding: 0.01rem .2rem;
            font-size: .875rem;
            line-height: 1.5;
            border-radius: .2rem;
        }
        .fas.fa-print {
            font-size: 12px;
        }
        .form-control{
            color: #010204;
        }
        .form-group
        label {
            color: #010204;
        }
        .sidebar-logo-vertical {
            display: none;
        }
        .sidebar-logo-vertical img {
            width: 90px;
            
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('frontend.agents.partials.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">


                        <!-- Wallets -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 medium">Wallets: <b>{{walletBalance()}}</b></span>
                            
                        </a>
                        </li>
                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{asset('frontend')}}/assets/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{route('agent.profile.index')}}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                @yield('content')
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Travellers Choice 2021-2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('frontend')}}/assets/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('frontend')}}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('frontend')}}/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('frontend')}}/assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="{{asset('frontend')}}/assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('frontend')}}/assets/js/demo/chart-area-demo.js"></script>
    <script src="{{asset('frontend')}}/assets/js/demo/chart-pie-demo.js"></script>

    @yield('scripts')
    <script>
        
        

        $(function () {
 
            // This will hide the container surely when you click.
            $("#sidebarToggle").click(function () {
                $("#logo-vertical").hide().css("display", "block");
            });
            

        });
    </script>
</body>

</html>