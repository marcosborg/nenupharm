<?php

namespace App\Http\Requests;

use App\Models\Navigation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateNavigationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('navigation_edit');
    }

    public function rules()
    {
        return [
            'label' => [
                'string',
                'nullable',
            ],
            'link' => [
                'string',
                'nullable',
            ],
            'position' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'language' => [
                'required',
            ],
        ];
    }
}
