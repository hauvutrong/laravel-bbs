@if (count($errors) > 0)
  <div class="alert alert-danger">
    <div class="mt-2"><b>Đã xảy ra lỗi:</b></div>
    <ul class="mt-2 mb-2">
      @foreach ($errors->all() as $error)
        <li><i class="fa fa-remove"></i> {{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
