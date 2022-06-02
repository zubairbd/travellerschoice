<header id="rs-header" class="rs-header">
                    <!-- Topbar Area Start -->
                    
                    <!-- Topbar Area End -->

                    <!-- Menu Start -->
                    <div class="menu-area traveller-header menu-sticky">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-3">
                                    <div class="logo-area">
                                        <a href="{{url('/')}}">
                                            <img class="normal-logo" src="{{asset('frontend')}}/assets/images/logo-light.png" alt="logo">  
                                            <img class="sticky-logo" src="{{asset('frontend')}}/assets/images/logo-dark.png" alt="logo">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-9 text-right">
                                    <div class="rs-menu-area">
                                        <div class="main-menu">
                                            <div class="mobile-menu">
                                                <a href="{{url('/')}}" class="mobile-logo">
                                                    <img src="{{asset('frontend')}}/assets/images/logo-light.png" alt="logo">
                                                </a>
                                                <a href="#" class="rs-menu-toggle rs-menu-toggle-close">
                                                    <i class="fa fa-bars"></i>
                                                </a>
                                            </div>
                                            <nav class="rs-menu rs-menu-close">
                                                @include('frontend.partials.menu')
                                            </nav>                                        
                                        </div> <!-- //.main-menu -->                                
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                    <!-- Menu End -->
                </header>