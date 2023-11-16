@extends('admin.layouts.app')

@section('title', 'Cài đặt Trang web')

@section('sidebar')
  @php($sidebar = 'system')
@endsection

@section('javascript')
  'setting/info'
@stop

@section('content')
  <form class="form-horizontal" id="site-info-form" method="post"
        action="{{ route('admin.systems.sites.update') }}" novalidate="novalidate">
    @csrf
    @method('PUT')
    <fieldset>
      <div class="form-group">
        <div class="col-md-2 control-label">
          <label for="name">Tên trang web</label>
        </div>
        <div class="col-md-8 controls">
          <input type="text" id="name" name="name" class="form-control" value="{{ $site['name'] }}">
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-2 control-label">
          <label for="slogan">Phụ đề trang web</label>
        </div>
        <div class="col-md-8 controls">
          <input type="text" id="slogan" name="slogan" class="form-control" value="{{ $site['slogan'] }}">
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-2 control-label">
          <label for="url">Tên miền trang web</label>
        </div>
        <div class="col-md-8 controls">
          <input type="text" id="url" name="url" class="form-control" value="{{ $site['url'] }}">
          <p class="help-block">以『<b>http:// or https://</b>』开头</p>
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-2 control-label">
          <label for="logo">Biểu tượng trang web</label>
        </div>
        <div class="col-md-8 controls">
          <div id="site-logo-container"></div>
          <a class="btn btn-default webuploader-container" id="site-logo-upload"
             data-upload-token=""
             data-goto-url="" data-widget-cid="widget-0">
            <div class="webuploader-pick">Tải lên</div>
          </a>
          <button class="btn btn-default" id="site-logo-remove" type="button"
                  data-url="" style="display:none;">Xóa bỏ
          </button>
          <p class="help-block">Vui lòng tải lên hình ảnh ở định dạng jpg, gif, png. Khuyến cáo rằng kích thước hình ảnh logo không được vượt quá 250×50px. Khuyến cáo rằng kích thước hình ảnh không được vượt quá 2 MB.<br><a
              href="" target="_blank">Làm sao để có được một bức tranh phù hợp?</a>Sau khi đặt logo trường học trực tuyến sẽ hiển thị ở bên trái thanh điều hướng trên cùng，<a
              href="" target="_blank">Bấm vào để xem</a></p>
          <input type="hidden" name="logo" value="">
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-2 control-label">
          <label for="favicon">Biểu tượng trình duyệt</label>
        </div>
        <div class="col-md-8 controls">
          <div id="site-favicon-container"></div>
          <a class="btn btn-default webuploader-container" id="site-favicon-upload"
             data-upload-token=""
             data-goto-url="" data-widget-cid="widget-1">
            <div class="webuploader-pick">Tải lên</div>
          </a>
          <button class="btn btn-default" id="site-favicon-remove" type="button"
                  data-url="" style="display:none;">Xóa bỏ
          </button>
          <p class="help-block">Bạn nên tải lên các tệp biểu tượng ở định dạng ico. ico, jpg, gif, png và các định dạng khác được hỗ trợ. Kích thước được đề xuất là 32×32px.<br><a
              href="" target="_blank">Làm sao để có được một bức tranh phù hợp?</a></p>
          <input type="hidden" name="favicon" value="">
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-2 control-label">
          <label for="seo_keywords">Từ khóa SEO</label>
        </div>
        <div class="col-md-8 controls">
          <input type="text" id="seo_keywords" name="seo_keywords" class="form-control"
                 value="{{ $site['seo_keywords'] }}">
          <p class="help-block">Để đặt nhiều từ khóa, vui lòng phân tách chúng bằng dấu phẩy nửa độ rộng ","。</p>
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-2 control-label">
          <label for="seo_description">Thông tin mô tả SEO</label>
        </div>
        <div class="col-md-8 controls">
          <input type="text" id="seo_description" name="seo_description" class="form-control"
                 value="{{ $site['seo_description'] }}">
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-2 control-label">
          <label for="copyright">Chủ sở hữu bản quyền nội dung khóa học</label>
        </div>
        <div class="col-md-8 controls">
          <input type="text" id="copyright" name="copyright" class="form-control" value="{{ $site['copyright'] }}">
          <div class="help-block">Bạn có thể điền tên website hoặc tên công ty.</div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-2 control-label">
          <label for="icp">Số đăng ký ICP</label>
        </div>
        <div class="col-md-8 controls">
          <input type="text" id="icp" name="icp" class="form-control" value="{{ $site['icp'] }}">
        </div>
      </div>
    </fieldset>
    <br>

    <fieldset>
      <legend>Triển khai mã phân tích thống kê website</legend>
      <div class="form-group">
        <div class="col-md-2 control-label">
          <label for="analytics">Mã phân tích thống kê</label>
        </div>
        <div class="col-md-8 controls">
          <textarea id="analytics" name="analytics" class="form-control" rows="4"></textarea>
          <p class="help-block">Mã thống kê là một đoạn mã do phần mềm thống kê website đưa ra để đếm số liệu của website bổ sung mã thống kê.</p>
          <p class="help-block">Bao gồm nguồn khách truy cập vào trang web, trang web nào chuyển đến trang web này, từ khóa nào được tìm kiếm cho trang web, tổng số người truy cập, bao nhiêu người và IP mỗi ngày, thời gian truy cập trung bình là bao nhiêu, v.v.</p>
          <p class="help-block">
          Các công cụ phân tích thống kê có thể phân tích xu hướng tham quan trường học trực tuyến, điều chỉnh chương trình khuyến mãi dựa trên dữ liệu và tối ưu hóa tài nguyên trường học trực tuyến. Nên sử dụng
            <a href="http://tongji.baidu.com" target="_blank">Thống kê của Baidu</a>、
            <a href="http://ta.qq.com/" target="_blank">Phân tích của Tencent</a>Hoặc
            <a target="_blank" href="http://www.umeng.com/">CNZZ。</a>
          </p>
        </div>
      </div>
    </fieldset>

    <fieldset style="display:none;">
      <legend>Trạng thái trang web</legend>

      <div class="form-group">
        <div class="col-md-2 control-label">
          <label>Trạng thái trang web</label>
        </div>
        <div class="col-md-8 controls radios">
          <label>
            <input type="radio" name="status" value="open" @if ($site['status'] === 'open') checked @endif> Mở
          </label>
          <label>
            <input type="radio" name="status" value="closed" @if ($site['status'] === 'closed') checked @endif> Khép kín
          </label>
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-2 control-label">
          <label for="closed_note">Thông báo đóng cửa trang web</label>
        </div>
        <div class="col-md-8 controls">
          <textarea id="closed_note" name="closed_note" class="form-control" rows="4"></textarea>
          <p class="help-block">Khi trang web đóng cửa, thông báo này sẽ được hiển thị khi người dùng truy cập trang web và mã HTML được hỗ trợ.</p>
        </div>
      </div>
    </fieldset>

    <div class="row form-group">
      <div class="controls col-md-offset-2 col-md-8">
        <button type="button" class="btn btn-primary" id="site-info-btn">Nộp</button>
      </div>
    </div>
  </form>
@stop
