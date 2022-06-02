<ul class="nav-menu">
    <li class="@yield('home')"> <a href="{{url('/')}}" data-scroll-nav="0">Home</a>
         
    </li>
    <li>
        <a href="#" data-scroll-nav="2">About</a>
    </li>
    <li><a href="#" data-scroll-nav="1">Services</a></li>
    @if(Auth::user()->role == 'U')
    <li class="@yield('travel-insurance')"><a href="{{route('user.insurance.create')}}">Apply Insurance</a></li>
    @endif
    <li>
       <a href="#" data-scroll-nav="5">Contact</a>
    </li>
    @guest
    <li><a href="{{route('login')}}">Login</a></li>
    @else
    <li class="@yield('dashboard')"><a href="{{route('user.dashboard')}}">My Account</a></li>
    @endguest
</ul> <!-- //.nav-menu -->