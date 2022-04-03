<!DOCTYPE html>
<html lang="en">
    <head>
        <!--====== Required meta tags ======-->
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--====== Title ======-->
        <title>فجر الجنوب</title>
        <!--====== Favicon Icon ======-->
        <link rel="shortcut icon" href="{{asset('frontend/assets/images/favicon.ico')}}" type="image/png">
        <!--====== Bootstrap css ======-->
        <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">
        <!--====== Flaticon css ======-->
        <link rel="stylesheet" href="{{asset('frontend/assets/fonts/flaticon/flaticon.css')}}">
        <!--====== Iconfont css ======-->
        <link rel="stylesheet" href="{{asset('frontend/assets/fonts/icofont/icofont.css')}}">
        <!--====== Gilory css ======-->
        <link rel="stylesheet" href="{{asset('frontend/assets/fonts/gilory/gilory.css')}}">
        <!--====== Magnific Popup css ======-->
        <link rel="stylesheet" href="{{asset('frontend/assets/css/magnific-popup.css')}}">
        <!--====== Slick css ======-->
        <link rel="stylesheet"href="{{asset('frontend/assets/css/slick.css')}}">
        <!--====== nice-select css ======-->
        <link rel="stylesheet" href="{{asset('frontend/assets/css/nice-select.css')}}">
        <!--====== Default css ======-->
        <link rel="stylesheet"href="{{asset('frontend/assets/css/default.css')}}">
        <!--====== Style css ======-->
        <link rel="stylesheet" href="{{asset('frontend/assets/css/style.css')}}">

        
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">

        @yield('styles')
    </head>
    <body>
        @php
        $setting = \App\Models\Setting::first();
    @endphp
        <!--====== Start Preloader ======-->
        <div class="preloader">
            <div class="lds-ellipsis">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div><!--====== End Preloader ======-->
       <!--====== Start Header ======-->
          <header class="header-area header-area-v1">
            <div class="header-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="top-left">
                             <div class="site-branding">
                                    <div class="brand-logo">
                                        <a href="{{ route('frontend.home') }}"><img src="frontend/assets/images/logo-1.png" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            
                          
                            <div class="top-left custom-container pt-20">
                                    
                                     <div class="nav-button float-left">
                                   <a  href="{{route('frontend.request')}}" class="main-btn"> طلب عرض خدمة   </a>
                                <!--    <a  href="#" class="main-btn"> طلب عرض خدمة   </a>-->
                                </div>
                            
                                <div class="header-phone float-left pl-20"><i class="icofont-ui-call"></i>{{$setting->phone ?? ''}}</div>
                           
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
                  
            <div class="header-navigation">
                <div class="nav-container">
                    <div class="container">
                        <div class="row align-items-center">
                     
 <div class=" col-12">
 <div class="nav-menu">
                                    <!-- Navbar Close Icon -->
 <div class="navbar-close">
    <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
</div>
 <nav class="main-menu">
 <ul>
 <li class="menu-item"><a href="{{ route('frontend.home') }}">الرئيسية</a></li>
<li class="menu-item"><a href="{{route('frontend.service')}}">خدماتنا</a></li>
<li class="menu-item menu-item-has-children"><a href="#">عن فجر الجنوب</a>
 <ul class="sub-menu">
<li><a href="{{route('frontend.about')}}">عن الشركة</a></li>
 <li><a  href="{{route('frontend.vision')}}">الرؤية والرسالة</a></li>
    <!-- <li><a href="team.html"> فريق العمل</a></li>-->
     <li><a href="{{route('frontend.management')}}">إدارة الشركة</a></li>
     <li><a href="{{route('frontend.department')}}">أقسام الشركة </a></li>
     <li><a href="{{route('frontend.policies')}}"> سياسات الشركة  </a></li>
     <li><a href="{{route('frontend.tasks')}}"> وصف ومهام </a></li>
 </ul> </li>
<li class="menu-item"><a href="{{route('frontend.projects')}}">مشروعتنا</a></li>
     <li class="menu-item"><a href="{{route('frontend.news')}}">أخبارنا</a></li>
     <li class="menu-item"><a href="{{route('frontend.crew')}}">الهيكل الوظيفي</a></li>
     <li class="menu-item"><a href="{{route('frontend.certificates')}}">شهادات وإنجازات</a></li>
     <li class="menu-item"><a href="{{route('frontend.job_application')}}">طلب توظيف</a></li>
     <li class="menu-item"><a href="#">طلب خدمة</a></li>
     

 <li class="menu-item"><a href="{{route('frontend.contact')}}">اتصل بنا</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <!-- Navbar Toggler -->
                                <div class="navbar-toggler float-right">
                                    <span></span><span></span><span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="whatup"><a href="https://wa.link/p9p8hy" target="_blank"><i class="fab fa-whatsapp"></i></a> </div>
        </header><!--====== End Header ======-->
        @yield('content')

        @include('sweetalert::alert')

        <!---------------->

         <!--====== Start Footer ======-->
         <footer class="footer-area footer-area-v1 ">
            <div class="footer-widget pt-120 pb-90">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-6 col-sm-12">
                             
                            <div class="widget about-widget mb-40">
                                 <h4 class="widget-title">نبذة عنا</h4>
                                <p> {{$setting->about_us }}

