<?php

namespace App\Http\Requests;

use App\Models\Project;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProjectRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('project_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'client_name' => [
                'string',
                'required',
            ],
            'location' => [
                'string',
                'required',
            ],
            'type' => [
                'required',
            ],
            'date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'photo' => [
                'required',
            ],
            'photos' => [
                'array',
            ],
        ];
    }
}
