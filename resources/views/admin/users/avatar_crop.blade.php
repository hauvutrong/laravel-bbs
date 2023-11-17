@extends('admin.layouts.modal')

@section('title', 'Tải lên hình ảnh hồ sơ người dùng')

@section('content')
  <form class="form-horizontal" id="avatar-crop-form" method="post"
        action="{{ route('admin.avatar.cropper', $user) }}">
    @csrf
    @method('POST')

    <div class="form-group clearfix">
      <div class="col-md-offset-2 col-md-8 controls">
        <img class="img-responsive" src="{{ $uri }}" id="avatar-crop" width="250" height="250"
             data-natural-width="270" data-natural-height="1024">
        <div class="help-block">Mẹo: Hãy chọn vùng cắt ảnh.</div>
      </div>
    </div>

    <div class="form-group clearfix">
      <div class="col-md-offset-2 col-md-8 controls">
        <a class="btn btn-fat btn-primary" id="upload-avatar-btn"
           data-url="{{ route('admin.avatar.cropper', $user) }}"
           data-goto-url="{{ route('admin.avatar.request', $user) }}">Giữ</a>
      </div>
    </div>
  </form>
@stop

@section('footer')
  <button type="button" class="btn btn-link pull-right" data-dismiss="modal">Khép kín</button>
@stop

@section('script')
  <script>app.load('user/avatar-crop')</script>
@stop
