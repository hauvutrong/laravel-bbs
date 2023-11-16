@extends('admin.layouts.app')

@section('title', 'Quản lý người dùng')

@section('sidebar')
  @php($sidebar = 'user')
@stop

@section('content')
  <form id="user-search-form" class="form-inline well well-sm" action="" method="get" novalidate="">
    <div class="mbm">
      <select class="form-control" name="datePicker" id="datePicker">
        <option value="">--Loại thời gian--</option>
        {!! select_options(config('blader.userDatetimeType'), Request::query('datePicker')) !!}
      </select>
      <div class="form-group ">
        <input class="form-control" type="text" id="startDate" name="startDate" value="" placeholder="Thời gian bắt đầu">
        -
        <input class="form-control" type="text" id="endDate" name="endDate" value="" placeholder="Thời gian kết thúc">
      </div>
    </div>
    <div class="form-group">
      <select class="form-control" name="role">
        <option value="">--Tất cả vai trò--</option>
        {!! select_options(config('blader.userRole'), Request::query('role')) !!}
      </select>
    </div>
    <div class="form-group">
      <select name="keywordUserType" id="keywordUserType" class="form-control">
        <option value="">--Nguồn đăng ký--</option>
        {!! select_options(config('blader.userType'), Request::query('keywordUserType')) !!}
      </select>
    </div>
    <div class="form-group">
      <select class="form-control" name="keywordType" id="keywordType">
        {!! select_options(config('blader.userKeyWordType'), Request::query('keywordType')) !!}
      </select>
    </div>
    <div class="form-group">
      <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Từ khóa"
             value="{{ Request::query('keyword') }}">
    </div>
    <button class="btn btn-primary">Tìm kiếm</button>
  </form>
  <p class="text-muted">
    <span class="mrl">Tổng số người dùng:<strong class="inflow-num">{{ $users->total() }}</strong></span>
  </p>
  <table id="user-table" class="table table-striped table-hover" data-search-form="#user-search-form">
    <thead>
    <tr>
      <th>Tên tài khoản</th>
      <th>Số điện thoại</th>
      <th>Email</th>
      <th>Thời gian đăng ký</th>
      <th>Đăng nhập gần đây</th>
      <th width="10%">vận hành</th>
    </tr>
    </thead>
    <tbody>
    @if (count($users))
      @foreach($users as $key => $user)
        <tr id="user-table-tr-{{ $key }}">
          <td>
            <strong>
              <a href="javascript:;" role="show-user" data-toggle="modal" data-target="#modal"
                 data-url="#">{{ $user->name }}</a>
            </strong>
            <br>
            <span class="text-muted text-sm">Người dùng bảo trì quản trị trang web</span>
          </td>
          <td>{{ $user->phone ?? '--' }}</td>
          <td>
            {{ $user->email }}
            <br>
            @if ($user->email_verified_at)
              <label class="label label-success" title="Địa chỉ email này đã được xác minh">Đã xác minh</label>
            @else
              <label class="label label-danger" title="Địa chỉ email này chưa được xác minh">Chưa được xác minh</label>
            @endif
          </td>
          <td>
            <span class="text-sm">{{ $user->created_at->diffForHumans() }}</span>
            <br>
            <span class="text-muted text-sm"><a href="#" target="_blank">127.0.0.1</a> Địa chỉ địa phương</span>
            <span></span>
          </td>
          <td>
            <span class="text-sm">{{ $user->last_actived_at }}</span>
            <br>
            <span class="text-muted text-sm">
              <a class="text-muted text-sm" href="#" target="_blank">192.168.33.1</a>Mạng lưới khu vực địa phương
            </span>
          </td>
          <td>
            <div class="btn-group">
              <a href="#modal" data-toggle="modal" data-url="{{ route('admin.users.show', $user) }}"
                 class="btn btn-default btn-sm">Kiểm tra</a>
              <a href="#" type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a href="#modal" data-toggle="modal" data-url="{{ route('admin.users.edit', $user) }}"
                     data-target="#modal" title="Chỉnh sửa thông tin người dùng">Chỉnh sửa thông tin người dùng</a>
                </li>
                <li>
                  <a href="#modal" data-toggle="modal" data-url="#"
                     data-target="#modal" title="Thiết lập nhóm người dùng">Thiết lập nhóm người dùng</a>
                </li>
                <li>
                  <a href="#modal" data-toggle="modal" data-url="{{ route('admin.avatar.request', $user) }}"
                     data-target="#modal" title="Sửa đổi hình đại diện của người dùng">Sửa đổi hình đại diện của người dùng</a>
                </li>
                <li>
                  <a href="#modal" data-toggle="modal"
                     data-url="{{ route('admin.password.request', $user) }}"
                     data-target="#modal" title="Đổi mật khẩu">Đổi mật khẩu</a>
                </li>
                <li>
                  <a title="Gửi email đặt lại mật khẩu" class="send-passwordreset-email"
                     data-url="#" href="javascript:;">Gửi email đặt lại mật khẩu</a>
                </li>
                <li>
                  <a title="Gửi email xác minh email" class="send-emailverify-email"
                     data-url="#" href="javascript:;">Gửi email xác minh email</a>
                </li>
                <li>
                  <a title="Cấm người dùng" class="lock-user" data-url="#" href="javascript:;">
                  Cấm người dùng
                  </a>
                </li>
              </ul>
            </div>
          </td>
        </tr>
      @endforeach
    @endif
    </tbody>
  </table>
  {!! $users->appends(Request::except('page'))->render() !!}
@stop
