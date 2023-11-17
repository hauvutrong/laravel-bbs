@extends('admin.layouts.modal')

@section('title', 'Chỉnh sửa hồ sơ người dùng')

@section('content')
  <form class="form-horizontal" id="user-edit-form" method="post"
        action="{{ route('admin.users.update', $user->id) }}" novalidate="novalidate">
    @csrf
    @method('PATCH')
    <div class="row form-group">
      <div class="col-md-2 control-label">
        <label for="name">Tên</label>
      </div>
      <div class="col-md-7 controls">
        <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" data-explain="">
        <div class="help-block" style="display:none;"></div>
      </div>
    </div>

    <div class="row form-group">
      <div class="col-md-2 control-label">
        <label for="gender">Giới tính</label>
      </div>
      <div class="col-md-7 controls radios">
        <div id="gender">
          <input type="radio" id="gender_0" name="gender" value="male">
          <label for="gender_0">Nam giới</label>
          <input type="radio" id="gender_1" name="gender" value="female">
          <label for="gender_1">Nữ giới</label>
        </div>
      </div>
    </div>

    <div class="row form-group">
      <div class="col-md-2 control-label">
        <label for="phone">Số điện thoại</label>
      </div>
      <div class="col-md-7 controls">
        <input type="text" name="phone" id="phone" class="form-control" value="" data-explain="">
        <div class="help-block" style="display:none;"></div>
      </div>
    </div>

    <div class="row form-group">
      <div class="col-md-2 control-label">
        <label for="signature">Chữ ký cá nhân</label>
      </div>
      <div class="col-md-7 controls">
        <textarea type="text" rows="4" maxlength="80" name="signature" id="signature" class="form-control"></textarea>
      </div>
    </div>
    <p></p>

    <div class="row form-group">
      <div class="col-md-2 control-label">
        <label for="introduction">Tự giới thiệu</label>
      </div>
      <div class="col-md-7 controls">
        <textarea name="introduction" id="introduction" data-image-upload-url=""
                  style="visibility: hidden; display: none;"></textarea>
      </div>
    </div>
    <p></p>

    <div class="row form-group">
      <div class="col-md-2 control-label">
        <label for="site">Trang chủ</label>
      </div>
      <div class="col-md-7 controls">
        <input type="text" name="site" id="site" class="form-control" value="" data-explain="">
        <div class="help-block" style="display:none;"></div>
      </div>
    </div>
    <p></p>
  </form>
@stop

@section('footer')
  <button id="edit-user-btn" data-submiting-text="正在提交..." type="submit" class="btn btn-primary pull-right"
          data-toggle="form-submit" data-target="#user-edit-form">Giữ
  </button>
  <button type="button" class="btn btn-link pull-right" data-dismiss="modal">Hủy bỏ</button>
@stop

@section('script')
  <script>app.load('user/edit')</script>
@stop
