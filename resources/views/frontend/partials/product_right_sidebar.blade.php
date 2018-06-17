			<div class="right-side-bar">
			@if(isset($relate_products))
				<div class="property-features clearfix animated out mrgb2x" data-delay="0" data-animation="fadeInUp">
					<div class="property-heading">
						<h4><span>@if(isset($heading))<b>{{$heading}}</b>@else 'Căn hộ tương tự' @endif mới nhất</span></h4>
					</div>
					<div class="description-text">
					@foreach ($relate_products as $product)
						@include('frontend.partials.product_item')
					@endforeach
					</div>
				</div>
			@endif			
			@if($search_type =='products'&& isset($product_types))
			@foreach ($product_types as $product_type)	
				<div class="rightbar-heading mrgb2x">
					<h4>{{$product_type->name}}</h4>
				</div>
				@if(isset($provinces))
				<ul class="accomodation animated out mrgb3x" data-delay="0" data-animation="fadeInUp">
					@foreach ($provinces as $province)	
					<li class="">
						<a href="{{route('product_type_province',['product_type_key'=> $product_type->key, 'province_key'=> $province->key])}}">{{$product_type->name}} <b>{{$province->name}}</b></a>
					</li>
					@endforeach
				</ul>
				@endif
			@endforeach
			@endif		
			@if($search_type !='products'&& isset($provinces))
				<div class="rightbar-heading mrgb2x">
					<h4>@if(isset($heading)){!!$heading!!}@endif các tỉnh</h4>
				</div>
				<ul class="accomodation animated out mrgb3x" data-delay="0" data-animation="fadeInUp">
					@foreach ($provinces as $province)	
					<li class="">
						<a href="{{$search_type== 'product_type' ? route('product_type_province',['product_type_key'=> $product_type->key, 'province_key'=> $province->key])
						 : ''}}">
						@if(isset($heading)){!!$heading!!}@endif <b>{{$province->name}}</b>
						</a>
					</li>
					@endforeach
				</ul>
			@endif
			@if(isset($districts))
				<div class="rightbar-heading mrgb2x">
					<h4>@if(isset($heading)){!!$heading!!}@endif theo quận</h4>
				</div>
				<ul class="accomodation animated out mrgb3x" data-delay="0" data-animation="fadeInUp">
					@foreach ($districts as $district)	
					<li class="">
						<a href="{{$search_type== 'product_type_province' ? route('product_type_province_district',['product_type_key'=> $product_type->key, 'province_key'=> $province->key, 'district_key'=>$district->key])
						 : ''}}">
						 @if(isset($heading)){!!$heading!!}@endif <b>{{$district->name}}</b>
						 </a>
					</li>
					@endforeach
				</ul>
			@endif
			@if(isset($wards))
				<div class="rightbar-heading mrgb2x">
					<h4>@if(isset($heading)){!!$heading!!}@endif</h4>
				</div>
				<ul class="accomodation animated out mrgb3x" data-delay="0" data-animation="fadeInUp">
					@foreach ($wards as $ward)	
					<li class="">
						<a href="{{route('product_type_province_district_ward',['product_type_key'=> $product_type->key, 'province_key'=> $ward->district->province->key, 'district_key'=>$ward->district->key, 'ward_key'=>$ward->key])}}">
						 Phường <b>{{$ward->name}}</b>
						 </a>
					</li>
					@endforeach
				</ul>
			@endif
			@if(isset($price_ranges))
				<div class="rightbar-heading mrgb2x">
					<h4>@if(isset($heading)){!!$heading!!}@endif theo giá</h4>
				</div>
				<div class="col-md-6 mrgb3x no-padding">
					<ul class="accomodation animated out " data-delay="0" data-animation="fadeInUp">					
						@foreach ($price_ranges as $key => $price_range)
						@if($key == round(count($price_ranges) / 2))
						</ul>	
						</div>
						<div class="col-md-6 mrgb3x no-paddings">
						<ul class="accomodation animated out" data-delay="0" data-animation="fadeInUp">		
						@endif
						<li class="">
							<a href="{{$link.'?price='.$price_range->id}}">{{$price_range->name}}</a>
						</li>
						@endforeach
					</ul>
				</div>
				<div class="clearfix"></div>
			@endif
			@if(isset($area_ranges))
				<div class="rightbar-heading mrgb2x">
					<h4>@if(isset($heading)){!!$heading!!}@endif theo diện tích</h4>
				</div>
				<div class="col-md-6 mrgb3x no-padding">
					<ul class="accomodation animated out " data-delay="0" data-animation="fadeInUp">					
						@foreach ($area_ranges as $key => $area_range)
						@if($key == round(count($area_ranges) / 2))
						</ul>	
						</div>
						<div class="col-md-6 mrgb3x no-padding">
						<ul class="accomodation animated out" data-delay="0" data-animation="fadeInUp">		
						@endif
						<li class="">
							<a href="{{$link.'?area='.$area_range->id}}">{{$area_range->name}}</a>
						</li>
						@endforeach
					</ul>
				</div>
				<div class="clearfix"></div>
			@endif
			@if(isset($incense_types))
				<div class="rightbar-heading mrgb2x">
					<h4>@if(isset($heading)){!!$heading!!}@endif theo hướng</h4>
				</div>
				<div class="col-md-6 mrgb3x no-padding">
					<ul class="accomodation animated out " data-delay="0" data-animation="fadeInUp">					
						@foreach ($incense_types as $key => $incense_type)
						@if($key == round(count($incense_types) / 2))
						</ul>	
						</div>
						<div class="col-md-6 mrgb3x no-padding">
						<ul class="accomodation animated out" data-delay="0" data-animation="fadeInUp">		
						@endif
						<li class="">
							<a href="{{$link.'?incense='.$incense_type->id}}">{{$incense_type->name}}</a>
						</li>
						@endforeach
					</ul>
				</div>
				<div class="clearfix"></div>
			@endif
			</div>