@extends('frontend.layouts.master')
@section('head.title', 'Gia sư Hoa Văn')
@section('body.content')
	
	<div class="blog">
		<div class="blog-content">
			<div class="blog-content-left pull-right">
			<?php if(($articles->count() == 0)): ?>
				<h4>Không tìm thấy kết quả với <b class="searchKey">"{{$_GET['keyword']}}"</b> </h4>
			<?php endif; ?>
			<?php if(($articles->count() > 0)): ?>
				<h4>Kết quả tìm kiếm <b class="searchKey">"{{$_GET['keyword']}}"</b> </h4>
				<div class="blog-articals">
				@foreach ($articles as $index => $article)				
					<div class="blog-artical">
						<div class="blog-artical-info">
							<div class="blog-artical-info-img">
								<a href="{{ $article->getLink() }}"><img src="{{ Image::url($article->getFirstAttachment(),814,364,array('crop')) }}" title="{{ $article->name }}"></a>
							</div>
							<div class="blog-artical-info-head">
								<h2><a href="{{ $article->getLink() }}">{{ $article->name }}</a></h2>
								<h6>Đăng bởi {{ $article->created_by }} vào lúc {{ $article->created_at->format('h:ia - d/m/Y')}}</h6>
							</div>
							<div class="blog-artical-info-text">
								<p>{{$article->summary}}
									<a href="{{ $article->getLink() }}">[...]</a>
								</p>
							</div>

						</div>
						<div class="clearfix"> </div>
					</div>
				@endforeach
				</div>
				<nav>
					{!! $articles->appends(['keyword' => htmlspecialchars($_GET['keyword'])])->render() !!}
				</nav>
			<?php endif; ?>
			</div>
			<div class="blog-content-right bann-left pull-left">
				@include('frontend.layouts.rightBox')
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
@endsection

@section('body.js')
@endsection