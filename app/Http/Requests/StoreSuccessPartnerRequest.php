<?php

namespace App\Http\Requests;

use App\Models\SuccessPartner;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSuccessPartnerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('success_partner_create');
    }

    public function rules()
    {
        return [
            'company_name' => [
                'string',
                'required',
            ],
            'company_img' => [
                'required',
            ],
        ];
    }
}
