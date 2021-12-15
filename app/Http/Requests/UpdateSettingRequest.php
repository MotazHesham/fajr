<?php

namespace App\Http\Requests;

use App\Models\Setting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSettingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('setting_edit');
    }

    public function rules()
    {
        return [
            'email' => [
                'string',
                'required',
            ],
            'phone' => [
                'string',
                'required',
            ],
            'address' => [
                'string',
                'required',
            ],
            'twitter' => [
                'string',
                'nullable',
            ],
            'facebook' => [
                'string',
                'nullable',
            ],
            'instagram' => [
                'string',
                'nullable',
            ],
            'tik_tok' => [
                'string',
                'nullable',
            ],
            'snapchat' => [
                'string',
                'nullable',
            ],
            'experience' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'projects' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'clients' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'solutions' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'projects_text' => [
                'required',
            ],
            'news_text' => [
                'required',
            ],
            'building_text' => [
                'required',
            ],
            'trmem' => [
                'required',
            ],
            'fix_text' => [
                'required',
            ],
            'decore_text' => [
                'required',
            ],
            'about_us' => [
                'required',
            ],
            'our_message' => [
                'required',
            ],
            'our_values' => [
                'required',
            ],
            'our_vision' => [
                'required',
            ],
            'our_strategy' => [
                'required',
            ],
            'chairman_word' => [
                'required',
            ],
        ];
    }
}
