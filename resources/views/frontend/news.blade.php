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
                    <h1>أخبار فجر الجنوب</h1>
                    <ul class="link">
                        <li><a href="{{route('frontend.home') }}">الرئيسية</a></li>
                        <li class="active">الاخبار</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section><!--====== End breadcrumbs section ======-->
<!--====== Start Blog-standard-section ======-->
<section class="blog-standard-section pt-120 pb-80">
    <div class="container">
        <div class="row">
            @foreach($news as $raw)
                <div class="col-lg-6 blog-post-item mb-50">
                    <div class="post-thumbnail">
                        <img src="{{ $raw->photo ? $raw->photo->getUrl('preview2') : '' }}" alt="">
                    </div>
                    <div class="entry-content">
                        <div class="post-meta d-flex justify-content-between">
                            <ul class="meta-link">
                                <li><span><i class="icofont-user-alt-7"></i><a href="#">{{ $raw->title ?? '' }}</a></span></li>
                                <li><span><i class="icofont-ui-calendar"></i><a href="#">{{ $raw->date ?? '' }}</a></span></li>
                            </ul>
                           
                        </div>
                        <h3 class="title"><a href="{{route('frontend.new_details',$raw->id) }}"> {{ $raw->writer_name ?? '' }}</a></h3>
                        <p>{{ $raw->short_description ?? '' }}</p>
                        <a href="{{route('frontend.new_details',$raw->id) }}" class="main-btn">المزيد</a>
                    </div>
                </div>                     
                 @endforeach
                <div >
                  <!--  <ul>
                     <li><a href="#"><i class="icofont-arrow-right"></i></a></li>
                        <li><a href="#" class="active">1</a></li>
                        <li><a href="#">2</a></li>
                        
                           <li><a href="#"><i class="icofont-arrow-left"></i></a></li>
                    </ul>-->
                </div>
            </div>
            <div>
            {{$news->links() }}
        </div>

</section><!--====== End Blog-standard-section ======-->

    @endsection