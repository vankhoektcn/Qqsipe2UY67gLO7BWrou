<!DOCTYPE HTML>
<html>
<head>
{!! SEOMeta::generate() !!}
{!! OpenGraph::generate() !!}
{!! Twitter::generate() !!}
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="/frontend/css1/bootstrap.css" rel="stylesheet" type="text/css">
<link href="/frontend/css1/animate.css" rel="stylesheet" type="text/css">

<link href="/frontend/css1/font-awesome.css" rel="stylesheet" type="text/css">

<link href="/frontend/css1/style.css" rel="stylesheet" type="text/css">
<link href="/frontend/css1/style-custom.css" rel="stylesheet" type="text/css">
<link href="/frontend/css1/photobox.css" rel="stylesheet" type="text/css">
<link href="/frontend/css1/revolution-slider.css" rel="stylesheet" type="text/css">
<link href="/frontend/css1/owl.carousel.css" rel="stylesheet" type="text/css">
<link href="/frontend/css1/responsive.css" rel="stylesheet" type="text/css">
</head>
<body>
<!-- header -->
<div class="top-bar">
	<div class="container">
		<div class="left-bar">
			<ul class="social-media">
				<li class="facebook"><a href="javascript:;"><i class="fa fa-facebook"></i></a></li>
				<li class="twitter"><a href="javascript:;"><i class="fa fa-twitter"></i></a></li>
				<li class="dribble"><a href="javascript:;"><i class="fa fa-dribbble"></i></a></li>
				<li class="vimeo"><a href="javascript:;"><i class="icon-vimeo"></i></a></li>
				<li class="google"><a href="javascript:;"><i class="fa fa-google"></i></a></li>
				<li class="deviantart"><a href="javascript:;"><i class="icon-deviantart3"></i></a></li>
				<li class="pinterest"><a href="javascript:;"><i class="icon-pinterest-p"></i></a></li>
				<li class="instagram"><a href="javascript:;"><i class="fa fa-instagram"></i></a></li>
			</ul>
		</div>
		<div class="right-bar">
			<ul class="contact">
				<li><i class="fa fa-phone"></i></li>
				<li><span>Hotline</span></li>
				<li class="contact-info"><a href="javascript:;">0932 622 017</a></li>
			</ul>
			<ul class="mail">
				<li><i class="icon-email4"></i></li>
				<li><span>Gửi email</span></li>
				<li class="contact-info"><a href="javascript:;">support@vanland.com.vn</a></li>
			</ul>
			<ul class="login">
				<li><i class="icon-login"></i></li>
				<li><a href="javascript:;"><span>Đăng nhập</span></a></li>
			</ul>
		</div>
	</div>
</div>
<header>
	<div class="container">
		<div class="navigation clearfix">
			<div class="logo"><a href="Qvrenti_1.html"><img src="/frontend/images1/LogoVanLand4.png" alt="#" /> </a></div>
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
							<li><a href="javascript:;">FEATURES</a></li>
							<li><a aria-expanded="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="javascript:;">PROPERTIES</a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="Properties_List.html">PROPERTIES LIST</a></li>
									<li><a href="Properties_List_2.html">PROPERTIES LIST 2</a></li>
									<li><a href="Properties_right_sidebar.html">PROPERTIES RIGHT SIDEBAR</a></li>
									<li><a href="Properties_Right_Sidebar_2.html">PROPERTIES RIGHT SIDEBAR 2</a></li>
									<li><a href="Property_Single.html">PROPERTY SINGLE</a></li>
									<li><a href="Property_Single_2.html">PROPERTY SINGLE 2</a></li>
									<li><a href="Property_Single_Sidebar.html">PROPERTY SINGLE SIDEBAR</a></li>
								</ul>
							</li>
							<li><a href="agents.html">AGENTS</a></li>
							<li><a aria-expanded="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="javascript:;">BLOG</a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="Blog-Single-Post.html">Blog Single Post</a></li>
									<li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
								</ul>
							</li>
							<li><a aria-expanded="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="javascript:;">PAGES</a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="Qvrenti_2.html">HOME 2</a></li>
									<li><a href="Services.html">SERVICE PAGE</a></li>
									<li><a href="Service-list.html">SERVICE LIST</a></li>
									<li><a href="PRICING-Tables.html">PRICING</a></li>
									<li><a href="Booking-Page.html">BOOKING</a></li>
									<li><a href="FAQs.html">FAQ</a></li>
									<li><a href="Shortcodes.html">SHORTCODES</a></li>
								</ul>
							</li>
							<li><a aria-expanded="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="javascript:;">CONTACT US</a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="Contact.html">CONTACT 1</a></li>
									<li><a href="Contact-Style-2.html">CONTACT 2</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</header>
<section class="border-top hide">
	<div class="container">
		<div class="page-title mrgt6x mrgb6x clearfix">
			<h4 class="page-name">properties list</h4>
			<div class="tag-bar"> <a href="javascript:;"><span>searching properties</span></a> </div>
			<ul class="breadcrumb">
				<li><a href="javascript:;">Pages</a></li>
				<li class="active"><a href="javascript:;">Properties list</a></li>
			</ul>
		</div>
	</div>
</section>
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
<script type="text/javascript" src="/frontend/js1/jquery.appear.js"></script> 
<script type="text/javascript" src="/frontend/js1/jquery.mixitup.min.js"></script> 
<script type="text/javascript" src="/frontend/js1/owl.carousel.min.js"></script> 
<script type="text/javascript" src="/frontend/js1/jquery.photobox.js"></script> 
<script src="/frontend/js1/jquery.themepunch.revolution.js" type="text/javascript"></script> 
<script src="/frontend/js1/jquery.themepunch.tools.min.js" type="text/javascript"></script> 
<script type="text/javascript" src="/frontend/js1/scripts.js"></script>
@yield('body.js')
</body>
</html>