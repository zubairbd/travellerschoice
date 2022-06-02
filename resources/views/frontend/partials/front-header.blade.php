<header id="rs-header" class="rs-header style3 header-transparent">
    <!-- Topbar Area Start -->
    <div class="topbar-area style2 modify1">
       <div class="container">
           <div class="row y-middle">
               <div class="col-lg-8">
                   <div class="topbar-contact">
                      <ul>
                          <li>
                              <i class="flaticon-email"></i>
                              <a href="mailto:travellerschoice7@gmail.com">travellerschoice7@gmail.com                                            </a>
                          </li>
                          <li>
                              <i class="flaticon-call"></i>
                              <a href="tel:+88 01531393969"> +88 01531393969</a>
                          </li>
                          <li>
                              <i class="flaticon-location"></i>
                              Dhaka, Bangladesh
                          </li>
                      </ul>
                   </div>
               </div>
               <div class="col-lg-4 text-right">
                   <div class="toolbar-sl-share">
                       <ul>
                            <li class="opening"> <em><i class="flaticon-clock"></i> 10:00am-10:00pm</em> </li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                       </ul>
                   </div>
               </div>
           </div>
       </div>
   </div>
    <!-- Topbar Area End -->
    <!-- Menu Start -->
    <div class="menu-area menu-sticky">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="logo-part">
                        <a href="{{url('/')}}">
                            <img class="normal-logo" src="{{asset('frontend')}}/assets/images/logo-light.png" alt="logo">  
                            <img class="sticky-logo" src="{{asset('frontend')}}/assets/images/logo-dark.png" alt="logo">
                        </a>
                    </div>
                    <div class="mobile-menu">
                        <a href="#" class="rs-menu-toggle rs-menu-toggle-close">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-9 text-right"> 
                    <div class="rs-menu-area">
                        <div class="main-menu">
                            <nav class="rs-menu pr-70 lg-pr-50 md-pr-0">
                                @include('frontend.partials.menu')
                            </nav>                                     
                        </div> <!-- //.main-menu -->
                        <div class="expand-btn-inner search-icon hidden-md">
                            <ul>
                                <li class="sidebarmenu-search">
                                    <a class="hidden-xs rs-search" data-target=".search-modal" data-toggle="modal" href="#">
                                        <i class="flaticon-search"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>                                
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Menu End -->
</header>