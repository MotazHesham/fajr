@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.successPartner.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.success-partners.update", [$successPartner->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="company_name">{{ trans('cruds.successPartner.fields.company_name') }}</label>
                <input class="form-control {{ $errors->has('company_name') ? 'is-invalid' : '' }}" type="text" name="company_name" id="company_name" value="{{ old('company_name', $successPartner->company_name) }}" required>
                @if($errors->has('company_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.successPartner.fields.company_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="company_img">{{ trans('cruds.successPartner.fields.company_img') }}</label>
                <div class="needsclick dropzone {{ $errors->has('company_img') ? 'is-invalid' : '' }}" id="company_img-dropzone">
                </div>
                @if($errors->has('company_img'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company_img') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.successPartner.fields.company_img_helper') }}120x120</span>
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

@section('scripts')
<script>
    Dropzone.options.companyImgDropzone = {
    url: '{{ route('admin.success-partners.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 120,
      height: 120
    },
    success: function (file, response) {
      $('form').find('input[name="company_img"]').remove()
      $('form').append('<input type="hidden" name="company_img" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="company_img"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($successPartner) && $successPartner->company_img)
      var file = {!! json_encode($successPartner->company_img) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="company_img" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection