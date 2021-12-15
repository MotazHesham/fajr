<?php

namespace App\Http\Requests;

use App\Models\Description;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDescriptionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('description_create');
    }

    public function rules()
    {
        return [
            'type' => [
                'string',
                'required',
            ],
            'pdf' => [
                'required',
            ],
        ];
    }
}
