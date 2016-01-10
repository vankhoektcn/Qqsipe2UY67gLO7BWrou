<!DOCTYPE HTML>
<html>
<head>
{!! SEOMeta::generate() !!}
{!! OpenGraph::generate() !!}
{!! Twitter::generate() !!}
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/frontend/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="/admin/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="/frontend/css/style.css" rel="stylesheet" type="text/css">
<link href="/frontend/css/right-menu.css" rel="stylesheet" type="text/css">
<link href="/frontend/css/flexslider.css" rel="stylesheet" type="text/css">
<link href="/frontend/css/project.css" rel="stylesheet" type="text/css">
  <script src="/frontend/js/jquery1.11.3.min.js"></script>
  <!--<script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>-->
  <script src="/frontend/js/jquery-ui.min.js" type="text/javascript"></script>
  <script src="/frontend/js/bootstrap.min.js"></script>
  <script src="/frontend/js/crazyify.core.js"></script>
<!-- <link rel="stylesheet" href="/frontend/css/bootstrap.css">
  <script src="/frontend/js/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js"></scr‌​ipt>
  <script src="/frontend/js/bootstrap.min.js"></script>
  <script src="/frontend/js/crazyify.core.js"></script>
    
<link href="/admin/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="/frontend/css/right-menu.css" rel="stylesheet" type="text/css">
{!! Minify::stylesheet(array('/frontend/css/bootstrap.css', '/frontend/css/style.css','/frontend/css/flexslider.css', '/frontend/css/custom.css')) !!}
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 -->
<style>
  </style>
</head>
<body style="position: relative;"  data-spy="scroll" data-target="#rightMenuScrollspy" data-offset="15">

<div class="menu-right">
	<nav class="rightMenuScrollspy" id="rightMenuScrollspy">
	  <ul class="nav nav-pills nav-stacked" data-spy="affix" data-offset-top="205">
        @if (!empty($project->content))
            <li><a href="#project-about"><i class="fa fa-phone"></i>Tổng quan</a></li>
        @endif
        @foreach ($project_parts as $key => $part)
            <li><a href="#{{ $part->link }}"><i class="{{ $part->fa_icon }}"></i>{{ $part->name }}</a></li>
        @endforeach
	  </ul>
	</nav>
</div>
<!-- header -->
<div class="main-container">
	<div id="top-header">
		<div class="container">
			<ul class="top-menu">
				<li>
					<a href="javascript:;"><i class="{{ $project->hotline_fa_icon }} greenMain"></i>
					<a id="a-hotline" href="tel:{{$project->hotline}}"><span>Hotline : {{$project->hotline}}</span></a>
				</li>
			</ul>
		</div>
	</div>
	<div class="header">
		<div class="full container" style="background-color: #8BCA30;">
			
			<div id="logo" class="col-sm-3">
				<h1 id="site_title"><a href="http://myvanland.com" style="background: #8BCA30 url(<?php echo $project->logo; ?>) center no-repeat;background-size: 65%;"></a></h1>
			</div>
			<div class="head-nav">
				<span class="menu"> </span>
					<ul class="cl-effect-1" id="project-menu">
						<!-- <li class="{{ Route::is('homepage') ? 'active' : null }}"><a class="scroll" href="#project-apartment">Tổng quan</a></li>
						<li><a class="scroll" href="#project-location">Vị trí</a></li>
						<li><a class="scroll" href="#project-amenity">Tiện ích</a></li>
						<li><a class="scroll" href="#project-diagrams">Mặt bằng</a></li>
						<li><a class="scroll" href="#project-template">Nhà mẫu</a></li>
						<li><a class="scroll" href="#project-real">Thực tế</a></li>
						<li><a class="scroll" href="#project-checkout">Thanh toán</a></li>
						<li><a href="{{ route('contact') }}">Liên hệ</a></li> -->
                        @if (!empty($project->content))
                            <li><a class="scroll" href="#project-about">Tổng quan</a></li>
                        @endif
						@foreach ($project_parts as $key => $part)
                            <li><a class="{{ $part->class }}" href="#{{ $part->link }}">{{ $part->name }}</a></li>
                        @endforeach
						<div class="clearfix"></div>
					</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
    @if (!empty($project->show_slide))
	<div class="flexslider" id="main-flexslider">
		<ul class="slides">
            @foreach ($project_images as $key => $image)
			<li>
				<img src="{{$image->link}}" />
				<p class="flex-caption">{{$image->caption}}</p>
			</li>
            @endforeach
			<!-- <li>
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
			</li> -->
		</ul>
	</div>
    @endif
<!-- header -->
</div>

<div class="container page-content" id="page-content">
	<div class="page-content-mobile">
		<div class="col-md-9 bann-right pull-left">
			@yield('body.content')
		</div>
		<div class="col-md-3 bann-left pull-right">
			@include('frontend.layouts.project_rightbox')
		</div>
	</div>
