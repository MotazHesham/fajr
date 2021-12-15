@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.policy.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.policies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.policy.fields.id') }}
                        </th>
                        <td>
                            {{ $policy->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.policy.fields.type') }}
                        </th>
                        <td>
                            {{ $policy->type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.policy.fields.policy_pdf') }}
                        </th>
                        <td>
                            @if($policy->policy_pdf)
                                <a href="{{ $policy->policy_pdf->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.policies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection