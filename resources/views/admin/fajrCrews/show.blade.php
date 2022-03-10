@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.fajrCrew.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.fajr-crews.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.fajrCrew.fields.id') }}
                        </th>
                        <td>
                            {{ $fajrCrew->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fajrCrew.fields.name') }}
                        </th>
                        <td>
                            {{ $fajrCrew->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fajrCrew.fields.type') }}
                        </th>
                        <td>
                            @foreach($fajrCrew->types as $key => $type)
                                <span class="label label-info">{{ $type->type }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fajrCrew.fields.job_name') }}
                        </th>
                        <td>
                            {{ $fajrCrew->job_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.fajrCrew.fields.photo') }}
                        </th>
                        <td>
                            @if($fajrCrew->photo)
                                <a href="{{ $fajrCrew->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $fajrCrew->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.fajr-crews.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection