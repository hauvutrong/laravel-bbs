@extends('admin.layouts.app')

@section('title', 'Thiết lập người dùng')

@section('sidebar')
  @php($sidebar = 'system')
@endsection

@section('content')
  <form class="form-horizontal" id="login-setting-form" method="post" novalidate="novalidate"
        data-save-url="{{ route('admin.systems.users.login') }}">

    <fieldset>
      <div class="form-group">
        <div class="col-md-3 control-label">
          <label>Hạn chế đăng nhập của người dùng</label>
        </div>
        <div class="controls col-md-8 radios">
          <label><input type="radio" name="login_limit" value="1"> Bật</label>
          <label><input type="radio" name="login_limit" value="0" checked="checked"> Khép kín</label>
          <p class="help-block">Sau khi mở, cùng một tài khoản chỉ có thể đăng nhập ở một nơi (sử dụng một trình duyệt có cùng IP)</p>
        </div>
      </div>
    </fieldset>

    <fieldset>
      <div class="form-group">
        <div class="col-md-3 control-label">
          <label>Đăng nhập với</label>
        </div>
        <div class="controls col-md-8 radios">
          <label><input type="radio" name="enabled" value="1"> Bật</label>
          <label><input type="radio" name="enabled" value="0" checked="checked">Khép kín</label>
        </div>
      </div>
    </fieldset>


    <fieldset>
      <div class="form-group">
        <div class="col-md-3 control-label">
          <label>Bảo vệ đăng nhập người dùng</label>
        </div>
        <div class="controls col-md-8 radios">
          <label><input type="radio" name="temporary_lock_enabled" value="1"> Bật</label>
          <label><input type="radio" name="temporary_lock_enabled" value="0" checked="checked">Khép kín</label>
          <p class="help-block">Khi được bật, người dùng sẽ bị cấm tạm thời nếu nhập sai mật khẩu nhiều lần trong khi đăng nhập. Tính năng này không ảnh hưởng đến khả năng cấm vĩnh viễn người dùng theo cách thủ công của quản trị viên.</p>
        </div>

        <div id="times_and_minutes" class="col-md-8 col-md-offset-3" style="display:none">
          <div class="row">
            <div class="col-md-4 lock-user-text-right">Người dùng liên tục nhập sai mật khẩu</div>
            <div class="controls col-md-2 form-group">
              <input type="text" id="temporary_lock_allowed_times" name="temporary_lock_allowed_times"
                     class="form-control" value="5" data-explain="">
              <div class="help-block" style="display:none;"></div>
            </div>
            <div class="col-md-3 lock-user-text-left">Lần, người dùng sẽ bị cấm tạm thời</div>
          </div>
          <div class="row">
            <div class="col-md-4 lock-user-text-right">
            Nhập sai mật khẩu liên tục cho cùng một IP
            </div>
            <div class="controls col-md-2 form-group">
              <input type="text" id="temporary_lock_allowed_times" name="ip_temporary_lock_allowed_times"
                     class="form-control" value="20">
            </div>
            <div class="col-md-3 lock-user-text-left">
            Nhiều lần, IP sẽ bị chặn tạm thời
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 lock-user-text-right">Đi xuyên qua</div>
            <div class="controls col-md-2 form-group">
              <input type="text" id="temporary_lock_minutes" name="temporary_lock_minutes" class="form-control"
                     value="20" data-explain="">
              <div class="help-block" style="display:none;"></div>
            </div>
            <div class="col-md-3 lock-user-text-left">Sau vài phút, mở khóa người dùng/IP</div>
          </div>
        </div>
      </div>
    </fieldset>
    <fieldset id="third_login" style="display:none">
      <fieldset data-role="oauth2-setting" data-type="weibo">
        <legend>Giao diện đăng nhập weibo</legend>
        <div class="form-group">
          <div class="col-md-3 control-label">
            <label>Giao diện đăng nhập weibo</label>
          </div>
          <div class="controls col-md-8 radios">
            <label><input type="radio" name="weibo_enabled" value="1"> Bật</label>
            <label><input type="radio" name="weibo_enabled" value="0" checked="checked">Khép kín</label>
            <div class="help-block">
              <a href="http://open.weibo.com/authentication/" target="_blank">Đăng ký giao diện đăng nhập weibo</a>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-3 control-label">
            <label for="weibo_key">App Key</label>
          </div>
          <div class="controls col-md-8">
            <input type="text" id="weibo_key" name="weibo_key" class="form-control" value="">
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-3 control-label">
            <label for="weibo_secret">App Secret</label>
          </div>
          <div class="controls col-md-8">
            <input type="text" id="weibo_secret" name="weibo_secret" class="form-control" value="">
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-3 control-label">
            <label for=""></label>
          </div>
          <div class="controls col-md-8 radios">
            <div class="help-block"><a href="#port">Ở bước cuối cùng, vui lòng nhập mã xác minh giao diện đăng nhập ở phía dưới&gt;</a></div>
          </div>
        </div>
      </fieldset>
      <fieldset data-role="oauth2-setting" data-type="qq">
        <legend>Giao diện đăng nhập QQ</legend>
        <div class="form-group">
          <div class="col-md-3 control-label">
            <label>Giao diện đăng nhập QQ</label>
          </div>
          <div class="controls col-md-8 radios">
            <label><input type="radio" name="qq_enabled" value="1"> Bật</label>
            <label><input type="radio" name="qq_enabled" value="0" checked="checked">Khép kín</label>
            <div class="help-block"><a href="http://connect.qq.com/" target="_blank">Đăng ký giao diện đăng nhập QQ</a>
              <a class="pll" href="javascript:;" id="help" data-toggle="popover" data-trigger="click"
                 data-placement="top" title="" data-html="true" data-content="1. Mức độ xác thực tài khoản nền tảng mở QQ của bạn (thông tin cá nhân đã hoàn tất) phải đạt 75% trước khi bạn có thể tạo ứng dụng và thiết lập thông tin đăng nhập của bên thứ ba trên trang web;<br> 2. Địa chỉ gọi lại cần điền trong là:<br><a><span class='text-danger'>XXX</span>/login/bind/qq/callback;<span class='text-danger'>XXX</span>/settings /bind/qq/callback</a>< br>, <span class='text-danger'>XXX</span> là URL hệ thống ES của bạn. Ví dụ: địa chỉ gọi lại của Học viện cá bóng là: http://www.qiqiuyu.com/login/bind/qq/callback; http://www.qiqiuyu.com/settings<br>/bind/qq/callback ;URL phải có www;<br> 3. Đối với nút QQ, hãy tìm ID và nhập thông tin cá nhân của bạn trên nền tảng mở, điền chúng vào phần phụ trợ edusoho và mở thông tin đăng nhập QQ phía trên ID. <br>Nếu quá trình kiểm tra quyền truy cập QQ không thành công và thông báo Nút đăng nhập sai vị trí, vui lòng kiểm tra nền ES [Hệ thống] [Cài đặt người dùng] [Đăng nhập], bật đăng nhập bên thứ ba và bật đăng nhập QQ.
