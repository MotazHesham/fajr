<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySuccessPartnerRequest;
use App\Http\Requests\StoreSuccessPartnerRequest;
use App\Http\Requests\UpdateSuccessPartnerRequest;
use App\Models\SuccessPartner;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class SuccessPartnersController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('success_partner_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $successPartners = SuccessPartner::with(['media'])->get();

        return view('admin.successPartners.index', compact('successPartners'));
    }

    public function create()
    {
        abort_if(Gate::denies('success_partner_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.successPartners.create');
    }

    public function store(StoreSuccessPartnerRequest $request)
    {
        $successPartner = SuccessPartner::create($request->all());

        if ($request->input('company_img', false)) {
            $successPartner->addMedia(storage_path('tmp/uploads/' . basename($request->input('company_img'))))->toMediaCollection('company_img');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $successPartner->id]);
        }

        return redirect()->route('admin.success-partners.index');
    }

    public function edit(SuccessPartner $successPartner)
    {
        abort_if(Gate::denies('success_partner_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.successPartners.edit', compact('successPartner'));
    }

    public function update(UpdateSuccessPartnerRequest $request, SuccessPartner $successPartner)
    {
        $successPartner->update($request->all());

        if ($request->input('company_img', false)) {
            if (!$successPartner->company_img || $request->input('company_img') !== $successPartner->company_img->file_name) {
                if ($successPartner->company_img) {
                    $successPartner->company_img->delete();
                }
                $successPartner->addMedia(storage_path('tmp/uploads/' . basename($request->input('company_img'))))->toMediaCollection('company_img');
            }
        } elseif ($successPartner->company_img) {
            $successPartner->company_img->delete();
        }

        return redirect()->route('admin.success-partners.index');
    }

    public function show(SuccessPartner $successPartner)
    {
        abort_if(Gate::denies('success_partner_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.successPartners.show', compact('successPartner'));
    }

    public function destroy(SuccessPartner $successPartner)
    {
        abort_if(Gate::denies('success_partner_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $successPartner->delete();

        return back();
    }

    public function massDestroy(MassDestroySuccessPartnerRequest $request)
    {
        SuccessPartner::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('success_partner_create') && Gate::denies('success_partner_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new SuccessPartner();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
