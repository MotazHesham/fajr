@extends('layouts.frontend')

@section('content')
<section class="breadcrumbs-section bg_cover" style="background-image: url(frontend/assets/images/bg/breadcrumbs-bg.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="breadcrumbs-content">
                    <h1>تفاصيل الخدمة</h1>
                    <ul class="link">
                        <li><a href="{{route('frontend.home') }}">الرئيسية</a></li>
                        <li class="active">اسم الخدمة</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section><!--====== End breadcrumbs-section ======-->
<!--====== Start service-details-section ======-->
<section class="service-details-section pt-120 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="service-details-wrapper">
                    <div class="service-img">
                  @php
                       if($service->photo)
                          $service_image=$service->photo->geturl();
                       else
                          $service_image= asset('frontend/assets/images/service/single-service-1.jpg');
                  @endphp

                        <img src="{{$service_image}}" alt="">
                    </div>
                    <div class="service-content mb-35 ">
                        <h3 class="title">{{$service->name }}</h3>
                        <p> {{$service->description }}  </p>
                     
                        
                     
                    </div>
                    <div class="faq-area">
                        <!--<div class="block-img mb-40">
                            <img src="assets/images/service/single-service-3.jpg" alt="">
                        </div>-->
                        <div class="faq-wrapper">
                            <h3>أسئلة متكررة</h3>
                            <div class="accordion" id="accordiontwo">

                                @foreach ($service->serviceFaQs as $row )
                                <div class="card mb-30">
                                    <a class="collapsed card-header" id="heading1" href="#" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                       ؟{{$row->question }}<span class="toggle_btn"></span>
                                    </a>
                                    <div id="collapse1" class="collapse show" aria-labelledby="heading1" data-parent="#accordiontwo">
                                        <div class="card-body">
                                            <p>{{$row->answer }}
</p>
                                        </div>
                                    </div>
                                </div>
                          
                      @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar-widget-area">
                    <div class="widget widget-catageory mb-40">
                        <h4 class="widget-title">خدماتنا</h4>
                        <ul class="categeory-link">
                            @foreach ($services as $service )
                                
                            <li><a href="{{route('frontend.service-details',$service->id)}}">{{$service->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</section><!--====== End service-details-section ======-->
  @endsection