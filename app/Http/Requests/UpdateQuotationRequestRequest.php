<?php

namespace App\Http\Requests;

use App\Models\QuotationRequest;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateQuotationRequestRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('quotation_request_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'phone' => [
                'string',
                'required',
                'size:10',
                'regex:/(05)[0-9]{8}/', 
            
            ],  
            'email' => [
                'required',
            ],
            'address' => [
                'string',
                'required',
            ],
            'service' => [
                'required',
            ],
            'date' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
        ];
    }
}
