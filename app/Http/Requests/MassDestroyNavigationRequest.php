<?php

namespace App\Http\Requests;

use App\Models\Navigation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyNavigationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('navigation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:navigations,id',
        ];
    }
}
