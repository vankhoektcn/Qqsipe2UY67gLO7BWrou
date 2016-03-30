				<!-- @foreach ($articles as $article)				 -->
				<div class="blog clearfix apartment-item border-gray ps-relative mrgt05 mrgb1x">
					<div class="blog-img">
						<a href="{{$article->getLink()}}"><img src="{{Image::url($article->getThumnail(),150,130,array('crop'))}}" class="img-responsive" alt="{{$article->name}}" /></a>
					</div>
					<div class="blog-text">
						<a class="fw-bold fs16" href="{{$article->getLink()}}">{{$article->name}}</a>
						<div class="datetime fs-italic">
							<i class="icon-access-time mrgr05 cl-green"></i>
		                    {{$article->updated_at->format('H:i d/m/Y')}}
		                </div>
						<p>{{{$article->summary}}}</p>	
						<div class="pull-right clearfix padb05">
							<a href="{{$article->getLink()}}" title="Xem thêm dự án" class="btn btn-primary btn-sm">
				                <i class="fa fa-arrow-right"></i> Xem
				            </a>
						</div>							
					</div>
				</div>
				<!-- @endforeach -->	
