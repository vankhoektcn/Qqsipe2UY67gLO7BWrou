<!DOCTYPE HTML>
<html>
<head>
{!! SEOMeta::generate() !!}
{!! OpenGraph::generate() !!}
{!! Twitter::generate() !!}
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<!-- <link href="/frontend/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="/admin/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="/frontend/css/toastr.min.css" rel="stylesheet" type="text/css">
<link href="/frontend/css/style.css" rel="stylesheet" type="text/css">
<link href="/frontend/css/right-menu.css" rel="stylesheet" type="text/css">
<link href="/frontend/css/flexslider.css" rel="stylesheet" type="text/css">
<link href="/frontend/css/project.css" rel="stylesheet" type="text/css"> -->
  

{!! Minify::stylesheet(array('/frontend/css/bootstrap.css', '/frontend/css/font-awesome.css','/frontend/css/toastr.min.css', '/frontend/css/style.css'
, '/frontend/css/right-menu.css','/frontend/css/flexslider.css', '/frontend/css/project.css')) !!}

<style>
  </style>
</head>
<body style="position: relative;"  data-spy="scroll" data-target="#rightMenuScrollspy" data-offset="15">

@inject('product_type', 'App\Product_type')
<?php 
    $product_type_inject = $product_type::where('active',1)->orderBy('priority')->orderBy('created_at','desc')->get(); 
?>
<div class="menu-right">
	<nav class="rightMenuScrollspy" id="rightMenuScrollspy">
        <a class="close close-auto-menu dropdown-toggle">
            <i class="fa fa-angle-double-left" title="Ẩn menu"></i>
        </a>
	  <ul class="nav nav-pills nav-stacked" data-spy="affix" data-offset-top="205">
        @if (!empty($project->content))
            <li><a href="#project-about"><i class="fa fa-university"></i>Tổng quan</a></li>
            <!-- {{Route::is('project') ? '' : $project->getLink()}} -->
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
                        <li>
                            <a href="/" class="vanland-home-icon" title="Trang chủ tìm kiếm dự án">
                            <i class="fa fa-home"></i>
                            </a>    
                        </li>
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
    @if (Route::is('project_detail') && !empty($project->show_slide))
	<div class="flexslider" id="main-flexslider">
		<ul class="slides">
            @foreach ($project_images as $key => $image)
			<li>
				<img src="{{$image->path}}" />
				<p class="flex-caption">{{$image->caption}}</p>
			</li>
            @endforeach
		</ul>
	</div>
    @endif
    <!-- @if (Route::is('project')) -->
    <div class="section wrap-action-form">
        <div class="container">
            <div class="row action-form">
                <div class="col-md-8 col-lg-8">
                </div>
                <div class="col-md-4 col-lg-4">
                    <form id="subscribe-form">
                        <div class="subscribe-form-heading-1">
                            <h3>Đăng ký nhận thông tin</h3>
                        </div>
                        <hr style="border-color: #fff;">
                        <fieldset class="form-group">
                            <input type="text" class="form-control form-control-sm" name="full_name" placeholder="Họ và Tên *" required="">
                        </fieldset>
                        <fieldset class="form-group">
                            <input type="email" class="form-control form-control-sm"  name="email" placeholder="Email *" required="">
                        </fieldset>
                        <fieldset class="form-group">
                            <input type="text" class="form-control form-control-sm"  name="phone" placeholder="Điện thoại *" required="">
                        </fieldset>
                        <input type="hidden" name="subject" value="Đăng ký nhận thông tin căn hộ '{{$project->name}}'">
                        <input type="hidden" name="content" value="Đăng ký nhận thông tin căn hộ '{{$project->name}}'">
                        <input type="hidden" name="_token" value="{{ csrf_token()}}"/>
                        <fieldset class="text-xs-center text-md-center text-lg-center">
                            <input type="button" class="btn btn-success btnSendContact" value="Đăng ký nhận tin" />
                            <a class="btn btn-warning btnCloseContactForm">Đóng</a>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- @endif -->
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
                        <li><a title="Hợp tác môi giới" href="#">Hợp tác môi giới</a></li>
                        <li><a title="Góp ý trang tìm kiếm" ref="nofollow" href="#">Góp ý trang tìm kiếm</a></li>
                        <li><a title="Góp ý trang đăng tin" ref="nofollow" href="#">Góp ý trang đăng tin</a></li>
                        <li><a title="Chính sách" href="#">Quy chế hoạt động</a></li>
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
                        @foreach ($product_type_inject as $product_type)
                        <li><a href="{{$product_type->getLink()}}">{{$product_type->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-xs-6">
                <div class="footer-box">
                    <h4>Chức năng</h4>
                    <ul class="help-link">
                        <li><a href="/form/can-tim-nha">Tìm nhà cùng VanLand</a></li>
                        <li><a href="/kien-thuc">Kiến thức bất động sản</a></li>
                        <li><a target="_blank" href="#">Tài liệu thẩm định giá</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-xs-12">
                <div class="footer-box">
                    <h4>VanLand.com.vn</h4>
                    <p>Là trang truyền thông bất động sản của Việt Nam, phát triển dựa trên nền tảng công nghệ mới - ứng dụng bản đồ,  hỗ trợ tối đa công cụ tìm kiếm và đăng tin.</p>
                </div>
            </div>
            <div class="col-xs-12 district-link text-center">
            @if(isset($hmcDistrict))
                @foreach ($hmcDistrict as $district)
                <a href="{{$district->getLink()}}">{{$district->name}}</a>
                @endforeach
            @endif
            </div>
            <div class="col-xs-12 text-center">
                <div class="copyright">© 2016 Bản quyền thuộc về&nbsp; <a target="_blank" href="{{route('homepage')}}" title="MyvanLand.com.vn">VanLand.com.vn</a></div>
            </div>
        </div>
    </div>
</footer>
</div>
<!-- {!! Minify::javascript(array('/frontend/js/jquery.appear.js' , '/frontend/js/jquery.shuffle.modernizr.js', '/frontend/js/jquery.shuffle.js' , '/frontend/js/owl.carousel.js', '/frontend/js/jquery.ajaxchimp.min.js','/frontend/js/responsiveslides.min.js','/frontend/js/jquery.flexisel.js','/frontend/js/jquery.flexslider.js', '/frontend/js/masterpage.js')) !!} -->
<!-- <script src="/frontend/js/jquery1.11.3.min.js"></script>
<script src="/frontend/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="/frontend/js/bootstrap.min.js"></script>
<script src="/frontend/js/crazyify.core.js"></script>
<script src="/frontend/js/toastr.min.js"></script> -->
{!! Minify::javascript(array('/frontend/js/jquery1.11.3.min.js', '/frontend/js/jquery-ui.min.js', '/frontend/js/bootstrap.min.js', '/frontend/js/crazyify.core.js', '/frontend/js/toastr.min.js'
,'/frontend/js/responsiveslides.min.js','/frontend/js/jquery.flexisel.js','/frontend/js/jquery.flexslider.js', '/frontend/js/masterpage.js')) !!}
@yield('body.js')
</body>
</html>