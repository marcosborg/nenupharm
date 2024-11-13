@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.about.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.abouts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.about.fields.id') }}
                        </th>
                        <td>
                            {{ $about->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.about.fields.title') }}
                        </th>
                        <td>
                            {{ $about->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.about.fields.subtitle') }}
                        </th>
                        <td>
                            {{ $about->subtitle }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.about.fields.text') }}
                        </th>
                        <td>
                            {!! $about->text !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.about.fields.photo_1') }}
                        </th>
                        <td>
                            @if($about->photo_1)
                                <a href="{{ $about->photo_1->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $about->photo_1->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.about.fields.photo_2') }}
                        </th>
                        <td>
                            @if($about->photo_2)
                                <a href="{{ $about->photo_2->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $about->photo_2->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.about.fields.icon') }}
                        </th>
                        <td>
                            {{ $about->icon }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.about.fields.language') }}
                        </th>
                        <td>
                            {{ App\Models\About::LANGUAGE_RADIO[$about->language] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.abouts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection