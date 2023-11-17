@extends('admin.layouts.app')

@section('title', 'Quản lý hệ thống')

@section('sidebar')
  @php($sidebar = 'system')
@endsection

@section('content')
  <table class="table table-striped table-bordered">
    <thead>
    <tr>
      <th width="40%">Kiểm tra môi trường</th>
      <th width="20%">Cấu hình đề xuất</th>
      <th width="20%">Tình trạng hiện tại</th>
      <th width="20%">Yêu cầu tối thiểu</th>
    </tr>
    </thead>
    <tbody>
    @if (count($data['environment']))
      @foreach($data['environment'] as $environment)
        <tr>
          <td>
            {{ $environment['name'] }}
            @if (isset($environment['href']))
              【<a href="{{ route($environment['href']) }}" target="_blank">Thêm thông tin</a>】
            @endif
          </td>
          <td>{{ $environment['recommend'] }}</td>
          <td>{{ $environment['current'] }}</td>
          <td>{{ $environment['lowest'] }}</td>
        </tr>
      @endforeach
    @endif
    </tbody>
  </table>

  <table class="table table-hover table-striped table-bordered">
    <thead>
    <tr>
      <th width="60%">Tình hình giao tiếp</th>
      <th width="40%">Tình trạng</th>
    </tr>
    </thead>
    <tbody>
    <tr></tr>
    </tbody>
  </table>

  <div style="overflow:auto;max-height:400px;word-break:break-all;">
    <table class="table table-hover table-striped table-bordered" id="direcory-check-table"
           data-url="">
      <thead>
      <tr>
        <th width="60%">Kiểm tra quyền của tập tin và thư mục hệ thống</th>
        <th width="20%">Tình trạng hiện tại</th>
        <th width="20%">Trạng thái bắt buộc</th>
      </tr>
      </thead>
      <tbody>
      <tr>
        <td colspan="6" style="text-align: center;color: #c1c1c1;padding: 50px;">Quyền thư mục tập tin là bình thường</td>
      </tr>
      </tbody>
    </table>
  </div>

  <div style="overflow:auto;max-height:400px;word-break:break-all;">
    <table class="table table-hover table-striped table-bordered" id="direcory-check-table"
           data-url="">
      <thead>
      <tr>
        <th width="30%">Không gian hệ thống bị chiếm dụng</th>
        <th width="20%">Có sẵn</th>
        <th width="25%">Tổng cộng</th>
        <th width="25%">Còn lại</th>
      </tr>
      </thead>
      <tbody>
      @if (count($data['utilization']))
        @foreach ($data['utilization'] as $utilization)
          <tr>
            <td>
              {{ $utilization['name'] }}
              <a class="glyphicon glyphicon-question-sign text-muted pull-center" data-toggle="popover"
                 data-trigger="hover"
                 data-placement="top" data-content="Thư mục lưu trữ nhật ký các thao tác của người dùng trên trang web" data-original-title="" title="">
              </a>
            </td>
            <td>{{ $utilization['free'] }}</td>
            <td>{{ $utilization['total'] }}</td>
            <td>{{ $utilization['rate'] }}</td>
          </tr>
        @endforeach
      @endif
      </tbody>
    </table>
  </div>
@stop
