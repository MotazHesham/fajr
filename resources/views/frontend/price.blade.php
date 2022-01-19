@extends('layouts.frontend')

@section('styles')
    <link rel="stylesheet" href="{{asset('frontend/assets/j-forms.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
@endsection

@section('content')
<div class="job-application-section">
    <div class="container">
        <h2 class="job-application-title"> طلب تسعيرة</h2>
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
             
                    <select class="form-control {{ $errors->has('service') ? 'is-invalid' : '' }}" name="service" id="service" required>
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
                    <p>برجاء اختيار الموعد المتاح لديك</p>
                    <input class="form-control datetime {{ $errors->has('date') ? 'is-invalid' : '' }}"  name="date" id='datetimepicker1'  >
                     
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
@endsection