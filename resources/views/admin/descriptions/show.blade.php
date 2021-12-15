@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.description.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.descriptions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.description.fields.id') }}
                        </th>
                        <td>
                            {{ $description->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.description.fields.type') }}
                        </th>
                        <td>
                            {{ $description->type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.description.fields.pdf') }}
                        </th>
                        <td>
                            @if($description->pdf)
                                <a href="{{ $description->pdf->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.descriptions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection