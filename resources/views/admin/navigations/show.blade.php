@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.navigation.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.navigations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.navigation.fields.id') }}
                        </th>
                        <td>
                            {{ $navigation->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.navigation.fields.label') }}
                        </th>
                        <td>
                            {{ $navigation->label }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.navigation.fields.link') }}
                        </th>
                        <td>
                            {{ $navigation->link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.navigation.fields.position') }}
                        </th>
                        <td>
                            {{ $navigation->position }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.navigation.fields.language') }}
                        </th>
                        <td>
                            {{ App\Models\Navigation::LANGUAGE_RADIO[$navigation->language] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.navigations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection