@extends('layouts.frontend')

@section('content')

    <!-------second-section------->
    <div id="services" class="container-fluid section2">
        <div class="row">
            @foreach ($services as $service )
            @php
              if($service->photo)
                $service_image=$service->photo->geturl();
              else
              $service_image= asset('frontend/img/service-icon1.png');
            
            @endphp
            <a class="col-md-3 services" href="#">
                <div class="service-text">
                    <h1 class="services-title">{{ $service->name }}</h1>
                    <p class="services-p">
                        <?php echo nl2br($service->description ?? ''); ?>
                    </p>
                </div>
                <img class="services-icon" src="{{$service_image}}">
            </a>
            @endforeach
        </div>
    </div>
    <!-------second-section------->


    <!-------third-section------->
    <div class="container-fluid" id="who-are-we">
        <div class="container section3">
            <div class="row">
                <div class="col-lg-4 text-center">
                    <img class="s3-img" src="{{ asset('frontend/img/section3-img.png')}}">
                </div>
                <div class="col-lg-8">
                    <div class="section3-text-wrap">
                        <h1>مرحبا بكم</h1>
                        <h1>الموقع الرسمي لفجر الجنوب</h1>
                        <p >
                            @php
                            use Illuminate\Support\Str;
                            $len=Str::length($setting->about_us);
                            $first400 = substr($setting->about_us,0,$len/2 );
                            $theRest = substr($setting->about_us, $len/2);
                            @endphp
                                {{ $first400}} 
                                <span id="dots">...</span>
                                <span id="more">
                            {{ $theRest}} 
                            </p> 
                        <button class="more-btn" onclick="myFunction2()" id="myBtn">اقرأ المزيد</button>
                    </div>
                </div>
            </div>
        </div>
        
         <div class="section3-part2 ">
                <div class="row our-wrapper">
                <div class="col-md-6 our-message">
                <div class="our-inner">
                <h1>رســالتنا</h1>
                <img class="our-icon"  src="{{asset('frontend/img/new-message.png')}}">
                </div>
                <p class="our-p"> <?php echo nl2br($setting->our_message ?? ''); ?></p>
                </div>

                <div class="col-md-6 our-message">
                <div class="our-inner">
                <h1>قيمنـــا</h1>
                <img class="our-icon"  src="{{asset('frontend/img/value-chain.png')}}">
                </div>
                <p class="our-p text-center">
                    <?php echo nl2br($setting->our_values ?? ''); ?>
                    </p>
                </div>
                <div class="col-md-6 our-message">
                <div class="our-inner">
                <h1>رؤيتنــــــا</h1>
                <img class="our-icon" src="{{asset('frontend/img/visionary.png')}}">
                </div>
                <p class="our-p">  <?php echo nl2br($setting->our_vision ?? ''); ?></p>
                </div>
                <div class="col-md-6 our-message">
                <div class="our-inner">
                <h1>استراتيجيتنـــا</h1>
                <img class="our-icon" src="{{asset('frontend/img/plan.png') }}">
                </div>
                <p class="our-p">  <?php echo nl2br($setting->our_strategy ?? ''); ?></p>
                </div>
              
                </div>
            </div>
    </div>
    <!-------third-section------->

   
<!------ extra section------->
    <div class="container-fluid company-team">
          <div class="container section3 extra-s3">
                <div class="row">
                <div class="col-lg-4 text-center">
                    @php
                    if($setting->chairman_img)
                    $img=$setting->chairman_img->getUrl('preview2');
                    else
                    $img='';
                
                    @endphp
                    <img class="s3-img" src="{{  $img }}">    
                </div>
                <div class="col-lg-8">
                    <div class="section3-text-wrap">
                       <!-- <h1>كلمة رئيس مجلس الإدارة</h1>
                        <p>
                            <?php echo nl2br($setting->chairman_word ?? ''); ?>
                    </p> -->
                    <h1>كلمة رئيس مجلس الإدارة</h1>
                    <p>
                        @php
                        
                        $len=Str::length($setting->chairman_word);
                        $first400 = substr($setting->chairman_word, 0,$len/2 );
                        $theRest = substr($setting->chairman_word, $len/2);
                        @endphp
                            {{ $first400}} 
                            <span id="dots">...</span>
                            <span id="more">
                        {{ $theRest}} 
                        </p> 
                    <button class="more-btn" onclick="myFunction2()" id="myBtn">اقرأ المزيد</button>
                    <p class="ceo signature">
                       ضاحي أبو صلام.
                    </p>
                       <!-- <button class="more-btn" onclick="myFunction2()" id="myBtn">اقرأ المزيد</butt-->
                    </div>      
                </div>
                </div>
            </div>
            @if($fajrCrews)
         <div class="section4-text-wrapper">
            <h1 class="s4-title text-center">فريق العمل</h1>
            <p class="s4-p text-center"><?php echo nl2br($fajrCrews->description ?? ''); ?> </p>
            </div>
         
        <div class="row container">
            @foreach($fajrCrews->types as $key => $item)
            <div class="team-members grow">
                @php
                    if( $item->job_img)
                    $img= $item->job_img->getUrl('preview');
                    else
                    $img='';
                
                    @endphp
                <img class="team-member-img" src="{{ $img}}">
                <h5> <?php echo nl2br($item->type ?? ''); ?></h5>
            </div>
            @endforeach
        </div>
    </div>
    </div
    @endif
    
    
<!------ extra section------->


    <!-----forth-section--------->
    <div id="projects" class="section4">
        <div class="section4-text-wrapper">
            <h1 class="s4-title text-center">مشروعاتنا</h1>
            <p class="s4-p text-center"> 
                <?php echo nl2br($setting->projects_text ?? ''); ?>
            </p>
        </div>
        <div class="container projects-div row">
            @foreach($projects as $project)
                <div class="col-md-4 project">
                    <img src="{{ $project->photo ? $project->photo->getUrl('preview2') : ''}}">
                    <div class="project-info">
                        <a href="#"><img src="{{ asset('frontend/img/left-arrow.png') }}"></a>
                        <h4>{{ $project->name ?? ''}}</h4>
                    </div>
                </div> 
            @endforeach
               <div>
                {!! $projects->links() !!}
            </div>
        </div>
        <!--<div class="container-fluid projects-statics">
            <div class="container row projects-statics-inner">
                <div class="col-md-3 statics-div">
                    <img src="{{ asset('frontend/img/pngfind_17.png')}}">
                    <h1>{{ $setting->experience ?? ''}}</h1>
                    <h6>سنه خبرة</h6>
                </div>
                <div class="col-md-3 statics-div">
                    <img src="{{ asset('frontend/img/pngfind_01.png')}}">
                    <h1>{{ $setting->projects ?? ''}}</h1>
                    <h6>مشروع</h6>
                </div>
                <div class="col-md-3 statics-div">
                    <img src="{{ asset('frontend/img/pngfind_03.png')}}">
                    <h1>{{ $setting->clients ?? ''}}</h1>
                    <h6>عميل</h6>
                </div>
                <div class="col-md-3 statics-div">
                    <img src="{{ asset('frontend/img/pngfind_05.png')}}">
                    <h1>{{ $setting->solutions ?? ''}}</h1>
                    <h6>حلول صناعيه</h6>
                </div>
            </div>
            <div class="fill-div"></div>
        </div>
    </div>-->
<!--
    <div class="container-fluid projects-statics">
        <div class="container row projects-statics-inner">
            <div class="col-md-3 statics-div">
                <img src="{{ asset('frontend/img/pngfind_17.png')}}">
            <div id="counters_1" data-TargetNum="{{ $setting->experience ?? ''}}"
                    data-Speed="3000"
                    data-Easing="linear">
                </div>
            </div>
            <h6>سنه خبرة</h6>
        </div>
        <div class="col-md-3 statics-div">
            <img src="{{ asset('frontend/img/pngfind_01.png')}}">
            <div id="counters_2">
                <div class="counter" 
                    data-TargetNum="{{ $setting->projects ?? ''}}"
                    data-Easing="linear">
                </div>
            </div>
            <h6>مشروع</h6>
        </div>
        <div class="col-md-3 statics-div">
            <img src="{{ asset('frontend/img/pngfind_03.png')}}">
            <div id="counters_3">
                <div class="counter" 
                    data-TargetNum="{{ $setting->clients ?? ''}}"
                    data-Easing="linear">
                </div>
            </div>
            <h6>عميل</h6>
        </div>
        <div class="col-md-3 statics-div">
                <img src="{{ asset('frontend/img/pngfind_05.png')}}">
            <div id="counters_1">
                <div class="counter" 
                    data-TargetNum="{{ $setting->solutions ?? ''}}"
                    data-Easing="linear">
                </div>
            </div>
            <h6>حلول صناعيه</h6>
        </div>
    </div>
    <div class="fill-div"></div>
</div>
</div> -->
<div class="container-fluid projects-statics">
    <div class="container row projects-statics-inner">
        <div class="col-md-3 statics-div">
            <img src="{{ asset('frontend/img/pngfind_17.png')}}">
