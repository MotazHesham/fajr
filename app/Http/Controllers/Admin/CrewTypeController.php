<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCrewTypeRequest;
use App\Http\Requests\StoreCrewTypeRequest;
use App\Http\Requests\UpdateCrewTypeRequest;
use App\Models\CrewType;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CrewTypeController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('crew_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $crewTypes = CrewType::with(['media'])->get();

        return view('admin.crewTypes.index', compact('crewTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('crew_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.crewTypes.create');
    }

    public function store(StoreCrewTypeRequest $request)
    {
        $crewType = CrewType::create($request->all());

        if ($request->input('job_img', false)) {
            $crewType->addMedia(storage_path('tmp/uploads/' . basename($request->input('job_img'))))->toMediaCollection('job_img');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $crewType->id]);
        }

        return redirect()->route('admin.crew-types.index');
    }

    public function edit(CrewType $crewType)
    {
        abort_if(Gate::denies('crew_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.crewTypes.edit', compact('crewType'));
    }

    public function update(UpdateCrewTypeRequest $request, CrewType $crewType)
    {
        $crewType->update($request->all());

        if ($request->input('job_img', false)) {
            if (!$crewType->job_img || $request->input('job_img') !== $crewType->job_img->file_name) {
                if ($crewType->job_img) {
                    $crewType->job_img->delete();
                }
                $crewType->addMedia(storage_path('tmp/uploads/' . basename($request->input('job_img'))))->toMediaCollection('job_img');
            }
        } elseif ($crewType->job_img) {
            $crewType->job_img->delete();
        }

        return redirect()->route('admin.crew-types.index');
    }

    public function show(CrewType $crewType)
    {
        abort_if(Gate::denies('crew_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.crewTypes.show', compact('crewType'));
    }

    public function destroy(CrewType $crewType)
    {
        abort_if(Gate::denies('crew_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $crewType->delete();

        return back();
    }

    public function massDestroy(MassDestroyCrewTypeRequest $request)
    {
        CrewType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('crew_type_create') && Gate::denies('crew_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new CrewType();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}