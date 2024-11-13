@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.feature.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.features.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">{{ trans('cruds.feature.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}">
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.feature.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="text">{{ trans('cruds.feature.fields.text') }}</label>
                <input class="form-control {{ $errors->has('text') ? 'is-invalid' : '' }}" type="text" name="text" id="text" value="{{ old('text', '') }}">
                @if($errors->has('text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.feature.fields.text_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="icon">{{ trans('cruds.feature.fields.icon') }}</label>
                <input class="form-control {{ $errors->has('icon') ? 'is-invalid' : '' }}" type="text" name="icon" id="icon" value="{{ old('icon', '') }}">
                @if($errors->has('icon'))
                    <div class="invalid-feedback">
                        {{ $errors->first('icon') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.feature.fields.icon_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="button">{{ trans('cruds.feature.fields.button') }}</label>
                <input class="form-control {{ $errors->has('button') ? 'is-invalid' : '' }}" type="text" name="button" id="button" value="{{ old('button', '') }}">
                @if($errors->has('button'))
                    <div class="invalid-feedback">
                        {{ $errors->first('button') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.feature.fields.button_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="link">{{ trans('cruds.feature.fields.link') }}</label>
                <input class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}" type="text" name="link" id="link" value="{{ old('link', '') }}">
                @if($errors->has('link'))
                    <div class="invalid-feedback">
                        {{ $errors->first('link') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.feature.fields.link_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.feature.fields.language') }}</label>
                @foreach(App\Models\Feature::LANGUAGE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('language') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="language_{{ $key }}" name="language" value="{{ $key }}" {{ old('language', 'pt') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="language_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('language'))
                    <div class="invalid-feedback">
                        {{ $errors->first('language') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.feature.fields.language_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection