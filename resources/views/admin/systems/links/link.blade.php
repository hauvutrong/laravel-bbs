@extends('admin.layouts.modal')

@section('title', $link->id ? 'Chỉnh sửa liên kết thân thiện' : 'Thêm liên kết thân thiện'))

@section('content')
  <form class="form-horizontal" id="navigation-form" method="post"
        action="{{ $link->id ? route('admin.systems.links.update', $link->id) : route('admin.systems.links.store') }}"
        novalidate="novalidate">
    @csrf
    @method($link->id ? 'PATCH' : 'POST')

    <div class="row form-group">
      <div class="col-md-3 control-label"><label for="name">Tên liên kết</label></div>
      <div class="col-md-8 controls">
        <input class="form-control" type="text" id="name" name="name" value="{{ old('name', $link->name) }}"
               data-explain="">
        <div class="help-block" style="display:none;"></div>
      </div>
    </div>

    <div class="row form-group">
      <div class="col-md-3 control-label"><label for="href">Địa chỉ liên kết</label></div>
      <div class="col-md-8 controls">
        <input class="form-control" type="text" id="href" name="href" value="{{ old('href', $link->href) }}"
               placeholder="http://">
      </div>
    </div>

    <div class="row form-group">
      <div class="col-md-3 control-label"><label>Mở cửa sổ mới</label></div>
      <div class="col-md-8 controls radios">
        <div id="isNewWin">
          <input type="radio" name="isNewWin" value="0" checked="checked">
          <label>KHÔNG</label>
          <input type="radio" name="isNewWin" value="1">
          <label>Đúng</label>
        </div>
      </div>
    </div>

    <div class="row form-group">
      <div class="col-md-3 control-label">
        <label>Tình trạng</label>
      </div>
      <div class="col-md-8 controls radios">
        <div id="isOpen">
          <input type="radio" name="isOpen" value="1" checked="checked">
          <label>Bật</label>
          <input type="radio" name="isOpen" value="0">
          <label>Vô hiệu hóa</label>
        </div>
      </div>
    </div>

  </form>
@stop

@section('footer')
  <button type="button" class="btn btn-link" data-dismiss="modal">Hủy bỏ</button>
  <button id="navigation-save-btn" data-submiting-text="正在提交..." type="submit" class="btn btn-primary"
          data-toggle="form-submit" data-target="#navigation-form">Giữ
  </button>
@stop

@section('script')
  <script>app.load('setting/link')</script>
@stop
