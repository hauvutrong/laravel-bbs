@extends('web.layouts.app')

@section('title', $topic->id ? 'edit' : 'create')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/simditor.css') }}">
@stop

@section('scripts')
<script src="{{ asset('js/module.js') }}"></script>
<script src="{{ asset('js/hotkeys.js') }}"></script>
<script src="{{ asset('js/uploader.js') }}"></script>
<script src="{{ asset('js/simditor.js') }}"></script>
<script>
  $(document).ready(function () {
    let editor = new Simditor({
      textarea: $('#editor'),
      upload: {
        url: '{{ route('topics.upload') }}',
        params: {
          _token: '{{ csrf_token() }}'
        },
        fileKey: 'uploader',
        connectionCount: 3,
        leaveConfirm: 'Tệp đang được tải lên. Đóng trang này sẽ hủy quá trình tải lên.'
      },
      pasteImage: true
    })

    editor.uploader.on('uploadsuccess', (event, file, res) => {
      let img = file.img

      if (res.status) {
        img.attr('src', res.path)
      } else {
        alert(res.msg)
        img.remove()
      }
    })
  })
</script>
@stop

@section('content')
<div class="row">
  <div class="col-md-10 offset-md-1">
    <div class="card">
      <div class="card-body">
        <h2 class="">
          <i class="fa fa-edit"></i> @if($topic->id)edit@else
            create@endif
        </h2>
        <hr>

        @include('web.topics.partials.message')

        <form action="{{ $topic->id ? route('topics.update', $topic->id) : route('topics.store') }}" method="post"
          accept-charset="UTF-8">
          @csrf
          @if ($topic->id)
          @method('PUT')
          @endif

          <div class="form-group">
            <label for="title-field">Tiêu đề</label>
            <input class="form-control" type="text" name="title" id="title-field"
              value="{{ old('title', $topic->title ) }}" placeholder="Vui lòng điền tiêu đề">

            @if ($errors->has('title'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('title') }}</strong>
            </span>
            @endif
          </div>
          <div class="form-group">
            <label for="category-id-field">Phân loại</label>
            <select class="form-control" name="category_id" id="category-id-field">
              <option value="" hidden disabled {{ $topic->id ? '' : 'selected' }}>Vui lòng chọn một loại</option>
              @foreach ($categories as $value)
              @php
              $selected = $topic->category_id === $value->id ? 'selected' : '';
              @endphp
              <option value="{{ $value->id }}" {{ $selected }}>{{ $value->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="editor">Nội dung</label>
            <textarea class="form-control" name="body" id="editor" rows="3"
              placeholder="Vui lòng nhập ít nhất ba ký tự">{{ old('body', $topic->body ) }}</textarea>
          </div>
          <div class="form-group row mb-0">
            <div class="col-md-6">
              <a class="btn btn-outline-primary" href="{{ route('topics.index') }}">
                <i class="fa fa-backward"></i> Quay lại
              </a>
              <button type="submit" class="btn btn-outline-primary">
                <i class="fa fa-save"></i> Lưu
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@stop
