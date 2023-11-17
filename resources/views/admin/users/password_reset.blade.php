@extends('admin.layouts.modal')

@section('title', 'Đặt lại mật khẩu cá nhân của người dùng')

@section('content')
  <form class="form-horizontal" id="password-reset-form" action="{{ route('admin.password.reset', $user) }}"
        method="post" novalidate="novalidate">
    @csrf
    @method('PATCH')

    <div class="row form-group">
      <div class="col-md-3 control-label"><label for="code">Tên tài khoản</label></div>
      <div class="col-md-8 controls">
        <div style="margin-top: 7px;">{{ $user->name }}</div>
      </div>
    </div>

    <div class="row form-group">
      <div class="col-md-3 control-label"><label for="code">Email người dùng</label></div>
      <div class="col-md-8 controls">
        <div style="margin-top: 7px;">{{ $user->email }}</div>
      </div>
    </div>

    <div class="row form-group">
      <div class="col-md-3 control-label"><label for="newPassword">Mật khẩu mới</label></div>
      <div class="col-md-8 controls">
        <input class="form-control" type="password" id="newPassword" value="" name="newPassword"
               data-explain="5-20 chữ số tiếng Anh, số, ký hiệu, phân biệt chữ hoa chữ thường">
        <p class="help-block"></p>
      </div>
    </div>

    <div class="row form-group">
      <div class="col-md-3 control-label"><label for="confirmPassword">Xác nhận mật khẩu</label></div>
      <div class="col-md-8 controls">
        <input class="form-control" type="password" id="confirmPassword" value="" name="confirmPassword"
               data-explain="Nhập lại mật khẩu">
        <p class="help-block"></p>
      </div>
    </div>
    <input type="hidden" name="id" value="{{ $user->id }}">
  </form>
@stop

@section('footer')
  <button class="btn btn-primary pull-right" id="password-reset-btn" type="submit"
          data-submiting-text="Đang gửi..." data-toggle="form-submit"
          data-target="#password-reset-form">保存
  </button>
  <button type="button" class="btn btn-link pull-right" data-dismiss="modal">Hủy bỏ</button>
@stop

@section('script')
  <script>app.load('user/password-reset')</script>
@stop
