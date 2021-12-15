<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPolicyRequest;
use App\Http\Requests\StorePolicyRequest;
use App\Http\Requests\UpdatePolicyRequest;
use App\Models\Policy;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PoliciesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('policy_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $policies = Policy::with(['media'])->get();

        return view('admin.policies.index', compact('policies'));
    }

    public function create()
    {
        abort_if(Gate::denies('policy_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.policies.create');
    }

    public function store(StorePolicyRequest $request)
    {
        $policy = Policy::create($request->all());

        if ($request->input('policy_pdf', false)) {
            $policy->addMedia(storage_path('tmp/uploads/' . basename($request->input('policy_pdf'))))->toMediaCollection('policy_pdf');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $policy->id]);
        }

        return redirect()->route('admin.policies.index');
    }

    public function edit(Policy $policy)
    {
        abort_if(Gate::denies('policy_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.policies.edit', compact('policy'));
    }

    public function update(UpdatePolicyRequest $request, Policy $policy)
    {
        $policy->update($request->all());

        if ($request->input('policy_pdf', false)) {
            if (!$policy->policy_pdf || $request->input('policy_pdf') !== $policy->policy_pdf->file_name) {
                if ($policy->policy_pdf) {
                    $policy->policy_pdf->delete();
                }
                $policy->addMedia(storage_path('tmp/uploads/' . basename($request->input('policy_pdf'))))->toMediaCollection('policy_pdf');
            }
        } elseif ($policy->policy_pdf) {
            $policy->policy_pdf->delete();
        }

        return redirect()->route('admin.policies.index');
    }

    public function show(Policy $policy)
    {
        abort_if(Gate::denies('policy_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.policies.show', compact('policy'));
    }

    public function destroy(Policy $policy)
    {
        abort_if(Gate::denies('policy_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $policy->delete();

        return back();
    }

    public function massDestroy(MassDestroyPolicyRequest $request)
    {
        Policy::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('policy_create') && Gate::denies('policy_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Policy();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
