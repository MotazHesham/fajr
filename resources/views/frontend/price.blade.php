@extends('layouts.frontend')
@section('scripts')
@parent
<script src="/js/mapInput.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initAutocomplete&language=ar&region=SA
     async defer"></script>
@stop
@section('styles')
    <link rel="stylesheet" href="{{asset('frontend/assets/j-forms.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
@endsection

@section('content')
<div class="job-application-section">
    <div class="container">
        <h2 class="job-application-title"> طلب خدمة هندسية</h2>
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
            <!-- start name -->
            <div class="main-row">

                        <input type="text" id="first_name" name="name" placeholder="الاسم بالكامل">
                    </div>
            <!-- end name -->

            <!-- start email phone -->
            <div class="main-row">
                    <div class="input">

                        <input type="email" placeholder="البريد الالكتروني" id="email" name="email">
                    </div>
                </div>
                <div class="main-row">
                    <div class="input">

                        <input type="text" placeholder="رقم الهاتف" id="phone" name="phone">
                    </div>
                </div>
                <div class="main-row">
                    <div class="input">

                        <input type="text" placeholder=" الجوال/ واتساب" id="whatsapp" name="whatsapp">
                    </div>
                </div>
            <!-- start country -->
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
             
                    <select name="service" id="service" required>
                        <option value disabled {{ old('service', null) === null ? 'selected' : '' }}>برجاء اختيار نوع الخدمة المطلوبه</option>
                        @foreach(App\Models\QuotationRequest::SERVICE_SELECT as $key => $label)
                            <option value="{{ $key }}" {{ old('service', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
            </div>
            </div>
            <!-- end position -->

            <!-- start files -->
            <div class="main-row">
                <div class="input">
                <textarea class="form-control {{ $errors->has('extra_info') ? 'is-invalid' : '' }}" name="extra_info" id="extra_info"  placeholder= "وصف الخدمة المطلوبة">{{ old('extra_info') }}</textarea>
                @if($errors->has('extra_info'))
                    <div class="invalid-feedback">
                        {{ $errors->first('extra_info') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.quotationRequest.fields.extra_info_helper') }}</span>
            </div>
            </div>
            <div class="main-row">
                <div class="input">
                    <input class="form-control datetime {{ $errors->has('date') ? 'is-invalid' : '' }}"  name="date" id='datetimepicker1'  placeholder=" برجاء اختيار الموعد المتاح لديك">
                     
                 </div>
            </div>
            
            <div class="form-group">
                <p>{{ trans('cruds.quotationRequest.fields.files') }}</p>
                <div class="needsclick dropzone {{ $errors->has('files') ? 'is-invalid' : '' }}" id="files-dropzone">
                </div>
            </div>
            <div class="main-row">
                <div class="input">
                <p for="projectinput1"> الموقع  </p>
                <input type="text" id="pac-input"
                       placeholder="  " name="address_address">
                  
                @error("address")
                <span class="text-danger"> {{$message}}</span>
                @enderror
                <input type="hidden" name="address_latitude" id="latitude" value="" />
                <input type="hidden" name="address_longitude" id="longitude" value="" />
            </div>
            </div>
            <div id="map" style="height: 500px;width: 1300px;"></div>


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