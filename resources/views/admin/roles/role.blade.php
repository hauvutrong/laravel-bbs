@extends('admin.layouts.modal')

@php($action = \Illuminate\Support\Str::after(current_action(), '@'))
@section('title', $action === 'show' ? 'Xem vai trò' : ($role->id ? 'Chỉnh sửa vai trò' : 'Thêm vai trò'))

@section('action')
@stop

@section('content')
<form class="form-horizontal" id="role-form"
  action="{{ $role->id ? route('admin.roles.update', $role->id) : route('admin.roles.store') }}" method="post"
  novalidate="novalidate">
  @csrf
  @method($role->id ? 'PATCH' : 'POST')

  <div class="row form-group">
    <div class="col-md-2 control-label">
      <label for="name">Tên vai trò</label>
    </div>
    <div class="col-md-7 controls">
      <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $role->name) }}"
        data-url="{{ route('admin.roles.check.name', $role->id) }}" @if ($action==='show' ) readonly @endif>
      <div class="help-block" style="display:none;"></div>
    </div>
  </div>

  <div class="row form-group">
    <div class="col-md-2 control-label">
      <label for="signature">Mã hóa vai trò</label>
    </div>
    <div class="col-md-7 controls">
      <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug', $role->slug) }}"
        data-url="{{ route('admin.roles.check.slug', $role->id) }}" @if ($action==='show' ) readonly @endif>
      <div class="help-block" style="display:none;"></div>
    </div>
  </div>

  <div class="row form-group">
    <div class="col-md-2 control-label">
      <label>Quyền</label>
    </div>
    <div class="col-md-7 controls">
      <ul class="ztree" id="tree">
        <textarea style="display: none;">{{ $menus }}</textarea>
      </ul>
    </div>
  </div>

  <input type="hidden" name="menus" id="menus" value="">
</form>
@stop

@section('footer')
@if ($action !== 'show')
<button class="btn btn-primary pull-right" id="role-btn" type="submit" data-submiting-text="Đang gửi..."
  data-toggle="form-submit" data-target="#role-form">Giữ
</button>
@endif
<button type="button" class="btn btn-link pull-right" data-dismiss="modal">Hủy bỏ</button>
@stop

@section('script')
<script>app.load('role/role')</script>
@stop
