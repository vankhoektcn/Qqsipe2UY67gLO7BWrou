@extends('admin.layouts.master')

@section('head.title', 'Quản trị nội dung website')

@section('body.content')
<!-- BEGIN PAGE HEADER-->
<!-- BEGIN PAGE HEAD -->
<div class="page-head">
	<!-- BEGIN PAGE TITLE -->
	<div class="page-title">
		<h1>Quản trị nội dung website <small>Màn hình chính</small></h1>
	</div>
	<!-- END PAGE TITLE -->
</div>
<!-- END PAGE HEAD -->
<!-- BEGIN PAGE BREADCRUMB -->
<ul class="page-breadcrumb breadcrumb">
	<li>
		<a href="index.html">Màn hình chính</a>
	</li>
</ul>
<!-- END PAGE BREADCRUMB -->
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
	<div class="col-md-12">
		Xin chào {{ Auth::user()->name }}
	</div>
</div>
<!-- END PAGE CONTENT-->
@endsection