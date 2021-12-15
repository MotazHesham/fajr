<?php

namespace App\Http\Requests;

use App\Models\CrewType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCrewTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('crew_type_edit');
    }

    public function rules()
    {
        return [
            'type' => [
                'string',
                'required',
            ],
        ];
    }
}
