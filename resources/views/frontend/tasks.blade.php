@extends('layouts.frontend')

@section('content')
  <!--====== Start breadcrumbs section ======-->
  <section class="breadcrumbs-section bg_cover" style="background-image: url(frontend/assets/images/bg/breadcrumbs-bg.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="breadcrumbs-content">
                    <h1>وصف ومهام</h1>
                    <ul class="link">
                        <li><a href="{{route('frontend.home') }}">الرئيسية</a></li>
                        <li class="active">وصف ومهام</li>
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
            @foreach($descriptions as $key => $description)
                   
          
                                    <div class="col-md-3 download-pdf-container">
                    <div class="download-pdf-info">
                        <a href="{{ $description->pdf->getUrl() }}" download="">
                      <img class="download-img" src="frontend/assets/images/download-pdf.png">
                    </a> 
                    <h6 class="policy-name"> <?php echo nl2br($description->type ?? ''); ?></h6>
                    </div>
                </div>
               
                @endforeach          
            </div>
        </div>
    </section><!--====== End About section ======-->

  @endsection