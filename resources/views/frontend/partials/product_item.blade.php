				<!-- @foreach ($products as $product)				 -->
				<div class="blog clearfix apartment-item ps-relative mrgt05 mrgb1x">
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
				</div>
				<!-- @endforeach	 -->	
				<div class="clearfix"></div>