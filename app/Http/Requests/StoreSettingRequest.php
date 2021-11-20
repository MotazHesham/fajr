<?php

namespace App\Http\Requests;

use App\Models\Setting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSettingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('setting_create');
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
        ];
    }
}
