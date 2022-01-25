@extends('layouts.admin')
@section('scripts')
@parent
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initAutocomplete&language=ar&region=SA
     async defer"></script>
@stop
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.quotationRequest.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.quotation-requests.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.quotationRequest.fields.id') }}
                        </th>
                        <td>
                            {{ $quotationRequest->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quotationRequest.fields.name') }}
                        </th>
                        <td>
                            {{ $quotationRequest->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quotationRequest.fields.phone') }}
                        </th>
                        <td>
                            {{ $quotationRequest->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            الجوال / واتساب
                        </th>
                        <td>
                            {{ $quotationRequest->whatsapp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quotationRequest.fields.email') }}
                        </th>
                        <td>
                            {{ $quotationRequest->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quotationRequest.fields.address') }}
                        </th>
                        <td>
                            {{ $quotationRequest->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quotationRequest.fields.service') }}
                        </th>
                        <td>
                            {{ App\Models\QuotationRequest::SERVICE_SELECT[$quotationRequest->service] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quotationRequest.fields.date') }}
                        </th>
                        <td>
                            {{ $quotationRequest->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quotationRequest.fields.extra_info') }}
                        </th>
                        <td>
                            {{ $quotationRequest->extra_info }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                       الموقع
                        </th>
                        <td>
                            <div id="map" style="height: 500px;width: 1000px;"></div>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.quotationRequest.fields.files') }}
                        </th>
                        <td>
                            @foreach($quotationRequest->files as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.quotation-requests.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
@section('scripts')
<script>
 
        
 function initAutocomplete() {
            var pos = {lat:   {{ $quotationRequest->address_latitude }} ,  lng: {{ $quotationRequest->address_longitude }} };
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: pos
            });
        infoWindow = new google.maps.InfoWindow;
            geocoder = new google.maps.Geocoder();
            marker = new google.maps.Marker({
                position: pos,
                map: map,
                title: '{{ $quotationRequest->address_address }}'
            });
            infoWindow.setContent('{{ $quotationRequest->address_address  }}');
            infoWindow.open(map, marker);

    }
</script>
@endsection