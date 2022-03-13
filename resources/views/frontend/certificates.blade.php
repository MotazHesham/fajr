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
                        <h1>شهادات وإنجازات  </h1>
                        <ul class="link">
                            <li><a href="{{route('frontend.home') }}">الرئيسية</a></li>
                            <li class="active">شهادات وإنجازات</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section><!--====== End breadcrumbs section ======-->

    
    <section class="project-area-v2 pt-110 pb-60" style="direction: ltr;">
        <div class="container">        
        <div class="row ">
            @foreach ($certificates as $certificate  )
            <div class="col-lg-4">
                <div class="project-item mb-30">
                    <div class="project-img">
                        @if($certificate->photo)
                        <img src="{{ $certificate->photo->getUrl('preview2') }}" alt="project">
                        @endif
                        <div class="project-overlay">
                            <div class="project-content">
                                <div class="content">
                                    <h4>{{$certificate->title }}</h4>
                                    <p class="p-name">{{$certificate->date}}</p>
                                </div>
                                <div class="icon">
                                    @if($certificate->photo)
                                    <a href="{{ $certificate->photo->getUrl('preview2') }}" class="popup-icon img-popup"><i class="icofont-plus"></i></a>
                                 @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>                
            @endforeach
               
          {{$certificates->links() }}
        </div>
    </div>
</section><!--====== End Project-area Section ======-->
 @endsection

 