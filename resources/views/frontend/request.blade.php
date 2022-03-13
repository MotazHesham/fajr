@extends('layouts.frontend')

@section('styles')
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
@endsection
@section('content')
  <!--====== Start breadcrumbs section ======-->
  @php
    $setting=\App\Models\Setting::first();
    if($setting->logo)
    
    $back_image=$setting->logo->getUrl('');
    
    else
    
     $back_image=asset('frontend/assets/images/bg/breadcrumbs-bg.jpg');
    
    
  @endphp
  <section class="breadcrumbs-section bg_cover" style="background-image: url({{$back_image}});">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="breadcrumbs-content">
                        <h1>طلب خدمة هندسية</h1>
                        <ul class="link">
                            <li><a href="{{route('frontend.home') }}">الرئيسية</a></li>
                            <li class="active">طلب خدمة هندسية </li>
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
                            <h2> طلب خدمة هندسية</h2>
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
                            <form class="contact-forms" method="POST" action="{{route('frontend.savePriceRequest')}}">
                                      @csrf
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form_group">
                                            <input type="text" class="form_control" placeholder="الاسم" name="name" required>
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
                                            <input type="text" class="form_control" placeholder="الجوال/واتساب" name="whatsapp">
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-lg-12">
                                        <div class="form_group">
                                            <input type="text" class="form_control" placeholder="العنوان" name="address" required>
                                        </div>
                                    </div>
                                  <br>
                                    <div class="col-lg-12">
                                        <div class="form_group">
                                    <select  class="form_control" name="service" id="service" required  style=" text-align:right;" >
                                        <option style=" text-align:left;" value disabled {{ old('service', null) === null ? 'selected' : '' }}>برجاء اختيار نوع الخدمة المطلوبه</option>
                                        @foreach(App\Models\Service::get() as $key => $label)
                                            <option  style=" text-align:left;" value="{{$label->name }}" {{ old('service', '') === (string) $key ? 'selected' : '' }}>{{ $label->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="col-lg-12">
                                <div class="form_group">
                                    <textarea class="form_control" name="extra_info" placeholder="وصف الخدمة المطلوبة"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form_group">
                            <input class="form_control datetime {{ $errors->has('date') ? 'is-invalid' : '' }}"  name="date" id='datetimepicker1'  placeholder=" برجاء اختيار الموعد المتاح لديك">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form_group">
                                    <!--<label>{{ trans('cruds.quotationRequest.fields.files') }}</label>-->
                            <div class="needsclick dropzone {{ $errors->has('files') ? 'is-invalid' : '' }}" id="files-dropzone">
                            </div>
                                </div>
                                <div class="col-lg-12">
                                </div>
                            <div class="col-lg-12">
                                        <div class="form_group">
                                            <button class="main-btn">إرسال الطلب</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
   <script type="text/javascript">
    $(function () {
      $('#datetimepicker1').datetimepicker({
    format: 'DD/MM/YYYY HH:mm:ss',
    locale: 'en',
    sideBySide: true,
    icons: {
      up: 'fas fa-chevron-up',
      down: 'fas fa-chevron-down',
      previous: 'fas fa-chevron-left',
      next: 'fas fa-chevron-right'
    }
  })
   });
  </script>
  <script>
      var uploadedFilesMap = {}
  Dropzone.options.filesDropzone = {
      url: '{{ route('frontend.storeMedia') }}',
      maxFilesize: 20, // MB
      addRemoveLinks: true,
      headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
      },
      params: {
        size: 20
      },
      success: function (file, response) {
        $('form').append('<input type="hidden" name="files[]" value="' + response.name + '">')
        uploadedFilesMap[file.name] = response.name
      },
      removedfile: function (file) {
        file.previewElement.remove()
        var name = ''
        if (typeof file.file_name !== 'undefined') {
          name = file.file_name
        } else {
          name = uploadedFilesMap[file.name]
        }
        $('form').find('input[name="files[]"][value="' + name + '"]').remove()
      },
      init: function () {
  @if(isset($quotationRequest) && $quotationRequest->files)
            var files =
              {!! json_encode($quotationRequest->files) !!}
                for (var i in files) {
                var file = files[i]
                this.options.addedfile.call(this, file)
                file.previewElement.classList.add('dz-complete')
                $('form').append('<input type="hidden" name="files[]" value="' + file.file_name + '">')
              }
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