@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.banner.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.banners.update", [$banner->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="header">{{ trans('cruds.banner.fields.header') }}</label>
                <input class="form-control {{ $errors->has('header') ? 'is-invalid' : '' }}" type="text" name="header" id="header" value="{{ old('header', $banner->header) }}">
                @if($errors->has('header'))
                    <div class="invalid-feedback">
                        {{ $errors->first('header') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.banner.fields.header_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sub_header">{{ trans('cruds.banner.fields.sub_header') }}</label>
                <input class="form-control {{ $errors->has('sub_header') ? 'is-invalid' : '' }}" type="text" name="sub_header" id="sub_header" value="{{ old('sub_header', $banner->sub_header) }}">
                @if($errors->has('sub_header'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sub_header') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.banner.fields.sub_header_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="button">{{ trans('cruds.banner.fields.button') }}</label>
                <input class="form-control {{ $errors->has('button') ? 'is-invalid' : '' }}" type="text" name="button" id="button" value="{{ old('button', $banner->button) }}">
                @if($errors->has('button'))
                    <div class="invalid-feedback">
                        {{ $errors->first('button') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.banner.fields.button_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="link">{{ trans('cruds.banner.fields.link') }}</label>
                <input class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}" type="text" name="link" id="link" value="{{ old('link', $banner->link) }}">
                @if($errors->has('link'))
                    <div class="invalid-feedback">
                        {{ $errors->first('link') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.banner.fields.link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="photo">{{ trans('cruds.banner.fields.photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                </div>
                @if($errors->has('photo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('photo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.banner.fields.photo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.banner.fields.language') }}</label>
                @foreach(App\Models\Banner::LANGUAGE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('language') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="language_{{ $key }}" name="language" value="{{ $key }}" {{ old('language', $banner->language) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="language_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('language'))
                    <div class="invalid-feedback">
                        {{ $errors->first('language') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.banner.fields.language_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.photoDropzone = {
    url: '{{ route('admin.banners.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="photo"]').remove()
      $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($banner) && $banner->photo)
      var file = {!! json_encode($banner->photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
@endsection