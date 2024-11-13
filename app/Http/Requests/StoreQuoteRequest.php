<?php

namespace App\Http\Requests;

use App\Models\Quote;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreQuoteRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('quote_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'job' => [
                'string',
                'nullable',
            ],
            'language' => [
                'required',
            ],
        ];
    }
}
