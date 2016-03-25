
<!DOCTYPE html>
<!--[if IE 8]> <html lang="vi" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="vi" class="ie9 no-js"> <![endif]-->
<!--[if !IE]> -->
<html lang="vi">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>@yield('head.title')</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="crazyify.com" name="author"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="robots" content="noindex,nofollow" />
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
<link href="/admin/assets/global/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css">
<link href="/admin/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="/admin/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
<link href="/admin/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/admin/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
<link href="/admin/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="/frontend/css1/bootstrap-multiselect.css" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
@yield('head.pluginstyle')
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
@yield('head.pagestyle')
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="/admin/assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="/admin/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="/admin/assets/admin/layout4/css/layout.css" rel="stylesheet" type="text/css"/>
<link id="style_color" href="/admin/assets/admin/layout4/css/themes/light.css" rel="stylesheet" type="text/css"/>
<link href="/admin/assets/admin/layout4/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="/favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed page-sidebar-closed-hide-logo">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="{{ route('admin.dashboard.index') }}">
			<img src="/admin/assets/admin/layout4/img/logo-light.png" alt="logo" class="logo-default"/>
			</a>
			<div class="menu-toggler sidebar-toggler">
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN PAGE ACTIONS -->
		<div class="page-actions">
			<div class="btn-group">
				<button type="button" class="btn red-haze btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
				<span class="hidden-sm hidden-xs">Thao tác nhanh</span><i class="fa fa-angle-down"></i>
				</button>
				<ul class="dropdown-menu" role="menu">
					<li>
						<a href="{{ route('admin.articles.create') }}">
						<i class="icon-docs"></i> Bài viết mới </a>
					</li>
					<li>
						<a href="javascript:;">
						<i class="icon-basket"></i> Sản phẩm mới </a>
					</li>
					<li class="divider">
					</li>
					<li>
						<a href="{{ route('admin.articlecategories.create') }}">
						<i class="icon-docs"></i> Danh mục bài viết mới </a>
					</li>
					<li>
						<a href="javascript:;">
						<i class="icon-basket"></i> Nhà sản xuất mới </a>
					</li>
					<li>
						<a href="javascript:;">
						<i class="icon-basket"></i> Danh mục sản phẩm mới </a>
					</li>
				</ul>
			</div>
		</div>
		<!-- END PAGE ACTIONS -->
		<!-- BEGIN PAGE TOP -->
		<div class="page-top">
			<!-- BEGIN TOP NAVIGATION MENU -->
			<div class="top-menu">
				<ul class="nav navbar-nav pull-right">
					<li class="separator hide">
					</li>
					<!-- BEGIN LANGUAGE BAR -->
					<li class="dropdown dropdown-language">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<img alt="" src="/admin/assets/global/img/flags/us.png">
						<span class="langname">
						US </span>
						<i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu">
							<li>
								<a href="javascript:;">
								<img alt="" src="/admin/assets/global/img/flags/es.png"> Spanish </a>
							</li>
							<li>
								<a href="javascript:;">
								<img alt="" src="/admin/assets/global/img/flags/de.png"> German </a>
							</li>
							<li>
								<a href="javascript:;">
								<img alt="" src="/admin/assets/global/img/flags/ru.png"> Russian </a>
							</li>
							<li>
								<a href="javascript:;">
								<img alt="" src="/admin/assets/global/img/flags/fr.png"> French </a>
							</li>
						</ul>
					</li>
					<!-- END LANGUAGE BAR -->
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<li class="dropdown dropdown-user dropdown-dark">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<span class="username username-hide-on-mobile">
						{{ Auth::user()->name }} </span>
						<img alt="" class="img-circle" src="/admin/assets/admin/layout4/img/avatar9.jpg"/>
						</a>
						<ul class="dropdown-menu dropdown-menu-default">
							<li>
								<a href="{{ route('admin.users.edit', ['id' => Auth::user()->id]) }}">
								<i class="icon-user"></i> Thông tin </a>
							</li>
							<li>
								<a href="{{ route('admin.users.changepassword') }}">
								<i class="icon-user"></i> Thay đổi mật mã </a>
							</li>
							<li class="divider">
							</li>
							<li>
								<a href="/auth/logout">
								<i class="icon-key"></i> Đăng xuất </a>
							</li>
						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
			</div>
			<!-- END TOP NAVIGATION MENU -->
		</div>
		<!-- END PAGE TOP -->
	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<li class="start {{ Request::url() == route('admin.dashboard.index') ? 'active' : null }}">
					<a href="{{ route('admin.dashboard.index') }}">
					<i class="icon-home"></i>
					<span class="title">Màn hình chính</span>
					</a>
				</li>
				<li class="{{ Request::is('admin/articles*') ? 'active open' : null }}">
					<a href="javascript:;">
					<i class="icon-docs"></i>
					<span class="title">Bài viết</span>
					<span class="arrow {{ Request::is('admin/articles*') ? 'open' : null }}"></span>
					</a>
					<ul class="sub-menu">
						<li class="{{ Request::is('admin/articles/create') ? 'active' : null }}">
							<a href="{{ route('admin.articles.create') }}">
							<i class="icon-note"></i>
							Tạo mới</a>
						</li>
						<li class="{{ Request::is('admin/articles') ? 'active' : null }}">
							<a href="{{ route('admin.articles.index') }}">
							<i class="icon-list"></i>
							Danh sách</a>
						</li>
					</ul>
				</li>
				<li class="{{ Request::is('admin/projectcategories*') ? 'active open' : null }}">
					<a href="javascript:;">
					<i class="icon-docs"></i>
					<span class="title">Danh mục dự án</span>
					<span class="arrow {{ Request::is('admin/projectcategories*') ? 'open' : null }}"></span>
					</a>
					<ul class="sub-menu">
						<li class="{{ Request::is('admin/projectcategories/create') ? 'active' : null }}">
							<a href="{{ route('admin.projectcategories.create') }}">
							<i class="icon-note"></i>
							Tạo mới</a>
						</li>
						<li class="{{ Request::is('admin/projectcategories') ? 'active' : null }}">
							<a href="{{ route('admin.projectcategories.index') }}">
							<i class="icon-list"></i>
							Danh sách</a>
						</li>
					</ul>
				</li>
				<li class="{{ Request::is('admin/projects*') ? 'active open' : null }}">
					<a href="javascript:;">
					<i class="icon-docs"></i>
					<span class="title">Dự án</span>
					<span class="arrow {{ Request::is('admin/projects*') ? 'open' : null }}"></span>
					</a>
					<ul class="sub-menu">
						<li class="{{ Request::is('admin/projects/create') ? 'active' : null }}">
							<a href="{{ route('admin.projects.create') }}">
							<i class="icon-note"></i>
							Tạo mới</a>
						</li>
						<li class="{{ Request::is('admin/projects') ? 'active' : null }}">
							<a href="{{ route('admin.projects.index') }}">
							<i class="icon-list"></i>
							Danh sách</a>
						</li>
					</ul>
				</li>

				<li class="{{ Request::is('admin/products*') ? 'active open' : null }}">
					<a href="javascript:;">
					<i class="icon-docs"></i>
					<span class="title">Tin đăng</span>
					<span class="arrow {{ Request::is('admin/products*') ? 'open' : null }}"></span>
					</a>
					<ul class="sub-menu">
						<li class="{{ Request::is('admin/products/create') ? 'active' : null }}">
							<a href="{{ route('admin.products.create') }}">
							<i class="icon-note"></i>
							Tạo mới</a>
						</li>
						<li class="{{ Request::is('admin/products') ? 'active' : null }}">
							<a href="{{ route('admin.products.index') }}">
							<i class="icon-list"></i>
							Danh sách</a>
						</li>
					</ul>
				</li>
				<li class="{{ Request::is('admin/agents*') ? 'active open' : null }}">
					<a href="javascript:;">
					<i class="icon-docs"></i>
					<span class="title">Môi giới</span>
					<span class="arrow {{ Request::is('admin/agents*') ? 'open' : null }}"></span>
					</a>
					<ul class="sub-menu">
						<li class="{{ Request::is('admin/agents/create') ? 'active' : null }}">
							<a href="{{ route('admin.agents.create') }}">
							<i class="icon-note"></i>
							Tạo mới</a>
						</li>
						<li class="{{ Request::is('admin/agents') ? 'active' : null }}">
							<a href="{{ route('admin.agents.index') }}">
							<i class="icon-list"></i>
							Danh sách</a>
						</li>
					</ul>
				</li>

				<li class="{{ Request::is('admin/articlecategories*') ? 'active open' : null }}">
					<a href="javascript:;">
					<i class="icon-docs"></i>
					<span class="title">Danh mục bài viết</span>
					<span class="arrow {{ Request::is('admin/articlecategories*') ? 'open' : null }}"></span>
					</a>
					<ul class="sub-menu">
						<li class="{{ Request::is('admin/articlecategories/create') ? 'active' : null }}">
							<a href="{{ route('admin.articlecategories.create') }}">
							<i class="icon-note"></i>
							Tạo mới</a>
						</li>
						<li class="{{ Request::is('admin/articlecategories') ? 'active' : null }}">
							<a href="{{ route('admin.articlecategories.index') }}">
							<i class="icon-list"></i>
							Danh sách</a>
						</li>
					</ul>
				</li>
				<li class="{{ Request::is('admin/provinces*') ? 'active open' : null }}">
					<a href="javascript:;">
					<i class="icon-pin"></i>
					<span class="title">Tỉnh/thành phố</span>
					<span class="arrow {{ Request::is('admin/provinces*') ? 'open' : null }}"></span>
					</a>
					<ul class="sub-menu">
						<li class="{{ Request::is('admin/provinces/create') ? 'active' : null }}">
							<a href="{{ route('admin.provinces.create') }}">
							<i class="icon-note"></i>
							Tạo mới</a>
						</li>
						<li class="{{ Request::is('admin/provinces') ? 'active' : null }}">
							<a href="{{ route('admin.provinces.index') }}">
							<i class="icon-list"></i>
							Danh sách</a>
						</li>
					</ul>
				</li>
				<li class="{{ Request::is('admin/districts*') ? 'active open' : null }}">
					<a href="javascript:;">
					<i class="icon-pin"></i>
					<span class="title">Quận/huyện</span>
					<span class="arrow {{ Request::is('admin/districts*') ? 'open' : null }}"></span>
					</a>
					<ul class="sub-menu">
						<li class="{{ Request::is('admin/districts/create') ? 'active' : null }}">
							<a href="{{ route('admin.districts.create') }}">
							<i class="icon-note"></i>
							Tạo mới</a>
						</li>
						<li class="{{ Request::is('admin/districts') ? 'active' : null }}">
							<a href="{{ route('admin.districts.index') }}">
							<i class="icon-list"></i>
							Danh sách</a>
						</li>
					</ul>
				</li>
				<li class="{{ Request::is('admin/subjects*') ? 'active open' : null }}">
					<a href="javascript:;">
					<i class="icon-pin"></i>
					<span class="title">Môn học</span>
					<span class="arrow {{ Request::is('admin/subjects*') ? 'open' : null }}"></span>
					</a>
					<ul class="sub-menu">
						<li class="{{ Request::is('admin/subjects/create') ? 'active' : null }}">
							<a href="{{ route('admin.subjects.create') }}">
							<i class="icon-note"></i>
							Tạo mới</a>
						</li>
						<li class="{{ Request::is('admin/subjects') ? 'active' : null }}">
							<a href="{{ route('admin.subjects.index') }}">
							<i class="icon-list"></i>
							Danh sách</a>
						</li>
					</ul>
				</li>
				<li class="{{ Request::is('admin/teachtimes*') ? 'active open' : null }}">
					<a href="javascript:;">
					<i class="icon-pin"></i>
					<span class="title">Lịch học</span>
					<span class="arrow {{ Request::is('admin/teachtimes*') ? 'open' : null }}"></span>
					</a>
					<ul class="sub-menu">
						<li class="{{ Request::is('admin/teachtimes/create') ? 'active' : null }}">
							<a href="{{ route('admin.teachtimes.create') }}">
							<i class="icon-note"></i>
							Tạo mới</a>
						</li>
						<li class="{{ Request::is('admin/teachtimes') ? 'active' : null }}">
							<a href="{{ route('admin.teachtimes.index') }}">
							<i class="icon-list"></i>
							Danh sách</a>
						</li>
					</ul>
				</li>
				<li class="{{ Request::is('admin/newclass*') ? 'active open' : null }}">
					<a href="javascript:;">
					<i class="icon-pin"></i>
					<span class="title">Lớp mới</span>
					<span class="arrow {{ Request::is('admin/newclass*') ? 'open' : null }}"></span>
					</a>
					<ul class="sub-menu">
						<li class="{{ Request::is('admin/newclass/create') ? 'active' : null }}">
							<a href="{{ route('admin.newclass.create') }}">
							<i class="icon-note"></i>
							Tạo mới</a>
						</li>
						<li class="{{ Request::is('admin/newclass') ? 'active' : null }}">
							<a href="{{ route('admin.newclass.index') }}">
							<i class="icon-list"></i>
							Danh sách</a>
						</li>
					</ul>
				</li>
				<li class="{{ Request::is('admin/tutors*') ? 'active open' : null }}">
					<a href="{{ route('admin.tutors.index') }}">
					<i class="icon-pin"></i>
					<span class="title">Gia sư đăng ký</span>
					</a>
				</li>
				<li class="{{ Request::is('admin/students*') ? 'active open' : null }}">
					<a href="{{ route('admin.students.index') }}">
					<i class="icon-pin"></i>
					<span class="title">Học viên đăng ký</span>
					</a>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-basket"></i>
					<span class="title">Sản phẩm</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="javascript:;">
							<i class="icon-note"></i>
							Tạo mới</a>
						</li>
						<li>
							<a href="javascript:;">
							<i class="icon-list"></i>
							Danh sách</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-basket"></i>
					<span class="title">Danh mục sản phẩm</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="javascript:;">
							<i class="icon-note"></i>
							Tạo mới</a>
						</li>
						<li>
							<a href="javascript:;">
							<i class="icon-list"></i>
							Danh sách</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:;">
					<i class="icon-basket"></i>
					<span class="title">Nhà sản xuất</span>
					<span class="arrow "></span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="javascript:;">
							<i class="icon-note"></i>
							Tạo mới</a>
						</li>
						<li>
							<a href="javascript:;">
							<i class="icon-list"></i>
							Danh sách</a>
						</li>
					</ul>
				</li>
				<li class="{{ Request::is('admin/navigations*') ? 'active open' : null }}">
					<a href="javascript:;">
					<i class="icon-link"></i>
					<span class="title">Liên kết</span>
					<span class="arrow {{ Request::is('admin/navigations*') ? 'open' : null }}"></span>
					</a>
					<ul class="sub-menu">
						<li class="{{ Request::is('admin/navigations/create') ? 'active' : null }}">
							<a href="{{ route('admin.navigations.create') }}">
							<i class="icon-note"></i>
							Tạo mới</a>
						</li>
						<li class="{{ Request::is('admin/navigations') ? 'active' : null }}">
							<a href="{{ route('admin.navigations.index') }}">
							<i class="icon-list"></i>
							Danh sách</a>
						</li>
					</ul>
				</li>
				<li class="{{ Request::is('admin/navigationcategories*') ? 'active open' : null }}">
					<a href="javascript:;">
					<i class="icon-link"></i>
					<span class="title">Danh mục liên kết</span>
					<span class="arrow {{ Request::is('admin/navigationcategories*') ? 'open' : null }}"></span>
					</a>
					<ul class="sub-menu">
						<li class="{{ Request::is('admin/navigationcategories/create') ? 'active' : null }}">
							<a href="{{ route('admin.navigationcategories.create') }}">
							<i class="icon-note"></i>
							Tạo mới</a>
						</li>
						<li class="{{ Request::is('admin/navigationcategories') ? 'active' : null }}">
							<a href="{{ route('admin.navigationcategories.index') }}">
							<i class="icon-list"></i>
							Danh sách</a>
						</li>
					</ul>
				</li>
				<li class="{{ Request::is('admin/contacts*') ? 'active open' : null }}">
					<a href="{{ route('admin.contacts.index') }}">
					<i class="icon-bubbles"></i>
					<span class="title">Liên hệ</span>
					</a>
				</li>
				<li class="last {{ Request::is('admin/configs*') ? 'active open' : null }}">
					<a href="{{ route('admin.configs.index') }}">
					<i class="icon-settings"></i>
					<span class="title">Hệ thống</span>
					</a>
				</li>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			@yield('body.content')
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner">
		 2015 &copy; Crazyify. <a href="http://crazyify.com/" title="Thiết kế website, hosting, SEO, quản trị website, thiết kế đồ họa..." target="_blank">Thiết kế website, hosting, SEO, quản trị website, thiết kế đồ họa...</a>
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="/admin/assets/global/plugins/respond.min.js"></script>
<script src="/admin/assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="/admin/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="/admin/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script type="text/javascript">
$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
</script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="/admin/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="/admin/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/admin/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="/admin/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="/admin/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="/admin/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="/admin/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="/admin/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<script src="/admin/assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript" ></script>
<script type="text/javascript" src="/frontend/js1/bootstrap-multiselect.js"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
@yield('body.jsplugins')
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/admin/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="/admin/assets/admin/layout4/scripts/layout.js" type="text/javascript"></script>
<script src="/admin/assets/customs/scripts/core.js" type="text/javascript"></script>
<script type="text/javascript" src="/frontend/js1/pages/common.js"></script>
@yield('body.js')
<!-- END PAGE LEVEL SCRIPTS -->
<script type="text/javascript">
	function LayoutInit (isInit) {
		if (typeof _manualInitLayout == 'undefined' || !_manualInitLayout) {
			Metronic.init();
			Layout.init();
		}
		else{
			if (isInit) {
				Metronic.init();
				Layout.init();
			}
		}
	};
	jQuery(document).ready(function() {    
		LayoutInit();
	});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>