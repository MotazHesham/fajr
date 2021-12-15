<?php

namespace App\Http\Requests;

use App\Models\FajrCrew;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyFajrCrewRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('fajr_crew_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:fajr_crews,id',
        ];
    }
}
