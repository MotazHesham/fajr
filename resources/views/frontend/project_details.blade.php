@extends('layouts.frontend')

@section('content')
  <!--====== Start breadcrumbs section ======-->
  @php
    $setting=\App\Models\Setting::first();
    if($setting->logo)
    
    $back_image=$setting->logo->getUrl('');
    
    else
    
     $back_image=asset('frontend/assets/images/bg/breadcrumbs-bg.jpg');
    
    
  @endphp
  <section class="breadcrumbs-section bg_cover" style="background-image: url({{  $back_image}});">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="breadcrumbs-content">
                        <h1>{{$project->name }}</h1>
                        <ul class="link">
                            <li><a href="{{route('frontend.home') }}">الرئيسية</a></li>
                            <li class="active"> {{$project->name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section><!--====== End breadcrumbs-section ======-->
    <!--====== Start project-details-page-section ======-->
    <section class="project-details-page-section pt-130">
        <div class="container">
        <div class="row project-details-wrapper">
            <div class="col-lg-12">
                <div class="project-img mb-40">
                    <img src="{{ $project->photo ? $project->photo->getUrl('preview3') : ''}}" alt="">
                </div>
                <div class="project-content">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="content-box mb-30">
                                <h3> عن المشروع</h3>
                                <p>{{ $project->description }}</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="project-info-details mb-30">
                                <h3>تفاصيل المشروع</h3>
                                <div class="row">
                                    <div class="col-6">
                                        <ul class="info-list title">
                                            <li>اسم العميل</li>
                                            <li>التاريخ</li>
                                           
                                            <li>الموقع</li>
                                        </ul>
                                    </div>
                                    <div class="col-6">
                                        <ul class="info-list info">
                                            <li>{{ $project->client_name }}</li>
                                            <li>{{ $project->date }}</li>
                                          
                                            <li> {{ $project->location }}</li>
                                   
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="direction: ltr;"> 
                        <div class="col-lg-12">
                           
                            <div class="row project-slide-four mb-40">
                                @foreach($project->photos as $key => $media)
                                <div class="col-lg-4">
                                    <div class="project-item">
                                        <div class="project-img">
                                            <img src="{{ $media->getUrl('preview4') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                              @endforeach
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
        
        <!--<div class="post-next-prev-post">
            <div class="row">
                <div class="col-6">
                    <a href="project-details.html" class="post-nav-img post-prev-img">
                        <img src="assets/images/prev-img.jpg" alt="">
                        <i class="icofont-arrow-right"></i>
                    </a>
                </div>
                <div class="col-6">
                    <a href="project-details.html" class="post-nav-img post-next-img">
                        <img src="assets/images/next-img.jpg" alt="">
                        <i class="icofont-arrow-left"></i>
                    </a>
                </div>
            </div>
        </div>-->
    </div>
</section>


@endsection