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
                    <h1>سياسات الشركة </h1>
                    <ul class="link">
                        <li><a href="{{route('frontend.home') }}">الرئيسية</a></li>
                        <li class="active">سياسات الشركة</li>
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
            @foreach($policies as $key => $policy)
                   
          
                                    <div class="col-md-3 download-pdf-container">
                    <div class="download-pdf-info">
                        <a  href="{{ $policy->policy_pdf->getUrl() }}" download="">
                      <img class="download-img" src="{{asset('frontend/assets/images/download-pdf.png')}}">
                    </a> 
                    <h6 class="policy-name"> <?php echo nl2br($policy->type ?? ''); ?></h6>
                    </div>
                </div>
               
                @endforeach          
            </div>
        </div>
    </section><!--====== End About section ======-->

  @endsection