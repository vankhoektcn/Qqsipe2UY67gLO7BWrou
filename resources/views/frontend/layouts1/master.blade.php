<!DOCTYPE HTML>
<html>
<head>
{!! SEOMeta::generate() !!}
{!! OpenGraph::generate() !!}
{!! Twitter::generate() !!}
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="csrf-token" content="{{ csrf_token() }}">

<link href="/frontend/css1/bootstrap.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="/frontend/css1/bootstrap-multiselect.css" type="text/css"/>
<link href="/frontend/css1/animate.css" rel="stylesheet" type="text/css">

<link href="/frontend/css1/font-awesome.css" rel="stylesheet" type="text/css">

<link href="/frontend/css1/style.css" rel="stylesheet" type="text/css">
<link href="/frontend/css1/style-custom.css" rel="stylesheet" type="text/css">
<link href="/frontend/css1/vuighe.css" rel="stylesheet" type="text/css">
<link href="/frontend/css1/photobox.css" rel="stylesheet" type="text/css">
<link href="/frontend/css1/revolution-slider.css" rel="stylesheet" type="text/css">
<link href="/frontend/css1/owl.carousel.css" rel="stylesheet" type="text/css">
<link href="/frontend/css1/responsive.css" rel="stylesheet" type="text/css">
</head>
<body>
<!-- header -->
@inject('config', 'App\Config')
@inject('project_type', 'App\Project_type')
@inject('product_type', 'App\Product_type')

<?php 
	$product_type_inject = $product_type::where('active',1)->orderBy('priority')->orderBy('created_at','desc')->get(); 
	$project_type_inject = $project_type::where('active',1)->orderBy('priority')->orderBy('created_at','desc')->get(); 
?>
<div class="top-bar">
	<div class="container">
		<div class="left-bar">
			<ul class="social-media">
				<li class="facebook"><a href="{{ $config->getValueByKey('facebook_page') }}"><i class="fa fa-facebook"></i></a></li>
				<li class="twitter"><a href="{{ $config->getValueByKey('twitter_page') }}"><i class="fa fa-twitter"></i></a></li>
				<li class="dribble"><a href="javascript:;"><i class="fa fa-dribbble"></i></a></li>
				<li class="vimeo"><a href="javascript:;"><i class="icon-vimeo"></i></a></li>
				<li class="google"><a href="{{ $config->getValueByKey('google_page') }}"><i class="fa fa-google"></i></a></li>
				<li class="deviantart"><a href="javascript:;"><i class="icon-deviantart3"></i></a></li>
				<li class="pinterest"><a href="javascript:;"><i class="icon-pinterest-p"></i></a></li>
				<li class="instagram"><a href="javascript:;"><i class="fa fa-instagram"></i></a></li>
			</ul>
		</div>
		<div class="right-bar">
			<ul class="contact">
				<li><i class="fa fa-phone"></i></li>
				<li><span>Hotline</span></li>
				<li class="contact-info"><a href="javascript:;">{{ $config->getValueByKey('headquarter_phone_number') }}</a></li>
			</ul>
			<ul class="mail">
				<li><i class="icon-email4"></i></li>
				<li><span>Gửi email</span></li>
				<li class="contact-info"><a href="mailto:{{ $config->getValueByKey('address_received_mail') }}">{{ $config->getValueByKey('address_received_mail') }}</a></li>
			</ul>
			<!-- <ul class="login">
				<li><i class="icon-login"></i></li>
				<li><a href="javascript:;"><span>Đăng nhập</span></a></li>
			</ul> -->
		</div>
	</div>
</div>
<header>

	<div class="container">
		<div class="navigation clearfix">
			<div class="logo"><a href="/"><img src="/frontend/images1/LogoVanLand4.png" alt="#" /> </a></div>
			<div class="navbar-header">
				<button type="button" class="navbar-toggle"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar first"></span> <span class="icon-bar middle"></span> <span class="icon-bar last"></span> </button>
			</div>
			<div class="menu">
				<nav class="navbar navbar-default">
					<div id="navbar" class="navbar-collapse collapse pull-right">
						<ul class="nav navbar-nav">
							<li><a href="/" title="Trang chủ">
								<i class="icon-home10 home-icon"></i>
							</a></li>
							<li><a href="{{route('projects')}}">DỰ ÁN</a><!-- aria-expanded="true" role="button" data-toggle="dropdown" class="dropdown-toggle" -->
								<ul class="dropdown-menu" role="menu">								
									@foreach ($project_type_inject as $project_type)
									<li><a href="{{$project_type->getLink()}}">{{$project_type->name}}</a></li>
									@endforeach
								</ul>
							</li>
							@foreach ($product_type_inject as $product_type)
							<li><a href="{{$product_type->getLink()}}">{{$product_type->name}}</a></li>
							@endforeach
							<li><a href="agents.html">TIN TỨC</a></li>
							<li><a href="{{route('contact')}}">LIÊN HỆ</a></li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</header>

<!-- header -->

<!-- content -->
@yield('body.content')	

<!-- end content -->
@include('frontend.layouts1.footer')

<!-- <script src="/frontend/js1/jquery.js" type="text/javascript"></script> 
<script src="/frontend/js1/bootstrap.js" type="text/javascript"></script> 
<script src="/frontend/js1/jquery-ui.js" type="text/javascript"></script> 
<script type="text/javascript" src="/frontend/js1/jquery.appear.js"></script>
<script type="text/javascript" src="/frontend/js1/scripts.js"></script> -->

<script src="/frontend/js1/jquery.js" type="text/javascript"></script> 
<script src="/frontend/js1/jquery-ui.js" type="text/javascript"></script> 
<script src="/frontend/js1/bootstrap.js" type="text/javascript"></script> 
<script type="text/javascript" src="/frontend/js1/bootstrap-multiselect.js"></script>
<script type="text/javascript" src="/frontend/js1/jquery.appear.js"></script> 
<script type="text/javascript" src="/frontend/js1/owl.carousel.min.js"></script>
<script type="text/javascript" src="/frontend/js1/jquery.mixitup.min.js"></script> 
<script type="text/javascript" src="/frontend/js1/owl.carousel.min.js"></script> 
<script type="text/javascript" src="/frontend/js1/jquery.photobox.js"></script> 
<script src="/frontend/js1/jquery.themepunch.revolution.js" type="text/javascript"></script> 
<script src="/frontend/js1/jquery.themepunch.tools.min.js" type="text/javascript"></script> 
<script src="/admin/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/frontend/js1/pages/core.js"></script>
<script type="text/javascript" src="/frontend/js1/scripts.js"></script>
<script type="text/javascript" src="/frontend/js1/pages/common.js"></script>

<script type="text/javascript" src="/frontend/js1/pages/partials/project_search.js"></script>
<script type="text/javascript" src="/frontend/js1/pages/partials/product_search.js"></script>
@yield('body.js')
</body>
</html>