</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="widget widget-categories mb-40">
                                <h4 class="widget-title"> روابط سريعة</h4>
                                <ul class="widget-link">
                                    <li><a href="{{ route('frontend.home') }}">الرئيسية</a></li>
                                    <li><a href="{{route('frontend.crew')}}">الهيكل الوظيفي</a></li>
                                    <li><a href="{{route('frontend.certificates')}}">شهادات وإنجازات</a></li>
                                    <li><a href="{{route('frontend.job_application')}}">طلب توظيف</a></li>
                                    <li ><a href="{{route('frontend.request')}}">طلب خدمة</a></li>
                                    <li><a href="{{ route('frontend.service') }}">خدماتنا</a></li>
                                    <li><a href="{{route('frontend.management')}}">إدارة الشركة</a></li>
                                    <li><a href="{{route('frontend.department')}}">أقسام الشركة </a></li>
                                    <li><a href="{{route('frontend.policies')}}"> سياسات الشركة  </a></li>
                                    <li><a href="{{route('frontend.tasks')}}"> وصف ومهام </a></li>
                                   
                                  

                                    
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="widget newsletter-widget mb-40">
                                <h4 class="widget-title">اشترك الان</h4>
                                <div class="newsletter-form mb-20">
                                    <form action="{{ route('frontend.subscription') }}" method="post">
                                        @csrf
                                        <div class="form_group">
                                            <input type="email" class="form_control" placeholder="support24@gmail.com" name="email">
                                            <button class="newsletter-btn" type="submit"><i class="icofont-arrow-left"></i></button>
                                        </div>
                                    </form>
                                </div>
                                <div class="newsletter-info">
                                    <h5>للتواصل السريع</h5>
                                    <p><a href="tel:{{ $setting->phone ?? '' }}">{{ $setting->phone ?? '' }}</a></p>
                                </div>
                    
                                <ul class="social-link">
                                    <li><a href="{{ $setting->instagram ?? '' }}"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="{{ $setting->twitter ?? '' }}"><i class="icofont-twitter"></i></a></li>
                                    <li><a href="{{ $setting->snapchat ?? '' }}"><i class="fab fa-snapchat-ghost"></i></a></li>
                                    <li><a href="{{ $setting->linkedin ?? '' }}"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li><a href="{{ $setting->facebook ?? '' }}"><i class="fab fa-facebook-f"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>
            <div class="copyright-area">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="copyright-text text-center">
                                <p>جميع الحقوق محفوظة © 2022 فجر الجنوب - <a href="https://alliance-sa.com/"><span>تصميم وبرمجة تحالف الرؤى</span></a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer><!--====== End Footer ======-->
        <!--====== back-to-top ======-->
        <a href="#" class="back-to-top" ><i class="flaticon-up-arrow-angle"></i></a>
        <!--====== Jquery js ======-->
        <script src="{{asset('frontend/assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
        <script src="{{asset('frontend/assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
        <!--====== Bootstrap js ======-->
        <script src="{{asset('frontend/assets/js/popper.min.js')}}"></script>
        <script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>
        <!--====== Slick js ======-->
        <script src="{{asset('frontend/assets/js/slick.min.js')}}"></script>
        <!--====== Magnific Popup js ======-->
        <script src="{{asset('frontend/assets/js/jquery.magnific-popup.min.js')}}"></script>
        <!--====== Isotope js ======-->
        <script src="{{asset('frontend/assets/js/isotope.pkgd.min.js')}}"></script>
        <!--====== Imagesloaded js ======-->
        <script src="{{asset('frontend/assets/js/imagesloaded.pkgd.min.js')}}"></script>
        <!--====== nice-select js ======-->
        <script src="{{asset('frontend/assets/js/jquery.nice-select.min.js')}}"></script>
        <!--====== counterup js ======-->
        <script src="{{asset('frontend/assets/js/jquery.counterup.min.js')}}"></script>
        <!--====== waypoints js ======-->
        <script src="{{asset('frontend/assets/js/waypoints.min.js')}}"></script>
        <!--====== Main js ======-->
        <script src="{{asset('frontend/assets/js/main.js')}}"></script>

        <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
        <script src="https://kit.fontawesome.com/e0387e9a75.js"></script>
        
        @yield('scripts')
    </body>