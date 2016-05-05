@extends('frontend.layouts1.master')
@section('body.content')

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

@if(isset($breadcrumb))
<section class="border-top title-breadcrumb">
	<div class="container">
		<div class="page-title mrgt1x mrgb05 clearfix">
			{!!$breadcrumb!!} 
		</div>
	</div>
</section>
@endif
<section>
	<div class="container">
	<div class="row mrgt1x">
		<div class="col-md-8 property-single-rightbar">
			<div class="clearfix">
				<h4 class="fs20 mrgt0 cl-dark-blue fw-bold">{{$article->name}}</h4>
				<span class="title-detail cl-pink mrgr1x">Ngày đăng: {{$article->updated_at->format('d/m/Y')}}</span>
			</div>
			@if(isset($article->summary) && $article->summary != '')
			<div class="padb1x fs16">
				<b>{{$article->summary}}</b>
			</div>
			@endif
			@if(count($attachments) > 0)
			<div class="property-single">
				<div class="sync1 property-carousel owl-carousel">
				@foreach($attachments as $attachment)
					<div class="item">
						<div class="property-single-img"> <img class="lazy img-responsive" src="/frontend/images/spacer.gif" data-src="{{Image::url($attachment->path,850,570,array('crop'))}}" alt="#" />
						</div>
					</div>
				@endforeach
				</div>
				@if(count($attachments) > 1)
				<div class="sync2 property-carousel owl-carousel">
				@foreach($attachments as $attachment)
					<div class="item"> <img class="lazy img-responsive" src="/frontend/images/spacer.gif" data-src="{{Image::url($attachment->path,145,105,array('crop'))}}" alt="#" /> </div>
				@endforeach
				</div>
				@endif
			</div>
			@endif
			<div class="property-features mrgt0 clearfix animated out" data-delay="0" data-animation="fadeInUp">
				<div class="mrgt0 fs16">
					{!!$article->content!!}
				</div>
			</div>
			<div class="property-features mrgt0 clearfix animated out comments full" id="fb-comments">
				<div class="fb-comments" data-href="{{Request::url()}}" data-width="100%" data-numposts="10"></div>
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