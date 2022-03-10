@extends('layouts.frontend')

@section('content')
  <!--====== Start breadcrumbs section ======-->
  <section class="breadcrumbs-section bg_cover" style="background-image: url(frontend/assets/images/bg/breadcrumbs-bg.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="breadcrumbs-content">
                    <h1> اقسام الشركة</h1>
                    <ul class="link">
                        <li><a href="{{route('frontend.home') }}">الرئيسية</a></li>
                        <li class="active">اقسام الشركة </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section><!--====== End breadcrumbs section ======-->
<!--====== Start About section ======-->
<section class="about-area-v2 pb-80 mt-80">
    <div class="container">
        <div class="faq-wrapper">
            <div class="accordion" id="accordiontwo">

                @foreach($sections as $key => $section)   
                @if($key==0)
                <div class="card mb-30">
                    <a class="collapsed card-header" id="heading1" href="#" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                        <?php echo nl2br($section->type ?? ''); ?><span class="toggle_btn">
                        </span>
                    </a>
                    <div id="collapse1" class="collapse show" aria-labelledby="heading1" data-parent="#accordiontwo">
                        <div class="card-body">
                            <p><?php echo nl2br($section->description ?? ''); ?>
</p>
                        </div>
                    </div>
                </div>
         @else
         <div class="card mb-30">
            <a class="collapsed card-header" id="heading{{$key+1}}" href="#" data-toggle="collapse" data-target="#collapse{{$key+1}}" aria-expanded="false" aria-controls="collapse{{$key+1}}">
                <?php echo nl2br($section->type ?? ''); ?><span class="toggle_btn"></span>
            </a>
            <div id="collapse{{$key+1}}" class="collapse" aria-labelledby="heading{{$key+1}}" data-parent="#accordiontwo">
                <div class="card-body">
                    <p><?php echo nl2br($section->description ?? ''); ?>
</p>
                </div>
            </div>
        </div>      
        @endif 

@endforeach
                            </div>
                        </div>
    </div>
</section><!--====== End About section ======-->

    @endsection