@extends('frontend.layouts1.master')
@section('body.content')

<div class="top-tabs mrgt05 mrgb1x">
	<div class="container">
		<div class="tab-content clearfix">
			@include('frontend.partials.project_search_box')
		</div>
	</div>
</div>
<section>
	<div class="container">
	<div class="row">
		<div class="col-md-9 no-padding">
			<div class="properties-list-2">
				<ul class="filter-list">
					@foreach ($projects as $project)				
					<li class="col-md-4 mrgb5x col-sm-4">
						<div class="property-box sale-2 animated out" data-delay="0" data-animation="fadeInUp">
							<div class="appartment-img"><img src="{{ Image::url($project->getFirstImage(),300,200,array('crop'))}}" class="img-responsive" alt="#" />
								<!-- <div class="room-price"><span>$699<sup>/week</sup></span></div> -->
								<div class="like-btn"><a href="javascript:;"><i class="fa fa-heart"></i></a></div>
							</div>
							<div class="property-text clearfix">
								<div class="resort-name">
									<h4>{{$project->name}}</h4>
									<p>{!!$project->content!!}</p>
								</div>
								<div class="detail-btn mrgt3x"> <a href="javascript:;" class="sale">XEM</a> </div>						     
							</div>
							<ul class="home2 appartment-detail">
								<li>1 Room</li>
								<li>2 Beds</li>
								<li>184 SQ FT</li>
							</ul>
						</div>
					</li>
					@endforeach				
				</ul>
				<div class="clearfix"></div>
				<nav class="text-center">
					{!! $projects->appends(['province' => htmlspecialchars($_GET['province'])])->render() !!}
				</nav>
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
						<div class="search-btn clearfix"> <a href="javascript:;" class="property-search">SEARCH</a> </div>
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
	</div>
	</div>
</section>

@endsection

@section('body.js')
	<script type="text/javascript" src="/frontend/js1/pages/project_search.js"></script>
@endsection