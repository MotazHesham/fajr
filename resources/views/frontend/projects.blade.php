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
                    <h1>مشروعتنا</h1>
                    <ul class="link">
                        <li><a href="{{route('frontend.home') }}">الرئيسية</a></li>
                        <li class="active">مشروعتنا</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section><!--====== End breadcrumbs-section ======-->
<!--====== Start project-page-section ======-->
<section class="project-area-v3 pt-115 pb-120" id="project-filter">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="filter-nav text-center mb-70">
                    <ul class="filter-btn">
                        <li data-filter="*" class="active">الكل</li>
                        @foreach ($services as $service )
                        <li data-filter=".{{$service->id }}">{{$service->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="row products-grid">
            @foreach($projects as $project)
        @php
               $type=\App\Models\Service::where('name',$project->type)->first();
               if($type!=null)
               $id=$type->id;
               else
               $id="";
            @endphp
    
            <div class="col-lg-3 col-md-6 col-sm-12 {{$id }}">
                <div class="project-item mb-30">
                    <div class="project-img">
                        <img src="{{ $project->photo ? $project->photo->getUrl('preview2') : ''}}" alt="">
                        <div class="project-overlay">
                            <div class="project-content">
                                <div class="icon">
                                    <a href="{{ $project->photo ? $project->photo->getUrl('preview2') : ''}}" class="popup-icon img-popup"><i class="icofont-plus"></i></a>
                                </div>
                                <div class="content">
                                    <h4><a href="{{route('frontend.project-details',$project->id)}}"> {{ $project->name ?? ''}} </a></h4>
                                    <p class="p-name">{{ $project->date ?? ''}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          @endforeach
        </div>
        {{ $projects->links() }}
    </div>
</section><!--====== End project-page-section ======-->


        @endsection