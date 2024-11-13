@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.about.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.abouts.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">{{ trans('cruds.about.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}">
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.about.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="subtitle">{{ trans('cruds.about.fields.subtitle') }}</label>
                <textarea class="form-control {{ $errors->has('subtitle') ? 'is-invalid' : '' }}" name="subtitle" id="subtitle">{{ old('subtitle') }}</textarea>
                @if($errors->has('subtitle'))
                    <div class="invalid-feedback">
                        {{ $errors->first('subtitle') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.about.fields.subtitle_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="text">{{ trans('cruds.about.fields.text') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('text') ? 'is-invalid' : '' }}" name="text" id="text">{!! old('text') !!}</textarea>
                @if($errors->has('text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.about.fields.text_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="photo_1">{{ trans('cruds.about.fields.photo_1') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photo_1') ? 'is-invalid' : '' }}" id="photo_1-dropzone">
                </div>
                @if($errors->has('photo_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('photo_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.about.fields.photo_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="photo_2">{{ trans('cruds.about.fields.photo_2') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photo_2') ? 'is-invalid' : '' }}" id="photo_2-dropzone">
                </div>
                @if($errors->has('photo_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('photo_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.about.fields.photo_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="icon">{{ trans('cruds.about.fields.icon') }}</label>
                <input class="form-control {{ $errors->has('icon') ? 'is-invalid' : '' }}" type="text" name="icon" id="icon" value="{{ old('icon', '') }}">
                @if($errors->has('icon'))
                    <div class="invalid-feedback">
                        {{ $errors->first('icon') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.about.fields.icon_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.about.fields.language') }}</label>
                @foreach(App\Models\About::LANGUAGE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('language') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="language_{{ $key }}" name="language" value="{{ $key }}" {{ old('language', 'pt') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="language_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('language'))
                    <div class="invalid-feedback">
                        {{ $errors->first('language') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.about.fields.language_helper') }}</span>
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
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.abouts.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $about->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

<script>
    Dropzone.options.photo1Dropzone = {
    url: '{{ route('admin.abouts.storeMedia') }}',
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
      $('form').find('input[name="photo_1"]').remove()
      $('form').append('<input type="hidden" name="photo_1" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photo_1"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($about) && $about->photo_1)
      var file = {!! json_encode($about->photo_1) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photo_1" value="' + file.file_name + '">')
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
<script>
    Dropzone.options.photo2Dropzone = {
    url: '{{ route('admin.abouts.storeMedia') }}',
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
      $('form').find('input[name="photo_2"]').remove()
      $('form').append('<input type="hidden" name="photo_2" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photo_2"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($about) && $about->photo_2)
      var file = {!! json_encode($about->photo_2) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photo_2" value="' + file.file_name + '">')
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