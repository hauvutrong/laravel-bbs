@extends('admin.layouts.modal')

@php
  $action = str_after(current_action(), '@');
@endphp

@section('title', $action === 'show' ? 'Xem quyền' : ($permission->id ? 'Chỉnh sửa quyền' : 'Thêm quyền'))

@section('content')
  <form class="form-horizontal" id="permission-form"
        action="{{ $permission->id ? route('admin.permissions.update', $permission->id) : route('admin.permissions.store') }}"
        method="post" novalidate="novalidate">
    @csrf
    @method($permission->id ? 'PATCH' : 'POST')

    <div class="row form-group">
      <div class="col-md-2 control-label">
        <label for="name">Tên vai trò</label>
      </div>
      <div class="col-md-7 controls">
        <input type="text" class="form-control" id="name" name="name"
               value="{{ old('name', $permission->name) }}"
               data-url="{{ route('admin.permissions.check.name', $permission->id) }}"
               @if ($action === 'show') readonly @endif>
        <div class="help-block" style="display:none;"></div>
      </div>
    </div>

    <div class="row form-group">
      <div class="col-md-2 control-label">
        <label for="signature">Mã hóa vai trò</label>
      </div>
      <div class="col-md-7 controls">
        <input type="text" class="form-control" id="slug" name="slug"
               value="{{ old('slug', $permission->slug) }}"
               data-url="{{ route('admin.roles.check.slug', $permission->id) }}"
               @if ($action === 'show') readonly @endif>
        <div class="help-block" style="display:none;"></div>
      </div>
    </div>
  </form>
@stop

@section('footer')
  @if ($action !== 'show')
    <button class="btn btn-primary pull-right" id="role-btn" type="submit"
            data-submiting-text="正在提交..." data-toggle="form-submit"
            data-target="#role-form">Giữ
    </button>
  @endif
  <button type="button" class="btn btn-link pull-right" data-dismiss="modal">Hủy bỏ</button>
@stop

@section('script')
  <script>app.load('role/permission')</script>
@stop
