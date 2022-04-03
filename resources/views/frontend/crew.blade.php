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
                <h1>الهيكل الوظيفي</h1>
                <ul class="link">
                    <li><a href="{{route('frontend.home') }}">الرئيسية</a></li>
                    <li class="active">الهيكل الوظيفي</li>
                </ul>
            </div>
        </div>
    </div>
</div>
</section><!--====== End breadcrumbs-section ======-->
<!--====== Start team-page-section ======-->
<section class="team-area-v3 pt-120 pb-120">
<div class="container">
    <div class="row">
        @foreach ($crews as $crew )

        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="team-item text-center mb-55">
                <div class="team-img">
            
            @if( $crew->photo!=null)
                    <img src="{{ $crew->photo->getUrl('preview2') }}"alt="">
                    
                    @endif
                 
                </div>
                <div class="team-content">
                    <h4><a href="#">{{ $crew->name }}</a></h4>
                    <p class="position"> {{$crew->job_name }}</p>
                </div>
            </div>
        </div>
           
       @endforeach
    </div>
  {{$crews->links() }}
  <div class="row">
    <div class="col-lg-12">
        <div class="button-box mt-65 text-center">
            <a href="{{route('frontend.job_application')}}" class="main-btn">انضم الينا</a>
        </div>
    </div>
</div>
</div>
</section><!--====== End team-page-section ======-->
  @endsection