<!--                        <h1>14</h1>-->
            <div id="counters_1">
              <div class="counter" 
                   data-TargetNum="{{ $setting->experience ?? ''}}"
                   data-Speed="3000"
                   data-Easing="linear">
              </div>
            </div>
            <h6>سنه خبرة</h6>
        </div>
        <div class="col-md-3 statics-div">
            <img src="{{ asset('frontend/img/pngfind_01.png')}}">
            <div id="counters_2">
              <div class="counter" 
                   data-TargetNum="{{ $setting->projects ?? ''}}"
                   data-Easing="linear">
              </div>
            </div>
            <h6>مشروع</h6>
        </div>
        <div class="col-md-3 statics-div">
            <img src="{{ asset('frontend/img/pngfind_03.png')}}">
            <div id="counters_3">
              <div class="counter" 
                   data-TargetNum="{{ $setting->clients ?? ''}}"
                   data-Easing="linear">
              </div>
            </div>
            <h6>عميل</h6>
        </div>
        <div class="col-md-3 statics-div">
            <img src="{{ asset('frontend/img/pngfind_05.png')}}">
            <div id="counters_1">
              <div class="counter" 
                   data-TargetNum="{{ $setting->solutions ?? ''}}"
                   data-Easing="linear">
              </div>
            </div>
            <h6>حلول صناعيه</h6>
        </div>
    </div>
    <div class="fill-div"></div>
</div>
</div>  

    <!-----forth-section--------->

    <!-----fifth-section--------->
    <div id="our-news" class="section5">
        <div class="section4-text-wrapper">
            <h1 class="s4-title text-center">أخبارنــــا</h1>
            <p class="s4-p text-center">
                <?php echo nl2br($setting->news_text ?? ''); ?>
            </p>
        </div>
        <div class="container row news-wrapper">
            @foreach($news as $raw)
                <div class="col-lg-4 news-wrap">
                    <div class="news-post">
                        <div class="news-thumbnail"><img src="{{ $raw->photo ? $raw->photo->getUrl('preview2') : '' }}"></div>
                        <div class="news-inner">
                            <div class="news-date">
                                <i class="far fa-calendar-alt"></i>
                                <p class="date">{{ $raw->date ?? '' }}</p>
                            </div>
                            <h2>عنوان الخبر</h2>
                            <p> 
                                <?php echo nl2br($raw->short_description ?? ''); ?>
                            </p>
                            <a class="more-btn">المزيد</a>
                        </div>
                    </div>
                </div> 
            @endforeach
        </div>

        <div class="container row companies">
            <div class="owl-two owl-carousel owl-theme owl-container">
                @foreach(\App\Models\Slider::where('type','slider_2')->orderBy('created_at','desc')->get() as $slider)
                    <div class="item">
                        <img src="{{ $slider->photo ? $slider->photo->getUrl() : '' }}">
                    </div> 
                @endforeach
            </div>
            <!--
                    <div class="company"><img src="img/hopin.png"></div>  
                    <div class="company"><img src="img/nodejs-new-pantone-black.png"></div>  
                    <div class="company"><img src="img/kisspng-logo-payoneer.png"></div>  
                    <div class="company"><img src="img/hopin.png"></div>  
                    <div class="company"><img src="img/plone.png"></div>    
    -->
        </div>
    </div>
    <!-----fifth-section--------->
       
