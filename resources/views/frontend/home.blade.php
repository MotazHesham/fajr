@extends('layouts.frontend')

@section('content')

    <!-------second-section------->
    <div id="services" class="container-fluid section2">
        <div class="row">
            <a class="col-md-3 services" href="#">
                <div class="service-text">
                    <h1 class="services-title">مبــــــــــاني</h1>
                    <p class="services-p">
                        <?php echo nl2br($setting->building_text ?? ''); ?>
                    </p>
                </div>
                <img class="services-icon" src="{{ asset('frontend/img/service-icon1.png')}}">
            </a>
            <a class="col-md-3 services" href="#">
                <div class="service-text">
                    <h1 class="services-title">ترميــــــــم</h1>
                    <p class="services-p">
                        <?php echo nl2br($setting->trmem ?? ''); ?>
                    </p>
                </div>
                <img class="services-icon" src="{{ asset('frontend/img/service-icon2.png')}}">
            </a>
            <a class="col-md-3 services" href="#">
                <div class="service-text">
                    <h1 class="services-title">صيــــــــانه</h1>
                    <p class="services-p">
                        <?php echo nl2br($setting->fix_text ?? ''); ?>
                    </p>
                </div>
                <img class="services-icon" src="{{ asset('frontend/img/service-icon3.png')}}">
            </a>
            <a class="col-md-3 services" href="#">
                <div class="service-text">
                    <h1 class="services-title">ديكـــــــور</h1>
                    <p class="services-p">
                        <?php echo nl2br($setting->decore_text ?? ''); ?>
                    </p>
                </div>
                <img class="services-icon" src="{{ asset('frontend/img/service-icon4.png')}}">
            </a>

        </div>
    </div>
    <!-------second-section------->


    <!-------third-section------->
    <div class="container-fluid" id="who-are-we">
        <div class="container section3">
            <div class="row">
                <div class="col-lg-4 text-center">
                    <img class="s3-img" src="{{ asset('frontend/img/section3-img.png')}}">
                </div>
                <div class="col-lg-8">
                    <div class="section3-text-wrap">
                        <h1>مرحبا بكم</h1>
                        <h1>الموقع الرسمي لفجر الجنوب</h1>
                        <p class="services-p">
                            <?php echo nl2br($setting->about_us ?? ''); ?>
                        </p>

                        <a class="more-btn">المزيد</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-------third-section------->


    <!-----forth-section--------->
    <div id="projects" class="section4">
        <div class="section4-text-wrapper">
            <h1 class="s4-title text-center">مشروعاتنا</h1>
            <p class="s4-p text-center"> 
                <?php echo nl2br($setting->projects_text ?? ''); ?>
            </p>
        </div>
        <div class="container projects-div row">
            @foreach($projects as $project)
                <div class="col-md-4 project">
                    <img src="{{ $project->photo ? $project->photo->getUrl('preview2') : ''}}">
                    <div class="project-info">
                        <a href="#"><img src="{{ asset('frontend/img/left-arrow.png') }}"></a>
                        <h4>{{ $project->name ?? ''}}</h4>
                    </div>
                </div> 
            @endforeach
        </div>
        <div class="container-fluid projects-statics">
            <div class="container row projects-statics-inner">
                <div class="col-md-3 statics-div">
                    <img src="{{ asset('frontend/img/pngfind_17.png')}}">
                    <h1>{{ $setting->experience ?? ''}}</h1>
                    <h6>سنه خبرة</h6>
                </div>
                <div class="col-md-3 statics-div">
                    <img src="{{ asset('frontend/img/pngfind_01.png')}}">
                    <h1>{{ $setting->projects ?? ''}}</h1>
                    <h6>مشروع</h6>
                </div>
                <div class="col-md-3 statics-div">
                    <img src="{{ asset('frontend/img/pngfind_03.png')}}">
                    <h1>{{ $setting->clients ?? ''}}</h1>
                    <h6>عميل</h6>
                </div>
                <div class="col-md-3 statics-div">
                    <img src="{{ asset('frontend/img/pngfind_05.png')}}">
                    <h1>{{ $setting->solutions ?? ''}}</h1>
                    <h6>حلول صناعيه</h6>
                </div>
            </div>
            <div class="fill-div"></div>
        </div>
    </div>

    <!-----forth-section--------->

    <!-----fifth-section--------->
    <div id="our-news" class="section5">
        <div class="section4-text-wrapper">
            <h1 class="s4-title text-center">أخبارنــــا</h1>
            <p class="s4-p text-center">
                <?php echo nl2br($setting->news_text ?? ''); ?>
            </p>
        </div>
        <div class="container row news-wrapper">
            @foreach($news as $raw)
                <div class="col-lg-4 news-wrap">
                    <div class="news-post">
                        <div class="news-thumbnail"><img src="{{ $raw->photo ? $raw->photo->getUrl('preview2') : '' }}"></div>
                        <div class="news-inner">
                            <div class="news-date">
                                <i class="far fa-calendar-alt"></i>
                                <p class="date">{{ $raw->date ?? '' }}</p>
                            </div>
                            <h2>عنوان الخبر</h2>
                            <p> 
                                <?php echo nl2br($raw->short_description ?? ''); ?>
                            </p>
                            <a class="more-btn">المزيد</a>
                        </div>
                    </div>
                </div> 
            @endforeach
        </div>

        <div class="container row companies">
            <div class="owl-two owl-carousel owl-theme owl-container">
                @foreach(\App\Models\Slider::where('type','slider_2')->orderBy('created_at','desc')->get() as $slider)
                    <div class="item">
                        <img src="{{ $slider->photo ? $slider->photo->getUrl() : '' }}">
                    </div> 
                @endforeach
            </div>
            <!--
                    <div class="company"><img src="img/hopin.png"></div>  
                    <div class="company"><img src="img/nodejs-new-pantone-black.png"></div>  
                    <div class="company"><img src="img/kisspng-logo-payoneer.png"></div>  
                    <div class="company"><img src="img/hopin.png"></div>  
                    <div class="company"><img src="img/plone.png"></div>    
    -->
        </div>
    </div>
    <!-----fifth-section--------->
@endsection
