@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.fajrCrew.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.fajr-crews.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.fajrCrew.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description" required>{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.fajrCrew.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="types">{{ trans('cruds.fajrCrew.fields.type') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('types') ? 'is-invalid' : '' }}" name="types[]" id="types" multiple required>
                    @foreach($types as $id => $type)
                        <option value="{{ $id }}" {{ in_array($id, old('types', [])) ? 'selected' : '' }}>{{ $type }}</option>
                    @endforeach
                </select>
                @if($errors->has('types'))
                    <div class="invalid-feedback">
                        {{ $errors->first('types') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.fajrCrew.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection