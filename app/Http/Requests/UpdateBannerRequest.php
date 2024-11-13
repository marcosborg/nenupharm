<?php

namespace App\Http\Requests;

use App\Models\Banner;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBannerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('banner_edit');
    }

    public function rules()
    {
        return [
            'header' => [
                'string',
                'nullable',
            ],
            'sub_header' => [
                'string',
                'nullable',
            ],
            'button' => [
                'string',
                'nullable',
            ],
            'link' => [
                'string',
                'nullable',
            ],
            'language' => [
                'required',
            ],
        ];
    }
}
