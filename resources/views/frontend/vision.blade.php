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
  
            <div class="col-md-6 ">
                   <center ><img src="{{asset('frontend/assets/images/mission.png')}}"></center>
                    <p><?php echo nl2br($setting->our_message ?? ''); ?></p>
                </div>
                  <div class="col-md-6">
                      <center >  <img src="{{asset('frontend/assets/images/vision02.png')}}"></center>
                    <p> <?php echo nl2br($setting->our_vision ?? ''); ?></p>
                </div>
            </div>
        </div>
   
</section><!--====== End About section ======-->
   
    @endsection