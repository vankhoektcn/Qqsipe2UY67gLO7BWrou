<!DOCTYPE HTML>
<html>
<head>
{!! SEOMeta::generate() !!}
{!! OpenGraph::generate() !!}
{!! Twitter::generate() !!}
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/admin/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
{!! Minify::stylesheet(array('/frontend/css/bootstrap.css', '/frontend/css/style.css', '/frontend/css/custom.css')) !!}
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
</head>
<body>
<!-- header -->
<div class="container main-container">
	<div class="header">
		<div class="container">
			<div class="barner-top">
				@inject('navigationCategory', 'App\NavigationCategory')
				<?php $navigations = $navigationCategory->findByKey('banner-chinh')->first()->navigations()->where('is_publish', 1)->orderBy('priority')->get(); ?>
				<ul id="banner-slide" class="rslides">
					@foreach ($navigations as $navigation)
						<li><a href="{{ $navigation->link }}"><img src="{{ Image::url($navigation->getFirstAttachment(),1140,200,array('crop')) }}" alt="{{ $navigation->summary }}"></a></li>
					@endforeach
				</ul>
			</div>
	
			<div class="logo">
				<a href="{{ route('homepage') }}"><img src="{{ Image::url('/frontend/images/logo.png',131,48,array('crop')) }}" class="img-responsive" alt=""></a>
			</div>
			
				<div class="head-nav">
					<span class="menu"> </span>
						<ul class="cl-effect-1">
							<li class="{{ Route::is('homepage') ? 'active' : null }}"><a href="{{ route('homepage') }}">Trang chủ</a></li>
							<li class="{{ ends_with(Request::url(),'gioi-thieu.html') ? 'active' : null }}"><a href="{{ route('article', ['categorykey' => 'bai-viet', 'articlekey' => 'gioi-thieu'])}}">Giới thiệu</a></li>
							<li class="{{ Route::is('newClass') ? 'active' : null }}"><a href="{{ route('newClass') }}">Lớp mới</a></li>
							<li class="{{ ends_with(Request::url(),'hoc-phi.html') ? 'active' : null }}"><a href="{{ route('article', ['categorykey' => 'bai-viet', 'articlekey' => 'hoc-phi'])}}">Học phí</a></li>
							<li class="{{ ends_with(Request::url(),'gia-su-hien-co.html') ? 'active' : null }}"><a href="{{ route('article', ['categorykey' => 'bai-viet', 'articlekey' => 'gia-su-hien-co'])}}">Gia sư hiện có</a></li>
							<li class="{{ ends_with(Request::url(),'tuyen-dung.html') ? 'active' : null }}"><a href="{{ route('article', ['categorykey' => 'bai-viet', 'articlekey' => 'tuyen-dung'])}}">Tuyển dụng</a></li>
							<li class="{{ Route::is('contact') ? 'active' : null }}"><a href="{{ route('contact') }}">Liên hệ</a></li>
							<li class="{{ ends_with(Request::url(),'tai-khoan-giao-dich.html') ? 'active' : null }}"><a href="{{ route('article', ['categorykey' => 'bai-viet', 'articlekey' => 'tai-khoan-giao-dich'])}}">Tài khoản giao dịch</a></li>
							<div class="clearfix"></div>
						</ul>
				</div>
					<div class="clearfix"> </div>
		</div>
	</div>
<!-- header -->
	<div class="container">
		@yield('body.content')	
		@include('frontend.layouts.footer')

		<!-- <div class="copyright">
			<p>Trung tâm Gia Sư Hoa Văn</p>
			<p>149/10 Bành Văn Trân, phường 7, Tân Bình, Hồ Chí Minh</p>
			<p>Điện thoại: 0987356213</p>
			<p>© 2015 Gia Su Hoa Van. All rights reserved | Powered by <a target="_blank" href="http://crazyify.com/">crazyify.com</a></p>
		</div> -->
	</div>
</div>
{!! Minify::javascript(array('/frontend/js/jquery.min.js','/frontend/js/responsiveslides.min.js','/frontend/js/jquery.flexisel.js', '/frontend/js/masterpage.js')) !!}
@yield('body.js')
</body>
</html>