<!----- tabs-section--------->
    <div class="container-fluid policy-section">
    <div class="section4-text-wrapper">
            <h1 class="s4-title text-center">المزيد عن الشركة</h1>
            </div>
         <div class="container tabs-section">
        <div class="row">
            <div class="col-md-3">
            <div class="tab">
              <button class="tablinks courses-tab" onclick="openTab(event, 'policy')" id="defaultOpen">
                  <div class="tab-inner">
                  السياسات
                  </div>
                  </button>
              <button class="tablinks trainers-tab" onclick="openTab(event, 'organization1')">                  <div class="tab-inner">
                ادارة الشركة
                  </div></button>
              <button class="tablinks trainers-tab" onclick="openTab(event, 'organization2')">                  <div class="tab-inner">
                  أقسام الشركة
                  </div></button>
              <button class="tablinks trainees-tab" onclick="openTab(event, 'tasks')">                  
                  <div class="tab-inner">
                  وصف ومهام
                  </div></button>              
            </div>
            </div>
            
            <div class="col-md-9 tabs-content-container">
            <div id="policy" class="tabcontent">
              <h1 class="tab-title"></h1>
            <div class="row">
                @foreach($policies as $key => $policy)
                    <div class="col-md-3 download-pdf-container">
                        <div class="download-pdf-info">
                        <a href="{{ $policy->policy_pdf->getUrl() }}" download>
                          <img class="download-img" src="{{asset('frontend/img/download-pdf.png') }}">
                        </a> 
                        <h6 class="policy-name">  <?php echo nl2br($policy->type ?? ''); ?></h6>
                        </div>
                    </div>
                   @endforeach
               
                </div>

                </div>

            <div id="organization1" class="tabcontent">
              <h1 class="tab-title"></h1>
                <div class="row">
                    @foreach($management as $key => $management)
                   <div class="col-md-6">
                       <div class="company-department">
                        <i class="fas fa-angle-down "></i>
                        <?php echo nl2br($management->type ?? ''); ?>
                        <ul class="tabs-list department-ul">
                        <p> <?php echo nl2br($management->description ?? ''); ?></p> 
                      
                    </ul>
                    </div>  
                     
                </div> 
                @endforeach
                   
              
            </div>             
        </div>
                
            <div id="organization2" class="tabcontent">
              <h1 class="tab-title"></h1>
               <div class="row">
                 
                    @foreach($sections as $key => $section)
                      <div class="col-md-6">
                       <div class="company-department">
                        <i class="fas fa-angle-down "></i>
                        <?php echo nl2br($section->type ?? ''); ?>
                        <ul class="tabs-list department-ul">
                        <p> <?php echo nl2br($section->description ?? ''); ?></p> 
                   
                    </ul>
                    </div> 
                      </div> 
                    @endforeach 
                             
              
                    
                </div>
                </div>             

            <div id="tasks" class="tabcontent">
              <h1 class="tab-title"></h1>

                <div class="row">
                    @foreach($descriptions as $key => $description)
                    <div class="col-md-4 download-pdf-container">
                        <div class="download-pdf-info">
                            <a href="{{ $description->pdf->getUrl() }}" download>
                          <img class="download-img" src="{{asset('frontend/img/download-pdf.png') }}">
                        </a> 
                        <h6 class="policy-name"> <?php echo nl2br($description->type ?? ''); ?></h6>
                        </div>
                    </div>
                    @endforeach
              
                </div>
            </div>
   
                </div>
            </div>
        </div>
    </div>
<!----- tabs-section--------->
<!------ extra section------->
    <div class="container-fluid our-partners">
          <div class="container">
              <div class="section4-text-wrapper">
            <h1 class="s4-title text-center">شركاؤنا في النجاح</h1>
            </div>
                <div class="row partners-wrap">
                    @foreach($successPartners as $key => $successPartner)
                    <div class="partner">
                    <div class="flip-card">
                      <div class="flip-card-inner">
                        <div class="flip-card-front">
                          <h6><?php echo nl2br($successPartner->company_name ?? ''); ?></h6> 
                        </div>
                        <div class="flip-card-back">
                     <img src="{{ $successPartner->company_img->getUrl('preview2') }}">

                        </div>
                      </div>
                    </div>  
                    </div> 
        
                 @endforeach
                </div>
        </div>
    </div>
    
    
<!------ extra section-------> 
<!----contact-us-social------>
    <!--<div class="container contact-us-extra" id="contact-us-section">-->
    <!--        <div class="section4-text-wrapper">-->
    <!--        <h1 class="s4-title text-center">...نسعد بتواصلكم معنا عبر</h1>-->
    <!--        </div>-->
    <!--    <div class="socail-media-contact">-->
    <!--        <div class="social-media">-->
    <!--            <a href="mailto:{{$setting->email}}">               -->
    <!--            <img class="social-img grow" src="{{asset('frontend/img/gmail.png')}}">-->
    <!--            </a>-->

    <!--        </div>-->
    <!--      <div class="social-media">-->
    <!--            <a href="{{$setting->snapchat}}">               -->
    <!--                <img class="social-img grow" src="{{asset('frontend/img/snapchat.png')}}">-->
    <!--            </a>-->

    <!--        </div>-->
    <!--      <div class="social-media">-->
    <!--             <a  href="{{$setting->tik_tok}}">-->
    <!--                <img class="social-img grow" src="{{asset('frontend/img/tiktok.png')}}">-->
    <!--            </a>-->

    <!--        </div>-->
    <!--      <div class="social-media">-->
    <!--             <a  href="{{$setting->twitter}}">-->
    <!--                <img class="social-img grow" src="{{asset('frontend/img/twitter.png')}}">-->
    <!--            </a>-->

    <!--        </div>-->
    <!--      <div class="social-media">-->
    <!--            <a href="{{$setting->instagram}}">-->
    <!--                <img class="social-img grow" src="{{asset('frontend/img/instagram.png')}}">-->
    <!--            </a>-->
    <!--        </div>-->
    <!--    </div>-->
    
    
    <!--</div>-->
<!----contact-us-social------> 
    
@endsection
