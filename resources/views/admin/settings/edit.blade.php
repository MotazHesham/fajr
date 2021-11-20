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
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.setting.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', $setting->email) }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="phone">{{ trans('cruds.setting.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $setting->phone) }}" required>
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="address">{{ trans('cruds.setting.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', $setting->address) }}" required>
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="twitter">{{ trans('cruds.setting.fields.twitter') }}</label>
                <input class="form-control {{ $errors->has('twitter') ? 'is-invalid' : '' }}" type="text" name="twitter" id="twitter" value="{{ old('twitter', $setting->twitter) }}">
                @if($errors->has('twitter'))
                    <div class="invalid-feedback">
                        {{ $errors->first('twitter') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.twitter_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="facebook">{{ trans('cruds.setting.fields.facebook') }}</label>
                <input class="form-control {{ $errors->has('facebook') ? 'is-invalid' : '' }}" type="text" name="facebook" id="facebook" value="{{ old('facebook', $setting->facebook) }}">
                @if($errors->has('facebook'))
                    <div class="invalid-feedback">
                        {{ $errors->first('facebook') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.facebook_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="instagram">{{ trans('cruds.setting.fields.instagram') }}</label>
                <input class="form-control {{ $errors->has('instagram') ? 'is-invalid' : '' }}" type="text" name="instagram" id="instagram" value="{{ old('instagram', $setting->instagram) }}">
                @if($errors->has('instagram'))
                    <div class="invalid-feedback">
                        {{ $errors->first('instagram') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.instagram_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="experience">{{ trans('cruds.setting.fields.experience') }}</label>
                <input class="form-control {{ $errors->has('experience') ? 'is-invalid' : '' }}" type="number" name="experience" id="experience" value="{{ old('experience', $setting->experience) }}" step="1" required>
                @if($errors->has('experience'))
                    <div class="invalid-feedback">
                        {{ $errors->first('experience') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.experience_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="projects">{{ trans('cruds.setting.fields.projects') }}</label>
                <input class="form-control {{ $errors->has('projects') ? 'is-invalid' : '' }}" type="number" name="projects" id="projects" value="{{ old('projects', $setting->projects) }}" step="1" required>
                @if($errors->has('projects'))
                    <div class="invalid-feedback">
                        {{ $errors->first('projects') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.projects_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="clients">{{ trans('cruds.setting.fields.clients') }}</label>
                <input class="form-control {{ $errors->has('clients') ? 'is-invalid' : '' }}" type="number" name="clients" id="clients" value="{{ old('clients', $setting->clients) }}" step="1" required>
                @if($errors->has('clients'))
                    <div class="invalid-feedback">
                        {{ $errors->first('clients') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.clients_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="solutions">{{ trans('cruds.setting.fields.solutions') }}</label>
                <input class="form-control {{ $errors->has('solutions') ? 'is-invalid' : '' }}" type="number" name="solutions" id="solutions" value="{{ old('solutions', $setting->solutions) }}" step="1" required>
                @if($errors->has('solutions'))
                    <div class="invalid-feedback">
                        {{ $errors->first('solutions') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.solutions_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="projects_text">{{ trans('cruds.setting.fields.projects_text') }}</label>
                <textarea class="form-control {{ $errors->has('projects_text') ? 'is-invalid' : '' }}" name="projects_text" id="projects_text" required>{{ old('projects_text', $setting->projects_text) }}</textarea>
                @if($errors->has('projects_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('projects_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.projects_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="news_text">{{ trans('cruds.setting.fields.news_text') }}</label>
                <textarea class="form-control {{ $errors->has('news_text') ? 'is-invalid' : '' }}" name="news_text" id="news_text" required>{{ old('news_text', $setting->news_text) }}</textarea>
                @if($errors->has('news_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('news_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.news_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="building_text">{{ trans('cruds.setting.fields.building_text') }}</label>
                <textarea class="form-control {{ $errors->has('building_text') ? 'is-invalid' : '' }}" name="building_text" id="building_text" required>{{ old('building_text', $setting->building_text) }}</textarea>
                @if($errors->has('building_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('building_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.building_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="trmem">{{ trans('cruds.setting.fields.trmem') }}</label>
                <textarea class="form-control {{ $errors->has('trmem') ? 'is-invalid' : '' }}" name="trmem" id="trmem" required>{{ old('trmem', $setting->trmem) }}</textarea>
                @if($errors->has('trmem'))
                    <div class="invalid-feedback">
                        {{ $errors->first('trmem') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.trmem_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fix_text">{{ trans('cruds.setting.fields.fix_text') }}</label>
                <textarea class="form-control {{ $errors->has('fix_text') ? 'is-invalid' : '' }}" name="fix_text" id="fix_text" required>{{ old('fix_text', $setting->fix_text) }}</textarea>
                @if($errors->has('fix_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fix_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.fix_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="decore_text">{{ trans('cruds.setting.fields.decore_text') }}</label>
                <textarea class="form-control {{ $errors->has('decore_text') ? 'is-invalid' : '' }}" name="decore_text" id="decore_text" required>{{ old('decore_text', $setting->decore_text) }}</textarea>
                @if($errors->has('decore_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('decore_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.decore_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="about_us">{{ trans('cruds.setting.fields.about_us') }}</label>
                <textarea class="form-control {{ $errors->has('about_us') ? 'is-invalid' : '' }}" name="about_us" id="about_us" required>{{ old('about_us', $setting->about_us) }}</textarea>
                @if($errors->has('about_us'))
                    <div class="invalid-feedback">
                        {{ $errors->first('about_us') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.about_us_helper') }}</span>
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