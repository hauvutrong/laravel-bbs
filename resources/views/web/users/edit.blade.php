@extends('web.layouts.app')

@section('title', $user->name . ' - Chỉnh sửa thông tin')

@section('content')
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h4><i class="fa fa-edit"></i> Chỉnh sửa hồ sơ</h4>
      </div>

      <div class="card-body">
        <form action="{{ route('users.update', $user->id) }}" method="POST" accept-charset="UTF-8"
          enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-group row">
            <label for="name-field" class="col-sm-4 col-form-label text-md-right">Tên tài khoản</label>

            <div class="col-md-6">
              <input id="name-field" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                name="name" value="{{ old('name', $user->name) }}">
              @if ($errors->has('name'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('name') }}</strong>
              </span>
              @endif
            </div>
          </div>

          <div class="form-group row">
            <label for="email-field" class="col-sm-4 col-form-label text-md-right">Hộp thư</label>

            <div class="col-md-6">
              <input id="email-field" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                name="email" value="{{ old('email', $user->email) }}">
              @if ($errors->has('email'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
              @endif
            </div>
          </div>

          <div class="form-group row">
            <label for="introduction-field" class="col-md-4 col-form-label text-md-right">Thông tin cá nhân</label>

            <div class="col-md-6">
              <textarea id="introduction-field"
                class="form-control{{ $errors->has('introduction') ? ' is-invalid' : '' }}"
                name="introduction">{{ old('introduction', $user->introduction) }}</textarea>
              @if ($errors->has('introduction'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('introduction') }}</strong>
              </span>
              @endif
            </div>
          </div>

          <div class="form-group row">
            <label for="avatar-field" class="col-md-4 col-form-label text-md-right">Ảnh đại diện</label>

            <div class="col-md-6">
              <input type="file" class="form-control{{ $errors->has('avatar') ? ' is-invalid' : '' }}" name="avatar">
              @if ($errors->has('avatar'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('avatar') }}</strong>
              </span>
              @endif
              @if ($user->avatar)
              <br>
              <img class="img-thumbnail" src="{{ cdn_aliyun($user->avatar) }}" alt="avatar">
              @endif
            </div>
          </div>

          <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
              <button type="submit" class="btn btn-outline-primary">
                <i class="fa fa-save"></i> Lưu
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@stop
