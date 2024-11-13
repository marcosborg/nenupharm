<?php

namespace App\Http\Requests;

use App\Models\Contact;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateContactRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('contact_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
            'text' => [
                'string',
                'nullable',
            ],
            'icon' => [
                'string',
                'nullable',
            ],
            'language' => [
                'required',
            ],
        ];
    }
}
