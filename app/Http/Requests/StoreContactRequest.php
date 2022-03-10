<?php

namespace App\Http\Requests;

use App\Models\Contact;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreContactRequest extends FormRequest
{
 
    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
            ],
            'phone' => [
                'string',
                'max:10',
                'required',
                'size:10',
                'regex:/(05)[0-9]{8}/', 
            ],
            'subject' => [
                'string',
                'nullable',
            ],
            'message' => [
                'required',
            ],
        ];
    }
}
