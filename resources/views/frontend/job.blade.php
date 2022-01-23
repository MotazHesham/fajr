@extends('layouts.frontend')

@section('styles')
    <link rel="stylesheet" href="{{asset('frontend/assets/j-forms.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
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
        <form class="contact-forms" method="POST" enctype="multipart/form-data" action="{{route('frontend.saveJobRequest')}}" id="form">
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

            <div class="form-group">
                <p>{{ trans('cruds.jobresquest.fields.cv') }}</p>
                <div class="needsclick dropzone {{ $errors->has('cv') ? 'is-invalid' : '' }}" id="cv-dropzone">
                </div>
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

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
<script>
    Dropzone.options.cvDropzone = {
    url: '{{ route('frontend.jobresquests.storeMedia') }}',
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