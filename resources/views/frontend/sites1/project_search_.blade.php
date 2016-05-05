@extends('frontend.layouts1.master')
@section('body.content')

<section class="border-top title-breadcrumb">
	<div class="container">
		<div class="page-title mrgt1x mrgb05 clearfix">
			<h4 class="page-name">Tìm kiếm dự án</h4>
			<div class="tag-bar"> <a href="{{Request::url(). (Request::getQueryString() ? ('?' . Request::getQueryString()) : '')}}"><span>{!!$searchDescription!!}</span></a> </div>
			<ul class="breadcrumb">
				<li><a href="{{ route('homepage') }}">Trang chủ</a></li>
				<li class="active"><a href="{{ route('project_search') }}">Tìm dự án</a></li>
			</ul>
		</div>
	</div>
</section>
<div class="top-tabs mrgt05 mrgb1x">
	<div class="container">
		<div class="tab-content clearfix search-box-min">
			@include('frontend.partials.project_search_box')
		</div>
	</div>
</div>
<section>
	<div class="container">
	<div class="row mrgt1x">
		<div class="col-md-9 no-padding">
			<div class="properties-list-2">
				<ul class="filter-list">
					@foreach ($projects as $project)				
					<li class="col-md-4 mrgb5x col-sm-4">
						<div class="property-box sale-2 animated out" data-delay="0" data-animation="fadeInUp">
							<div class="appartment-img">
								<a href="{{$project->getLink()}}" target="_blank">
									<img class="lazy" src="/frontend/images/spacer.gif" data-src="{{ Image::url($project->getFirstImage(),300,200,array('crop'))}}" class="img-responsive" alt="{{$project->name}}" />
								</a>
								<!-- <div class="room-price"><span>$699<sup>/week</sup></span></div> -->
								<div class="like-btn"><a href="javascript:;"><i class="fa fa-heart"></i></a></div>
							</div>
							<div class="property-text clearfix">
								<div class="resort-name">
									<a href="{{$project->getLink()}}" target="_blank"><h4>{{$project->name}}</h4></a>
									<div class="address">
										<i class="fa fa-map-marker project-marker mrgr05"></i>
										<small><em>{{$project->addressFull()}}</em></small>
									</div>
									<p>{!!$project->content!!}</p>
								</div>
								<div class="detail-btn mrgt3x"> <a href="{{$project->getLink()}}" target="_blank" class="sale">CHI TIẾT DỰ ÁN</a> </div>						     
							</div>
						</div>
					</li>
					@endforeach				
				</ul>
				<div class="clearfix"></div>
				<nav class="text-center">
					{!! $projects->render() !!}
				</nav>
			</div>
		</div>
		<div class="col-md-3 col-sm-8">
			<div class="right-side-bar">

				<div class="blog-post mrgt0 animated out padb2x" data-delay="0" data-animation="fadeInUp">
					<div class="rightbar-heading mrgb2x">
						<h4>Dự án nổi bật</h4>
					</div>
					@foreach ($projectsSpecial as $project)	
					<div class="post-area">
						<a href="{{$project->getLink()}}" target="_blank"><h4>{{$project->name}}</h4></a>
						<div class="address">
							<i class="fa fa-map-marker project-marker mrgr05"></i>
							<small class="people-travel"><em>{{$project->addressFull()}}</em></small>
						</div>
					</div>
					@endforeach
					<!-- <div class="post-area">
						<h4>BOOK YOUR NEXT HOLIDAYS</h4>
						<span class="book-holiday">POSTED ON NOVEMBER 08, 2014</span> </div>
					<div class="post-area">
						<h4>WHERE PEOPLE TRAVEL 2014</h4>
						<span class="people-travel">POSTED ON NOVEMBER 03, 2014</span> </div> -->
				</div>

				<div class="rightbar-heading mrgb2x">
					<h4>Dự án theo quận Tp.HCM</h4>
				</div>
				<ul class="accomodation animated out" data-delay="0" data-animation="fadeInUp">
					@foreach ($districtProject as $district)	
					<li class="">
						<a href="{{ route('project_search').'?district='.$district->id }}">Dự án <b>{{$district->name}}</b></a>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
	</div>
</section>

@endsection

@section('body.js')
@endsection