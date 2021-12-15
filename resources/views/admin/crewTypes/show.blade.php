@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.crewType.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.crew-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.crewType.fields.id') }}
                        </th>
                        <td>
                            {{ $crewType->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crewType.fields.type') }}
                        </th>
                        <td>
                            {{ $crewType->type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.crewType.fields.job_img') }}
                        </th>
                        <td>
                            @if($crewType->job_img)
                                <a href="{{ $crewType->job_img->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $crewType->job_img->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.crew-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection