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
                    <h1>طلب  وظيفة</h1>
                    <ul class="link">
                        <li><a href="{{route('frontend.home') }}">الرئيسية</a></li>
                        <li class="active">طلب وظيفة </li>
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
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="contact-form-wrapper mb-100">
                    <div class="section-title mb-50">
                        <h2> طلب وظيفة</h2>
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
                        <form class="contact-forms" method="POST" enctype="multipart/form-data" action="{{route('frontend.saveJobRequest')}}" id="form">
                            @csrf 
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form_group">
                                        <input type="text" class="form_control" placeholder="الاسم الأول" name="first_name" required>
                                    </div>
                                </div>
                                    <div class="col-lg-12">
                                        <div class="form_group">
                                            <input type="text" class="form_control" placeholder="الاسم الأخير" name="last_name" required>
                                        </div>
                                    </div>
                                <div class="col-lg-12">
                                    <div class="form_group">
                                        <input type="email" name="email" class="form_control" placeholder="البريد الإلكتروني:" required>
                                    </div>
                                </div>
                                
                                 <div class="col-lg-12">
                                    <div class="form_group">
                                        <input type="text" name="phone" class="form_control" placeholder=" الهاتف:" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form_group">
                                        <input type="text" name="city" class="form_control" placeholder="  المدينه:" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form_group">
                                        <input type="text" name="address" class="form_control" placeholder=" العنوان:" required>
                                    </div>
                                </div>
                                  
                                
                                
                                <div class="col-lg-12">
                                    <div class="form_group">
                                        <input type="text" class="form_control" placeholder="المسمى الوظيفي" name="job" required>
                                    </div>
                                </div>
                              
                                
                              
                                <div class="col-lg-12">
                                     <div class="form-group">
<label for="exampleFormControlFile1">إرفاق السيرة الذاتية</label>
<div class="needsclick dropzone {{ $errors->has('cv') ? 'is-invalid' : '' }}" id="cv-dropzone">
</div>
</div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form_group">
                                        <button class="main-btn">إرسال </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
</section><!--====== End Contact-page-section ======-->
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
<script>
    Dropzone.options.cvDropzone = {
    url: '{{ route('frontend.storeMedia') }}',
    maxFilesize: 4, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 4
    },
    success: function (file, response) {
      $('form').find('input[name="cv"]').remove()
      $('form').append('<input type="hidden" name="cv" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="cv"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($jobresquest) && $jobresquest->cv)
      var file = {!! json_encode($jobresquest->cv) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="cv" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection