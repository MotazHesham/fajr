<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyQuotationRequestRequest;
use App\Http\Requests\StoreQuotationRequestRequest;
use App\Http\Requests\UpdateQuotationRequestRequest;
use App\Models\QuotationRequest;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class QuotationRequestController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('quotation_request_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $quotationRequests = QuotationRequest::with(['media'])->get();

        return view('admin.quotationRequests.index', compact('quotationRequests'));
    }

    public function create()
    {
        abort_if(Gate::denies('quotation_request_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.quotationRequests.create');
    }

    public function store(StoreQuotationRequestRequest $request)
    {

        $quotationRequest = QuotationRequest::create($request->all());

        foreach ($request->input('files', []) as $file) {
            $quotationRequest->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('files');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $quotationRequest->id]);
        }

        return redirect()->route('admin.quotation-requests.index');
    }

    public function edit(QuotationRequest $quotationRequest)
    {
        abort_if(Gate::denies('quotation_request_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.quotationRequests.edit', compact('quotationRequest'));
    }

    public function update(UpdateQuotationRequestRequest $request, QuotationRequest $quotationRequest)
    {
        $quotationRequest->update($request->all());

        if (count($quotationRequest->files) > 0) {
            foreach ($quotationRequest->files as $media) {
                if (!in_array($media->file_name, $request->input('files', []))) {
                    $media->delete();
                }
            }
        }
        $media = $quotationRequest->files->pluck('file_name')->toArray();
        foreach ($request->input('files', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $quotationRequest->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('files');
            }
        }

        return redirect()->route('admin.quotation-requests.index');
    }

    public function show(QuotationRequest $quotationRequest)
    {
        abort_if(Gate::denies('quotation_request_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.quotationRequests.show', compact('quotationRequest'));
    }

    public function destroy(QuotationRequest $quotationRequest)
    {
        abort_if(Gate::denies('quotation_request_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $quotationRequest->delete();

        return back();
    }

    public function massDestroy(MassDestroyQuotationRequestRequest $request)
    {
        QuotationRequest::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('quotation_request_create') && Gate::denies('quotation_request_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new QuotationRequest();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
