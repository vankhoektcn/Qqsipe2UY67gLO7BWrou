@extends('frontend.layouts1.master')
@section('body.content')

<section class="border-top title-breadcrumb">
	<div class="container">
		<div class="page-title mrgt1x mrgb05 clearfix">
			<h4 class="page-name">Tin tức</h4>
			<div class="tag-bar"> <a href="{{Request::url(). (Request::getQueryString() ? ('?' . Request::getQueryString()) : '')}}"><span>{!!$searchDescription!!}</span></a> </div>
			@if(isset($breadcrumb)){!!$breadcrumb!!} @endif
		</div>
	</div>
</section>
<section>
	<div class="container">
	<div class="row mrgt1x">
		<div class="col-md-8">
			<div class="properties-list-2">
				@foreach ($articles as $article)
					@include('frontend.partials.article_item')
				@endforeach		
				<div class="clearfix"></div>
				<nav class="text-center">
					{!! $articles->render() !!}
				</nav>
			</div>
		</div>
		<div class="col-md-4">
			@include('frontend.partials.article_right_sidebar')
		</div>
	</div>
	</div>
</section>

@endsection

@section('body.js')	
@endsection