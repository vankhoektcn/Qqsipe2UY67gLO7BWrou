@extends('frontend.layouts1.master')
@section('body.content')

<section class="border-top title-breadcrumb">
	<div class="container">
		<div class="page-title mrgt1x mrgb05 clearfix">
			<h4 class="page-name">Tìm kiếm dự án</h4>
			<div class="tag-bar"> <a href="{{Request::url(). (Request::getQueryString() ? ('?' . Request::getQueryString()) : '')}}"><span>{!!$searchDescription!!}</span></a> </div>
			@if(isset($breadcrumb)){!!$breadcrumb!!} @endif
		</div>
	</div>
</section>
<div class="top-tabs mrgt05 mrgb1x">
	<div class="container">
		<div class="tab-content clearfix search-box-min">
			@include('frontend.partials.project_search_box')
		</div>
	</div>
</div>
<section>
	<div class="container">
	<div class="row mrgt1x">
		<div class="col-md-9">
			<div class="properties-list-2">
				<ul class="filter-list">					
					@foreach ($projects as $project)
						@include('frontend.partials.project_item')
					@endforeach	
				</ul>	
				<div class="clearfix"></div>
				<nav class="text-center">
					{!! $projects->render() !!}
				</nav>
			</div>
		</div>
		<div class="col-md-3">
			@include('frontend.partials.project_right_sidebar')
		</div>
	</div>
	</div>
</section>

@endsection

@section('body.js')	
@endsection