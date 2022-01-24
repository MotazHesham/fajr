@extends('layouts.admin')
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