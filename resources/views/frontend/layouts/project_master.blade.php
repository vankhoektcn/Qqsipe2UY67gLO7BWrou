<!DOCTYPE HTML>
<html>
<head>
{!! SEOMeta::generate() !!}
{!! OpenGraph::generate() !!}
{!! Twitter::generate() !!}
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="/frontend/css/bootstrap.css">
  <script src="/frontend/js/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js"></scr‌​ipt>
  <script src="/frontend/js/bootstrap.min.js"></script>
  <script src="/frontend/js/crazyify.core.js"></script>
    
<link href="/admin/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="/frontend/css/right-menu.css" rel="stylesheet" type="text/css">
{!! Minify::stylesheet(array('/frontend/css/bootstrap.css', '/frontend/css/style.css','/frontend/css/flexslider.css', '/frontend/css/custom.css')) !!}
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<style>
  </style>
</head>
<body style="position: relative;"  data-spy="scroll" data-target="#rightMenuScrollspy" data-offset="15">

<div class="menu-right">
	<nav class="rightMenuScrollspy" id="rightMenuScrollspy">
	  <ul class="nav nav-pills nav-stacked" data-spy="affix" data-offset-top="205">
	    <li><a href="#section1">Tổng quan</a></li>
	    <li><a href="#section2"><i class="fa fa-map-marker"></i>Vị trí</a></li>
	    <li><a href="#section3">Tiện ích</a></li>
	    <li><a href="#section4">Mặt bằng</a></li>
	    <li><a href="#section3">Nhà mẫu</a></li>
	    <li><a href="#section3">Thực tế</a></li>
	    <li><a href="#section3"><i class="fa fa-money"></i>Thanh toán</a></li>
	  </ul>
	</nav>
</div>
<!-- header -->
<div class="main-container">
	<div id="top-header">
		<div class="container">
			<ul class="top-menu">
				<li>
					<a href="javascript:;"><i class="fa fa-hand-o-right greenMain"></i>
					<a id="a-hotline" href="tel:0932622017"><span>Hotline : 0932 622 017</span></a>
				</li>
			</ul>
		</div>
	</div>
	<div class="header">
		<div class="full container">
			<!-- <div class="barner-top">
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
			</div>-->
			<div id="logo" class="col-sm-3">
				<h1 id="site_title"><a href="http://myvanland.com"></a></h1>
			</div>
			<div class="head-nav col-sm-9">
				<span class="menu"> </span>
					<ul class="cl-effect-1" style="max-height: 40px;">
						<li class="{{ Route::is('homepage') ? 'active' : null }}"><a href="{{ route('homepage') }}">Tổng quan</a></li>
						<li class="{{ ends_with(Request::url(),'gioi-thieu.html') ? 'active' : null }}"><a href="{{ route('article', ['categorykey' => 'bai-viet', 'articlekey' => 'gioi-thieu'])}}">Vị trí</a></li>
						<li class="{{ Route::is('newClass') ? 'active' : null }}"><a href="{{ route('newClass') }}">Tiện ích</a></li>
						<li class="{{ ends_with(Request::url(),'hoc-phi.html') ? 'active' : null }}"><a href="{{ route('article', ['categorykey' => 'bai-viet', 'articlekey' => 'hoc-phi'])}}">Mặt bằng</a></li>
						<li class="{{ ends_with(Request::url(),'gia-su-hien-co.html') ? 'active' : null }}"><a href="{{ route('article', ['categorykey' => 'bai-viet', 'articlekey' => 'gia-su-hien-co'])}}">Nhà mẫu</a></li>
						<li class="{{ ends_with(Request::url(),'tuyen-dung.html') ? 'active' : null }}"><a href="{{ route('article', ['categorykey' => 'bai-viet', 'articlekey' => 'tuyen-dung'])}}">Thực tế</a></li>
						<li class="{{ Route::is('contact') ? 'active' : null }}"><a href="{{ route('contact') }}">Thanh toán</a></li>
						<li class="{{ Route::is('contact') ? 'active' : null }}"><a href="{{ route('contact') }}">Liên hệ</a></li>
						<!-- <li class="{{ ends_with(Request::url(),'tai-khoan-giao-dich.html') ? 'active' : null }}"><a href="{{ route('article', ['categorykey' => 'bai-viet', 'articlekey' => 'tai-khoan-giao-dich'])}}">Tài khoản giao dịch</a></li> -->
						<div class="clearfix"></div>
					</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="flexslider" id="main-flexslider">
		<ul class="slides">
			<li>
				<img src="http://canho-theart.net/wp-content/uploads/2015/08/10-1900x720.jpg" />
				<p class="flex-caption">Adventurer Cheesecake Brownie</p>
			</li>
			<li>
				<img src="http://canho-theart.net/wp-content/uploads/2015/08/23623-1400x530.jpg" />
				<p class="flex-caption">Adventurer Lemon</p>
			</li>
			<li>
				<img src="http://canho-theart.net/wp-content/uploads/2015/08/banner-mat-bang-can-ho-1366x517.jpg" />
				<p class="flex-caption">Adventurer Donut</p>
			</li>
			<li>
				<img src="http://canho-theart.net/wp-content/uploads/2015/08/GiaHoa_Pics-100-1600x1063-1024x680-1024x388.jpg" />
				<p class="flex-caption">Adventurer Caramel</p>
			</li>
		</ul>
	</div>
<!-- header -->
	<div class="container page-content">
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
<!-- {!! Minify::javascript(array('/frontend/js/jquery.appear.js' , '/frontend/js/jquery.shuffle.modernizr.js', '/frontend/js/jquery.shuffle.js' , '/frontend/js/owl.carousel.js', '/frontend/js/jquery.ajaxchimp.min.js','/frontend/js/responsiveslides.min.js','/frontend/js/jquery.flexisel.js','/frontend/js/jquery.flexslider.js', '/frontend/js/masterpage.js')) !!} -->
{!! Minify::javascript(array('/frontend/js/responsiveslides.min.js','/frontend/js/jquery.flexisel.js','/frontend/js/jquery.flexslider.js', '/frontend/js/masterpage.js')) !!}
@yield('body.js')
</body>
</html>