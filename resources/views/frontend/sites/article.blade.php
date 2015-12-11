@extends('frontend.layouts.master')
@section('head.title', $article->name)
@section('body.content')
<div class="content-top">
	<div class="single">
		<div class="col-md-9 bann-right pull-right">
			<div class="single-top">
				<h4>{{$article->name}}</h4>
				<div class="single-content">
					<b><?php echo $article->summary; ?></b>
				</div>
				<img src="{{ Image::url($article->getFirstAttachment(),814,364,array('crop')) }}" class="img-responsive" alt="{{$article->name}}">
				<div class="single-content">
					<?php echo $article->content; ?>
				</div>
			</div>
		</div>
		<!-- <div class="blog-content-right bann-left pull-left"> -->
		<div class="col-md-3 bann-left pull-left">
			@include('frontend.layouts.rightBox')
		</div>
		<div class="clearfix"> </div>
	</div>

</div>
@endsection

@section('body.js')
@endsection