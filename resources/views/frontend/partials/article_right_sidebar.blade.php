		<div class="right-side-bar">

			@if(isset($article_category))
				<?php $articles_right = $article_category->articles()->where('is_publish', 1)->orderBy('priority')->orderBy('created_at','desc')->take(5)->get(); ?>
				@if ($articles_right != null && count($articles_right) > 0)
				<div class="rightbar-heading mrgb2x">
					<h4><a href="{{$article_category->getLink()}}">{{$article_category->name}}</a></h4>
				</div>
				<ul class="accomodation animated out mrgb3x" data-delay="0" data-animation="fadeInUp">
					@foreach ($articles_right as $article)	
					<div class="blog bdb-gray clearfix ps-relative mrgt05 mrgb1x">
						<div class="blog-img">
							<a href="{{$article->getLink()}}"><img class="lazy img-responsive" src="/frontend/images/spacer.gif" data-src="{{Image::url($article->getThumnail(),80,50,array('crop'))}}" alt="{{$article->name}}" /></a>
						</div>
						<div class="blog-text">
							<a class="fs15" href="{{$article->getLink()}}">{{$article->name}}</a>													
						</div>
					</div>
					@endforeach
				</ul>
				@endif
			@endif	

			@if(isset($article_categorys))
			@foreach ($article_categorys as $article_category)
				<?php $articles_right = $article_category->articles()->where('is_publish', 1)->orderBy('priority')->orderBy('created_at','desc')->take(5)->get(); ?>
				@if ($articles_right != null && count($articles_right) > 0)
				<div class="rightbar-heading mrgb2x">
					<h4><a href="{{$article_category->getLink()}}">{{$article_category->name}}</a></h4>
				</div>
				<ul class="accomodation animated out mrgb3x" data-delay="0" data-animation="fadeInUp">
					@foreach ($articles_right as $article)	
					<div class="blog bdb-gray clearfix ps-relative mrgt05 mrgb1x">
						<div class="blog-img">
							<a href="{{$article->getLink()}}"><img class="lazy img-responsive" src="/frontend/images/spacer.gif" data-src="{{Image::url($article->getThumnail(),80,50,array('crop'))}}" alt="{{$article->name}}" /></a>
						</div>
						<div class="blog-text">
							<a class="fs15" href="{{$article->getLink()}}">{{$article->name}}</a>													
						</div>
					</div>
					@endforeach
				</ul>
				@endif

			@endforeach
			@endif		
			
		</div>