@extends('admin.layouts.app')

@section('title', 'Quản lý vai trò')

@section('sidebar')
  @php($sidebar = 'system')
@stop

@section('action')
  <a class="btn btn-success btn-sm" data-url="{{ route('admin.roles.create') }}"
     data-toggle="modal" data-target="#modal">Thêm vai trò</a>
@stop

@section('content')
  <form id="role-search-form" class="form-inline well well-sm" action="" method="get" novalidate="novalidate">
    <select class="form-control" name="datePicker" id="datePicker">
      <option value="">--Loại thời gian--</option>
      <option value="longinDate">Thời gian đăng nhập</option>
      <option value="registerDate">Thời gian đăng ký</option>
    </select>
    <div class="form-group ">
      <input class="form-control" type="text" id="startDate" name="startDate" value="" placeholder="Thời gian bắt đầu">
      -
      <input class="form-control" type="text" id="endDate" name="endDate" value="" placeholder="Thời gian kết thúc">
    </div>
    <div class="form-group">
      <input type="text" id="keyword" name="keyword" class="form-control" value="" placeholder="Từ khóa">
    </div>
    <button class="btn btn-primary">Tìm kiếm</button>
  </form>
  <p class="text-muted">
    <span class="mrl">Tổng số người dùng：<strong class="inflow-num">{{ $count }}</strong></span>
  </p>
  <table id="user-table" class="table table-striped table-hover" data-search-form="#user-search-form">
    <thead>
    <tr>
      <th>Tên vai trò</th>
      <th>Mã hóa vai trò</th>
      <th>Thời gian sáng tạo</th>
      <th>Cập nhật thời gian</th>
      <th width="10%">Vận hành</th>
    </tr>
    </thead>
    <tbody>
    @if (count($roles))
      @foreach($roles as $key => $role)
        <tr id="user-table-tr-{{ $key }}">
          <td>
            <strong>
              <a href="javascript:;" role="show-user" data-toggle="modal" data-target="#modal"
                 data-url="#">{{ $role->name }}</a>
            </strong>
            <br>
            <span class="text-muted text-sm">Người dùng bảo trì quản trị trang web</span>
          </td>
          <td>{{ $role->slug }}</td>
          <td>
            <span class="text-sm">{{ $role->created_at }}</span>
            <br>
            <span class="text-muted text-sm"><a href="#" target="_blank">127.0.0.1</a> Địa chỉ địa phương</span>
            <span></span>
          </td>
          <td>
            <span class="text-sm">2019-3-15 10:38:59</span>
            <br>
            <span class="text-muted text-sm">
                  <a class="text-muted text-sm" href="#" target="_blank">192.168.33.1</a>Mạng lưới khu vực địa phương
                </span>
          </td>
          <td></td>
          <td>
            <div class="btn-group">
              <a href="#modal" data-toggle="modal" data-url="{{ route('admin.roles.show', $role) }}"
                 class="btn btn-default btn-sm">Kiểm tra</a>
              <a href="#" type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a href="#modal" data-toggle="modal" data-url="{{ route('admin.roles.edit', $role) }}"
                     data-target="#modal" title="Chỉnh sửa thông tin người dùng">Chỉnh sửa vai trò</a>
                </li>
              </ul>
            </div>
          </td>
        </tr>
      @endforeach
    @endif
    </tbody>
  </table>
  {!! $roles->appends(Request::except('page'))->render() !!}
@stop