" data-original-title="Truy cập trợ giúp:">Truy cập trợ giúp</a>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-3 control-label">
            <label for="qq_key">App ID</label>
          </div>
          <div class="controls col-md-8">
            <input type="text" id="qq_key" name="qq_key" class="form-control" value="">
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-3 control-label">
            <label for="qq_secret">App Key</label>
          </div>
          <div class="controls col-md-8">
            <input type="text" id="qq_secret" name="qq_secret" class="form-control" value="">
          </div>
        </div>
      </fieldset>
      <fieldset data-role="oauth2-setting" data-type="weixinweb">
        <legend>Giao diện đăng nhập web WeChat</legend>
        <div class="form-group">
          <div class="col-md-3 control-label">
            <label>Giao diện đăng nhập web WeChat</label>
          </div>
          <div class="controls col-md-8 radios">
            <label><input type="radio" name="weixinweb_enabled" value="1"> Bật</label>
            <label><input type="radio" name="weixinweb_enabled" value="0" checked="checked"> Khép kín</label>
            <div class="help-block">Vui lòng đến trước <a target="_blank" href="https://open.weixin.qq.com">Nền tảng mở WeChat</a> Áp dụng<a
                target="_blank"
                href="https://open.weixin.qq.com/cgi-bin/frame?t=home/web_tmpl&amp;lang=zh_CN">Phát triển ứng dụng trang web</a>, sau khi kích hoạt, phía PC của trang web sẽ hỗ trợ đăng nhập mã quét WeChat;
            </div>
            <div class="help-block">
            Điều kiện đăng ký: Đăng ký trên nền tảng mở WeChat và hoàn tất xác thực tên thật.
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-3 control-label">
            <label for="weixinweb_key">App ID</label>
          </div>
          <div class="controls col-md-8">
            <input type="text" id="weixinweb_key" name="weixinweb_key" class="form-control" value="">
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-3 control-label">
            <label for="weixinweb_secret">App Secret</label>
          </div>
          <div class="controls col-md-8">
            <input type="text" id="weixinweb_secret" name="weixinweb_secret" class="form-control" value="">
            <div class="help-block">ID APP và Bí mật APP đến từ<a target="_blank" href="https://open.weixin.qq.com">Nền tảng mở WeChat</a>Ứng dụng trang web đã tạo
            </div>
          </div>
        </div>
      </fieldset>
      <fieldset data-role="oauth2-setting" data-type="weixinmob">
        <legend>Chia sẻ giao diện đăng nhập trong WeChat</legend>
        <div class="form-group">
          <div class="col-md-3 control-label">
            <label>Chia sẻ giao diện đăng nhập trong WeChat</label>
          </div>
          <div class="controls col-md-8 radios">
            <label><input type="radio" name="weixinmob_enabled" value="1"> Bật</label>
            <label><input type="radio" name="weixinmob_enabled" value="0" checked="checked"> Khép kín</label>
            <div class="help-block">Sau khi kích hoạt, bạn có thể sử dụng WeChat ID để đăng ký hoặc đăng nhập nhanh vào trang web trong Ứng dụng WeChat trên điện thoại di động của mình.</div>
            <div class="help-block">
            Cách kích hoạt:
              1.Được chứng nhận<a target="_blank" href="https://mp.weixin.qq.com">Tài khoản dịch vụ WeChat</a>；
              2.Được chứng nhận<a target="_blank" href="https://open.weixin.qq.com">Nền tảng mở WeChat</a>số tài khoản;
              3.Tài khoản dịch vụ bị ràng buộc với<a target="_blank" href="https://open.weixin.qq.com">Nền tảng mở WeChat</a>。
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-3 control-label">
            <label for="weixinmob_key">App ID</label>
          </div>
          <div class="controls col-md-8">
            <input type="text" id="weixinmob_key" name="weixinmob_key" class="form-control" value="">
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-3 control-label">
            <label for="weixinmob_secret">App Secret</label>
          </div>
          <div class="controls col-md-8">
            <input type="text" id="weixinmob_secret" name="weixinmob_secret" class="form-control" value="">
            <div class="help-block">ID APP và Bí mật APP đến từ
              <a target="_blank" href="https://mp.weixin.qq.com/">Trong tài khoản dịch vụ nền tảng công khai WeChat</a>, hãy đi tới [Phát triển]-[Cấu hình cơ bản]-[ID nhà phát triển] ở cột bên trái.
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-3 control-label">
            <label for="weixinmob_mp_secret">Mã xác minh tập tin MP</label>
          </div>
          <div class="controls col-md-8">
            <input type="text" id="weixinmob_mp_secret" name="weixinmob_mp_secret" class="form-control" value="">
            <p class="help-block">Vui lòng điền nội dung vào file MP_verify do WeChat cung cấp</p>
          </div>
        </div>
      </fieldset>

      <fieldset>
        <legend id="port">Mã xác minh giao diện đăng nhập</legend>
        <div class="form-group">
          <div class="col-md-3 control-label">
            <label for="verify_code">Mã xác nhận</label>
          </div>
          <div class="controls col-md-8">
            <textarea id="verify_code" name="verify_code" class="form-control" rows="5"
                      data-explain="Khi đăng ký giao diện đăng nhập của bên thứ ba, bạn sẽ được yêu cầu xác minh tên miền trang web của mình. Vui lòng dán mã xác minh có liên quan vào đây, sau đó gửi và lưu."></textarea>
            <div class="help-block">Khi đăng ký giao diện đăng nhập của bên thứ ba, bạn sẽ được yêu cầu xác minh tên miền trang web của mình. Vui lòng dán mã xác minh có liên quan vào đây, sau đó gửi và lưu.</div>
          </div>
        </div>
      </fieldset>
    </fieldset>
    <div class="form-group">
      <div class="controls col-md-offset-3 col-md-8">
        <button type="submit" class="btn btn-primary">Nộp</button>
      </div>
    </div>
  </form>
@stop
