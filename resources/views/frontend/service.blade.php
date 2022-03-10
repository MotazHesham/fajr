@extends('layouts.frontend')

@section('content')
<section class="breadcrumbs-section bg_cover" style="background-image: url(frontend/assets/images/bg/breadcrumbs-bg.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="breadcrumbs-content">
                    <h1>خدمات فجر الجنوب</h1>
                    <ul class="link">
                        <li><a href="{{route('frontend.home') }}">الرئيسية</a></li>
                        <li class="active">خدماتنا</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section><!--====== End breadcrumbs-section ======-->
<section class="features-area-v1 pt-70 pb-70">
    <div class="container">
        <div class="row no-gutters">
       
            @foreach ($services as $service )
            @php
            if($service->photo)
              $service_image=$service->photo->geturl();
            else
            $service_image= asset('frontend/img/service-icon1.png');
          
          @endphp
            <div class="features-column col-lg-4 col-md-6 col-sm-12">
                <div class="features-i3tem text-center">
                    <a href="{{route('frontend.service-details',$service->id)}}">
                    <div class="features-icon">
                        <i class="flaticon-manufacture"></i>
                    </div>
                    <div class="features-content">
                        <h5>{{$service->name }}</h5>
                        <p>   {{$service->description }}  
                  </p>
                    </div>
                        </a>
                </div>
            </div>
             
            @endforeach
        </div>
    </div>
</section>

 @endsection