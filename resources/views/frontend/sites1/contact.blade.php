@extends('frontend.layouts1.master')
@section('body.content')

@inject('config', 'App\Config')
<section class="border-top">
	<div class="container">
		<div class="page-title mrgb4x mrgt6x clearfix">
			<h4 class="page-name">Liên hệ với chúng tôi</h4>
			<!-- <div class="tag-bar"> <a href="#"><span>just get in touch</span></a> </div> -->
			<ul class="breadcrumb">
				<li class="active"><a href="{{route('homepage')}}">Trang chủ</a></li>
				<li><a href="{{route('contact')}}">Liên hệ</a></li>
			</ul>
		</div>
	</div>
</section>
<section>
	<div class="container">
	<div class="row">
		<div class="col-md-9">
			<div class="contact-us animated out" data-delay="0" data-animation="fadeInUp">
				
				<div class="contact-guide col-md-10 no-padding mrgb3x">
					<p>Quý khách có nhu cầu liên hệ hoặc thông tin đến chúng tôi xin vui lòng điền đầy đủ thông tin dưới đây và chọn "Gửi liên hệ". Vui lòng không spam, cảm ơn !</p>
				</div>
				<div class="clearfix"></div>
				<div class="post-form row padb2x">
					<div id="message">
						@if (session('contact-status'))
							<div class="alert alert-success">
								{{ session('contact-status') }}
							</div>
						@endif
					</div>
					{!! Form::open(['route' => 'contact', 'method'=> 'post', 'id'=> 'contactform_form']) !!}
					<!-- <form id="contactform_form" method="post" name="postreview" action="contact.php"> -->
						<div class="col-md-6">
							<div class="form-group">
								<label>Tên</label>
								<input class="form-control required" name="Contact[full_name]"  id="contact_name" placeholder="nhập tên">
								<label class="control-label error-label">Vui lòng nhập tên !</label>
							</div>
							<div class="form-group">
								<label>Điện thoại</label>
								<input class="form-control required" name="Contact[phone]" required id="contact_email" placeholder="nhập điện thoại">
								<label class="control-label error-label">Vui lòng nhập điện thoại !</label>
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="email" name="Contact[email]" class="form-control required" id="contact_subject" placeholder="enter a email">
								<label class="control-label error-label">Vui lòng nhập email !</label>
							</div>
						</div>
						<div class="col-md-6">						
							<div class="form-group">
								<label>Tiêu đề</label>
								<input class="form-control required" name="Contact[subject]" required id="contact_subject" placeholder="nhập tiêu đề">
								<label class="control-label error-label">Vui lòng nhập tiêu đề !</label>
							</div>
							<div class="form-group">
								<label>Nội dung liên hệ</label>
								<textarea class="form-control required" name="Contact[content]" required id="contact_message" placeholder="nhập nội dung liên hệ" rows="6"></textarea>
                            	<label class="control-label error-label">Vui lòng nhập nội dung liên hệ !</label>                            	
							</div>
							<div class="send-msg">
                            	<button type="submit" class="post-msg btnSendContact" id="submit_btn">GỬI LIÊN HỆ <i class="fa fa-angle-right cl-white"></i></button>
							</div>
						</div>
					<!-- </form> -->
					{!! Form::close() !!}

					@if ( $errors->any() )
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>	
					@endif
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="contact-info-rightbar animated out" data-delay="0" data-animation="fadeInUp">
				<div class="rightbar-heading">
					<h4>CONTACT INFORMATION</h4>
				</div>
				<ul class="contact-address clearfix">
					<li class="map-marker"> <a href="#"><i class="icon-location10"></i><span>{{ $config->getValueByKey('headquarter_address') }}</span></a></li>
					<li class="globe"> <a href="{{route('homepage')}}"><i class="icon-earth"></i><span>{{route('homepage')}}</span></a></li>
					<li class="phone"> <a href="tel:{{ $config->getValueByKey('headquarter_phone_number') }}"><i class="fa fa-phone"></i><span>{{ $config->getValueByKey('headquarter_phone_number') }}</span></a></li>
					<li class="mail-envel"> <a href="mailto:{{ $config->getValueByKey('address_received_mail') }}"><i class="icon-email4"></i><span>{{ $config->getValueByKey('address_received_mail') }}</span></a></li>
				</ul>
				<!-- <div class="twitter-feed mrgt6x mrgb6x">
					<div class="rightbar-heading mrgb4x">
						<h4>TWITTER FEED</h4>
					</div>
					<ul class="widget-area tweet">
						<li><a href="#"><i class="fa fa-twitter"></i><span class="bold-text">@envato</span><span> Creating a new theme for the real estate section</span> <span class="active-time"># 2 hours ago</span></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i><span class="bold-text">@envato</span><span> We create awesome PSD templates for multi-pupose</span> <span class="active-time"># 8 hours ago</span></a></li>
					</ul>
				</div> -->
			</div>
		</div>
		</div>
	</div>
</section>

@endsection

@section('body.js')	
<script type="text/javascript" src="/frontend/js1/pages/contact.js"></script>
@endsection