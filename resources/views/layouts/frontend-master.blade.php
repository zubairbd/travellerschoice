<!DOCTYPE html>
<html lang="zxx">  
    <head>
        <!-- meta tag -->
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Travellers Choice - Travel Destination Management</title>
        <meta name="description" content="">
        <!-- responsive tag -->
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- favicon -->
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend')}}/assets/images/favicon.png">
        <!-- Bootstrap v4.4.1 css -->
        <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/css/bootstrap.min.css">
        <!-- font-awesome css -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
        <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/css/font-awesome.min.css">
        <!-- flaticon css -->
        <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/fonts/flaticon.css">
        <!-- animate css -->
        <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/css/animate.css">
        <!-- owl.carousel css -->
        <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/css/owl.carousel.css">
        <!-- slick css -->
        <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/css/slick.css">
        <!-- off canvas css -->
        <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/css/off-canvas.css">
        <!-- magnific popup css -->
        <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/css/magnific-popup.css">
        <!-- Main Menu css -->
        <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/rsmenu-main.css">
        <!-- spacing css -->
        <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/css/rs-spacing.css">
        <!-- style css -->
        <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/style.css"> <!-- This stylesheet dynamically changed from style.less -->
        <!-- responsive css -->
        <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/css/responsive.css">

        <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/assets/css/custom.css">

        @yield('styles')

    </head>
    <body class="defult-home">
        
        <!--Preloader area start here-->
        <div id="loader" class="loader">
            <div class="loader-container"></div>
        </div>
        <!--Preloader area End here--> 
     
		<!-- Main content Start -->
        <div class="main-content">
            
            <!--Full width header Start-->
            <div class="full-width-header">
                <!--Header Start-->
                @if (Request::is('/*'))
                    @include('frontend.partials.front-header')
                    @else
                    @include('frontend.partials.header')
                @endif
                
                <!--Header End-->
                <!-- Canvas Menu start -->
                <nav class="right_menu_togle hidden-md">
                    <div class="close-btn"><span id="nav-close" class="text-center"><i class="fa fa-close"></i></span></div>
                    <div class="canvas-logo">
                        <a href="index.html"><img src="{{asset('frontend')}}/assets/images/logo-dark.png" alt="logo"></a>
                    </div>
                    <div class="offcanvas-text">
                        <p>Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ‘Content here, content here’, making it look like readable English.</p>
                    </div>
                    <div class="canvas-contact">
                        <h5 class="canvas-contact-title">Contact Info</h5>
                        <ul class="contact">
                            <li><i class="fa fa-globe"></i>Middle Badda, Dhaka, BD</li>
                            <li><i class="fa fa-phone"></i>+123445789</li>
                            <li><i class="fa fa-envelope"></i><a href="mailto:info@yourcompany.com">info@yourcompany.com</a></li>
                            <li><i class="fa fa-clock-o"></i>10:00 AM - 11:30 PM</li>
                        </ul>
                        <ul class="social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </nav>
                <!-- Canvas Menu end -->
            </div>
            <!--Full width header End-->
         
           @yield('content')

        </div> 
        <!-- Main content End -->
     
        <!-- Footer Start -->
        @include('frontend.partials.footer')
        <!-- Footer End -->

        <!-- start scrollUp  -->
        <div id="scrollUp" class="orange-color">
            <i class="fa fa-angle-up"></i>
        </div>
        <!-- End scrollUp  -->

        <!-- Search Modal Start -->
        <div aria-hidden="true" class="modal fade search-modal" role="dialog" tabindex="-1">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span class="flaticon-cross"></span>
            </button>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="search-block clearfix">
                        <form>
                            <div class="form-group">
                                <input class="form-control" placeholder="Search Here..." type="text">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Search Modal End -->

         <!-- modernizr js -->
        <script src="{{asset('frontend')}}/assets/js/modernizr-2.8.3.min.js"></script>
        <!-- jquery latest version -->
        <script src="{{asset('frontend')}}/assets/js/jquery.min.js"></script>
        <!-- Bootstrap v4.4.1 js -->
        <script src="{{asset('frontend')}}/assets/js/bootstrap.min.js"></script>
        <!-- Menu js -->
        <script src="{{asset('frontend')}}/assets/js/rsmenu-main.js"></script> 
        <!-- op nav js -->
        <script src="{{asset('frontend')}}/assets/js/jquery.nav.js"></script>
        <!-- owl.carousel js -->
        <script src="{{asset('frontend')}}/assets/js/owl.carousel.min.js"></script>
        <!-- wow js -->
        <script src="{{asset('frontend')}}/assets/js/wow.min.js"></script>
        <!-- Skill bar js -->
        <script src="{{asset('frontend')}}/assets/js/skill.bars.jquery.js"></script>
        <script src="{{asset('frontend')}}/assets/js/jquery.counterup.min.js"></script> 
         <!-- counter top js -->
        <script src="{{asset('frontend')}}/assets/js/waypoints.min.js"></script>
        <!-- swiper js -->
        <script src="{{asset('frontend')}}/assets/js/swiper.min.js"></script>   
        <!-- particles js -->
        <script src="{{asset('frontend')}}/assets/js/particles.min.js"></script>  
        <!-- magnific popup js -->
        <script src="{{asset('frontend')}}/assets/js/jquery.magnific-popup.min.js"></script>      
        <!-- plugins js -->
        <script src="{{asset('frontend')}}/assets/js/plugins.js"></script>
        <!-- pointer js -->
        <script src="{{asset('frontend')}}/assets/js/pointer.js"></script>
        <!-- contact form js -->
        <script src="{{asset('frontend')}}/assets/js/contact.form.js"></script>
        <!-- ScrollIt js -->
        <script src="{{asset('frontend')}}/assets/js/scrollIt.min.js"></script>
        <!-- main js -->
        <script src="{{asset('frontend')}}/assets/js/main.js"></script>
        <script type='text/javascript'> 
            document.addEventListener('contextmenu', event => event.preventDefault()); 
            document.onkeydown = function(e) {
            var message='Content is protected\nYou cannot view the page.';
            if (e.ctrlKey &&
            (e.keyCode === 67 ||
            e.keyCode === 86 ||
            e.keyCode === 85 ||
            e.keyCode === 117)) {
            alert(message);
            return false;
            } else {
            return true;
            }
            };
            $(document).keypress('u',function(e) {
            if(e.ctrlKey){
            return false;
            }
            else{
                return true;
                }
            });
        </script>

        @yield('scripts')
    </body>
</html>