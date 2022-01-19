@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.jobresquest.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.jobresquests.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.jobresquest.fields.id') }}
                        </th>
                        <td>
                            {{ $jobresquest->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobresquest.fields.first_name') }}
                        </th>
                        <td>
                            {{ $jobresquest->first_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobresquest.fields.last_name') }}
                        </th>
                        <td>
                            {{ $jobresquest->last_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobresquest.fields.phone') }}
                        </th>
                        <td>
                            {{ $jobresquest->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobresquest.fields.email') }}
                        </th>
                        <td>
                            {{ $jobresquest->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobresquest.fields.city') }}
                        </th>
                        <td>
                            {{ $jobresquest->city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobresquest.fields.address') }}
                        </th>
                        <td>
                            {{ $jobresquest->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobresquest.fields.job') }}
                        </th>
                        <td>
                            {{ $jobresquest->job }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobresquest.fields.extra_data') }}
                        </th>
                        <td>
                            {{ $jobresquest->extra_data }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobresquest.fields.cv') }}
                        </th>
                        <td>
                            @if($jobresquest->cv)
                                <a href="{{ $jobresquest->cv->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.jobresquests.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection