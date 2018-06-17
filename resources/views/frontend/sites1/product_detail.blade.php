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
				<h1 class="fs20 mrgt0 cl-dark-blue fw-bold"><a href="{{$product->getLink()}}">{{$product->title}}</a></h1>
				<span class="title-detail cl-pink mrgr1x">Ngày đăng: {{$product->updated_at->format('d/m/Y')}}</span>
				<!-- {{dd($product->expire_at)}} -->
				<!-- @if(isset($product->expire_at))
				-<span class="title-detail cl-pink mrgl1x">Ngày hết hạn: {{$product->expire_at->format('d/m/Y')}}</span>
				@endif -->
			</div>
			@if(isset($product->summary) && $product->summary != '')
			<div class="padb1x fs16">
				{!!$product->summary!!}
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
				<div class="sync2 property-carousel owl-carousel">
				@if(count($attachments) > 1)
					@foreach($attachments as $attachment)
					<div class="item"> <img class="lazy img-responsive" src="/frontend/images/spacer.gif" data-src="{{Image::url($attachment->path,145,105,array('crop'))}}"  alt="#" /> </div>
					@endforeach				
				@endif
				</div>
			</div>
			@endif
			<div class="property-description mrgt4x clearfix animated out" data-delay="0" data-animation="fadeInUp">
				<div class="property-heading">
					<h4><span>Thông tin căn hộ</span></h4>
				</div>
				<div class="description-content col-md-12">
					<ul class="row">
						<li class="col-md-3 no-padding"><span class="description-title">Giá </span><span class="title-detail fw-bold cl-red"> {{$product->price}} {{$product->price_type->name}} </span></li>
						<li class="col-md-3 no-padding"><span class="description-title">Diện tích</span><span class="title-detail fw-bold cl-red"> {{$product->area}} m²</span></li>
						<li class="col-md-3 no-padding"><span class="description-title">Phòng ngủ </span><span class="title-detail cl-blue">{{$product->rooms}}</span></li>
						<li class="col-md-3 no-padding"><span class="description-title">Toilet </span><span class="title-detail cl-blue">{{$product->toilets}}</span></li>
						<li class="col-md-12 no-padding"><span class="description-title">Địa chỉ </span><span class="title-detail fw-bold cl-dark-blue"> {{$product->addressFull()}}</span></li>
						<li class="col-md-3 no-padding"><span class="description-title">Liên hệ</span><span class="title-detail fw-bold cl-dark-blue">{{$product->br_name}}</span></li>
						<li class="col-md-3 no-padding"><span class="description-title">Điện thoại </span><span class="title-detail fw-bold cl-red"><a class="cl-red" href="tel:{{$product->br_phone}}">{{$product->br_phone}}</a></span></li>
						<li class="col-md-3 no-padding"><span class="description-title">Email</span><span class="title-detail cl-dark-blue"><a class="cl-red" href="mailto:{{$product->br_email}}">{{$product->br_email}}</a></span></li>
					</ul>
				</div>
			</div>
			<div class="property-features mrgt4x clearfix animated out" data-delay="0" data-animation="fadeInUp">
				<div class="property-heading">
					<h4><span>Mô tả căn hộ</span></h4>
				</div>
				<div class="description-text fs16">
					{!!$product->description!!}
				</div>
			</div>

			<div class="property-features mrgt2x clearfix animated out comments full" id="fb-comments">
				<div class="fb-comments" data-href="{{Request::url()}}" data-width="100%" data-numposts="10"></div>
			</div>

			<!-- <div class="property-features mrgt4x clearfix animated out" data-delay="0" data-animation="fadeInUp">
				<div class="property-heading">
					<h4><span>@if(isset($heading))<b>{{$heading}}</b>@else 'Căn hộ tương tự' @endif mới nhất</span></h4>
				</div>
				<div class="description-text">
				@foreach ($relate_products as $product)
					@include('frontend.partials.product_item')
				@endforeach
				</div>
			</div> -->
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