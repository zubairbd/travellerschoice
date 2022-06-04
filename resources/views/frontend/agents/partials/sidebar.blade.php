<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('agent.dashboard')}}">
        
        <div class="sidebar-brand-text mx-3"><img src="{{asset('frontend')}}/assets/images/logo-light.png" alt="" srcset=""></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @yield('dashboard')">
        <a class="nav-link" href="{{route('agent.dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Main Menu
    </div>
    <!-- Nav Item - Main -->
    <li class="nav-item @yield('insurance.list')">
        <a class="nav-link" href="{{route('agent.insurance.list')}}">
            <i class="fas fa-list fa-sm text-white-50"></i>
            <span>Insurance List</span></a>
    </li>

    <li class="nav-item @yield('wallet')">
        <a class="nav-link" href="{{route('agent.wallet.index')}}">
            <i class="fas fa-wallet fa-sm text-white-50"></i>
            <span>Wallet</span></a>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

 

</ul>