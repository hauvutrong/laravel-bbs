@extends('web.layouts.app')

@section('title', 'noAccess')

@section('content')
  <div class="col-md-4 offset-md-4">
    <div class="card ">
      <div class="card-body">
        @if (Auth::check())
          <div class="alert alert-danger text-center mb-0">
            Tài khoản đăng nhập trước đây không có quyền truy cập về sau.
          </div>
        @else
          <div class="alert alert-danger text-center">
            Vui lòng đăng nhập trước khi tiếp tục.
          </div>

          <a class="btn btn-lg btn-primary btn-block" href="{{ route('login') }}">
            <i class="fas fa-sign-in-alt"></i>
            Đăng nhập
          </a>
        @endif
      </div>
    </div>
  </div>
@stop
