@extends('frontend.layouts1.master')

@section('body.css')
{!! Minify::stylesheet(array('/frontend/css1/project-menu.css', '/frontend/css1/project.css')) !!}
@endsection

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
<div class="menu-right">
	<nav class="rightMenuScrollspy" id="rightMenuScrollspy">
        <a class="close close-auto-menu dropdown-toggle">
            <i class="fa fa-angle-double-left" title="Ẩn menu"></i>
        </a>
	  <ul class="nav nav-pills nav-stacked" data-spy="affix" data-offset-top="205">
        @if (!empty($project->content))
            <li><a href="#project-about"><i class="fa fa-university"></i>Tổng quan</a></li>
            <!-- {{Route::is('project') ? '' : $project->getLink()}} -->
        @endif
        @foreach ($project_parts as $key => $part)
        	@if ($part->active && (!empty($part->summary) || !empty($part->content)))
            <li><a href="#{{ $part->link }}"><i class="{{ $part->fa_icon }}"></i>{{ $part->name }}</a></li>
            @endif
        @endforeach
	  </ul>
	</nav>
</div>

<div id="call">
<div class="call" style="
    background: #A60A12;
    /*background: #337ab7;*/
    /* width: 140px; */
    height: 33px;
    /* border-radius: 2px; */
    font-weight: bold;
    line-height: 33px;
    font-size: 15px;
    padding: 0 5px;
    bottom: 2px;
    right: 0;
    display: inline-block;
    position: fixed;
    z-index: 99999;
    letter-spacing: 0.2px;
    color: white;
    margin: 0 5px 5px 0px;
">
<a href="tel:{{$project->hotline}}" class="iconcall" style="
    color: #fff;
"><span class="btnCall"></span><span class="fl">Hotline  </span>&nbsp;
<i class="fa fa-phone" aria-hidden="true"></i>
<u class="number_mobile">{{$project->hotline}}</u></a>
</div>
</div>

<section>
	<div class="container" id="project-container">
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
			<!-- <div class="property-single">
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
			</div> -->
			<div class="fotorama" data-fit="cover" data-nav="thumbs" data-width="100%" data-thumbwidth="60" data-thumbheight="42"> <!-- data-height="240" data-thumbwidth="60" data-thumbheight="42" -->
			  @foreach($project_images as $image)
				  <img src="{{Image::url($image->path,850,570,array('crop'))}}" alt="{{$image->title}}" >
			  @endforeach
			</div>
			@endif
			<!-- <div class="property-description mrgt4x clearfix animated out" data-delay="0" data-animation="fadeInUp">
				<div class="property-heading">
					<h4><span>Thông tin căn hộ</span></h4>
				</div>
				<div class="description-content col-md-12">
					<ul class="row">
						
					</ul>
				</div>
			</div> -->
			@if (!empty($project->content))
			<div  id="project-about" class="property-features mrgt4x clearfix animated out" data-delay="0" data-animation="fadeInUp">
				<div class="property-heading">
					<h4><span>Tổng quan {{$project->name}}</span></h4>
				</div>
				<div class="description-text fs16">
					{!!$project->content!!}
				</div>
			</div>
			@endif
			@foreach ($project_parts as $key => $part)
			@if ($part->active && (!empty($part->summary) || !empty($part->content)))
			<div id="{{ $part->link }}" class="property-features mrgt4x clearfix animated out" data-delay="0" data-animation="fadeInUp">
				<div class="property-heading">
					<h4><span>{{ $part->name }}</span></h4>
				</div>
				<div class="description-text fs16">
					@if(!empty($part->summary))
					<p><span class="mrgl2x"></span>- {{ $part->summary }}</p>
					@endif
					{!!$part->content!!}
				</div>
			</div>
			@endif
			@endforeach
			<!-- <div class="property-features mrgt4x clearfix animated out" data-delay="0" data-animation="fadeInUp">
				<div class="property-heading">
					<h4><span>Mô tả căn hộ</span></h4>
				</div>
				<div class="description-text fs16">
					{!!$project->description!!}
				</div>
			</div> -->

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
{!! Minify::javascript('/frontend/js1/pages/project-menu.js') !!}
@endsection