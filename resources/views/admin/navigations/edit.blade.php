@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.navigation.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.navigations.update", [$navigation->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="label">{{ trans('cruds.navigation.fields.label') }}</label>
                <input class="form-control {{ $errors->has('label') ? 'is-invalid' : '' }}" type="text" name="label" id="label" value="{{ old('label', $navigation->label) }}">
                @if($errors->has('label'))
                    <div class="invalid-feedback">
                        {{ $errors->first('label') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.navigation.fields.label_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="link">{{ trans('cruds.navigation.fields.link') }}</label>
                <input class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}" type="text" name="link" id="link" value="{{ old('link', $navigation->link) }}">
                @if($errors->has('link'))
                    <div class="invalid-feedback">
                        {{ $errors->first('link') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.navigation.fields.link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="position">{{ trans('cruds.navigation.fields.position') }}</label>
                <input class="form-control {{ $errors->has('position') ? 'is-invalid' : '' }}" type="number" name="position" id="position" value="{{ old('position', $navigation->position) }}" step="1">
                @if($errors->has('position'))
                    <div class="invalid-feedback">
                        {{ $errors->first('position') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.navigation.fields.position_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.navigation.fields.language') }}</label>
                @foreach(App\Models\Navigation::LANGUAGE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('language') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="language_{{ $key }}" name="language" value="{{ $key }}" {{ old('language', $navigation->language) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="language_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('language'))
                    <div class="invalid-feedback">
                        {{ $errors->first('language') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.navigation.fields.language_helper') }}</span>
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