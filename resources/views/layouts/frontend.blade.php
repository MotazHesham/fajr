<!DOCTYPE html>
<html>

<head>
    <title>Fajr</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!--style css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/style.css')}}">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">

    <!---fontawesome--->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/all.css')}}">

    <!---google-font--->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap"
        rel="stylesheet">

    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>

    <!---owl-carousel---->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!----google-fonts---->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!--jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <!--java scripts-->
    <script src="{{ asset('frontend/js/myScript.js')}}"></script>
</head>



<body>

    @php
        $setting = \App\Models\Setting::first();
    @endphp

    <div class="main-container">
        <header>
            <div class="top-bar">
                <div class="container row">
                    <div class="col-6 top-bar-right">
                        <div class="row menu-mobile">
                            <i class="fas fa-bars top-bar-icon hamburger-menu"></i>
                            <ul class="main-menu-mobile">
                                <li><a href="{{ route('frontend.home') }}">الرئيسية</a></li>
                                <li><a href="#services">خدماتنا</a></li>
                                <li><a href="#projects">مشروعاتنا</a></li>
                                <li><a href="#our-news">أخبارنا</a></li>
                                <li><a href="#contact-us-section">اتصل بنا</a></li>
                            </ul>
                        </div>
                        <a href="{{ $setting->instagram ?? ''}}"><i class="fab fa-instagram top-bar-icon"></i></a>
                        <a href="{{ $setting->twitter ?? ''}}"><i class="fab fa-twitter top-bar-icon"></i></a>
                        <a href="{{ $setting->facebook ?? ''}}"><i class="fab fa-facebook-square top-bar-icon"></i></a>
                    </div>
                    <div class="col-6 top-bar-left">
                        <a href="mailto:{{ $setting->email ?? ''}}"><img class="mail-icon" src="{{ asset('frontend/img/mail.png')}}"></a>
                        <a class="mail-link" href="mailto:{{ $setting->email ?? ''}}">{{ $setting->email ?? ''}}</a>
                    </div>
                </div>
            </div>
            <div class="main-header">
                <div class="container row">
                    <div class="col-8 main-header-right">
                        <div class="logo-container"><a href="{{ route('frontend.home') }}"><img class="logo"
                                    src="{{ asset('frontend/img/logo.jpg')}}"></a></div>
                        <ul class="main-menu menu-desktop">
                            <li><a href="{{ route('frontend.home') }}">الرئيسية</a></li>
                            <li><a href="#services">خدماتنا</a></li>
                            <li><a href="#projects">مشروعاتنا</a></li>
                            <li><a href="#our-news">أخبارنا</a></li>
                            <li><a href="#contact-us-section">اتصل بنا</a></li
                        
                        </ul>
                    </div>
                    <div class="col-4 main-header-left">
                        <div>
                            <a class="main-header-number" href="tel:{{$setting->phone ?? ''}}">{{$setting->phone ?? ''}}</a>
                            <a href="https://wa.link/p9p8hy" target="_blank"><img style="width: 50px;" src="{{ asset('frontend/img/Image%202.png')}}"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row menu-tablet">
                <ul class="main-menu">
                    <li><a href="{{ route('frontend.home') }}">الرئيسية</a></li>
                     <li><a href="#services">خدماتنا</a></li>
                    <li><a href="#projects">مشروعاتنا</a></li>
                    <li><a href="#our-news">أخبارنا</a></li>
                    <li><a href="#contact-us-section">اتصل بنا</a></li>
                </ul>
            </div>
        </header>
        <!---------hero-section------>
        <div id="slider-section" class="container-fluid hero-section">
            <div class="owl-one owl-carousel owl-theme owl-container">
                @foreach(\App\Models\Slider::where('type','slider_1')->orderBy('created_at','desc')->get() as $slider)
                    <div class="item">
                        <img class="slider-product" src="{{ $slider->photo ? $slider->photo->getUrl() : ''}}">
                    </div> 
                @endforeach
            </div>
        </div>
        <!---------hero-section------>

        @yield('content')

        @include('sweetalert::alert')

        <!-----------footer----------->
        <div class="container-fluid footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 footer-div">
                        <h4 class="footer-title">شركة فجر الجنوب</h4>
                        <p class="footer-p"> 
                            <?php echo nl2br($setting->about_us ?? ''); ?>
                        </p>
                    </div>

                    <div class="col-lg-2 footer-div">
                        <h4 class="footer-title">روابط تهمك</h4>
                        <ul class="footer-list">
                            <li><a href="{{ route('frontend.home')}}">الرئيسية</a></li>
                            <li><a href="#who-are-we">من نحن</a></li>
                            <li><a href="#contact-us-section">تواصل معنا</a></li>
                            <li><a href="#projects">مشاريعنا</a></li>
                            <li><a href="#our-news">أخبارنا</a></li>
                        </ul>
                    </div>
                    <div id="contact-us" class="col-lg-4 footer-div">
                        <h4 class="footer-title">تواصل معنا</h4>
                        <ul class="footer-list">
                            <li>
                                <div class="contact-us-group">
                                    <a href="tel:{{ $setting->phone ?? '' }}">{{ $setting->phone ?? '' }}</a>
                                    <i class="fas fa-phone footer-icon"></i>
                                </div>
                            </li>
                            <li>
                                <div class="contact-us-group">
                                    <a href="mailto:{{ $setting->email ?? '' }}">{{ $setting->email ?? '' }}</a>
                                    <i class="fas fa-envelope footer-icon"></i>
                                </div>
                            </li>

                            <li>
                                <div class="contact-us-group">
                                    <a href=""> {{ $setting->address ?? '' }}</a>
                                    <i class="fas fa-map-marker-alt footer-icon"></i>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-2 footer-div">
                        <h4 class="footer-title">القائمة البريديه</h4>
                        <ul class="footer-list">
                            <p class="footer-p2">للاشتراك بالقائمة البريدية
                                <br>
                                من فضلك ادخل البريد الالكتروني
                            </p>
                            <form action="{{ route('frontend.subscription') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input class="email-footer" type="email" class="form-control" id="email"
                                        name="email">
                                </div>
                                <button type="submit" class="btn btn-default subscribe-btn">اشترك الآن</button>
                            </form>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <div class="container-fluid credits">
            <p>جميع الحقوق محفوظة © 2022 فجر الجنوب - تصميم وبرمجة
                <a href="https://alliance-sa.com/index_ar">تحالف الرؤى</a>
            </p>
        </div>

        <!-----------footer----------->



    </div>
    <!----end of main container----->
    <script>
        var url = 'https://wati-integration-service.clare.ai/ShopifyWidget/shopifyWidget.js?24201';
        var s = document.createElement('script');
        s.type = 'text/javascript';
        s.async = true;
        s.src = url;
        var options = {
            "enabled": true,
            "chatButtonSetting": {
                "backgroundColor": "#14c656",
                "ctaText": "",
                "borderRadius": "25",
                "marginLeft": "0",
                "marginBottom": "50",
                "marginRight": "20",
                "position": "right"
            },
            "brandSetting": {
                "brandName": "فجر الجنوب",
                "brandSubTitle": "Typically replies within a day",
                "brandImg": "img/logo2.jpg",
                "welcomeText": "مرحباً بك.\nكيف يمكننا مساعدتك؟",
                "messageText": "",
                "backgroundColor": "#0a5f54",
                "ctaText": "تواصل معنا",
                "borderRadius": "25",
                "autoShow": false,
                "phoneNumber": "+966 50 811 6660"
            }
        };
        s.onload = function() {
            CreateWhatsappChatWidget(options);
        };
        var x = document.getElementsByTagName('script')[0];
        x.parentNode.insertBefore(s, x);
    </script>

    <!----owl-carousel--->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $('.owl-one').owlCarousel({
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 3000,
            nav: true,
            dots: false,
            rtl: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        })
    </script>
    <script>
        $('.owl-two').owlCarousel({
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 3000,
            nav: false,
            dots: true,
            rtl: true,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
    </script>

    <script>
        $(document.body).click(function() {
            $(".hamburger-menu").click(function() {
                $(".main-menu-mobile").stop().slideToggle("slow");
            });
        });
    </script>
    <script>
function openTab(evt, tabName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
</body>

</html>
