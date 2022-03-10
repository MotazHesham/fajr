@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.project.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.projects.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.id') }}
                        </th>
                        <td>
                            {{ $project->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.name') }}
                        </th>
                        <td>
                            {{ $project->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.description') }}
                        </th>
                        <td>
                            {{ $project->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.client_name') }}
                        </th>
                        <td>
                            {{ $project->client_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.location') }}
                        </th>
                        <td>
                            {{ $project->location }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.type') }}
                        </th>
                        <td>
                            {{ App\Models\Project::TYPE_SELECT[$project->type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.date') }}
                        </th>
                        <td>
                            {{ $project->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.project.fields.photo') }}
                        </th>
                        <td>
                            @if($project->photo)
                                <a href="{{ $project->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $project->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.projects.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection