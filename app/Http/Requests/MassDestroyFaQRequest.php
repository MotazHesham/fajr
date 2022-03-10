<?php

namespace App\Http\Requests;

use App\Models\FaQ;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyFaQRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('fa_q_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:fa_qs,id',
        ];
    }
}
