<div class="btm-info-team">
    <div class="images-part">
        @if (Auth::user()->images == null)
            <img src="{{asset('frontend')}}/assets/images/users/user.png" alt="images">
        @else
        <img src="{{asset('frontend')}}/assets/images/users/{{Auth::user()->images}}" alt="images">  
        @endif
    </div>
    <div class="con-info">
        <h2 class="title">{{Auth::user()->name}}</h2>
        <span class="designation-info">{{Auth::user()->email}} </span>
        
        <div class="sidebar">
            <ul class="user-menu">
                <li><a class="@yield('dashboards')" href="{{route('user.dashboard')}}">
                    <i class="fa fa-slack"></i>
                    dashboard
                </a>
                </li>
                <li><a class="@yield('purchase-insurance')" href="{{route('user.insurance.list')}}">
                    <i class="fa fa-money-bill-alt"></i>
                    purchase history</a>
                </li>
                <li><a class="@yield('manage-profile')" href="{{route('user.profile')}}">
                    <i class="fa fa-user"></i>
                    manage profile</a></li>
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out-alt"></i>
                    Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>                     
        </div>
        
    </div>
</div>