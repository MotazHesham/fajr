<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyQuotationRequestRequest;
use App\Http\Requests\StoreQuotationRequestRequest;
use App\Http\Requests\UpdateQuotationRequestRequest;
use App\Models\QuotationRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QuotationRequestController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('quotation_request_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $quotationRequests = QuotationRequest::all();

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
}
