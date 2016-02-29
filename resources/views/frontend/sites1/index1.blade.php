@extends('frontend.layouts1.master')
@section('body.content')
<div class="border-top mrgb3x"></div>
<div class="top-tabs">
	<div class="container">
		<ul class="nav nav-tabs" style="margin-top:0px">
			<li class="active"><a data-toggle="tab" href="#properties" aria-expanded="true"><i class="icon-home10"></i> Tìm kiếm dự án</a></li>
			<!-- <li><a data-toggle="tab" href="#flights" aria-expanded="true"><i class="icon-aircraft"></i>Flights</a></li>
			<li><a data-toggle="tab" href="#vacations" aria-expanded="true"><i class="icon-calendar9"></i>Vacations</a></li> -->
		</ul>
		<div class="tab-content clearfix">
			<div id="properties" class="tab-pane fade in active">
				<div class="search-options">
					<div class="search-form">
						<form id="property-search" name="propertysearch" method="post">
							<div class="form-inner">
								<div class="left-options col-md-6">
									<div class="form-section col-md-6">
										<label>Propert ID</label>
										<input class="form-control" placeholder="ANY">
									</div>
									<div class="form-section col-md-6">
										<label>Property Location</label>
										<div class="select-box">
											<select class="form-control" name="dropdown">
												<option value="ANY">ANY</option>
											</select>
										</div>
									</div>
									<div class="form-section col-md-6">
										<label>Rooms</label>
										<input class="form-control" placeholder="1">
									</div>
									<div class="form-section col-md-6">
										<label>Number of Guests</label>
										<div class="select-box">
											<select class="form-control" name="dropdown">
												<option value="5">5</option>
											</select>
										</div>
									</div>
								</div>
								<div class="right-options col-md-6">
									<div class="form-section col-md-6">
										<label>Property Status</label>
										<div class="select-box">
											<select class="form-control" name="dropdown">
												<option value="ANY">ANY</option>
											</select>
										</div>
									</div>
									<div class="form-section col-md-6">
										<label>Property Type</label>
										<div class="select-box">
											<select class="form-control" name="dropdown">
												<option value="Choose">CHOOSE</option>
											</select>
										</div>
									</div>
									<div class="form-section col-md-6">
										<p>
											<label for="amount">Define a price</label>
											<input type="text" id="amount" readonly style="border:0; color:#fa8526; font-weight:bold;">
										</p>
										<div id="slider-range"><span class="minvalue">MIN</span><span class="maxvalue">MAX</span></div>
									</div>
									<div class="form-section col-md-6">
										<div class="search-btn"> <a href="#">SEARCH FOR IT</a> </div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div id="flights" class="tab-pane fade">
				<div class="search-options">
					<div class="search-form">
						<form id="flight-search" name="propertysearch" method="post">
							<div class="form-inner">
								<div class="left-options col-md-6">
									<div class="form-section col-md-6">
										<label>Propert ID</label>
										<input class="form-control" placeholder="ANY">
									</div>
									<div class="form-section col-md-6">
										<label>Property Location</label>
										<div class="select-box">
											<select class="form-control" name="dropdown">
												<option value="ANY">ANY</option>
											</select>
										</div>
									</div>
									<div class="form-section col-md-6">
										<label>Rooms</label>
										<input class="form-control" placeholder="1">
									</div>
									<div class="form-section col-md-6">
										<label>Number of Guests</label>
										<div class="select-box">
											<select class="form-control" name="dropdown">
												<option value="5">5</option>
											</select>
										</div>
									</div>
								</div>
								<div class="right-options col-md-6">
									<div class="form-section col-md-6">
										<label>Property Status</label>
										<div class="select-box">
											<select class="form-control" name="dropdown">
												<option value="ANY">ANY</option>
											</select>
										</div>
									</div>
									<div class="form-section col-md-6">
										<label>Property Type</label>
										<div class="select-box">
											<select class="form-control" name="dropdown">
												<option value="Choose">CHOOSE</option>
											</select>
										</div>
									</div>
									<div class="form-section col-md-6">
										<p>
											<label for="amount">Define a price</label>
											<input type="text" id="amount2" readonly style="border:0; color:#fa8526; font-weight:bold;">
										</p>
										<div id="slider-range2"><span class="minvalue">MIN</span><span class="maxvalue">MAX</span></div>
									</div>
									<div class="form-section col-md-6">
										<div class="search-btn"> <a href="#">SEARCH FOR IT</a> </div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div id="vacations" class="tab-pane fade">
				<div class="search-options">
					<div class="search-form">
						<form id="vacation-search" name="propertysearch" method="post">
							<div class="form-inner">
								<div class="left-options col-md-6">
									<div class="form-section col-md-6">
										<label>Propert ID</label>
										<input class="form-control" placeholder="ANY">
									</div>
									<div class="form-section col-md-6">
										<label>Property Location</label>
										<div class="select-box">
											<select class="form-control" name="dropdown">
												<option value="ANY">ANY</option>
											</select>
										</div>
									</div>
									<div class="form-section col-md-6">
										<label>Rooms</label>
										<input class="form-control" placeholder="1">
									</div>
									<div class="form-section col-md-6">
										<label>Number of Guests</label>
										<div class="select-box">
											<select class="form-control" name="dropdown">
												<option value="5">5</option>
											</select>
										</div>
									</div>
								</div>
								<div class="right-options col-md-6">
									<div class="form-section col-md-6">
										<label>Property Status</label>
										<div class="select-box">
											<select class="form-control" name="dropdown">
												<option value="ANY">ANY</option>
											</select>
										</div>
									</div>
									<div class="form-section col-md-6">
										<label>Property Type</label>
										<div class="select-box">
											<select class="form-control" name="dropdown">
												<option value="Choose">CHOOSE</option>
											</select>
										</div>
									</div>
									<div class="form-section col-md-6">
										<p>
											<label for="amount">Define a price</label>
											<input type="text" id="amount3" readonly style="border:0; color:#fa8526; font-weight:bold;">
										</p>
										<div id="slider-range3"><span class="minvalue">MIN</span><span class="maxvalue">MAX</span></div>
									</div>
									<div class="form-section col-md-6">
										<div class="search-btn"> <a href="#">SEARCH FOR IT</a> </div>
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
							<a href="{{$project->getLink()}}" target="blank">Chi tiết</a> </div>
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
							<div class="like-btn"><a href="#"><i class="fa fa-heart"></i></a></div>
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
				<div class="col-md-4 col-sm-6">
					<div class="home2 property-box border-hover animated out" data-delay="0" data-animation="fadeInUp">
						<div class="appartment-img"><img src="/frontend/images1/home2-property-2.jpg" class="img-responsive" alt="#" />
							<div class="room-price"><span>$1350<sup>/week</sup></span></div>
							<div class="like-btn"><a href="#"><i class="fa fa-heart"></i></a></div>
						</div>
						<div class="property-text">
							<div class="resort-name">
								<h4>Hawaii Resort</h4>
								<div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
								<p>f you’re a home owner looking to move on, we will come and carry out a free, no-obligation valuation on your property.</p>
							</div>
							<div class="detail-btn mrgt4x mrgb3x"> <a href="#" class="more-detail"><i class="fa fa-angle-right"></i>MORE DETAIL</a> </div>
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
							<div class="like-btn"><a href="#"><i class="fa fa-heart"></i></a></div>
						</div>
						<div class="property-text">
							<div class="resort-name">
								<h4>Cuba Luxury Hotel</h4>
								<div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
								<p>We do market all our properties on the big property websites and our own site but we may have something new on our books.</p>
							</div>
							<div class="detail-btn mrgt4x mrgb3x"> <a href="#" class="more-detail"><i class="fa fa-angle-right"></i>MORE DETAIL</a> </div>
						</div>
						<ul class="home2 appartment-detail">
							<li>1 Room</li>
							<li>4 Beds</li>
							<li>1 Bath</li>
							<li>174 SQ FT</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="container mrgt6x">
		<div class="">
			<div class="col-md-6">
				<div class="visit-place clearfix animated out" data-delay="0" data-animation="fadeInUp">
					<div class="section-heading mrgb1x">
						<h3><span>CĂN HỘ SANG NHƯỢNG</span></h3>
					</div>
					<div class="section-detail">
						@foreach ($categoryAll as $project)
						<div class="blog clearfix apartment-item ps-relative mrgt2x">
							<div class="blog-img"><img src="/frontend/images1/blogimg-1.jpg" class="img-responsive" alt="#" /></div>
							<div class="blog-text">
								<a class="fw-bold fs15" href="#">Resources that we thought you may find useful </a>
								<div class="address mrgt05"> <i class="fa fa-map-marker project-marker mrgr05"></i> <small><em>Đỗ Xuân Hợp, Quận 9, Hồ Chí Minh</em></small> </div>
								<div class="item_price mrgt05">
                                    Giá:
                                    <span class="price fw-bold mrgr2x"> 1,1 Tỷ </span>
                                    Diện tích:
                                    <span class="acreage fw-bold"> 51 m²</span>
                                </div>
								<p><!-- Alternatively if you have a specific service or question in mind please don’t hesitate to contact us to discuss ... --></p>
								<ul class="time">
									<li><a href="#"><i class="icon-access-time"></i>28 Aprli, 2014</a></li>
								</ul>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="visit-place clearfix animated out" data-delay="0" data-animation="fadeInUp">
					<div class="section-heading mrgb1x">
						<h3><span>CĂN HỘ CHO THUÊ</span></h3>
					</div>
					<div class="section-detail">
						@foreach ($categoryAll as $project)
						<div class="blog clearfix apartment-item ps-relative mrgt2x">
							<div class="blog-img"><img src="/frontend/images1/blogimg-1.jpg" class="img-responsive" alt="#" /></div>
							<div class="blog-text">
								<a class="fw-bold fs15" href="#">Resources that we thought you may find useful </a>
								<div class="address mrgt05"> <i class="fa fa-map-marker project-marker mrgr05"></i> <small><em>Đỗ Xuân Hợp, Quận 9, Hồ Chí Minh</em></small> </div>
								<div class="item_price mrgt05">
                                    Giá:
                                    <span class="price fw-bold mrgr2x"> 1,1 Tỷ </span>
                                    Diện tích:
                                    <span class="acreage fw-bold"> 51 m²</span>
                                </div>
								<p><!-- Alternatively if you have a specific service or question in mind please don’t hesitate to contact us to discuss ... --></p>
								<ul class="time">
									<li><a href="#"><i class="icon-access-time"></i>28 Aprli, 2014</a></li>
								</ul>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
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
				<div class="col-md-3 col-sm-4 mrgb8x animated out" data-delay="0" data-animation="fadeInUp">
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
								<li class="contact-info"><a href="#">+49 123 456 789</a></li>
							</ul>
							<ul class="agent-mail">
								<li><i class="icon-email4"></i></li>
								<li><span>E-mail</span></li>
								<li class="contact-info"><a href="#"> johndoe@email.com</a></li>
							</ul>
							<ul class="social-profile">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram"></i></a></li>
								<li><a href="#"><i class="fa fa-google"></i></a></li>
							</ul>
							<div class="full-profile-btn"> <a href="#" class="see-more">see full profile</a> </div>
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
								<li class="contact-info"><a href="#">+49 123 456 789</a></li>
							</ul>
							<ul class="agent-mail">
								<li><i class="icon-email4"></i></li>
								<li><span>E-mail</span></li>
								<li class="contact-info"><a href="#"> johndoe@email.com</a></li>
							</ul>
							<ul class="social-profile">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram"></i></a></li>
								<li><a href="#"><i class="fa fa-google"></i></a></li>
							</ul>
							<div class="full-profile-btn"> <a href="#" class="see-more">see full profile</a> </div>
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
								<li class="contact-info"><a href="#">+49 123 456 789</a></li>
							</ul>
							<ul class="agent-mail">
								<li><i class="icon-email4"></i></li>
								<li><span>E-mail</span></li>
								<li class="contact-info"><a href="#"> johndoe@email.com</a></li>
							</ul>
							<ul class="social-profile">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram"></i></a></li>
								<li><a href="#"><i class="fa fa-google"></i></a></li>
							</ul>
							<div class="full-profile-btn"> <a href="#" class="see-more">see full profile</a> </div>
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
								<li class="contact-info"><a href="#">+49 123 456 789</a></li>
							</ul>
							<ul class="agent-mail">
								<li><i class="icon-email4"></i></li>
								<li><span>E-mail</span></li>
								<li class="contact-info"><a href="#"> johndoe@email.com</a></li>
							</ul>
							<ul class="social-profile">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram"></i></a></li>
								<li><a href="#"><i class="fa fa-google"></i></a></li>
							</ul>
							<div class="full-profile-btn"> <a href="#" class="see-more">see full profile</a> </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="container">
		<div class="testimonial animated out" data-delay="0" data-animation="fadeInUp">
			<div class="col-md-6">
				<div class="section-heading mrgb4x">
					<h3>What did your clients say</h3>
				</div>
				<div class="section-detail">
					<div class="testi-carousel owl-carousel">
						<div class="item">
							<div class="testimonial-box">
								<div class="client-img"> <img src="/frontend/images1/testimonial-img.jpg" class="img-responsive" alt="#" /> </div>
								<div class="client-name">
									<h4>Jessica P.</h4>
								</div>
								<div class="rating"> <span>13 July, 2014</span> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
								<div class="client-review">
									<p>The best lunch ever. I really liked this hotel, as it was just perfect. We had some fun with the animations and the rooms were very clean. We can create a brand that stands out and truly reflects your business.</p>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimonial-box">
								<div class="client-img"> <img src="/frontend/images1/testimonial-img.jpg" class="img-responsive" alt="#" /> </div>
								<div class="client-name">
									<h4>Jessica P.</h4>
								</div>
								<div class="rating"> <span>13 July, 2014</span> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
								<div class="client-review">
									<p>The best lunch ever. I really liked this hotel, as it was just perfect. We had some fun with the animations and the rooms were very clean. We can create a brand that stands out and truly reflects your business.</p>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimonial-box">
								<div class="client-img"> <img src="/frontend/images1/testimonial-img.jpg" class="img-responsive" alt="#" /> </div>
								<div class="client-name">
									<h4>Jessica P.</h4>
								</div>
								<div class="rating"> <span>13 July, 2014</span> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
								<div class="client-review">
									<p>The best lunch ever. I really liked this hotel, as it was just perfect. We had some fun with the animations and the rooms were very clean. We can create a brand that stands out and truly reflects your business.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="latest-news animated out" data-delay="0" data-animation="fadeInUp">
			<div class="col-md-6 mrgb3x">
				<div class="section-heading mrgb4x">
					<h3>Latest News from our Blog</h3>
				</div>
				<div class="section-detail">
					<div class="blog clearfix">
						<div class="blog-img"><img src="/frontend/images1/blogimg-1.jpg" class="img-responsive" alt="#" /></div>
						<div class="blog-text">
							<h4>Resources that we thought you may find useful </h4>
							<ul class="time">
								<li><a href="#"><i class="icon-access-time"></i>28 Aprli, 2014</a></li>
								<li><a href="#"><i class="icon-user13"></i>Jackson Matins</a></li>
							</ul>
							<p>Alternatively if you have a specific service or question in mind please don’t hesitate to contact us to discuss ...</p>
							<a href="#" class="more-btn"><span>MORE</span></a> </div>
					</div>
					<div class="blog">
						<div class="blog-img"><img src="/frontend/images1/blogimg-2.jpg" class="img-responsive" alt="#" /></div>
						<div class="blog-text">
							<h4>What about your next vaction?</h4>
							<ul class="time">
								<li><a href="#"><i class="icon-access-time"></i>28 Aprli, 2014</a></li>
								<li><a href="#"><i class="icon-user13"></i>Jackson Matins</a></li>
							</ul>
							<p>Alternatively if you have a specific service or question in mind please don’t hesitate to contact us to discuss ...</p>
							<a href="#" class="more-btn"><span>MORE</span></a> </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="container">
		<div class="partners mrgt3x mrgb8x animated out" data-delay="0" data-animation="fadeInUp">
			<div class="partner-carousel owl-carousel">
				<div class="item"> <a href="#"> <img src="/frontend/images1/partner-1.jpg" class="img-responsive" alt="#" /> </a> </div>
				<div class="item"> <a href="#"><img src="/frontend/images1/partner-2.jpg" class="img-responsive" alt="#" /></a> </div>
				<div class="item"> <a href="#"> <img src="/frontend/images1/partner-3.jpg" class="img-responsive" alt="#" /></a> </div>
				<div class="item"> <a href="#"> <img src="/frontend/images1/partner-4.jpg" class="img-responsive" alt="#" /></a> </div>
				<div class="item"> <a href="#"> <img src="/frontend/images1/partner-5.jpg" class="img-responsive" alt="#" /></a> </div>
				<div class="item"> <a href="#"><img src="/frontend/images1/partner-2.jpg" class="img-responsive" alt="#" /></a> </div>
				<div class="item"> <a href="#"> <img src="/frontend/images1/partner-3.jpg" class="img-responsive" alt="#" /></a> </div>
				<div class="item"> <a href="#"> <img src="/frontend/images1/partner-4.jpg" class="img-responsive" alt="#" /></a> </div>
				<div class="item"> <a href="#"> <img src="/frontend/images1/partner-5.jpg" class="img-responsive" alt="#" /></a> </div>
				<div class="item"> <a href="#"> <img src="/frontend/images1/partner-1.jpg" class="img-responsive" alt="#" /> </a> </div>
			</div>
		</div>
	</div>
</section>

@endsection

@section('body.js')

@endsection