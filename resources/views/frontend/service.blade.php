@extends('layouts.frontend')

@section('content')
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
               if($service->icon)
                 $service_image=$service->icon->geturl('icon');
               else
               $service_image= asset('frontend/img/service-icon1.png');
             
             @endphp
                    <div class="features-column col-lg-4 col-md-6 col-sm-12">
                        <div class="features-item text-center">
                            
                            <div class="features-icon">
                           
                                <img src="{{   $service_image }}" width="80">
                            </div>
                            <div class="features-content">
                               <a href="{{route('frontend.service-details',$service->id)}}"> <h5>{{$service->name }}</h5></a>
                                          <p>
                                    {{$service->description }}                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section><!--====== End FEatures section ======-->

 @endsection