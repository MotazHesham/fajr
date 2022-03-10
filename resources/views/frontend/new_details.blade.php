@extends('layouts.frontend')

@section('content')
  <!--====== Start breadcrumbs section ======-->
  <section class="breadcrumbs-section bg_cover" style="background-image: url(frontend/assets/images/bg/breadcrumbs-bg.jpg);">
    <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="breadcrumbs-content">
                        <h1>{{$new->title }}</h1>
                        <ul class="link">
                           <li><a href="{{route('frontend.home') }}">الرئيسية</a></li>
                            <li class="active">الاخبار</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section><!--====== End breadcrumbs section ======-->
    <!--====== Start Blog-details-section section ======-->
    <section class="blog-details-section pt-120 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-details-wrapper mb-40">
                        <div class="post-thumbnail">
                            <img mg src="{{ $new->photo ? $new->photo->getUrl('preview3') : '' }}" alt="">
                        </div>
                        <div class="entry-content">
                            <div class="post-meta d-flex justify-content-between">
                                <ul class="meta-link">
                                    <li><span><i class="icofont-user-alt-7"></i><a href="#"> {{$new->weiter_name }} </a></span></li>
                                    <li><span><i class="icofont-ui-calendar"></i><a href="#">{{$new->date }} </a></span></li>
                                </ul>
                               
                            </div>
                            <h3 class="title">{{$new->title }} </h3>
                         <p>{{$new->long_description }} </p>
                        </div>
                    
                     
                        <div class="post-next-prev-post mb-50">
                            <div class="row">
                           
                                    @php
                                    $prev=$new->id-1;
                                    $next=$new->id+1;
                                    
                                    @endphp
                                    <div class="col-6">
                                        @if($prev!=0)
                                    <a href="{{route('frontend.new_details',$prev) }}"class="post-nav-img post-prev-img">
                                        <img src="{{ asset('frontend/assets/images/prev-img.jpg') }}" alt="">
                                        <i class="icofont-arrow-right"></i>
                                    </a>
                                    @endif     
                                </div>
                             
                                <div class="col-6">
                                    <a href="{{route('frontend.new_details',$next) }}" class="post-nav-img post-next-img">
                                        <img  src="{{ asset('frontend/assets/images/next-img.jpg')}}" alt="">
                                        <i class="icofont-arrow-left"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar-widget-area">
                        
                        
                        <div class="widget widget-recent-post mb-40">
                            <h4 class="widget-title">أحدث الأخبار</h4>
                            <ul class="recent-post-widget">
                                @foreach($news as $raw)
                                <li class="post-thumbnail-content">
                                    <img src="{{ $raw->photo ? $raw->photo->getUrl('thumb') : '' }}" class="img-fluid" alt="">
                                    <div class="post-title-date">
                                        <h6><a href="{{route('frontend.new_details',$raw->id) }}" >{{$raw->title }}</a></h6>
                                        <span class="posted-on"><i class="fas fa-calendar-alt"></i><a href="#">{{$raw->date }}</a></span>
                                    </div>
                                </li>
                                   
                               @endforeach
                            </ul>
                        </div>
                       
                     
                    </div>
                </div>
            </div>
        </div>
    </section><!--====== End Blog-details-section section ======-->

        @endsection