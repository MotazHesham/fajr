<?php

namespace App\Http\Requests;

use App\Models\Description;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDescriptionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('description_edit');
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
