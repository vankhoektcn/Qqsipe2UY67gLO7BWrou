@extends('frontend.layouts1.master')
@section('body.content')
<div class="border-top mrgb3x"></div>
<div class="top-tabs">
	<div class="container">
		<ul class="nav nav-tabs hide" style="margin-top:0px">
			<li class="active"><a data-toggle="tab" href="#properties" aria-expanded="true"><i class="icon-home10"></i> Tìm kiếm dự án</a></li>
			<li><a data-toggle="tab" href="#flights" aria-expanded="true"><i class="icon-aircraft"></i>Flights</a></li>
			<li><a data-toggle="tab" href="#vacations" aria-expanded="true"><i class="icon-calendar9"></i>Vacations</a></li>
		</ul>
		<div class="tab-content clearfix">
			<div id="properties" class="tab-pane fade in active">
				<div class="search-options">
					<div class="search-form">
						<form id="property-search" name="propertysearch" method="post">
							<div class="form-inner">
								<div class="left-options col-md-12">									
									<div class="form-section col-md-3">
										<label>Loại</label>
										<div class="select-box">
											<select class="form-control" name="type">
												<option value="DUAN">Dự án</option>
												<option value="TINDANG">Tin đăng</option>
											</select>
										</div>
									</div>
									<div class="form-section col-md-3">
										<label>Tỉnh/thành phố</label>
										<div class="select-box">
											<select class="form-control" name="province">
												<option selected="selected" value="0">--Tất cả--</option>
												@foreach ($provinces as $province)
												<option value="{{$province->id}}">{{$province->name}}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="form-section col-md-3">
										<label>Quận/Huyện</label>
										<div class="select-box">
											<select class="form-control" name="district">
												
											</select>
										</div>
									</div>
									<div class="form-section col-md-3">
										<label>Đường/Phố</label>
										<div class="select-box">
											<select class="form-control" name="street">												
											</select>
										</div>
									</div>
									<div class="form-section col-md-3">
										<label>Dự án</label>
										<div class="select-box">
											<select class="form-control" name="project">
												
											</select>
										</div>
									</div>
									<div class="form-section col-md-3">
										<label>Diện tích</label>
										<div class="select-box">
											<select class="form-control" name="area">
												<option selected="selected" value="0">--Tất cả--</option>
												<option value="1">Dưới 30 m2</option>
												<option value="2">30 - 50 m2</option>
												<option value="3">50 - 70 m2</option>
												<option value="4">70 - 100 m2</option>
												<option value="5">100 - 150 m2</option>
												<option value="6">150 - 200 m2</option>
												<option value="7">200 - 250 m2</option>
												<option value="8">250 - 300 m2</option>
												<option value="9">300 - 350 m2</option>
												<option value="10">350 - 400 m2</option>
												<option value="11">400 - 600 m2</option>
												<option value="12">600 - 800 m2</option>
												<option value="13">800 - 1000 m2</option>
												<option value="14">Trên 1000 m2</option>												
											</select>
										</div>
									</div>
									<div class="form-section col-md-3">
										<label>Mức giá</label>
										<div class="select-box">
											<select class="form-control" name="price">	
												<option selected="selected" value="0">--Tất cả--</option>
												<option value="3">3 - 5 triệu</option>
												<option value="4">5 - 10 triệu</option>
												<option value="5">10 - 15 triệu</option>
												<option value="6">15 - 20 triệu</option>
												<option value="7">20 - 30 triệu</option>
												<option value="8">30 - 40 triệu</option>
												<option value="9">40 - 60 triệu</option>
												<option value="10">60 - 80 triệu</option>
												<option value="11">80 - 100 triệu</option>
												<option value="12">100 - 300 triệu</option>
												<option value="13">300 - 500 triệu</option>
												<option value="14">500 - 800 triệu</option>
												<option value="15">800 - 1 tỷ</option>
												<option value="16">1 - 2 tỷ</option>
												<option value="17">2 - 3 tỷ</option>
												<option value="18">3 - 4 tỷ</option>
												<option value="19">4 - 6 tỷ</option>
												<option value="20">6 - 8 tỷ</option>
												<option value="21">8 - 10 tỷ</option>
												<option value="22">10 - 15 tỷ</option>
												<option value="23">15 - 20 tỷ</option>
												<option value="24">Trên 20 tỷ</option>											
											</select>
										</div>
									</div>
									<div class="form-section col-md-3">
										<label>Tìm</label>
										<button type="submit" class="btn btn-primary form-control">Tìm kiếm</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<section>
	<div class="container mrgt6x">
		<div class="visit-place ">
			<div class="section-heading mrgb3x">
				<h3><span>DỰ ÁN NỔI BẬT</span></h3>
			</div>
			<div class="section-detail mrgb3x">
				@foreach ($projectsSpecal as $project)
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
				<!-- <div class="col-md-4 col-sm-6">
					<div class="home2 property-box border-hover animated out" data-delay="0" data-animation="fadeInUp">
						<div class="appartment-img"><img src="/frontend/images1/home2-property-2.jpg" class="img-responsive" alt="#" />
							<div class="room-price"><span>$1350<sup>/week</sup></span></div>
							<div class="like-btn"><a href="javascript:;"><i class="fa fa-heart"></i></a></div>
						</div>
						<div class="property-text">
							<div class="resort-name">
								<h4>Hawaii Resort</h4>
								<div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
								<p>f you’re a home owner looking to move on, we will come and carry out a free, no-obligation valuation on your property.</p>
							</div>
							<div class="detail-btn mrgt4x mrgb3x"> <a href="javascript:;" class="more-detail"><i class="fa fa-angle-right"></i>MORE DETAIL</a> </div>
						</div>
						<ul class="home2 appartment-detail">
							<li>1 Room</li>
							<li>6 Beds</li>
							<li>1 Bath</li>
							<li>122 SQ FT</li>
						</ul>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<div class="home2 property-box border-hover animated out" data-delay="0" data-animation="fadeInUp">
						<div class="appartment-img"><img src="/frontend/images1/home2-property-3.jpg" class="img-responsive" alt="#" />
							<div class="room-price"><span>$499<sup>/week</sup></span></div>
							<div class="like-btn"><a href="javascript:;"><i class="fa fa-heart"></i></a></div>
						</div>
						<div class="property-text">
							<div class="resort-name">
								<h4>Cuba Luxury Hotel</h4>
								<div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
								<p>We do market all our properties on the big property websites and our own site but we may have something new on our books.</p>
							</div>
							<div class="detail-btn mrgt4x mrgb3x"> <a href="javascript:;" class="more-detail"><i class="fa fa-angle-right"></i>MORE DETAIL</a> </div>
						</div>
						<ul class="home2 appartment-detail">
							<li>1 Room</li>
							<li>4 Beds</li>
							<li>1 Bath</li>
							<li>174 SQ FT</li>
						</ul>
					</div>
				</div> -->
			</div>
		</div>
	</div>
