<?php

namespace App\Http\Requests;

use App\Models\SuccessPartner;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySuccessPartnerRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('success_partner_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:success_partners,id',
        ];
    }
}
