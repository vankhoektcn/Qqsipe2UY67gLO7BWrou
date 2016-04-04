<footer class="bg-color">
	<div class="container">
		<div class="upper-footer clearfix">
			<div class="widgets">
				<div class="col-md-3">
					<div class="about-widget"> <img src="/frontend/images1/LogoVanLand4.png" class="img-responsive" alt="#" />
						<p>Là trang truyền thông bất động sản của Việt Nam, phát triển dựa trên nền tảng công nghệ mới - ứng dụng bản đồ, hỗ trợ tối đa công cụ tìm kiếm và đăng tin.</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="widget-heading mrgb4x">
						<h4>LOẠI BẤT ĐỘNG SẢN</h4>
					</div>
					<ul class="widget-area service-list">
					@foreach ($product_type_inject as $product_type)
						<li><a href="{{$product_type->getLink()}}"><i class="fa fa-play-circle"></i><span>{{$product_type->name}}</span></a></li>
					@endforeach
					</ul>
				</div>
				<div class="col-md-3">
					<div class="widget-heading mrgb4x ">
						<h4>CHỨC NĂNG</h4>
					</div>
					<ul class="widget-area service-list">
						<li><a href="javascript:;"><i class="fa fa-play-circle"></i><span>Hợp tác môi giới</span></a></li>
						<li><a href="javascript:;"><i class="fa fa-play-circle"></i><span>Tìm căn hộ cùng VanLand</span></a></li>
						<li><a href="javascript:;"><i class="fa fa-play-circle"></i><span>Kiến thức bất động sản</span></a></li>
						<li><a href="javascript:;"><i class="fa fa-play-circle"></i><span>Quy chế hoạt động</span></a></li>
					</ul>
				</div>
				<div class="col-md-3">
					<div class="widget-heading mrgb4x ">
						<h4>LIÊN HỆ</h4>
					</div>
					<ul class="widget-area contact clearfix">
						<li> <a href="javascript:;"><i class="icon-location10"></i><span>{{ $config->getValueByKey('headquarter_address') }}<span></a></li>
						<li> <a href="{{route('homepage')}}"><i class="icon-earth"></i><span>{{route('homepage')}}</span></a></li>
						<li> <a href="tel:{{ $config->getValueByKey('headquarter_phone_number') }}"><i class="fa fa-phone"></i><span>{{ $config->getValueByKey('headquarter_phone_number') }}</span></a></li>
						<li> <a href="mailto:{{ $config->getValueByKey('address_received_mail') }}"><i class="icon-email4"></i><span>{{ $config->getValueByKey('address_received_mail') }}</span></a></li>
					</ul>
					<ul class="footer-social-media">
						<li><a href="javascript:;"><i class="fa fa-facebook"></i></a></li>
						<li><a href="javascript:;"><i class="fa fa-twitter"></i></a></li>
						<li><a href="javascript:;"><i class="fa fa-dribbble"></i></a></li>
						<li><a href="javascript:;"><i class="fa fa-google"></i></a></li>
						<li><a href="javascript:;"><i class="icon-pinterest-p"></i></a></li>
						<li><a href="javascript:;"><i class="fa fa-instagram"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="lower-footer">
		<p>Thiết kế & SEO bởi  <a class="text-danger" href="http://ketnoimoi.com">ketnoimoi.com</a> | Copyright 2016</p>
	</div>
</footer>