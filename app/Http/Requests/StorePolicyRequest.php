<?php

namespace App\Http\Requests;

use App\Models\Policy;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePolicyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('policy_create');
    }

    public function rules()
    {
        return [
            'type' => [
                'string',
                'required',
            ],
            'policy_pdf' => [
                'required',
            ],
        ];
    }
}
