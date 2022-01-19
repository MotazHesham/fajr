<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyJobresquestRequest;
use App\Http\Requests\StoreJobresquestRequest;
use App\Http\Requests\UpdateJobresquestRequest;
use App\Models\Jobresquest;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class JobresquestController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('jobresquest_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobresquests = Jobresquest::with(['media'])->get();

        return view('admin.jobresquests.index', compact('jobresquests'));
    }

    public function create()
    {
        abort_if(Gate::denies('jobresquest_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.jobresquests.create');
    }

    public function store(StoreJobresquestRequest $request)
    {
        $jobresquest = Jobresquest::create($request->all());

        if ($request->input('cv', false)) {
            $jobresquest->addMedia(storage_path('tmp/uploads/' . basename($request->input('cv'))))->toMediaCollection('cv');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $jobresquest->id]);
        }

        return redirect()->route('admin.jobresquests.index');
    }

    public function edit(Jobresquest $jobresquest)
    {
        abort_if(Gate::denies('jobresquest_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.jobresquests.edit', compact('jobresquest'));
    }

    public function update(UpdateJobresquestRequest $request, Jobresquest $jobresquest)
    {
        $jobresquest->update($request->all());

        if ($request->input('cv', false)) {
            if (!$jobresquest->cv || $request->input('cv') !== $jobresquest->cv->file_name) {
                if ($jobresquest->cv) {
                    $jobresquest->cv->delete();
                }
                $jobresquest->addMedia(storage_path('tmp/uploads/' . basename($request->input('cv'))))->toMediaCollection('cv');
            }
        } elseif ($jobresquest->cv) {
            $jobresquest->cv->delete();
        }

        return redirect()->route('admin.jobresquests.index');
    }

    public function show(Jobresquest $jobresquest)
    {
        abort_if(Gate::denies('jobresquest_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.jobresquests.show', compact('jobresquest'));
    }

    public function destroy(Jobresquest $jobresquest)
    {
        abort_if(Gate::denies('jobresquest_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobresquest->delete();

        return back();
    }

    public function massDestroy(MassDestroyJobresquestRequest $request)
    {
        Jobresquest::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('jobresquest_create') && Gate::denies('jobresquest_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Jobresquest();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
