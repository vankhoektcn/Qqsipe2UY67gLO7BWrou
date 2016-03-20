@extends('frontend.layouts1.master')
@section('body.content')
<!-- <div class="border-top mrgb3x"></div> -->
<div class="top-tabs">
	<div class="container">
		<ul class="nav nav-tabs" style="margin-top:0px">
			<li class="active"><a data-toggle="tab" href="#projects-search" aria-expanded="true"><i class="icon-home10"></i> Tìm kiếm dự án</a></li>
			<li><a data-toggle="tab" href="#products-search" aria-expanded="true"><i class="fa fa-newspaper-o"></i>Tìm kiếm tin đăng</a></li><!-- fa-upload -->
			<!-- <li><a data-toggle="tab" href="#flights" aria-expanded="true"><i class="icon-aircraft"></i>Flights</a></li>
			<li><a data-toggle="tab" href="#vacations" aria-expanded="true"><i class="icon-calendar9"></i>Vacations</a></li> -->
		</ul>
		<div class="tab-content clearfix">
			@include('frontend.partials.project_search_box')
			@include('frontend.partials.product_search_box')
		</div>
	</div>
</div>
@if ($projectsNew != null && count($projectsNew) > 0)
<section>
	<div class="container mrgt6x">
		<div class="visit-place ">
			<div class="section-heading mrgb3x">
				<h3><span>DỰ ÁN NỔI BẬT</span></h3>
			</div>
			<div class="section-detail mrgb3x">
				@foreach ($projectsSpecial as $project)
				<div class="col-md-4 col-sm-6">
					<div class="place-img"> <img src="{{ Image::url($project->getFirstImage(),350,225,array('crop'))}}" class="img-responsive" alt="#"/>
						<div class="place-text">
							<h2>{{$project->name}}</h2>
							<a href="{{$project->getLink()}}" target="blank" class="btn btn-primary"><i class="fa fa-map-marker project-marker mrgr05 location-icon"></i>{{$project->addressFull()}}</a>
						</div>
						<div class="btn btn-primary btnProjectSpecalDetail"><a href="{{$project->getLink()}}" target="_blank">CHI TIẾT</a></div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</section>
@endif

@if ($projectsNew != null && count($projectsNew) > 0)
<section>
	<div class="container mrgt6x">
		<div class="visit-place clearfix animated out" data-delay="0" data-animation="fadeInUp">
			<div class="section-heading mrgb3x">
				<h3><span>DỰ ÁN MỚI NHẤT</span></h3>
			</div>
			<div class="section-detail mrgb3x">
				@foreach ($projectsNew as $project)
				<div class="col-md-4 col-sm-6">
					<div class="home2 property-box border-hover animated out" data-delay="0" data-animation="fadeInUp">
						<div class="appartment-img"><img src="{{ Image::url($project->getFirstImage(),350,225,array('crop'))}}" class="img-responsive" alt="#" />
							<!-- <div class="room-price"><span>$699<sup>/week</sup></span></div> -->
							<div class="like-btn"><a href="javascript:;"><i class="fa fa-heart"></i></a></div>
						</div>
						<div class="property-text">
							<div class="resort-name">
								<h4>{{$project->name}}</h4>
								<div class="rating"> <!-- <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> --> </div>
								<div class="address">
									<i class="fa fa-map-marker project-marker mrgr05"></i>
									<small><em>{{$project->addressFull()}}</em></small>
								</div>
								<p>{!!$project->content!!}</p>
							</div>
							<div class="detail-btn mrgt4x mrgb3x"> <a href="{{$project->getLink()}}" target="blank" class="more-detail"><i class="fa fa-angle-right"></i>CHI TIẾT</a> </div>
						</div>
						<!-- <ul class="home2 appartment-detail">
							<li>1 Room</li>
							<li>2 Beds</li>
							<li>1 Bath</li>
							<li>84 SQ FT</li>
						</ul> -->
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</section>
@endif

