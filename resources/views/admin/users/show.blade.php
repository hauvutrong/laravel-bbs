@extends('admin.layouts.modal')

@section('title', 'Xem hồ sơ người dùng')

@section('content')
  <table class="table table-striped table-condenseda table-bordered">
    <tbody>
    <tr>
      <th width="25%">Tên tài khoản</th>
      <td width="75%">
        <a class="pull-right" href="{{ route('users.show', $user->id) }}" target="_blank">Trang chủ</a>
        {{ $user->name }}
      </td>
    </tr>
    <tr>
      <th>Email</th>
      <td>{{ $user->email }}</td>
    </tr>
    <tr>
      <th>Nhóm người dùng</th>
      <td>Quản trị trang web&nbsp;Người bảo trì&nbsp;Người dùng</td>
    </tr>
    <tr>
      <th>Thời gian đăng ký/IP</th>
      <td>{{ $user->created_at->diffForHumans() }} / 127.0.0.1 địa chỉ địa phương</td>
    </tr>
    <tr>
      <th>Lần đăng nhập cuối cùng/IP</th>
      <td>2019-3-15 10:38:59 / 192.168.33.1 mạng lưới khu vực địa phương</td>
    </tr>
    <tr>
      <th>Tên</th>
      <td>{{ $user->name }}</td>
    </tr>
    <tr>
      <th>Giới tính</th>
      <td>Bí mật</td>
    </tr>
    <tr>
      <th>số điện thoại</th>
      <td>Chưa có</td>
    </tr>
    <tr>
      <th>Nghề nghiệp</th>
      <td>Chưa có</td>
    </tr>
    <tr>
      <th>Tiêu đề</th>
      <td>Chưa có</td>
    </tr>
    <tr>
      <th>Chữ ký cá nhân</th>
      <td>Chưa có</td>
    </tr>
    <tr>
      <th>Tự giới thiệu</th>
      <td>Chưa có</td>
    </tr>
    <tr>
      <th>Trang web cá nhân</th>
      <td>Chưa có</td>
    </tr>
    <tr>
      <th>Weibo</th>
      <td>Chưa có</td>
    </tr>
    <tr>
      <th>WeChat</th>
      <td>Chưa có</td>
    </tr>
    <tr>
      <th>QQ</th>
      <td>Chưa có</td>
    </tr>
    </tbody>
  </table>
@stop

@section('footer')
  <button type="button" class="btn btn-primary" data-dismiss="modal">关闭</button>
@stop
