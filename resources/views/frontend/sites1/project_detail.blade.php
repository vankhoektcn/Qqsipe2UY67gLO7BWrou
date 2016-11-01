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
		<div class="col-md-9 property-single-rightbar">
			<div class="clearfix">
				<h4 class="fs20 mrgt0 cl-dark-blue fw-bold">{{$project->name}}</h4>
				<span class="title-detail cl-pink mrgr1x">{{$project->addressFull()}}</span>
				<!-- {{dd($project->expire_at)}} -->
				<!-- @if(isset($project->expire_at))
				-<span class="title-detail cl-pink mrgl1x">Ngày hết hạn: {{$project->expire_at->format('d/m/Y')}}</span>
				@endif -->
			</div>
			@if(isset($project->summary) && $project->summary != '')
			<div class="padb1x fs16">
				{!!$project->summary!!}
			</div>
			@endif

			@if(count($project_images) > 0)
			<div class="property-single">
				<div class="sync1 property-carousel owl-carousel">
				@foreach($project_images as $image)
					<div class="item">
						<div class="property-single-img"> <img src="{{Image::url($image->path,850,570,array('crop'))}}" class="img-responsive" alt="{{$image->title}}" />
						</div>
					</div>
				@endforeach
				</div>
				<div class="sync2 property-carousel owl-carousel">
				@foreach($project_images as $image)
					<div class="item"> <img src="{{Image::url($image->path,145,105,array('crop'))}}" class="img-responsive" alt="{{$image->title}}" /> </div>
				@endforeach
				</div>
			</div>
			@endif
			<div class="property-description mrgt4x clearfix animated out" data-delay="0" data-animation="fadeInUp">
				<div class="property-heading">
					<h4><span>Thông tin căn hộ</span></h4>
				</div>
				<div class="description-content col-md-12">
					<ul class="row">
						
					</ul>
				</div>
			</div>
			<div class="property-features mrgt4x clearfix animated out" data-delay="0" data-animation="fadeInUp">
				<div class="property-heading">
					<h4><span>Mô tả căn hộ</span></h4>
				</div>
				<div class="description-text fs16">
					{!!$project->description!!}
				</div>
			</div>

			<div class="property-features mrgt2x clearfix animated out comments full" id="fb-comments">
				<div class="fb-comments" data-href="{{Request::url()}}" data-width="100%" data-numposts="10"></div>
			</div>

			<div class="property-features mrgt4x clearfix animated out" data-delay="0" data-animation="fadeInUp">
				<div class="property-heading">
					<h4><span>@if(isset($heading))<b>{{$heading}}</b>@else 'Căn hộ tương tự' @endif mới nhất</span></h4>
				</div>
				<div class="description-text">
				@foreach ($other_projects as $project)
					@include('frontend.partials.project_item')
				@endforeach
				</div>
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