@extends('layouts.frontend')

@section('content')
  <!--====== Start breadcrumbs section ======-->
  <section class="breadcrumbs-section bg_cover" style="background-image: url(frontend/assets/images/bg/breadcrumbs-bg.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="breadcrumbs-content">
                    <h1>عن الشركة</h1>
                    <ul class="link">
                        <li><a href="{{route('frontend.home') }}">الرئيسية</a></li>
                        <li class="active">عن الشركة</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section><!--====== End breadcrumbs section ======-->
<!--====== Start About section ======-->
<section class="about-area-v2 pb-80 mt-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-img mb-40">
                    <img src="frontend/assets/images/about/about-page-1.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-content-box mb-40">
                    <h2>نبذة عن الشركة <span>{{ $setting->experience ?? ''}}+ عام من الخبرة</span>
                     </h2>
                    <p>{{$setting->about_us ?? ''}}
</p>
                    <div class="content-box">
                        <p>{{$setting->chairman_word ?? ''}}
</p>
                    </div>
                    <p>{{$setting->our_strategy }}
</p>
                </div>
            </div>
        </div>
    </div>
</section><!--====== End About section ======-->
<!--====== Start Counter section ======-->
<section class="counter-area-v2 pb-120">
    <div class="container">
        <div class="counter-wrapper bg_cover" style="background-image: url(frontend/assets/images/bg/counter-bg-1.jpg);">
            <div class="row">
                <div class="counter-column col-lg-3 col-md-6 col-sm-12">
                    <div class="counter-box">
                        <h2><span class="counter">{{ $setting->projects ?? ''}}</span> <span class="plus">+</span></h2>
                        <h4>مشروع</h4>
                    </div>
                </div>
                <div class="counter-column col-lg-3 col-md-6 col-sm-12">
                    <div class="counter-box">
                        <h2><span class="counter">{{ $setting->experience ?? ''}}</span> <span class="plus">+</span></h2>
                        <h4>خبرة</h4>
                    </div>
                </div>
                <div class="counter-column col-lg-3 col-md-6 col-sm-12">
                    <div class="counter-box">
                        <h2><span class="counter">{{ $setting->clients ?? ''}}</span> <span class="plus">+</span></h2>
                        <h4>عميل</h4>
                    </div>
                </div>
                <div class="counter-column col-lg-3 col-md-6 col-sm-12">
                    <div class="counter-box">
                        <h2><span class="counter">{{ $setting->solutions ?? ''}}</span> <span class="plus">+</span></h2>
                        <h4> حلول صناعيه</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--====== End Counter section ======-->

@endsection