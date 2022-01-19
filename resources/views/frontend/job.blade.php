@extends('layouts.frontend')

@section('styles')
    <link rel="stylesheet" href="{{asset('frontend/assets/j-forms.css')}}">
@endsection

@section('content')
<div class="job-application-section">
    <div class="container">
        <h2 class="job-application-title">طلب توظيف</h2>
        @if($errors->count() > 0)
        <div class="alert alert-danger">
            <ul class="list-unstyled">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form class="contact-forms" method="POST" enctype="multipart/form-data" action="{{route('frontend.saveJobRequest')}}">
               @csrf           <!-- end /.header-->

            <!-- start name -->
            <div class="first-line">
                <div class="span6 main-row">
                    <div class="input">

                        <input type="text" id="last_name" name="last_name" placeholder="الاسم الاخير">
                    </div>
                </div>
                <div class="span6 main-row">
                    <div class="input">

                        <input type="text" id="first_name" name="first_name" placeholder="الاسم الاول">
                    </div>
                </div>
            </div>
            <!-- end name -->

            <!-- start email phone -->
            <div class="first-line">
                <div class="span6 main-row">
                    <div class="input">

                        <input type="email" placeholder="البريد الالكتروني" id="email" name="email">
                    </div>
                </div>
                <div class="span6 main-row">
                    <div class="input">

                        <input type="text" placeholder="رقم الهاتف" id="phone" name="phone">
                    </div>
                </div>
            </div>


            <!-- start country -->
            <div class="main-row">
                
                   <input name="city" type="text" placeholder="المدينة" id="city">
                    
                    <i></i>
                
            </div>
            <!-- end country --> 

            <!-- start address -->
            <div class="main-row">
                <div class="input">

                    <input type="text" id="address" placeholder="العنوان" name="address">
                </div>
            </div>
            <!-- end address -->


            <!-- start position -->
            <div class="main-row">
                  <div class="input">
             
                   <input name="job" type="text" placeholder="الوظيفة الملائمة" id="job_type">
            </div>
            </div>
            <!-- end position -->

            <!-- start message -->
            <div class="main-row">
                <div class="input">
                    <textarea placeholder="بيانات اضافية" spellcheck="false" name="extra_data"></textarea>
                    <span class="tooltip tooltip-right-top">Key Skills</span>
                </div>
            </div>
            <!-- end message -->

            <!-- start files -->

            <div class=" main-row">
                <label class="input append-small-btn">
                    <div class="upload-btn">
                        اختيار
                        <input type="file" name="cv" onchange="document.getElementById('file1_input').value = this.value;">
                    </div>
                    <input type="text" id="file1_input" readonly="" placeholder="اضف السيرة الذاتية الخاصة بك">
                    <span class="hint"> صيغة الملف pdf / word</span>
                </label>
            </div>


            <!-- end files -->


            <!-- end /.content -->

            <div class="">
                <button type="submit" class="primary-btn">ارسال</button>

            </div>
            <!-- end /.footer -->

        </form>
    </div>
</div>
@endsection