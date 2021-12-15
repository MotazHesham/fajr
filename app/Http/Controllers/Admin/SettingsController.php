<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySettingRequest;
use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use App\Models\Setting;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class SettingsController extends Controller
{
    use MediaUploadingTrait;
    public function index()
    {
        abort_if(Gate::denies('setting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $setting = Setting::first();

        return view('admin.settings.edit', compact('setting'));
    }

    public function create()
    {
        abort_if(Gate::denies('setting_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.settings.create');
    }

    public function store(StoreSettingRequest $request)
    {
        $setting = Setting::create($request->all());

        return redirect()->route('admin.settings.index');
    }

    public function edit(Setting $setting)
    {
        abort_if(Gate::denies('setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.settings.edit', compact('setting'));
    }

    public function update(UpdateSettingRequest $request, Setting $setting)
    {
        
        $setting->update($request->all());

        if ($request->input('chairman_img', false)) {
            if (!$setting->chairman_img || $request->input('chairman_img') !== $setting->chairman_img->file_name) {
                if ($setting->chairman_img) {
                    $setting->chairman_img->delete();
                }
                $setting->addMedia(storage_path('tmp/uploads/' . basename($request->input('chairman_img'))))->toMediaCollection('chairman_img');
            }
        } elseif ($setting->chairman_img) {
            $setting->chairman_img->delete();
        }

        return redirect()->route('admin.settings.edit',$setting->id);
    }

    public function show(Setting $setting)
    {
        abort_if(Gate::denies('setting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.settings.show', compact('setting'));
    }

    public function destroy(Setting $setting)
    {
        abort_if(Gate::denies('setting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $setting->delete();

        return back();
    }

    public function massDestroy(MassDestroySettingRequest $request)
    {
        Setting::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('setting_create') && Gate::denies('setting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Setting();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
