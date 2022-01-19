<?php

namespace App\Http\Requests;

use App\Models\Jobresquest;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreJobresquestRequest extends FormRequest
{
    public function rules()
    {
        return [
            'first_name' => [
                'string',
                'required',
            ],
            'last_name' => [
                'string',
                'required',
            ],
            'phone' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
            ],
            'city' => [
                'string',
                'required',
            ],
            'address' => [
                'string',
                'required',
            ],
            'job' => [
                'string',
                'required',
            ],
            'cv' => [
                'required',
            ],
        ];
    }
}
