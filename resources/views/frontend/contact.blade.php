@extends('layouts.frontend')

@section('content')
  <!--====== Start breadcrumbs section ======-->
  <section class="breadcrumbs-section bg_cover" style="background-image: url(frontend/assets/images/bg/breadcrumbs-bg.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="breadcrumbs-content">
                    <h1>تواصل معنا</h1>
                    <ul class="link">
                        <li><a href="{{route('frontend.home') }}">الرئيسية</a></li>
                        <li class="active">تواصل معنا</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section><!--====== End breadcrumbs section ======-->
<!--====== Start Contact-page-section ======-->
<section class="contact-page-section pt-120 pb-85">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="contact-info-list">
                    <div class="info-box d-flex align-items-start mb-45">
                        <div class="icon">
                            <i class="icofont-headphone-alt-3"></i>
                        </div>
                        @php
                        $setting = \App\Models\Setting::first();
                    @endphp
                        <div class="info">
                            <h4>تحدث إلينا</h4>
                            <p><a href="tel:{{      $setting ->phone }}">{{      $setting->phone }}</a></p>
                        </div>
                    </div>
                    <div class="info-box d-flex align-items-start mb-45">
                        <div class="icon">
                            <i class="icofont-email"></i>
                        </div>
                        <div class="info">
                            <h4>البريد الإلكتروني</h4>
                            <p><a href="mailto:info@domainname.com">{{     $setting ->email }}</a></p>
                        </div>
                    </div>
                    <div class="info-box d-flex align-items-start mb-45">
                        <div class="icon">
                            <i class="icofont-location-pin"></i>
                        </div>
                        <div class="info">
                            <h4>العنوان</h4>
                            <p> {{     $setting ->address }}
                               </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="contact-form-wrapper">
                    <div class="section-title mb-50">
                        <h2>إرســـال رســــــالة</h2>
                        <div class="title-span-line">
                            <span class="line line-1"></span>
                            <span class="line line-2"></span>
                            <span class="line line-3"></span>
                        </div>
                    </div>
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
</section><!--====== End Contact-page-section ======-->
<!--====== Start contact_map section ======-->
        <section class="contact-map-section">
            <div class="map_box">
                <iframe id="gmap_canvas"src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3712.384511527129!2d39.20346258510865!3d21.492653885748833!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15c3ceff25434e4f%3A0x200a30d3c2fe6a13!2z2KfYqNmH2KfYjCDYp9mE2YPZhtiv2LHYqdiMINis2K_YqSAyMjI0MtiMINin2YTYs9i52YjYr9mK2Kk!5e0!3m2!1sar!2seg!4v1646883621423!5m2!1sar!2seg" ></iframe>
            </div>
        </section><!--====== End contact_map section ======-->
@endsection