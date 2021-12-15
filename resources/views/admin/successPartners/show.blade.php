@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.successPartner.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.success-partners.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.successPartner.fields.id') }}
                        </th>
                        <td>
                            {{ $successPartner->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.successPartner.fields.company_name') }}
                        </th>
                        <td>
                            {{ $successPartner->company_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.successPartner.fields.company_img') }}
                        </th>
                        <td>
                            @if($successPartner->company_img)
                                <a href="{{ $successPartner->company_img->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $successPartner->company_img->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.success-partners.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection