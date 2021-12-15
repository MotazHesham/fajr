<?php

namespace App\Http\Requests;

use App\Models\FajrCrew;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFajrCrewRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('fajr_crew_edit');
    }

    public function rules()
    {
        return [
            'description' => [
                'required',
            ],
            'types.*' => [
                'integer',
            ],
            'types' => [
                'required',
                'array',
            ],
        ];
    }
}
