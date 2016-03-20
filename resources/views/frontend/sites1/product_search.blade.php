@extends('frontend.layouts1.master')
@section('body.content')

<section class="border-top title-breadcrumb">
	<div class="container">
		<div class="page-title mrgt1x mrgb05 clearfix">
			<h4 class="page-name">Tìm kiếm tin rao</h4>
			<div class="tag-bar"> <a href="{{Request::url(). (Request::getQueryString() ? ('?' . Request::getQueryString()) : '')}}"><span>{!!$searchDescription!!}</span></a> </div>
			<!-- <ul class="breadcrumb">
				<li><a href="{{ route('homepage') }}">Trang chủ</a></li>
				<li class="active"><a href="{{ route('product_search') }}">Tìm tin rao</a></li>
			</ul> -->
			@if(isset($breadcrumb)){!!$breadcrumb!!} @endif
		</div>
	</div>
</section>
<div class="top-tabs mrgt05 mrgb1x">
	<div class="container">
		<div class="tab-content clearfix search-box-min">
			@include('frontend.partials.product_search_box')
		</div>
	</div>
</div>
<section>
	<div class="container">
	<div class="row mrgt1x">
		<div class="col-md-9">
			<div class="properties-list-2">
				@foreach ($products as $product)
					@include('frontend.partials.product_item')
				@endforeach		
				<div class="clearfix"></div>
				<nav class="text-center">
					{!! $products->render() !!}
				</nav>
			</div>
		</div>
		<div class="col-md-3">
			@include('frontend.partials.product_right_sidebar')
		</div>
	</div>
	</div>
</section>

@endsection

@section('body.js')	
@endsection