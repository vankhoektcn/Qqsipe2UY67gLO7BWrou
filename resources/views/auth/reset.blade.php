@extends('admin.layouts.auth')
@section('head.title', 'Khôi phục mật mã đăng nhập hệ thống quản trị website')
@section('body.content')
<form class="login-form" action="/password/reset" method="post">
	{!! csrf_field() !!}
	<input type="hidden" name="token" value="{{ $token }}">
	<div class="form-title">
		<span class="form-title">Xin chào.</span>
		<span class="form-subtitle">Vui lòng nhập mật mã mới.</span>
	</div>
	@if (count($errors) > 0)
	<div class="alert alert-danger">
		<button class="close" data-close="alert"></button>
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif
	<div class="form-group">
		<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
		<label class="control-label visible-ie8 visible-ie9">Email</label>
		<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"  value="{{ old('email') }}"/>
	</div>
	<div class="form-group">
		<label class="control-label visible-ie8 visible-ie9">Mật mã</label>
		<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Mật mã" name="password"/>
	</div>
	<div class="form-group">
		<label class="control-label visible-ie8 visible-ie9">Xác nhận mật mã</label>
		<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Xác nhận mật mã" name="password_confirmation"/>
	</div>

	<div class="form-actions">
		<button type="submit" class="btn btn-primary btn-block uppercase">Khôi phục mật mã</button>
	</div>
	<div class="create-account">
		<p>
			<a href="/auth/login" id="register-btn">Đăng nhập</a>
		</p>
	</div>
</form>
@endsection