@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.setting.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.settings.update", [$setting->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="form-group col-md-4">
                    <label class="required" for="email">{{ trans('cruds.setting.fields.email') }}</label>
                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', $setting->email) }}" required>
                    @if($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.setting.fields.email_helper') }}</span>
                </div>
                <div class="form-group col-md-4">
                    <label class="required" for="phone">{{ trans('cruds.setting.fields.phone') }}</label>
                    <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $setting->phone) }}" required>
                    @if($errors->has('phone'))
                        <div class="invalid-feedback">
                            {{ $errors->first('phone') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.setting.fields.phone_helper') }}</span>
                </div>
                <div class="form-group col-md-4">
                    <label class="required" for="address">{{ trans('cruds.setting.fields.address') }}</label>
                    <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', $setting->address) }}" required>
                    @if($errors->has('address'))
                        <div class="invalid-feedback">
                            {{ $errors->first('address') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.setting.fields.address_helper') }}</span>
                </div>
                <div class="form-group col-md-4">
                    <label for="twitter">{{ trans('cruds.setting.fields.twitter') }}</label>
                    <input class="form-control {{ $errors->has('twitter') ? 'is-invalid' : '' }}" type="text" name="twitter" id="twitter" value="{{ old('twitter', $setting->twitter) }}">
                    @if($errors->has('twitter'))
                        <div class="invalid-feedback">
                            {{ $errors->first('twitter') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.setting.fields.twitter_helper') }}</span>
                </div>
                <div class="form-group col-md-4">
                    <label for="facebook">{{ trans('cruds.setting.fields.facebook') }}</label>
                    <input class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}" type="text" name="facebook" id="facebook" value="{{ old('facebook', $setting->facebook) }}">
                    @if($errors->has('facebook'))
                        <div class="invalid-feedback">
                            {{ $errors->first('facebook') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.setting.fields.facebook_helper') }}</span>
                </div>
                <div class="form-group col-md-4">
                    <label for="instagram">{{ trans('cruds.setting.fields.instagram') }}</label>
                    <input class="form-control {{ $errors->has('instagram') ? 'is-invalid' : '' }}" type="text" name="instagram" id="instagram" value="{{ old('instagram', $setting->instagram) }}">
                    @if($errors->has('instagram'))
                        <div class="invalid-feedback">
                            {{ $errors->first('instagram') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.setting.fields.instagram_helper') }}</span>
                </div>
                <div class="form-group col-md-4">
                    <label  for="tik_tok">{{ trans('cruds.setting.fields.tik_tok') }}</label>
                    <input class="form-control {{ $errors->has('tik_tok') ? 'is-invalid' : '' }}" type="text" name="tik_tok" id="tik_tok" value="{{ old('tik_tok', $setting->tik_tok) }}" >
                    @if($errors->has('tik_tok'))
                        <div class="invalid-feedback">
                            {{ $errors->first('tik_tok') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.setting.fields.tik_tok_helper') }}</span>
                </div>
                <div class="form-group col-md-4">
                    <label for="snapchat">{{ trans('cruds.setting.fields.snapchat') }}</label>
                    <input class="form-control {{ $errors->has('snapchat') ? 'is-invalid' : '' }}" type="text" name="snapchat" id="snapchat" value="{{ old('snapchat', $setting->snapchat) }}" >
                    @if($errors->has('snapchat'))
                        <div class="invalid-feedback">
                            {{ $errors->first('snapchat') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.setting.fields.snapchat_helper') }}</span>
                </div>
                <div class="form-group col-md-4">
                    <label class="required" for="experience">{{ trans('cruds.setting.fields.experience') }}</label>
                    <input class="form-control {{ $errors->has('experience') ? 'is-invalid' : '' }}" type="number" name="experience" id="experience" value="{{ old('experience', $setting->experience) }}" step="1" required>
                    @if($errors->has('experience'))
                        <div class="invalid-feedback">
                            {{ $errors->first('experience') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.setting.fields.experience_helper') }}</span>
                </div>
                <div class="form-group col-md-4">
                    <label class="required" for="projects">{{ trans('cruds.setting.fields.projects') }}</label>
                    <input class="form-control {{ $errors->has('projects') ? 'is-invalid' : '' }}" type="number" name="projects" id="projects" value="{{ old('projects', $setting->projects) }}" step="1" required>
                    @if($errors->has('projects'))
                        <div class="invalid-feedback">
                            {{ $errors->first('projects') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.setting.fields.projects_helper') }}</span>
                </div>
                <div class="form-group col-md-4">
                    <label class="required" for="clients">{{ trans('cruds.setting.fields.clients') }}</label>
                    <input class="form-control {{ $errors->has('clients') ? 'is-invalid' : '' }}" type="number" name="clients" id="clients" value="{{ old('clients', $setting->clients) }}" step="1" required>
                    @if($errors->has('clients'))
                        <div class="invalid-feedback">
                            {{ $errors->first('clients') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.setting.fields.clients_helper') }}</span>
                </div>
                <div class="form-group col-md-4">
                    <label class="required" for="solutions">{{ trans('cruds.setting.fields.solutions') }}</label>
                    <input class="form-control {{ $errors->has('solutions') ? 'is-invalid' : '' }}" type="number" name="solutions" id="solutions" value="{{ old('solutions', $setting->solutions) }}" step="1" required>
                    @if($errors->has('solutions'))
                        <div class="invalid-feedback">
                            {{ $errors->first('solutions') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.setting.fields.solutions_helper') }}</span>
                </div>
                <div class="form-group col-md-4">
                    <label class="required" for="projects_text">{{ trans('cruds.setting.fields.projects_text') }}</label>
                    <textarea class="form-control {{ $errors->has('projects_text') ? 'is-invalid' : '' }}" name="projects_text" id="projects_text" required>{{ old('projects_text', $setting->projects_text) }}</textarea>
                    @if($errors->has('projects_text'))
                        <div class="invalid-feedback">
                            {{ $errors->first('projects_text') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.setting.fields.projects_text_helper') }}</span>
                </div>
                <div class="form-group col-md-4">
                    <label class="required" for="news_text">{{ trans('cruds.setting.fields.news_text') }}</label>
                    <textarea class="form-control {{ $errors->has('news_text') ? 'is-invalid' : '' }}" name="news_text" id="news_text" required>{{ old('news_text', $setting->news_text) }}</textarea>
                    @if($errors->has('news_text'))
                        <div class="invalid-feedback">
                            {{ $errors->first('news_text') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.setting.fields.news_text_helper') }}</span>
                </div>
                <div class="form-group col-md-4">
                    <label class="required" for="building_text">{{ trans('cruds.setting.fields.building_text') }}</label>
                    <textarea class="form-control {{ $errors->has('building_text') ? 'is-invalid' : '' }}" name="building_text" id="building_text" required>{{ old('building_text', $setting->building_text) }}</textarea>
                    @if($errors->has('building_text'))
                        <div class="invalid-feedback">
                            {{ $errors->first('building_text') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.setting.fields.building_text_helper') }}</span>
                </div>
                <div class="form-group col-md-4">
                    <label class="required" for="trmem">{{ trans('cruds.setting.fields.trmem') }}</label>
                    <textarea class="form-control {{ $errors->has('trmem') ? 'is-invalid' : '' }}" name="trmem" id="trmem" required>{{ old('trmem', $setting->trmem) }}</textarea>
                    @if($errors->has('trmem'))
                        <div class="invalid-feedback">
                            {{ $errors->first('trmem') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.setting.fields.trmem_helper') }}</span>
                </div>
                <div class="form-group col-md-4">
                    <label class="required" for="fix_text">{{ trans('cruds.setting.fields.fix_text') }}</label>
                    <textarea class="form-control {{ $errors->has('fix_text') ? 'is-invalid' : '' }}" name="fix_text" id="fix_text" required>{{ old('fix_text', $setting->fix_text) }}</textarea>
                    @if($errors->has('fix_text'))
                        <div class="invalid-feedback">
                            {{ $errors->first('fix_text') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.setting.fields.fix_text_helper') }}</span>
                </div>
                <div class="form-group col-md-4">
                    <label class="required" for="decore_text">{{ trans('cruds.setting.fields.decore_text') }}</label>
                    <textarea class="form-control {{ $errors->has('decore_text') ? 'is-invalid' : '' }}" name="decore_text" id="decore_text" required>{{ old('decore_text', $setting->decore_text) }}</textarea>
                    @if($errors->has('decore_text'))
                        <div class="invalid-feedback">
                            {{ $errors->first('decore_text') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.setting.fields.decore_text_helper') }}</span>
                </div>
                <div class="form-group col-md-4">
                    <label class="required" for="about_us">{{ trans('cruds.setting.fields.about_us') }}</label>
                    <textarea class="form-control {{ $errors->has('about_us') ? 'is-invalid' : '' }}" name="about_us" id="about_us" required>{{ old('about_us', $setting->about_us) }}</textarea>
                    @if($errors->has('about_us'))
                        <div class="invalid-feedback">
                            {{ $errors->first('about_us') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.setting.fields.about_us_helper') }}</span>
                </div> 
            <div class="form-group col-md-4">
                <label class="required" for="our_message">{{ trans('cruds.setting.fields.our_message') }}</label>
                <textarea class="form-control {{ $errors->has('our_message') ? 'is-invalid' : '' }}" name="our_message" id="our_message" required>{{ old('our_message', $setting->our_message) }}</textarea>
                @if($errors->has('our_message'))
                    <div class="invalid-feedback">
                        {{ $errors->first('our_message') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.our_message_helper') }}</span>
            </div>
            <div class="form-group col-md-4">
                <label class="required" for="our_values">{{ trans('cruds.setting.fields.our_values') }}</label>
                <textarea class="form-control {{ $errors->has('our_values') ? 'is-invalid' : '' }}" name="our_values" id="our_values" required>{{ old('our_values', $setting->our_values) }}</textarea>
                @if($errors->has('our_values'))
                    <div class="invalid-feedback">
                        {{ $errors->first('our_values') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.our_values_helper') }}</span>
            </div>
            <div class="form-group col-md-4">
                <label class="required" for="our_vision">{{ trans('cruds.setting.fields.our_vision') }}</label>
                <textarea class="form-control {{ $errors->has('our_vision') ? 'is-invalid' : '' }}" name="our_vision" id="our_vision" required>{{ old('our_vision', $setting->our_vision) }}</textarea>
                @if($errors->has('our_vision'))
                    <div class="invalid-feedback">
                        {{ $errors->first('our_vision') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.our_vision_helper') }}</span>
            </div>
            <div class="form-group col-md-4">
                <label class="required" for="our_strategy">{{ trans('cruds.setting.fields.our_strategy') }}</label>
                <textarea class="form-control {{ $errors->has('our_strategy') ? 'is-invalid' : '' }}" name="our_strategy" id="our_strategy" required>{{ old('our_strategy', $setting->our_strategy) }}</textarea>
                @if($errors->has('our_strategy'))
                    <div class="invalid-feedback">
                        {{ $errors->first('our_strategy') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.our_strategy_helper') }}</span>
            </div>
            <div class="form-group col-md-4">
                <label for="chairman_img">{{ trans('cruds.setting.fields.chairman_img') }}</label>
                <div class="needsclick dropzone {{ $errors->has('chairman_img') ? 'is-invalid' : '' }}" id="chairman_img-dropzone">
                </div>
                @if($errors->has('chairman_img'))
                    <div class="invalid-feedback">
                        {{ $errors->first('chairman_img') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.chairman_img_helper') }}</span>
            </div>
            <div class="form-group col-md-4">
                <label class="required" for="chairman_word">{{ trans('cruds.setting.fields.chairman_word') }}</label>
                <textarea class="form-control {{ $errors->has('chairman_word') ? 'is-invalid' : '' }}" name="chairman_word" id="chairman_word" required>{{ old('chairman_word', $setting->chairman_word) }}</textarea>
                @if($errors->has('chairman_word'))
                    <div class="invalid-feedback">
                        {{ $errors->first('chairman_word') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.chairman_word_helper') }}</span>
            </div>
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
    Dropzone.options.chairmanImgDropzone = {
    url: '{{ route('admin.settings.storeMedia') }}',
    maxFilesize: 20, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 20
    },
    success: function (file, response) {
      $('form').find('input[name="chairman_img"]').remove()
      $('form').append('<input type="hidden" name="chairman_img" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="chairman_img"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($setting) && $setting->chairman_img)
      var file = {!! json_encode($setting->chairman_img) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="chairman_img" value="' + file.file_name + '">')
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