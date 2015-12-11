@extends('frontend.layouts.master')
@section('body.content')
<div class="">
	<div class="col-md-9 bann-right pull-right">
		<!-- banner -->
		<div class="banner">		
			<div class="header-slider">
				<div class="slider">
					<div class="callbacks_container">
					  	<ul class="rslides" id="slider">
					  	@foreach ($articlesSlide as $article)
							<li>
								<img src="{{ Image::url($article->getFirstAttachment(),795,490,array('crop')) }}" class="img-responsive" alt="{{$article->name}}">
								<div class="caption">
									<h3><a href="{{ $article->getLink() }}">{{$article->name}}</a></h3>
									<p>{{$article->summary}}</p>
								</div>
							</li>
						@endforeach
						</ul>
			  		</div>
				 </div>
			</div>
		</div>
		<!-- banner -->	
		<!-- nam-matis -->
		<div class="nam-matis">
			@foreach ($articlesHomepage as $index => $article)
			<?php if(($index%2) == 0): ?>
				<?php if($index > 0){
					echo "<div class='clearfix'></div></div>";
				} ?>
				<div class="nam-matis-top">
			<?php endif; ?>
					<div class="col-md-6 nam-matis-1">
						<a href="{{ $article->getLink() }}">
							<img src="{{ Image::url($article->getFirstAttachment(),368,227,array('crop')) }}" class="img-responsive" alt="{{$article->name}}">
						</a>
						<h3><a href="{{ $article->getLink() }}">{{$article->name}}</a></h3>
						<p>{{$article->summary}}</p>
					</div>
			@endforeach
			<div class="clearfix"></div>
		</div>
		<!-- nam-matis -->	
	</div>
	</div>
	<div class="col-md-3 bann-left pull-left">
		@include('frontend.layouts.rightBox')
		
	</div>
</div>
	<div class="clearfix"> </div>
		<div class="fle-xsel">
			<ul id="flexiselDemo3">
			@foreach ($articlesSlideFooter as $article)
				<li>
					<a href="{{ $article->getLink() }}">
						<div class="banner-1">
							<img src="{{ Image::url($article->getFirstAttachment(),175,108,array('crop')) }}" class="img-responsive" alt="{{$article->name}}">
						</div>
					</a>
				</li>
			@endforeach		
			</ul>
							
			<div class="clearfix"> </div>
		</div>
@endsection

@section('body.js')
{!! Minify::javascript('/frontend/js/pages/index.js') !!}
@endsection