<section>
	<div class="container mrgt6x">
		<div class="">
			@foreach ($product_types as $product_type)
			<?php $products = $product_type->products()->where('active', 1)->orderBy('priority')->orderBy('created_at','desc')->take(5)->get(); ?>
			@if ($products != null && count($products) > 0)
			<div class="col-md-6">
				<div class="visit-place clearfix animated out" data-delay="0" data-animation="fadeInUp">
					<div class="section-heading mrgb1x">
						<h3><span>{{$product_type->name}}</span></h3>
					</div>
					<div class="section-detail">
						@foreach ($products as $product)
						<!-- <div class="blog clearfix apartment-item ps-relative mrgt2x">
							<div class="blog-img"><img src="{{Image::url($product->getThumnail(),100,100,array('crop'))}}" class="img-responsive" alt="#" /></div>
							<div class="blog-text">
								<a class="fw-bold fs15" href="{{$product->getLink()}}">{{$product->title}}</a>
								<div class="address mrgt05"> <i class="fa fa-map-marker project-marker mrgr05"></i> <small><em>{{$product->address}}, Quận 9, Hồ Chí Minh</em></small> </div>
								<div class="item_price mrgt05">
                                    Giá:
                                    <span class="price fw-bold mrgr2x"> {{$product->price}} {{$product->price_type->name}} </span>
                                    Diện tích:
                                    <span class="acreage fw-bold"> {{$product->area}} m²</span>
                                    <ul class="time">
										<li><a href="javascript:;"><i class="icon-access-time mrgr05 cl-green"></i>{{$product->updated_at->format('d/m/Y')}}</a></li>
									</ul>
                                </div>
								<p>{{{$product->summary}}}</p>								
							</div>
						</div> -->
							@include('frontend.partials.product_item')
						@endforeach
					</div>
					<div class="section-more pull-right">
						<a href="{{$product_type->getLink()}}" title="Xem thêm {{$product_type->name}}" class="text-primary">
			                <i class="fa fa-arrow-right"></i> xem thêm các tin {{$product_type->name}}
			            </a>
					</div>
				</div>
			</div>
			@endif
			@endforeach
		</div>
	</div>
</section>
<section>
	<div class="container mrgt6x">
		<div class="meet-client animated out" data-delay="0" data-animation="fadeInUp">
			<div class="section-heading mrgb6x">
				<h3><span>LIÊN HỆ CHUYÊN VIÊN MÔI GIỚI</span></h3>
			</div>
			<div class="row">
			@foreach ($agents as $agent)			
				<div class="col-md-3 col-sm-4 mrgb8x animated out" data-delay="0" data-animation="fadeInUp">
					<div class="agent-profile">
						<div class="agent-img"><img src="{{ Image::url($agent->thumnail,215,190,array('crop'))}}" class="img-responsive" alt="#" />
							<div class="img-hover"> <a href="{{$agent->thumnail}}" class="plus-link"></a></div>
						</div>
						<div class="agent-detail">
							<div class="agent-name">
								<h5>{{$agent->name}}</h5>
								<!-- <span class="vaction">vaction</span>  -->
							</div>
							<ul class="agent-contact">
								<li><i class="fa fa-phone"></i></li>
								<li><span>Điện thoại</span></li>
								<li class="contact-info"><a href="tel:{{$agent->mobile}}"> {{$agent->mobile}}</a></li>
							</ul>
							<ul class="agent-mail">
								<li><i class="icon-email4"></i></li>
								<li><span>E-mail</span></li>
								<li class="contact-info"><a href="email:{{$agent->email}}"> {{$agent->email}}</a></li>
							</ul>
							<ul class="social-profile">
								<li><a href="javascript:;"><i class="fa fa-facebook"></i></a></li>
								<li><a href="javascript:;"><i class="fa fa-twitter"></i></a></li>
								<li><a href="javascript:;"><i class="fa fa-instagram"></i></a></li>
								<li><a href="javascript:;"><i class="fa fa-google"></i></a></li>
							</ul>
							<!-- <div class="full-profile-btn"> <a href="javascript:;" class="see-more">see full profile</a> </div> -->
						</div>
					</div>
				</div>
			@endforeach
			</div>
		</div>
	</div>
</section>

@endsection

@section('body.js')
<script type="text/javascript" src="/frontend/js1/pages/index.js"></script>
@endsection