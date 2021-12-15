@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.management.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.management.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.management.fields.id') }}
                        </th>
                        <td>
                            {{ $management->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.management.fields.type') }}
                        </th>
                        <td>
                            {{ $management->type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.management.fields.description') }}
                        </th>
                        <td>
                            {{ $management->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.management.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection