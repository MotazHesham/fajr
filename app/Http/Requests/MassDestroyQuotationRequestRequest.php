<?php

namespace App\Http\Requests;

use App\Models\QuotationRequest;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyQuotationRequestRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('quotation_request_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:quotation_requests,id',
        ];
    }
}
