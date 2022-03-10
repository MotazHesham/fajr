@extends('layouts.frontend')

@section('content')
      <!--====== Start Banner section ======-->
        <section class="banner-area-v1" style="direction: ltr;">
            <div class="hero-slider-one" >
                @foreach ($sliders as $slider )
                
                <div class="single-hero bg_cover" style="background-image: url({{$slider->photo->getUrl()}}); direction: rtl;">
                    <div class="container" >
                        <div class="row" >
                            <div class="col-lg-3"></div>
                            <div class="col-lg-6">
                                <div class="hero-content">
                                    <h1>الموقع الرسمي لفجر الجنوب

                                        </h1>
                                    <h4>{{$slider->abstract }}</h4>
                                    <a href="#" class="main-btn">المزيد</a>
                                </div>
                            </div>
                            <div class="col-lg-3"></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="hero-arrows"></div>
        </section><!--====== End Banner section ======-->
        <!--====== Start Features section ======-->
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
                        <div class="features-item text-center">
                            <div class="features-icon">
                           
                                <img src="{{   $service_image }}" width="80">
                            </div>
                            <div class="features-content">
                                <h5>{{$service->name }}</h5>
                                <p>
                                    {{$service->description }}                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section><!--====== End FEatures section ======-->
        <!--====== Start About section ======-->
        <section class="about-area-v1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="about-img-box">
                            @php
                            /* if($setting->chairman_img)
                             $img=$setting->chairman_img->getUrl('preview2');
                             else*/
                             $img=asset('frontend/assets/images/about/about-1.png');
                         
                             @endphp
                            <img src="{{ $img }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="about-content-box">
                            <div class="section-title mb-35">
                                <div class="sub-title">
                                    <span class="title">مرحبا بكم</span>
                            
                                </div>
                                <h2>كلمة رئيس مجلس الإدارة</h2>
                            </div>
                            <?php echo nl2br($setting->chairman_word ?? ''); ?>
                            
                            <img src="{{asset('frontend/assets/images/sign.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section><!--====== End About section ======-->
        <!--====== Start Blog section ======-->
        <section class="blog-grid-v1 pt-60 pb-90 testimonial-area-v1" style="direction: ltr;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-title text-center mb-75">
                            <div class="sub-title">
                                <span class="title">اخبــارنا</span>
                              
                            </div>
                      <h4> <?php echo nl2br($setting->news_text ?? ''); ?></h4>
                        </div>
                    </div>
                </div>
                <div class="row blog-slider-one ">
                    @foreach ($news as $new )
                        
                    <div class="col-lg-8">
                        <div class="blog-post-item mb-30">
                            <div class="post-thumbnail">
                                <img  src="{{ $new->photo ? $new->photo->getUrl('preview2') : '' }}" alt="blog-grid">
                                <a href="#" class="date">{{$new->date }}</a>
                            </div>
                            <div class="entry-content">
                                <h3 class="title"><a href="{{route('frontend.new_details',$new->id) }}">{{$new->title }}</a></h3>
                                <p> <?php echo nl2br($new->short_description ?? ''); ?> </p>
                                <a href="{{route('frontend.new_details',$new->id) }}" class="main-btn">أقرا المزيد</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section><!--====== End Blog section ======-->
       
        
        
         <!--====== Start Project-area section ======-->
        <section class="project-area-v1  pb-90">
            <div class="project-main-section">
                <div class="project-bg " style="background-image: url(frontend/assets/images/bg/project-bg-1.jpg);"></div>
                <div class="container">
                    <div class="col-lg-8">
                        <div class="section-title section-white-title mb-80 text-right">
                            <h2>مشروعتنا</h2>
                        </div>
                     
                    </div>
                </div>
         
            <div class="project-slide-wrapper" style="direction: ltr;">
                <div class="container">
                    <div class="row project-slide-one">
                        @foreach ($projects as $project )
                        <div class="col-lg-4">
                            <div class="project-item">
                                <div class="project-img">
                                    <img src="{{ $project->photo ? $project->photo->getUrl('preview2') : ''}}">
                                    <div class="project-overlay">
                                        <div class="project-content">
                                            <div class="icon">
                                                <a href="{{ $project->photo ? $project->photo->getUrl('preview2') : ''}}" class="popup-icon img-popup"><i class="icofont-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="project-info">
                                    <span class="span">{{$project->date }} </span>
                                    <h4><a href="{{route('frontend.project-details',$project->id)}}"> {{ $project->name ?? ''}}</a></h4>
                                </div>
                            </div>
                        </div>
                        @endforeach
                      
                    </div>
                </div>
            </div>
                   </div>
        </section><!--====== End Project-area section ======-->
       
          <!--====== Start Testimonial Section ======-->
        <section class="testimonial-area-v2 bg_cover pt-105 pb-120" style="background-image: url(frontend/assets/images/bg/service-bg-1.jpg); direction: ltr;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-title section-white-title text-center mb-60">
                            <h2>قـــالوا عنــــــا</h2>
                            <span class="line"></span>
                        </div>
                    </div>
                </div>
                <div class="row testimonial-slider-two">
                    @foreach ($saids as $said)
                      @php
                      if($said->photo)
                      $image=$said->photo->getUrl();
                      else
                      $image='';
                      @endphp
                    <div class="col-lg-8">
                        <div class="testimonial-item">
                            <div class="td-thumb bg_cover" style="background-image: url({{ $image }});">
                             
                            </div>
                            <div class="td-content">
                                <p>“ {{ $said->text }}”.</p>
                                <div class="td-author-info d-flex justify-content-between align-items-center">
                                    <div class="td-author">
                                        <h4 class="title">{{$said->name }}</h4>
                                        <p class="position">{{$said->job_title }}</p>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                   @endforeach
           
                </div>
            </div>
        </section><!--====== End Testimonial Section ======-->
           <!--====== Start Sponsor Section ======-->
        <section class="awards-area bg_cover" style="direction: ltr;">
            <div class="container">
                <div class="row align-items-center">
               
                    <div class="col-lg-12">
                        <div class="awards-slide">
                            @foreach($successPartners as $key => $successPartner)
                            <div class="single-awards">
                                <a href="{{ $successPartner->company_img->getUrl('preview2') }}"><img src="{{ $successPartner->company_img->getUrl('preview2') }}" alt=""></a>
                            </div>
                             @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section><!--====== End Sponsor Section ======-->
        
           <!--====== Start teamwork======-->
        
            <div class="team-area pt-120">
                <div class="section-title text-center mb-75">
                            <div class="sub-title">
                                <span class="title">فريق العمل</span>
                              
                            </div>
                      <h4><?php echo nl2br($setting->crew_text ?? ''); ?> </h4>
                        </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-1"></div>
                  @foreach($crewTypes as $key => $item)
                      @php
                          if( $item->job_img)
                          $img= $item->job_img->getUrl('preview');
                          else
                          $img='frontend/assets/images/team-icon.png';
                      
                          @endphp
                        <div class="col-md-2">
                        <div class="team">
                            <a  href="{{route('frontend.crew')}}">
                                <img src="{{$img }}">
                            <h3><?php echo nl2br($item->type ?? ''); ?></h3>
                                </a>
                            </div>
                        </div>
                        @endforeach      
                    </div>
                </div>
                </div>
                <!--====== end teamwork======-->
          
          <!--====== Start Contact-page-section ======-->
        <section class="contact-page-section pt-120  ">
            <div class="container">
            <div class="row">
                <div class="col-lg-1"></div>
                 <div class="col-lg-10">
            <div class="contact-form-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 contact-map-section">
                          <div class="map_box">
                        
                            <iframe id="gmap_canvas"src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3712.384511527129!2d39.20346258510865!3d21.492653885748833!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15c3ceff25434e4f%3A0x200a30d3c2fe6a13!2z2KfYqNmH2KfYjCDYp9mE2YPZhtiv2LHYqdiMINis2K_YqSAyMjI0MtiMINin2YTYs9i52YjYr9mK2Kk!5e0!3m2!1sar!2seg!4v1646883621423!5m2!1sar!2seg" ></iframe>
            </div>
                    </div>
                    <div class="col-lg-6">
                        
                            <div class="section-title mb-50 text-right">
                                <h2>للتواصل السريع</h2>
                                <div class="title-span-line">
                                    <span class="line line-1"></span>
                                    <span class="line line-2"></span>
                                    <span class="line line-3"></span>
                                </div>
                            </div>
                            <div class="contact-form">
                                <div class="contact-form">
                                    @if($errors->count() > 0)
                                    <div class="alert alert-danger">
                                        <ul class="list-unstyled">
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                    <form action="{{route('frontend.save_contact')}}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form_group">
                                                    <input type="text" class="form_control" placeholder="الاسم" name="name" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form_group">
                                                    <input type="email" name="email" class="form_control" placeholder="البريد الإلكتروني:" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form_group">
                                                    <input type="text" class="form_control" placeholder="الموضوع" name="subject" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form_group">
                                                    <input type="text" class="form_control" placeholder="التليفون" name="phone">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form_group">
                                                    <textarea class="form_control" name="message" placeholder="الرسالة..."></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form_group">
                                                    <button class="main-btn">إرســال</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                </div>
                <div class="col-lg-1"></div>
                </div>
                </div>
        </section><!--====== End Contact-page-section ======-->

  
  @endsection