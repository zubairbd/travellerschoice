@extends('layouts.frontend-master')

@section('content')
     <!-- Banner Section Start -->
     <div class="rs-banner style3 pt-100 pb-100" data-scroll-index="0">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="banner-content">
                       <h1 class="title">Travel Confidently with Trip Insurance</h1>
                        <p class="desc">
                            Reliable organization for low cost travel insurance.
                        </p>
                        <ul class="banner-btn">
                            <li><a class="readon started" href="{{route('user.insurance.create')}}" >Get Started</a></li>
                            {{-- <li>
                                <div class="rs-videos">
                                    <div class="animate-border white-color">
                                        <a class="popup-border popup-videos" href="https://www.youtube.com/watch?v=YLN1Argi7ik">
                                            <i class="fa fa-play"></i>
                                        </a>
                                    </div>
                                </div> 
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </div>
            
        </div>           
        <img class="d-none d-md-block images-part" src="{{asset('frontend')}}/assets/images/banner/travels.png" alt="">
    </div>
    <!-- Banner Section End -->
        
    <!-- Services Section Start -->
    <div class="rs-services style3 pt-20 pb-70 md-pt-75 md-pb-80" data-scroll-index="1">
        <div class="container">
            <div class="sec-title2 text-center mb-45">
                <span class="sub-text">Services</span>
                <h2 class="title testi-title">
                   Our Featured Services
                </h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-20">
                   <div class="services-item">
                       <div class="services-icon">
                           <div class="image-part">
                               <img class="main-img" src="{{asset('frontend')}}/assets/images/worldtrips-logo.png" alt="">
                           </div>
                       </div>
                       <div class="services-content">
                           <div class="services-text">
                               <h3 class="title"><a href="{{route('user.worldtrips.buy')}}">Worldtrip Insurance</a></h3>
                           </div>
                           <div class="services-desc">
                               <p>
                                Let's Find The Right Travel Insurance Plan For Your Trip
                               </p>
                           </div>
                       </div>
                       <div class="service-read">
                            <a href="{{route('user.worldtrips.buy')}}">Buy Now</a>
                       </div>
                   </div> 
                </div>
                <div class="col-lg-4 col-md-6 mb-20">
                    <div class="services-item">
                        <div class="services-icon">
                            <div class="image-part">
                                <img class="main-img" src="{{asset('frontend')}}/assets/images/wc.png" alt="">
                            </div>
                        </div>
                        <div class="services-content">
                            <div class="services-text">
                                <h3 class="title"><a href="{{route('user.wecare.buy')}}">WeCare Insurance</a></h3>
                            </div>
                            <div class="services-desc">
                                <p>
                                    Independent Insurance Intermediary and Financial Advisers
                                </p>
                            </div>
                        </div>
                        <div class="service-read">
                            <a href="{{route('user.wecare.buy')}}">Buy Now</a>
                       </div>
                    </div> 
                 </div>
                 <div class="col-lg-4 col-md-6 mb-20">
                    <div class="services-item">
                        <div class="services-icon">
                            <div class="image-part">
                                <img class="main-img" src="{{asset('frontend')}}/assets/images/dubai-insurance.png" alt="">
                            </div>
                        </div>
                        <div class="services-content">
                            <div class="services-text">
                                <h3 class="title"><a href="software-development.html">Dubai Insurance</a></h3>
                            </div>
                            <div class="services-desc">
                                <p>
                                    Independent Insurance Intermediary and Financial Advisers
                                </p>
                            </div>
                        </div>
                        <div class="service-read">
                            <a href="">Buy Now</a>
                       </div>
                    </div> 
                 </div>
                
                
            </div>
        </div>
    </div>
    <!-- Services Section End -->

    <!-- About Section Start -->
    <div id="rs-about" data-scroll-index="2" class="rs-about style2 pt-60 pb-60 md-pt-75 md-pb-80">
        <div class="image-part">
           <img src="{{asset('frontend')}}/assets/images/TravelInsurance.png" alt="about"> 
        </div> 
        <div class="container">
            <div class="row">
                <div class="col-lg-5"></div>
                <div class="col-lg-7 pl-55 md-pl-15 z-index-1">
                    <div class="sec-title mb-30">
                        <div class="sub-text style4-bg">About Us</div>
                        <h2 class="title pb-20">
                            We provide online travel insurance
                        </h2>
                        <div class="desc text-justify">
                            Travellers Choice offers a variety of trip insurance plans to meet the needs of individuals, groups and organizations worldwide.
                            <br>
                            <br>
                                                                You can collect insurance from us at any time.
                            We are on a mission to make unexpected travel accidents and emergencies less stressful for travelers. Our travel insurance plans can provide you with financial compensation, access to quality healthcare and 24/7 emergency travel assistance so you can unexpectedly guide yourself while exploring the world.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Section End -->

    <!-- Blog Section Start -->
    <div id="rs-blog" class="rs-blog pt-110 pb-60 md-pt-75 md-pb-80" data-scroll-index="3">
        <div class="container">  
            <div class="sec-title2 text-center mb-30">
                <span class="sub-text">Blogs</span>
                    <h2 class="title testi-title">
                        Latest Tips &Tricks
                    </h2>
                <div class="desc">
                    We've been building creative tools together for over a decade and have a deep appreciation for software applications
                </div>
            </div>
            <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30" data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800" data-dots="false" data-nav="false" data-nav-speed="false" data-center-mode="false" data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="false" data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="false" data-ipad-device2="2" data-ipad-device-nav2="false" data-ipad-device-dots2="false" data-md-device="3" data-md-device-nav="false" data-md-device-dots="false">
                <div class="blog-item">
                    <div class="image-wrap">
                        <a href="blog-details.html"><img src="{{asset('frontend')}}/assets/images/blog/main-home/1.jpg" alt=""></a>
                        <ul class="post-categories">
                            <li><a href="blog-details.html">Software Development</a></li>
                        </ul>
                    </div>
                    <div class="blog-content">
                       <ul class="blog-meta">
                           <li class="date"><i class="fa fa-calendar-check-o"></i> 16 Nov 2020</li>
                           <li class="admin"><i class="fa fa-user-o"></i> admin</li>
                       </ul>
                       <h3 class="blog-title"><a href="blog-details.html">Necessity May Give Us Your Best Virtual Court System</a></h3>
                       <p class="desc">We denounce with righteous indige nation and dislike men who are so beguiled...</p>
                       <div class="blog-button"><a href="blog-details.html">Learn More</a></div>
                    </div>
                </div>
                <div class="blog-item">
                    <div class="image-wrap">
                        <a href="blog-details.html"><img src="{{asset('frontend')}}/assets/images/blog/main-home/2.jpg" alt=""></a>
                        <ul class="post-categories">
                            <li><a href="blog-details.html"> Web Development</a></li>
                        </ul>
                    </div>
                    <div class="blog-content">
                       <ul class="blog-meta">
                           <li class="date"><i class="fa fa-calendar-check-o"></i> 20 December 2020</li>
                           <li class="admin"><i class="fa fa-user-o"></i> admin</li>
                       </ul>
                       <h3 class="blog-title"><a href="blog-details.html">Tech Products That Makes Its Easier to Stay at Home</a></h3>
                       <p class="desc">We denounce with righteous indige nation and dislike men who are so beguiled...</p>
                       <div class="blog-button"><a href="blog-details.html">Learn More</a></div>
                    </div>
                </div>
                <div class="blog-item">
                    <div class="image-wrap">
                        <a href="blog-details.html"><img src="{{asset('frontend')}}/assets/images/blog/main-home/3.jpg" alt=""></a>
                        <ul class="post-categories">
                            <li><a href="blog-details.html">It Services</a></li>
                        </ul>
                    </div>
                    <div class="blog-content">
                       <ul class="blog-meta">
                           <li class="date"><i class="fa fa-calendar-check-o"></i> 22 December 2020</li>
                           <li class="admin"><i class="fa fa-user-o"></i> admin</li>
                       </ul>
                       <h3 class="blog-title"><a href="blog-details.html">Open Source Job Report Show More Openings Fewer</a></h3>
                       <p class="desc">We denounce with righteous indige nation and dislike men who are so beguiled...</p>
                       <div class="blog-button"><a href="blog-details.html">Learn More</a></div>
                    </div>
                </div>
                <div class="blog-item">
                    <div class="image-wrap">
                        <a href="blog-details.html"><img src="{{asset('frontend')}}/assets/images/blog/main-home/4.jpg" alt=""></a>
                        <ul class="post-categories">
                            <li><a href="blog-details.html">Artifical Intelligence</a></li>
                        </ul>
                    </div>
                    <div class="blog-content">
                       <ul class="blog-meta">
                           <li class="date"><i class="fa fa-calendar-check-o"></i> 26 December 2020</li>
                           <li class="admin"><i class="fa fa-user-o"></i> admin</li>
                       </ul>
                       <h3 class="blog-title"><a href="blog-details.html">Types of Social Proof What its Makes Them Effective</a></h3>
                       <p class="desc">We denounce with righteous indige nation and dislike men who are so beguiled...</p>
                       <div class="blog-button"><a href="blog-details.html">Learn More</a></div>
                    </div>
                </div>
                <div class="blog-item">
                    <div class="image-wrap">
                        <a href="blog-details.html"><img src="{{asset('frontend')}}/assets/images/blog/main-home/5.jpg" alt=""></a>
                        <ul class="post-categories">
                            <li><a href="blog-details.html">Digital Technology</a></li>
                        </ul>
                    </div>
                    <div class="blog-content">
                       <ul class="blog-meta">
                           <li class="date"><i class="fa fa-calendar-check-o"></i> 28 December 2020</li>
                           <li class="admin"><i class="fa fa-user-o"></i> admin</li>
                       </ul>
                       <h3 class="blog-title"><a href="blog-details.html">Tech Firms Support Huawei Restriction, Balk at Cost</a></h3>
                       <p class="desc">We denounce with righteous indige nation and dislike men who are so beguiled...</p>
                       <div class="blog-button"><a href="blog-details.html">Learn More</a></div>
                    </div>
                </div>
                <div class="blog-item">
                    <div class="image-wrap">
                        <a href="blog-details.html"><img src="{{asset('frontend')}}/assets/images/blog/main-home/6.jpg" alt=""></a>
                        <ul class="post-categories">
                            <li><a href="blog-details.html">It Services</a></li>
                        </ul>
                    </div>
                    <div class="blog-content">
                       <ul class="blog-meta">
                           <li class="date"><i class="fa fa-calendar-check-o"></i> 30 December 2020</li>
                           <li class="admin"><i class="fa fa-user-o"></i> admin</li>
                       </ul>
                       <h3 class="blog-title"><a href="blog-details.html">Servo Project Joins The Linux Foundation Fold Desco</a></h3>
                       <p class="desc">We denounce with righteous indige nation and dislike men who are so beguiled...</p>
                       <div class="blog-button"><a href="blog-details.html">Learn More</a></div>
                    </div>
                </div>
             </div>
        </div>
    </div>
    <!-- Blog Section End -->

    <!-- Testimonial Section Start -->
    <div class="rs-testimonial main-home style4 pt-60 pb-60 md-pt-75 md-pb-80" data-scroll-index="4">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 md-pb-40">
                    <div class="testi-image">
                       <img src="{{asset('frontend')}}/assets/images/testimonial/testimonial-2.png" alt="testimonial"> 
                    </div> 
                </div>
                <div class="col-lg-6 pl-50 md-pl-15">
                    <div class="sec-title mb-50">
                        <div class="sub-text style4-bg left testi">Testimonials</div>
                        <h2 class="title pb-20">
                            What Customer Saying
                        </h2>
                        <div class="desc">
                            24/7 We service the customer spontaneously.
                        </div>
                    </div>
                    <div class="rs-carousel owl-carousel" 
                        data-loop="true" 
                        data-items="1" 
                        data-margin="30" 
                        data-autoplay="true" 
                        data-hoverpause="true" 
                        data-autoplay-timeout="5000" 
                        data-smart-speed="800" 
                        data-dots="true" 
                        data-nav="false" 
                        data-nav-speed="false" 

                        data-md-device="1" 
                        data-md-device-nav="false" 
                        data-md-device-dots="false" 
                        data-center-mode="false"

                        data-ipad-device2="1" 
                        data-ipad-device-nav2="false" 
                        data-ipad-device-dots2="false"

                        data-ipad-device="1" 
                        data-ipad-device-nav="false" 
                        data-ipad-device-dots="true" 

                        data-mobile-device="1" 
                        data-mobile-device-nav="false" 
                        data-mobile-device-dots="false">
                        <div class="testi-item">
                            <div class="author-desc">           
                                <div class="desc"><img class="quote" src="{{asset('frontend')}}/assets/images/testimonial/main-home/quote2.png" alt="">Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway.</div>
                            </div>
                            <div class="testimonial-content">
                                <div class="author-img">
                                    <img src="{{asset('frontend')}}/assets/images/testimonial/main-home/1.jpg" alt="">
                                </div>
                                <div class="author-part">
                                    <a class="name" href="#">Mariya Khan</a>
                                    <span class="designation">CEO, Brick Consulting</span>
                                </div>
                            </div>
                        </div>
                        <div class="testi-item">
                            <div class="author-desc">           
                                <div class="desc"><img class="quote" src="{{asset('frontend')}}/assets/images/testimonial/main-home/quote2.png" alt="">Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway.</div>
                            </div>
                            <div class="testimonial-content">
                                <div class="author-img">
                                    <img src="{{asset('frontend')}}/assets/images/testimonial/main-home/2.jpg" alt="">
                                </div>
                                <div class="author-part">
                                    <a class="name" href="#">Sonia Akther</a>
                                    <span class="designation">CEO, Keen IT Solution</span>
                                </div>
                            </div>
                        </div>
                        <div class="testi-item">
                            <div class="author-desc">           
                                <div class="desc"><img class="quote" src="{{asset('frontend')}}/assets/images/testimonial/main-home/quote2.png" alt="">Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway.</div>
                            </div>
                            <div class="testimonial-content">
                                <div class="author-img">
                                    <img src="{{asset('frontend')}}/assets/images/testimonial/main-home/3.jpg" alt="">
                                </div>
                                <div class="author-part">
                                    <a class="name" href="#">Felando</a>
                                    <span class="designation">Web Developer</span>
                                </div>
                            </div>
                        </div>
                        <div class="testi-item">
                            <div class="author-desc">           
                                <div class="desc"><img class="quote" src="{{asset('frontend')}}/assets/images/testimonial/main-home/quote2.png" alt="">Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway.</div>
                            </div>
                            <div class="testimonial-content">
                                <div class="author-img">
                                    <img src="{{asset('frontend')}}/assets/images/testimonial/main-home/4.jpg" alt="">
                                </div>
                                <div class="author-part">
                                    <a class="name" href="#">Neymar Vuya</a>
                                    <span class="designation">Arist</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial Section End -->
@endsection
