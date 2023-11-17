@extends('admin.layouts.app')

@section('javascript')
'default/index'
@stop

@section('content')
<div class="alert alert-warning" role="alert">
  <span>Chào mừng bạn đến với nền tảng quản lý LaravelBBS</span>
  <a href="#">Cài đặt hệ thống</a>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="panel panel-default panel-150">
      <div class="panel-heading">
        <h3 class="panel-title">Thông báo của quản trị viên</h3>
      </div>
      <div class="panel-body">
        <ul class="admin-notice-list">
          <div class="empty">Chưa có thông báo nào</div>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="panel panel-default panel-150">
      <div class="panel-heading">
        <h3 class="panel-title">Thanh trạng thái</h3>
      </div>
      <div class="panel-body" id="system-status" data-url="#">
        <ul class="subfield-list four-subfield clearfix">
          <li>
            <div class="title">Phiên bản hệ thống</div>
            <div class="info">
              <span class="glyphicon glyphicon-ok-sign text-success"></span>
              <span class="text-lg">v0.0.1</span>
            </div>
          </li>
          <li>
            <div class="title">Unknown</div>
            <div class="info">
              <span class="glyphicon glyphicon-ok-sign text-success"></span>
              <span class="text-lg">Đã cập nhật</span>
            </div>
          </li>
          <li>
            <div class="title">Unknown</div>
            <div class="info">
              <span class="status-card-warp">
                <span class="glyphicon glyphicon-exclamation-sign text-danger"></span>
                <a class="text-lg link-underline text-danger" href="#"> Chưa mở</a>
                <div class="status-card">
                  <ul class="open-serve-list">
                    <li>
                      <span class="key">1</span>
                      <a href="#" class="value value-danger"><i class="dot"></i>Chưa mở</a>
                    </li>
                    <li>
                      <span class="key">云文档</span>
                      <a href="#" class="value value-danger"><i class="dot"></i>Chưa mở</a>
                    </li>
                    <li>
                      <span class="key">云直播</span>
                      <a href="#" class="value value-danger"><i class="dot"></i>Chưa mở</a>
                    </li>
                    <li>
                      <span class="key">云短信</span>
                      <a href="#" class="value value-danger"><i class="dot"></i>Chưa mở</a>
                    </li>
                    <li>
                      <span class="key">云搜索</span>
                      <a href="#" class="value value-danger"><i class="dot"></i>Chưa mở</a>
                    </li>
                    <li><span class="key">云问答</span><a href="#" class="value value-danger"><i class="dot"></i>Chưa mở</a>
                    </li>
                  </ul>
                </div>
              </span>
            </div>
          </li>
          <li>
            <div class="title">Unknown</div>
            <div class="info">
              <span class="glyphicon glyphicon-exclamation-sign text-danger"></span>
              <a href="#" class="text-lg link-underline text-danger"> Chưa mở</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading clearfix">
    <h3 class="panel-title">
      Dữ liệu ngày nay
      <span data-toggle="popover" class="glyphicon glyphicon-question-sign color-gray text-sm js-today-data-popover"
        data-original-title="" title=""></span>
      <div class="popover-content hidden">
        <div class="popover-item">
          <div class="title">Người dùng đăng nhập</div>
          <div class="content">Người dùng đăng nhập hoạt động trong vòng 15 phút</div>
        </div>
        <div class="popover-item">
          <div class="title">Tổng số trực tuyến</div>
          <div class="content">Số lượng người dùng hoạt động trong vòng 15 phút, bao gồm cả người dùng đã đăng nhập và người dùng chưa đăng nhập</div>
        </div>
        <div class="popover-item">
          <div class="title">Đăng kí mới</div>
          <div class="content">Số lượng người dùng mới trên nền tảng, bao gồm tự đăng ký, đăng ký và nhập của bên thứ ba</div>
        </div>
        <div class="popover-item">
          <div class="title">Thêm chủ đề</div>
          <div class="content">Số chủ đề được đăng hôm nay</div>
        </div>
        <div class="popover-item">
          <div class="title">Thêm phản hồi</div>
          <div class="content">Số lượng câu trả lời được đăng ngày hôm nay</div>
        </div>
        <div class="popover-item">
          <div class="title">Tổng số câu trả lời chưa được trả lời</div>
          <div class="content">Tổng số câu hỏi chưa được trả lời cho đến nay</div>
        </div>
      </div>
    </h3>
  </div>
  <div class="panel-body" id="site-overview-table" data-url="#">
    <ul class="subfield-list five-subfield clearfix">
      <li>
        <div class="title">Người dùng đăng nhập</div>
        <span class="number"><a href="#" target="_blank">0</a></span>
        <p>Tổng số trực tuyến: <a href="#" target="_blank">0</a></p>
      </li>
      <li>
        <div class="title">Đăng kí mới</div>
        <span class="number">1</span>
        <p>Tổng cộng: 1</p>
      </li>
      <li>
        <div class="title">Thêm chủ đề</div>
        <span class="number"> 0</span>
        <p>Tổng số du khách: 0</p>
      </li>
      <li>
        <div class="title">Thêm phản hồi</div>
        <span class="number"> 0</span>
        <p>Tổng số du khách: 0</p>
      </li>
      <li>
        <div class="title">Không có câu trả lời cho chủ đề</div>
        <span class="number">0</span>
        <p>Tổng cộng: 0</p>
      </li>
    </ul>
  </div>
</div>
<div class="row">
  <div class="col-md-4">
    <div class="panel panel-default panel-420 js-course-question-list">
      <div class="panel-heading">
        <a class="pull-right" href="#">更多</a>
        <h3 class="panel-title">最新问答</h3>
      </div>
      <div class="panel-body">
        <div class="empty">暂无最新未回复问答</div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="panel panel-default panel-420">
      <div class="panel-heading">
        <a href="#" class="pull-right">Hơn</a>
        <h3 class="panel-title">Những đánh giá gần đây</h3>
      </div>
      <div class="panel-body">
        <table class="table table-condensed table-noborder table-overflow">
          <thead>
            <tr>
              <th width="63%">Nội dung bình luận</th>
              <th width="15%">Điểm</th>
              <th width="22%">Vận hành</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <div class="empty">Chưa có bình luận nào</div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="panel panel-default search-panel panel-420">
      <div class="panel-heading">
        <h3 class="panel-title">
        Tìm kiếm phổ biến
          <small>7 ngày qua</small>
        </h3>
      </div>
      <div class="panel-body">
        <div class="empty">
          <a target="_blank" href="#">Từ khóa tìm kiếm phổ biến</a>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="cloud-ad" class="admin-cloud-ad modal fade text-center" aria-hidden="true" data-backdrop="static" tabindex="-1"
  role="dialog" data-url="#">
  <div class="modal-dialog">
    <a href="" target="_blank">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </a>
  </div>
</div>
@stop
