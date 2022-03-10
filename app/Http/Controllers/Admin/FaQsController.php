<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyFaQRequest;
use App\Http\Requests\StoreFaQRequest;
use App\Http\Requests\UpdateFaQRequest;
use App\Models\FaQ;
use App\Models\Service;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class FaQsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('fa_q_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $faQs = FaQ::with(['service', 'media'])->get();

        return view('admin.faQs.index', compact('faQs'));
    }

    public function create()
    {
        abort_if(Gate::denies('fa_q_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $services = Service::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.faQs.create', compact('services'));
    }

    public function store(StoreFaQRequest $request)
    {
        $faQ = FaQ::create($request->all());

        if ($request->input('photo', false)) {
            $faQ->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $faQ->id]);
        }

        return redirect()->route('admin.fa-qs.index');
    }

    public function edit(FaQ $faQ)
    {
        abort_if(Gate::denies('fa_q_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $services = Service::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $faQ->load('service');

        return view('admin.faQs.edit', compact('faQ', 'services'));
    }

    public function update(UpdateFaQRequest $request, FaQ $faQ)
    {
        $faQ->update($request->all());

        if ($request->input('photo', false)) {
            if (!$faQ->photo || $request->input('photo') !== $faQ->photo->file_name) {
                if ($faQ->photo) {
                    $faQ->photo->delete();
                }
                $faQ->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($faQ->photo) {
            $faQ->photo->delete();
        }

        return redirect()->route('admin.fa-qs.index');
    }

    public function show(FaQ $faQ)
    {
        abort_if(Gate::denies('fa_q_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $faQ->load('service');

        return view('admin.faQs.show', compact('faQ'));
    }

    public function destroy(FaQ $faQ)
    {
        abort_if(Gate::denies('fa_q_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $faQ->delete();

        return back();
    }

    public function massDestroy(MassDestroyFaQRequest $request)
    {
        FaQ::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('fa_q_create') && Gate::denies('fa_q_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new FaQ();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