</section>

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
						<div class="blog clearfix apartment-item ps-relative mrgt2x">
							<div class="blog-img"><img src="{{Image::url($product->getThumnail(),100,100,array('crop'))}}" class="img-responsive" alt="#" /></div>
							<div class="blog-text">
								<a class="fw-bold fs15" href="{{$product->getLink()}}">{{$product->title}}</a>
								<div class="address mrgt05"> <i class="fa fa-map-marker project-marker mrgr05"></i> <small><em>{{$product->address}}, Quận 9, Hồ Chí Minh</em></small> </div>
								<div class="item_price mrgt05">
                                    Giá:
                                    <span class="price fw-bold mrgr2x"> {{$product->price}} Tỷ </span>
                                    Diện tích:
                                    <span class="acreage fw-bold"> {{$product->area}} m²</span>
                                </div>
								<p><!-- Alternatively if you have a specific service or question in mind please don’t hesitate to contact us to discuss ... --></p>
								<ul class="time">
									<li><a href="javascript:;"><i class="icon-access-time mrgr05 cl-green"></i>{{$product->updated_at->format('d/m/Y')}}</a></li>
								</ul>
							</div>
						</div>
						@endforeach
					</div>
					<div class="section-more pull-right">
						<a href="javascript:;" title="Xem thêm {{$product_type->name}}" class="text-primary">
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
				<!-- <div class="col-md-3 col-sm-4 mrgb8x animated out" data-delay="0" data-animation="fadeInUp">
					<div class="agent-profile">
						<div class="agent-img"><img src="/frontend/images1/agent-1.jpg" class="img-responsive" alt="#" />
							<div class="img-hover"> <a href="images/agent-1.jpg" class="plus-link"></a></div>
						</div>
						<div class="agent-detail">
							<div class="agent-name">
								<h5>Jonathan Doe</h5>
								<span class="vaction">vaction</span> </div>
							<ul class="agent-contact">
								<li><i class="fa fa-phone"></i></li>
								<li><span>Mobile</span></li>
								<li class="contact-info"><a href="javascript:;">+49 123 456 789</a></li>
							</ul>
							<ul class="agent-mail">
								<li><i class="icon-email4"></i></li>
								<li><span>E-mail</span></li>
								<li class="contact-info"><a href="javascript:;"> johndoe@email.com</a></li>
							</ul>
							<ul class="social-profile">
								<li><a href="javascript:;"><i class="fa fa-facebook"></i></a></li>
								<li><a href="javascript:;"><i class="fa fa-twitter"></i></a></li>
								<li><a href="javascript:;"><i class="fa fa-instagram"></i></a></li>
								<li><a href="javascript:;"><i class="fa fa-google"></i></a></li>
							</ul>
							<div class="full-profile-btn"> <a href="javascript:;" class="see-more">see full profile</a> </div>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-4 mrgb8x animated out" data-delay="0" data-animation="fadeInUp">
					<div class="agent-profile">
						<div class="agent-img"> <img src="/frontend/images1/agent-2.jpg" class="img-responsive" alt="#" />
							<div class="img-hover"> <a href="images/agent-2.jpg" class="plus-link"></a></div>
						</div>
						<div class="agent-detail">
							<div class="agent-name">
								<h5>Susan Withersoon</h5>
								<span class="estate">estate</span> </div>
							<ul class="agent-contact">
								<li><i class="fa fa-phone"></i></li>
								<li><span>Mobile</span></li>
								<li class="contact-info"><a href="javascript:;">+49 123 456 789</a></li>
							</ul>
							<ul class="agent-mail">
								<li><i class="icon-email4"></i></li>
								<li><span>E-mail</span></li>
								<li class="contact-info"><a href="javascript:;"> johndoe@email.com</a></li>
							</ul>
							<ul class="social-profile">
								<li><a href="javascript:;"><i class="fa fa-facebook"></i></a></li>
								<li><a href="javascript:;"><i class="fa fa-twitter"></i></a></li>
								<li><a href="javascript:;"><i class="fa fa-instagram"></i></a></li>
								<li><a href="javascript:;"><i class="fa fa-google"></i></a></li>
							</ul>
							<div class="full-profile-btn"> <a href="javascript:;" class="see-more">see full profile</a> </div>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-4 mrgb8x animated out" data-delay="0" data-animation="fadeInUp">
					<div class="agent-profile">
						<div class="agent-img"> <img src="/frontend/images1/agent-3.jpg" class="img-responsive" alt="#" />
							<div class="img-hover"> <a href="images/agent-3.jpg" class="plus-link"></a></div>
						</div>
						<div class="agent-detail">
							<div class="agent-name">
								<h5>Steven Abraham</h5>
								<span class="vaction">vaction</span> </div>
							<ul class="agent-contact">
								<li><i class="fa fa-phone"></i></li>
								<li><span>Mobile</span></li>
								<li class="contact-info"><a href="javascript:;">+49 123 456 789</a></li>
							</ul>
							<ul class="agent-mail">
								<li><i class="icon-email4"></i></li>
								<li><span>E-mail</span></li>
								<li class="contact-info"><a href="javascript:;"> johndoe@email.com</a></li>
							</ul>
							<ul class="social-profile">
								<li><a href="javascript:;"><i class="fa fa-facebook"></i></a></li>
								<li><a href="javascript:;"><i class="fa fa-twitter"></i></a></li>
								<li><a href="javascript:;"><i class="fa fa-instagram"></i></a></li>
								<li><a href="javascript:;"><i class="fa fa-google"></i></a></li>
							</ul>
							<div class="full-profile-btn"> <a href="javascript:;" class="see-more">see full profile</a> </div>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-4 mrgb8x animated out" data-delay="0" data-animation="fadeInUp">
					<div class="agent-profile">
						<div class="agent-img"> <img src="/frontend/images1/agent-4.jpg" class="img-responsive" alt="#" />
							<div class="img-hover"> <a href="images/agent-4.jpg" class="plus-link"></a></div>
						</div>
						<div class="agent-detail">
							<div class="agent-name">
								<h5>Lucas Bernie </h5>
								<span class="financial">financial</span> </div>
							<ul class="agent-contact">
								<li><i class="fa fa-phone"></i></li>
								<li><span>Mobile</span></li>
								<li class="contact-info"><a href="javascript:;">+49 123 456 789</a></li>
							</ul>
							<ul class="agent-mail">
								<li><i class="icon-email4"></i></li>
								<li><span>E-mail</span></li>
								<li class="contact-info"><a href="javascript:;"> johndoe@email.com</a></li>
							</ul>
							<ul class="social-profile">
								<li><a href="javascript:;"><i class="fa fa-facebook"></i></a></li>
								<li><a href="javascript:;"><i class="fa fa-twitter"></i></a></li>
								<li><a href="javascript:;"><i class="fa fa-instagram"></i></a></li>
								<li><a href="javascript:;"><i class="fa fa-google"></i></a></li>
							</ul>
							<div class="full-profile-btn"> <a href="javascript:;" class="see-more">see full profile</a> </div>
						</div>
					</div>
				</div> -->
			</div>
		</div>
	</div>
</section>

@endsection

@section('body.js')

@endsection