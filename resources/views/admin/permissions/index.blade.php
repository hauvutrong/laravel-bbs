@extends('admin.layouts.app')

@section('title', 'Quản lý vai trò')

@section('sidebar')
  @php($sidebar = 'system')
@stop

@section('content')
  <form id="role-search-form" class="form-inline well well-sm" action="" method="get" novalidate="">
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
  <table id="user-table" class="table table-striped table-hover" data-search-form="#user-search-form">
    <thead>
    <tr>
      <th>Tên vai trò</th>
      <th>Tên bảo vệ</th>
      <th>Thời gian sáng tạo</th>
      <th>Cập nhật thời gian</th>
      <th width="10%">Vận hành</th>
    </tr>
    </thead>
    <tbody>
    @if (count($permissions))
      @foreach($permissions as $permission)
        <tr>
          <td>{{ $permission->name }}</td>
          <td>{{ $permission->created_at }}</td>
          <td>{{ $permission->updated_at }}</td>
          <td></td>
        </tr>
      @endforeach
    @endif
    </tbody>
  </table>
@stop
