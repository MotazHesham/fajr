<?php

namespace App\Http\Requests;

use App\Models\FaQ;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFaQRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('fa_q_edit');
    }

    public function rules()
    {
        return [
            'question' => [
                'required',
            ],
            'answer' => [
                'required',
            ],
            'service_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
