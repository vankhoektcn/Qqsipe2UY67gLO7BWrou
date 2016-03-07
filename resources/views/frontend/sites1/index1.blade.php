@extends('frontend.layouts1.master')
@section('body.content')
<div class="top-tabs">
	<div class="container">
		<!-- <ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#properties" aria-expanded="true"><i class="icon-home10"></i> Properties</a></li>
			<li><a data-toggle="tab" href="#flights" aria-expanded="true"><i class="icon-aircraft"></i>Flights</a></li>
			<li><a data-toggle="tab" href="#vacations" aria-expanded="true"><i class="icon-calendar9"></i>Vacations</a></li>
		</ul> -->
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
		</div>
	</div>
</div>
<section>
	<div class="container">
	<div class="row">
		<div class="col-md-9 no-padding">
			<div class="properties-list-2">
				<ul class="filter-list">
				<li class="col-md-4 mrgb5x col-sm-4">
					<div class="property-box sale-2 animated out" data-delay="0" data-animation="fadeInUp">
						<div class="appartment-img"><img src="/frontend/images1/propertylist-1.jpg" class="img-responsive" alt="#" />
							<div class="room-price"><span>$699<sup>/week</sup></span></div>
							<div class="like-btn"><a href="#"><i class="fa fa-heart"></i></a></div>
						</div>
						<div class="property-text clearfix">
							<div class="resort-name">
								<h4>Big Appartment</h4>
								<p>We are one of the few agents in the area that genuinely are specialists in both sales and lettings. </p>
							</div>
							<div class="detail-btn mrgt3x"> <a href="#" class="sale">FOR SALE</a> </div>
						     <div class="rating">
							  <i class="fa fa-star"></i>
							   <i class="fa fa-star"></i>
							    <i class="fa fa-star"></i>
								 <i class="fa fa-star"></i>
								 <i class="fa fa-star"></i>
								  </div>
						</div>
						<ul class="home2 appartment-detail">
							<li>1 Room</li>
							<li>2 Beds</li>
							<li>184 SQ FT</li>
						</ul>
					</div>
				</li>
				<li class="col-md-4 mrgb5x col-sm-4">
					<div class="property-box rent-2 animated out" data-delay="0" data-animation="fadeInUp">
						<div class="appartment-img"><img src="/frontend/images1/propertylist-2.jpg" class="img-responsive" alt="#" />
							<div class="room-price"><span>$799<sup>/week</sup></span></div>
							<div class="like-btn"><a href="#"><i class="fa fa-heart"></i></a></div>
						</div>
						<div class="property-text">
							<div class="resort-name">
								<h4>Big Appartment</h4>
								
								<p>We are one of the few agents in the area that genuinely are specialists in both sales and lettings. </p>
							</div>
							<div class="detail-btn mrgt3x"> <a href="#" class="rent">FOR RENT</a> </div>
						    <div class="rating">
							 <i class="fa fa-star"></i>
							  <i class="fa fa-star"></i>
							   <i class="fa fa-star"></i>
							    <i class="fa fa-star"></i> </div>
						</div>
						<ul class="home2 appartment-detail">
							<li>1 Room</li>
							<li>2 Beds</li>
							<li>184 SQ FT</li>
						</ul>
					</div>
				</li>
				<li class="col-md-4 mrgb5x col-sm-4">
					<div class="property-box rent-2 animated out" data-delay="0" data-animation="fadeInUp">
						<div class="appartment-img"><img src="/frontend/images1/propertylist-3.jpg" class="img-responsive" alt="#" />
							<div class="room-price"><span>$888<sup>/week</sup></span></div>
							<div class="like-btn"><a href="#"><i class="fa fa-heart"></i></a></div>
						</div>
						<div class="property-text">
							<div class="resort-name">
								<h4>Big Appartment</h4>
								
								<p>We are one of the few agents in the area that genuinely are specialists in both sales and lettings. </p>
							</div>
							<div class="detail-btn mrgt3x"> <a href="#" class="rent">FOR RENT</a> </div>
						    <div class="rating">
							 <i class="fa fa-star"></i>
							  <i class="fa fa-star"></i>
							   <i class="fa fa-star"></i>
							    <i class="fa fa-star"></i> </div>
						</div>
						<ul class="home2 appartment-detail">
							<li>1 Room</li>
							<li>2 Beds</li>
							<li>184 SQ FT</li>
						</ul>
					</div>
				</li>
				<li class="col-md-4 mrgb5x col-sm-4">
					<div class="property-box rent-2 animated out" data-delay="0" data-animation="fadeInUp">
						<div class="appartment-img"><img src="/frontend/images1/propertylist-5.jpg" class="img-responsive" alt="#" />
							<div class="room-price"><span>$599<sup>/week</sup></span></div>
							<div class="like-btn"><a href="#"><i class="fa fa-heart"></i></a></div>
						</div>
						<div class="property-text">
							<div class="resort-name">
								<h4>Big Appartment</h4>
								
								<p>We are one of the few agents in the area that genuinely are specialists in both sales and lettings. </p>
							</div>
							<div class="detail-btn mrgt3x"> <a href="#" class="rent">FOR RENT</a> </div>
						    <div class="rating">
							 <i class="fa fa-star"></i>
							  <i class="fa fa-star"></i>
							   <i class="fa fa-star"></i>
							    <i class="fa fa-star"></i> </div>
						</div>
						<ul class="home2 appartment-detail">
							<li>1 Room</li>
							<li>2 Beds</li>
							<li>184 SQ FT</li>
						</ul>
					</div>
				</li>
				<li class="col-md-4 mrgb5x col-sm-4">
					<div class="property-box rent-2 animated out" data-delay="0" data-animation="fadeInUp">
						<div class="appartment-img"><img src="/frontend/images1/propertylist-6.jpg" class="img-responsive" alt="#" />
							<div class="room-price"><span>$699<sup>/week</sup></span></div>
							<div class="like-btn"><a href="#"><i class="fa fa-heart"></i></a></div>
						</div>
						<div class="property-text clearfix">
							<div class="resort-name">
								<h4>Big Appartment</h4>
								<p>We are one of the few agents in the area that genuinely are specialists in both sales and lettings. </p>
							</div>
							<div class="detail-btn mrgt3x"> <a href="#" class="rent">FOR RENT</a> </div>
						     <div class="rating">
							  <i class="fa fa-star"></i>
							   <i class="fa fa-star"></i>
							    <i class="fa fa-star"></i>
								 <i class="fa fa-star"></i>
								 <i class="fa fa-star"></i>
								  </div>
						</div>
						<ul class="home2 appartment-detail">
							<li>1 Room</li>
							<li>2 Beds</li>
							<li>184 SQ FT</li>
						</ul>
					</div>
				</li>
				<li class="col-md-4 mrgb5x col-sm-4">
					<div class="property-box rent-2 animated out" data-delay="0" data-animation="fadeInUp">
						<div class="appartment-img"><img src="/frontend/images1/propertylist-7.jpg" class="img-responsive" alt="#" />
							<div class="room-price"><span>$799<sup>/week</sup></span></div>
							<div class="like-btn"><a href="#"><i class="fa fa-heart"></i></a></div>
						</div>
						<div class="property-text clearfix">
							<div class="resort-name">
								<h4>Big Appartment</h4>
								<p>We are one of the few agents in the area that genuinely are specialists in both sales and lettings. </p>
							</div>
							<div class="detail-btn mrgt3x"> <a href="#" class="rent">FOR RENT</a> </div>
						     <div class="rating">
							  <i class="fa fa-star"></i>
							   <i class="fa fa-star"></i>
							    <i class="fa fa-star"></i>
								 <i class="fa fa-star"></i>
								 <i class="fa fa-star"></i>
								  </div>
						</div>
						<ul class="home2 appartment-detail">
							<li>1 Room</li>
							<li>2 Beds</li>
							<li>184 SQ FT</li>
						</ul>
					</div>
				</li>
				<li class="col-md-4 mrgb5x col-sm-4">
					<div class="property-box sale-2 animated out" data-delay="0" data-animation="fadeInUp">
						<div class="appartment-img"><img src="/frontend/images1/propertylist-9.jpg" class="img-responsive" alt="#" />
							<div class="room-price"><span>$699<sup>/week</sup></span></div>
							<div class="like-btn"><a href="#"><i class="fa fa-heart"></i></a></div>
						</div>
						<div class="property-text">
							<div class="resort-name">
								<h4>Big Appartment</h4>
								
								<p>We are one of the few agents in the area that genuinely are specialists in both sales and lettings. </p>
							</div>
							<div class="detail-btn mrgt3x"> <a href="#" class="sale">FOR SALE</a> </div>
						    <div class="rating">
							 <i class="fa fa-star"></i>
							  <i class="fa fa-star"></i>
							   <i class="fa fa-star"></i>
							    <i class="fa fa-star"></i> </div>
						</div>
						<ul class="home2 appartment-detail">
							<li>1 Room</li>
							<li>2 Beds</li>
							<li>184 SQ FT</li>
						</ul>
					</div>
				</li>
				<li class="col-md-4 mrgb5x col-sm-4">
					<div class="property-box rent-2 animated out" data-delay="0" data-animation="fadeInUp">
						<div class="appartment-img"><img src="/frontend/images1/propertylist-10.jpg" class="img-responsive" alt="#" />
							<div class="room-price"><span>$859<sup>/week</sup></span></div>
							<div class="like-btn"><a href="#"><i class="fa fa-heart"></i></a></div>
						</div>
						<div class="property-text">
							<div class="resort-name">
								<h4>Big Appartment</h4>
								
								<p>We are one of the few agents in the area that genuinely are specialists in both sales and lettings. </p>
							</div>
							<div class="detail-btn mrgt3x"> <a href="#" class="rent">FOR RENT</a> </div>
						    <div class="rating">
							 <i class="fa fa-star"></i>
							  <i class="fa fa-star"></i>
							   <i class="fa fa-star"></i>
							    <i class="fa fa-star"></i> </div>
						</div>
						<ul class="home2 appartment-detail">
							<li>1 Room</li>
							<li>2 Beds</li>
							<li>184 SQ FT</li>
						</ul>
					</div>
				</li>
				<li class="col-md-4 mrgb5x col-sm-4">
					<div class="property-box rent-2 animated out" data-delay="0" data-animation="fadeInUp">
						<div class="appartment-img"><img src="/frontend/images1/propertylist-11.jpg" class="img-responsive" alt="#" />
							<div class="room-price"><span>$999<sup>/week</sup></span></div>
							<div class="like-btn"><a href="#"><i class="fa fa-heart"></i></a></div>
						</div>
						<div class="property-text">
							<div class="resort-name">
								<h4>Big Appartment</h4>
								
								<p>We are one of the few agents in the area that genuinely are specialists in both sales and lettings. </p>
							</div>
							<div class="detail-btn mrgt3x"> <a href="#" class="rent">FOR RENT</a> </div>
						    <div class="rating">
							 <i class="fa fa-star"></i>
							  <i class="fa fa-star"></i>
							   <i class="fa fa-star"></i>
							    <i class="fa fa-star"></i> </div>
						</div>
						<ul class="home2 appartment-detail">
							<li>1 Room</li>
							<li>2 Beds</li>
							<li>184 SQ FT</li>
						</ul>
					</div>
				</li>
			</ul>
			</div>
		</div>
		<div class="col-md-3 col-sm-8">
			<div class="right-side-bar">
				<div class="rightbar-heading">
					<h4>DEFINE YOUR PROPERTY</h4>
				</div>
				<div class="define-property mrgb9x animated out" data-delay="0" data-animation="fadeInUp">
					<div class="form-section price-slider mrgb4x">
						<p>
							<label for="amount">Price</label>
							<input type="text" id="amount" readonly style="border:0; color:#fa8526; font-weight:bold;">
						</p>
						<div id="slider-range"><span class="minvalue">MIN</span><span class="maxvalue">MAX</span></div>
					</div>
					<div class="form-section size-slider">
						<p>
							<label for="size">Size</label>
							<input type="text" id="size" readonly style="border:0; color:#fa8526; font-weight:bold;">
						</p>
						<div id="slider-range4"><span class="minvalue">MIN</span><span class="maxvalue">MAX</span></div>
					</div>
				</div>
				<div class="rightbar-heading mrgb4x">
					<h4>CHOOSE PREFERENCES</h4>
				</div>
				<div class="search-property mrgb5x clearfix animated out" data-delay="0" data-animation="fadeInUp">
					<form id="property-search" name="propertysearch" method="post">
						<div class="select-box">
							<select class="form-control" name="dropdown">
								<option value="type">PROPERTY TYPE</option>
							</select>
						</div>
						<div class="select-box">
							<select class="form-control" name="dropdown">
								<option value="status">PROPERTY STATUS</option>
							</select>
						</div>
						<div class="select-box">
							<select class="form-control" name="dropdown">
								<option value="number">LOCATION</option>
							</select>
						</div>
						<div class="select-box">
							<select class="form-control" name="dropdown">
								<option value="number">NUMBER OF BEDROOMS</option>
							</select>
						</div>
						<div class="select-box">
							<select class="form-control" name="dropdown">
								<option value="number">NUMBER OF BATHROOMS</option>
							</select>
						</div>
						<div class="select-box">
							<select class="form-control" name="dropdown">
								<option value="number">NUMBER OF GUESTS</option>
							</select>
						</div>
						<div class="checkbox">
							<div class="form-group">
								<label>
									<input type="checkbox" name="for-sale" value="sale">
									<span class="bg-checkbox"></span>
									FOR SALE
								</label>
							</div>
							<div class="form-group">
								<label>
									<input type="checkbox" name="for-sale" value="sale">
									<span class="bg-checkbox"></span>
									FOR SALE
								</label>
							</div>
						<div class="search-btn clearfix"> <a href="#" class="property-search">SEARCH</a> </div>
						</div>
					</form>
				</div>
				<div class="rightbar-heading mrgb3x">
					<h4>PROPERTY RATING</h4>
				</div>
				<ul class="rating mrgb5x animated out" data-delay="0" data-animation="fadeInUp">
					<li class="five-star checkbox">
					<label>
						<input type="checkbox" name="starz" value="5">
						<span class="bg-checkbox"></span>
						<i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <span>5 Stars</span></label> </li>
						
					<li class="four-star checkbox">
					<label>
						<input type="checkbox" name="starz" value="5">
						<span class="bg-checkbox"></span>
						<i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <span>4 Stars</span></label> </li>
					
					<li class="three-star checkbox">
					<label>
						<input type="checkbox" name="starz" value="5">
						<span class="bg-checkbox"></span>
						<i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <span>3 Stars</span></label> </li>
					
					<li class="two-star checkbox">
					<label>
						<input type="checkbox" name="starz" value="5">
						<span class="bg-checkbox"></span>
						<i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <span>2 Stars</span></label> </li>
					
					<li class="single-star checkbox">
					<label>
					
						<input type="checkbox" name="starz" value="5">
						<span class="bg-checkbox"></span>
						<i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <span>1 Star</span></label> </li>
				</ul>
				<div class="rightbar-heading mrgb3x">
					<h4>ACCOMODATION TYPE</h4>
				</div>
				<ul class="accomodation animated out" data-delay="0" data-animation="fadeInUp">
					<li class="checkbox">
					<label>
						<input type="checkbox" name="accomodation" value="hotel">
						<span class="bg-checkbox"></span>
						<span>HOTEL</span></label></li>
						
					<li class="checkbox">
					<label>
						<input type="checkbox" name="accomodation" value="apartment">
						<span class="bg-checkbox"></span>
						<span>APARTMENT</span>
						</label></li>
						
					<li class="checkbox">
					<label>
						<input type="checkbox" name="accomodation" value="bunglow">
						<span class="bg-checkbox"></span>
						<span>BUNGLOW</span>
						</label></li>
						
					<li class="checkbox">
					<label>
						<input type="checkbox" name="accomodation" value="resort">
						<span class="bg-checkbox"></span>
						<span>RESORT</span></label></li>
						
					<li class="checkbox">
					<label>
						<input type="checkbox" name="accomodation" value="room">
						<span class="bg-checkbox"></span>
						<span>ROOM</span></label></li>
						
					<li class="checkbox">
					<label>
						<input type="checkbox" name="accomodation" value="beach-house">
						<span class="bg-checkbox"></span>
						<span>BEACH HOUSE</span></label></li>
						
					<li class="checkbox">
					<label>
						<input type="checkbox" name="accomodation" value="villa">
						<span class="bg-checkbox"></span>
						<span>VILLA</span>
						</label></li>
				</ul>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="numbering mrgb4x">
			<ul class="pagination">
				<li class="active"><a href="#">01</a></li>
				<li><a href="#">02</a></li>
				<li><a href="#">03</a></li>
				<li><a href="#">04</a></li>
				<li><a href="#">05</a></li>
			</ul>
		</div>
	</div>
	</div>
</section>

@endsection

@section('body.js')

@endsection