</div>
<div id="footer-main">
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-xs-6">
                <div class="footer-box">
                    <h4>Liên kết</h4>
                    <ul class="help-link">
                        <li><a title="Hợp tác môi giới" href="/mg">Hợp tác môi giới</a></li>
                        <li><a title="Góp ý trang tìm kiếm" ref="nofollow" target="_blank" href="https://docs.google.com/forms/d/1ONSyRk6SX0PduKseMEVKUdOMzwo1liRYjNgp2jCc4G4/viewform">Góp ý trang tìm kiếm</a></li>
                        <li><a title="Góp ý trang đăng tin" ref="nofollow" target="_blank" href="https://docs.google.com/forms/d/1hWb59BRzQEsGGLiJ9I9LeCzJZNOWWXYrI60nNLQzxkY/viewform">Góp ý trang đăng tin</a></li>
                        <li><a title="Chính sách" href="/quy-che">Quy chế hoạt động</a></li>
                    </ul>
                </div>
                <!-- <div class="footer-box">
                    <h4 style="margin-top: 25px">Follow Us</h4>
                    <ul class="social">
                        <li class="icon"><a target="_blank" title="Facebook kiến thức cho môi giời bất động sản" class="icon-facebook-circled" href="https://www.facebook.com/groups/Kienthucbatdongsan/"></a></li>
                        <li class="icon"><a target="_blank" title="Blog" class="icon-chat" href="http://batdongsan.myvanland.com.vn/"></a></li>
                        <li class="icon"><a target="_blank" title="Twitter" class="icon-twitter-circled" href="https://twitter.com/MyvanLandVn/"></a></li>
                    </ul>
                </div> -->
            </div>
            <div class="col-md-3 col-xs-6">
                <div class="footer-box">
                    <h4>Loại Bất Động Sản</h4>
                    <ul class="help-link">
                        <li><a title="" href="/nha">Nhà riêng</a></li>
                        <li><a title="" href="/phong-cho-thue">Phòng cho thuê</a></li>
                        <li><a title="" href="/can-ho">Căn hộ</a></li>
                        <li><a title="" href="/du-an/danh-sach">Dự án</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-xs-6">
                <div class="footer-box">
                    <h4>Chức năng</h4>
                    <ul class="help-link">
                        <li><a href="/form/can-tim-nha">Tìm nhà cùng MyvanLand</a></li>
                        <li><a href="/kien-thuc">Kiến thức bất động sản</a></li>
                        <li><a target="_blank" href="http://thamdinhgia.myvanland.com.vn/">Tài liệu thẩm định giá</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-xs-12">
                <div class="footer-box">
                    <h4>MyvanLand.com.vn</h4>
                    <p>Là trang truyền thông bất động sản của Việt Nam, phát triển dựa trên nền tảng công nghệ mới - ứng dụng bản đồ,  hỗ trợ tối đa công cụ tìm kiếm và đăng tin.</p>
                    <a target="_blank" href="http://online.gov.vn/HomePage/WebsiteDisplay.aspx?DocId=13062"><img style="width: 100px" alt="" title="" src="http://online.gov.vn/seals/EkspFagIEJWDc1mAJeRDkA==.jpgx"></a>
                </div>
            </div>
            <div class="col-xs-12 district-link text-center">
                <a href="/du-an/danh-sach?dist=10">Quận 1</a>
                <a href="/du-an/danh-sach?dist=14">Quận 2</a>
                <a href="/du-an/danh-sach?dist=15">Quận 3</a>
                <a href="/du-an/danh-sach?dist=16">Quận 4</a>
                <a href="/du-an/danh-sach?dist=17">Quận 5</a>
                <a href="/du-an/danh-sach?dist=18">Quận 6</a>
                <a href="/du-an/danh-sach?dist=19">Quận 7</a>
                <a href="/du-an/danh-sach?dist=20">Quận 8</a>
                <a href="/du-an/danh-sach?dist=21">Quận 9</a>
                <a href="/du-an/danh-sach?dist=11">Quận 10</a>
                <a href="/du-an/danh-sach?dist=12">Quận 11</a>
                <a href="/du-an/danh-sach?dist=13">Quận 12</a>
                <a href="/du-an/danh-sach?dist=24">Thủ Đức</a>
                <a href="/du-an/danh-sach?dist=3">Bình Thạnh</a>
                <a href="/du-an/danh-sach?dist=9">Phú Nhuận</a>
                <a href="/du-an/danh-sach?dist=12">Tân Bình</a>
                <a href="/du-an/danh-sach?dist=23">Tân Phú</a>
                <a href="/du-an/danh-sach?dist=6">Gò Vấp</a>
            </div>
            <div class="col-xs-12 text-center">
                <div class="copyright">© 2015 Bản quyền thuộc về&nbsp; <a target="_blank" href="http://www.myvanland.com.vn" title="MyvanLand.com.vn">MyvanLand.com.vn</a></div>
            </div>
        </div>
    </div>
</footer>
</div>
<!-- {!! Minify::javascript(array('/frontend/js/jquery.appear.js' , '/frontend/js/jquery.shuffle.modernizr.js', '/frontend/js/jquery.shuffle.js' , '/frontend/js/owl.carousel.js', '/frontend/js/jquery.ajaxchimp.min.js','/frontend/js/responsiveslides.min.js','/frontend/js/jquery.flexisel.js','/frontend/js/jquery.flexslider.js', '/frontend/js/masterpage.js')) !!} -->
{!! Minify::javascript(array('/frontend/js/responsiveslides.min.js','/frontend/js/jquery.flexisel.js','/frontend/js/jquery.flexslider.js', '/frontend/js/masterpage.js')) !!}
@yield('body.js')
</body>
</html>