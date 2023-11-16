@extends('admin.layouts.modal')

@section('title', 'Tải lên hình ảnh hồ sơ người dùng')

@section('content')
  <form class="form-horizontal" id="user-avatar-form" method="post" enctype="multipart/form-data"
        action="{{ route('admin.avatar.crop', $user) }}">
    <div class="form-group">
      <div class="col-md-2 control-label"><b>Hình đại diện hiện tại</b></div>
      <div class="controls col-md-8 controls">
        <img class="img-thumbnail" src="{{ filepath($user->avatar, 'avatar') }}"
             id="avatar-crop" width="250" height="250">
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-2 control-label">
      </div>
      <div class="controls col-md-8 controls">
        <p class="help-block">
        Vui lòng tải lên hình ảnh ở định dạng jpg|gif|png. Kích thước hình ảnh được khuyến nghị là 250×250px. Kích thước hình ảnh được khuyến nghị không vượt quá
          <strong>2MB</strong>，
          <a href="#" target="_blank">Làm sao để có được một bức tranh phù hợp?</a>
        </p>
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-2 control-label"></div>
      <div class="controls col-md-8 controls">
        <a class="btn btn-primary upload-avatar-btn webuploader-container" id="upload-avatar-btn"
           data-upload-token="{{ upload_token('tmp') }}"
           data-goto-url="{{ route('admin.avatar.crop', $user) }}">
          <div class="webuploader-pick">Tải lên hình đại diện mới</div>
        </a>
      </div>
    </div>
  </form>
@stop

@section('footer')
  <button type="button" class="btn btn-link pull-right" data-dismiss="modal">Hủy bỏ</button>
@stop

@section('script')
  <script>app.load('user/avatar')</script>
@stop
