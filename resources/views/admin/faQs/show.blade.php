@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.faQ.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.fa-qs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.faQ.fields.id') }}
                        </th>
                        <td>
                            {{ $faQ->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.faQ.fields.question') }}
                        </th>
                        <td>
                            {{ $faQ->question }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.faQ.fields.answer') }}
                        </th>
                        <td>
                            {{ $faQ->answer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.faQ.fields.service') }}
                        </th>
                        <td>
                            {{ $faQ->service->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.faQ.fields.photo') }}
                        </th>
                        <td>
                            @if($faQ->photo)
                                <a href="{{ $faQ->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $faQ->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.fa-qs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection