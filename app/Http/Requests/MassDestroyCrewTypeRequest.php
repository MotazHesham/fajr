<?php

namespace App\Http\Requests;

use App\Models\CrewType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCrewTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('crew_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:crew_types,id',
        ];
    }
}
