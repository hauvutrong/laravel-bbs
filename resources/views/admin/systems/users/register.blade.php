@extends('admin.layouts.app')

@section('title', 'Thiết lập người dùng')

@section('sidebar')
  @php($sidebar = 'system')
@endsection

@section('content')
  <form class="form-horizontal" id="register-settings-form" method="post" novalidate="novalidate"
        data-save-url="{{ route('admin.systems.users.register') }}">

    <fieldset>
      <legend>Cài đặt đăng ký</legend>
      <div class="form-group">
        <div class="col-md-3 control-label">
          <label>Chế độ đăng ký người dùng</label>
        </div>
        <div class="controls col-md-8">
          <div class="btn-group">
            <button type="button" class="btn btn-default model btn-primary" data-modle="email">Đăng ky email</button>
            <button type="button" class="btn btn-default  model" data-modle="mobile">Đăng ký điện thoại của bạn</button>
            <button type="button" class="btn btn-default  model" data-modle="email_or_mobile">Đăng ký qua email hoặc điện thoại di động</button>
            <button type="button" class="btn btn-default  model" data-modle="closed">Khép kín</button>
          </div>
          <input type="hidden" value="email" name="register_mode">
          <div class="help-block">Chỉ sau khi bật SMS trên đám mây, bạn mới có thể sử dụng "Đăng ký điện thoại di động" hoặc "Đăng ký email hoặc điện thoại di động"</div>
        </div>
      </div>


      <div class="email-content">
        <div class="form-group">
          <div class="col-md-3 control-label">
            <label>Đăng nhập xác minh email</label>
          </div>
          <div class="controls col-md-8 radios">
            <label><input type="radio" name="email_enabled" value="opened" data-widget-cid="widget-2"
                          data-explain="Sau khi bật, người dùng có địa chỉ email chưa được xác minh sẽ không thể đăng nhập. Hãy đảm bảo rằng máy chủ email đã được thiết lập trước."> Bật</label>
            <label><input type="radio" name="email_enabled" value="closed" checked="checked"
                          data-explain="Sau khi bật, người dùng có địa chỉ email chưa được xác minh sẽ không thể đăng nhập. Hãy đảm bảo rằng máy chủ email đã được thiết lập trước.">Khép kín</label>
            <button type="button" class="btn btn-primary btn-sm js-email-send-check hidden"
                    data-url="">Kiểm tra dịch vụ email
            </button>
            <div class="alert alert-info js-email-status hidden" data-url="/app.php/admin/setting/mailer" role="alert"
                 style="padding: 5px;margin-bottom: 0">Phát hiện.....
            </div>
            <div class="help-block">Sau khi bật, người dùng có địa chỉ email chưa được xác minh sẽ không thể đăng nhập. Hãy đảm bảo rằng máy chủ email đã được thiết lập trước.</div>
          </div>
        </div>

        <input type="hidden" name="setting_time" value="">

        <div class="form-group">
          <div class="col-md-3 control-label">
            <label for="email_activation_title">Tiêu đề email kích hoạt người dùng mới</label>
          </div>
          <div class="controls col-md-8">
            <input type="text" id="email_activation_title" name="email_activation_title" class="form-control"
                   value="" data-explain="">
            <div class="help-block" style="display:none;"></div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-3 control-label">
            <label for="email_activation_body">Nội dung email kích hoạt người dùng mới</label>
          </div>
          <div class="controls col-md-8">
            <textarea id="email_activation_body" name="email_activation_body" class="form-control" rows="5"></textarea>
            <div class="help-block">
              <div>Mô tả biến:</div>
              <ul>
                <li>Biệt hiệu cho người dùng người nhận</li>
                <li>Cho tên trang web</li>
                <li>Là địa chỉ của trang web</li>
                <li>Xác minh địa chỉ cho email</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-3 control-label">
          <label>Cơ chế bảo vệ đăng ký</label>
        </div>

        <div class="controls col-md-8 radios">
          <label>
            <input type="radio" name="register_protective" id="none" value="none" checked="checked"> Không có
          </label>
          <label>
            <input type="radio" name="register_protective" id="low" value="low"> Thấp
          </label>
          <label>
            <input type="radio" name="register_protective" id="middle" value="middle"> Ở giữa
          </label>
          <label>
            <input type="radio" name="register_protective" id="high" value="high"> Cao
          </label>
        </div>

        <button type="button" class="hiddenJsAction" style="display: none"></button>

        <div class="controls col-md-8 mtl col-md-offset-3 dync_visible not_closed_mode low_protective"
             style="display:none;">
          <div class="well">
          Mô tả kế hoạch:
            <p class="mll mtm dync_visible low_protective_email low_protective_email_or_mobile" style="display: none;">
            Xác minh bảo mật cần phải được hoàn thành khi đăng ký qua email.</p>
            <p class="mll mtm dync_visible low_protective_mobile low_protective_email_or_mobile" style="display: none;">
            Không có xác minh bảo mật khi đăng ký qua điện thoại di động để nhận mã xác minh SMS lần đầu tiên.</p>
            <p class="mll mtm dync_visible low_protective_mobile low_protective_email_or_mobile" style="display: none;">
            Trong vòng 60 phút, khi cùng một địa chỉ IP nhận được mã xác minh SMS lần thứ hai, việc xác minh bảo mật cần được hoàn tất.</p>
          </div>
        </div>

        <div class="controls col-md-8 mtl col-md-offset-3 dync_visible not_closed_mode middle_protective"
             style="display:none;">
          <div class="well">
          Mô tả kế hoạch:
            <p class="mll mtm dync_visible middle_protective_email middle_protective_email_or_mobile"
               style="display: none;">Xác minh bảo mật cần phải được hoàn thành khi đăng ký qua email.</p>
            <p class="mll mtm dync_visible middle_protective_mobile middle_protective_email_or_mobile"
               style="display: none;">Không có xác minh bảo mật khi đăng ký qua điện thoại di động để nhận mã xác minh SMS lần đầu tiên.</p>
            <p class="mll mtm dync_visible middle_protective_mobile middle_protective_email_or_mobile"
               style="display: none;">Trong vòng 60 phút, khi cùng một địa chỉ IP nhận được mã xác minh SMS lần thứ hai, việc xác minh bảo mật cần được hoàn tất.</p>
            <p class="mll mtm">Cùng một IP chỉ có thể được đăng ký 30 lần trong vòng 24 giờ.</p>
          </div>
        </div>

        <div class="controls col-md-8 mtl col-md-offset-3 dync_visible not_closed_mode high_protective"
             style="display:none;">
          <div class="well">
          Mô tả kế hoạch:
            <p class="mll mtm dync_visible high_protective_email high_protective_email_or_mobile"
               style="display: none;">Xác minh bảo mật cần phải được hoàn thành khi đăng ký qua email.</p>
            <p class="mll mtm dync_visible high_protective_mobile high_protective_email_or_mobile"
               style="display: none;">Bạn cần hoàn tất xác minh bảo mật khi đăng ký bằng điện thoại di động của mình để nhận mã xác minh SMS.</p>
            <p class="mll mtm">Cùng một IP chỉ có thể được đăng ký 10 lần trong vòng 24 giờ.</p>
            <p class="mll mtm">Chỉ một tài khoản có thể được đăng ký với cùng một IP trong vòng một giờ.</p>
          </div>
        </div>
      </div>

    </fieldset>

    <fieldset>
      <legend>Cài đặt tin nhắn chào mừng</legend>
      <div class="form-group" style="display:none;">
        <div class="col-md-3 control-label">
          <label>Gửi tin nhắn chào mừng</label>
        </div>
        <div class="controls col-md-8 checkboxs">
          <label><input type="checkbox" name="welcome_methods[]" value="message"> Tin nhắn riêng tư trên trang web</label><label><input
              type="checkbox" name="welcome_methods[]" value="email"> e-mail</label>
          <div class="help-block">Khi kích hoạt email cho người dùng mới, phương thức gửi tin nhắn chào mừng qua email không hợp lệ.</div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-3 control-label">
          <label for="welcome_title">Gửi tin nhắn chào mừng</label>
        </div>
        <div class="controls col-md-8 radios">
          <label><input type="radio" name="welcome_enabled" value="opened" checked="checked"> Bật</label><label><input
              type="radio" name="welcome_enabled" value="closed"> Khép kín</label>
          <div class="help-block">Thư chào mừng được gửi tới người dùng mới dưới dạng tin nhắn riêng tư trong trang web.</div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-3 control-label">
          <label for="welcome_sender">Người gửi tin nhắn chào mừng</label>
        </div>
        <div class="controls col-md-8">
          <input type="text" id="welcome_sender" name="welcome_sender" class="form-control" value="测试管理员">
          <div class="help-block">Điển hình là quản trị viên của trang này vui lòng nhập tên người dùng.</div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-3 control-label">
          <label for="welcome_title">Tiêu đề tin nhắn chào mừng</label>
        </div>
        <div class="controls col-md-8">
          <input type="text" id="welcome_title" name="welcome_title" class="form-control" value="">
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-3 control-label">
          <label for="welcome_body">Nội dung tin nhắn chào mừng</label>
        </div>
        <div class="controls col-md-8">
          <textarea id="welcome_body" name="welcome_body" class="form-control" rows="5">
          </textarea>
          <div class="help-block">
            <div>Lưu ý: Độ dài tin nhắn riêng không được vượt quá 1000 ký tự/div>
            <div>Mô tả biến:</div>
            <ul>
              <li> Tên người dùng cho người dùng người nhận</li>
              <li>sitename là tên trang web</li>
              <li>siteurl là địa chỉ của trang web</li>
            </ul>
          </div>
        </div>
      </div>
    </fieldset>

    <fieldset>
      <legend>Cài đặt điều khoản dịch vụ</legend>
      <div class="form-group">
        <div class="col-md-3 control-label">
          <label for="user_terms">Có bật điều khoản dịch vụ hay không</label>
        </div>
        <div class="controls col-md-8 radios">
          <label><input type="radio" name="user_terms" value="opened"> Bật</label>
          <label><input type="radio" name="user_terms" value="closed" checked="checked">Khép kín</label>
          <div class="help-block">Sau khi bật lên, người dùng phải đồng ý với các điều khoản trước khi đăng ký.</div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-3 control-label">
          <label for="user_terms_body">Các điều khoản và điều kiện</label>
        </div>
        <div class="controls col-md-8">
          <textarea class="form-control" id="user_terms_body" rows="16" name="user_terms_body"
                    data-image-upload-url=""
                    style="visibility: hidden; display: none;"></textarea>
        </div>
      </div>
    </fieldset>

    <div class="form-group">
      <div class="col-md-3 control-label"></div>
      <div class="controls col-md-8">
        <button type="submit" class="btn btn-primary">Nộp</button>
      </div>
    </div>
  </form>
@stop
