@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.certificate.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.certificates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.certificate.fields.id') }}
                        </th>
                        <td>
                            {{ $certificate->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.certificate.fields.title') }}
                        </th>
                        <td>
                            {{ $certificate->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.certificate.fields.date') }}
                        </th>
                        <td>
                            {{ $certificate->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.certificate.fields.photo') }}
                        </th>
                        <td>
                            @if($certificate->photo)
                                <a href="{{ $certificate->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $certificate->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.certificates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection