@extends('admin.layouts.auth')
@section('head.title', 'Đăng nhập hệ thống quản trị website')
@section('body.content')
<!-- BEGIN LOGIN FORM -->
<form class="login-form" action="/auth/login" method="post">
	{!! csrf_field() !!}
	<div class="form-title">
		<span class="form-title">Xin chào.</span>
		<span class="form-subtitle">Vui lòng đăng nhập.</span>
	</div>
	<div class="alert alert-danger display-hide">
		<button class="close" data-close="alert"></button>
		<span>
		Nhập email và mật mã đăng nhập. </span>
	</div>
	<div class="form-group">
		<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
		<label class="control-label visible-ie8 visible-ie9">Email</label>
		<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"  value="{{ old('email') }}"/>
	</div>
	<div class="form-group">
		<label class="control-label visible-ie8 visible-ie9">Mật mã</label>
		<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Mật mã" name="password"/>
	</div>
	<div class="form-actions">
		<button type="submit" class="btn btn-primary btn-block uppercase">Đăng nhập</button>
	</div>
	<div class="form-actions">
		<div class="pull-left">
			<label class="rememberme check">
			<input type="checkbox" name="remember" value="1"/>Nhớ đăng nhập </label>
		</div>
		<div class="pull-right forget-password-block">
			<a href="javascript:;" id="forget-password" class="forget-password">Quên mật mã?</a>
		</div>
	</div>
	<div class="create-account">
		<p>
			<a href="javascript:;" id="register-btn">Tạo tài khoản mới</a>
		</p>
	</div>
</form>
<!-- END LOGIN FORM -->
<!-- BEGIN FORGOT PASSWORD FORM -->
<form class="forget-form" action="/password/email" method="post">
	{!! csrf_field() !!}
	<div class="form-title">
		<span class="form-title">Bạn quên mật mã ?</span>
		<span class="form-subtitle">Nhập địa chỉ email để khôi phục mật mã.</span>
	</div>
	<div class="form-group">
		<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
	</div>
	<div class="form-actions">
		<button type="button" id="back-btn" class="btn btn-default">Trở về</button>
		<button type="submit" class="btn btn-primary uppercase pull-right">Gửi</button>
	</div>
</form>
<!-- END FORGOT PASSWORD FORM -->
@endsection