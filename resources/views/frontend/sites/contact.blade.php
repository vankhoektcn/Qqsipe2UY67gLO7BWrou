@extends('frontend.layouts.master')
@section('head.title', 'Liên hệ Gia sư Hoa Văn')
@section('body.content')
<div class="contact">
	<div class="main-head-section">
		<div class="contact-map">
			@include('frontend.layouts.mapBox')
		</div>
	</div>

	<div class="contact_top">

		<div class="col-md-8 contact_left">
			<h4>Liên hệ gia sư Hoa Văn</h4>
			@if (session('contact-status'))
				<div class="alert alert-success">
					{{ session('contact-status') }}
				</div>
			@endif
			<p>Quý khách có nhu câu liên hệ hoặc thông tin đến chúng tôi xin vui lòng điền đầy đủ thông tin dưới đây và chọn "Gửi liên hệ".</p>
			{!! Form::open(['route' => 'contact']) !!}
			<div class="form_details">
				<div class="form-group">
					<input name="Contact[full_name]" type="text" class="full_name form-control" maxlength="50" placeholder="Họ tên">
					<label class="control-label error-label">Vui lòng nhập tên</label>
				</div>
				<div class="form-group">
					<input name="Contact[email]" type="text" class="email form-control" maxlength="50" placeholder="Email"  >
					<label class="control-label error-label">Vui lòng nhập email</label>
				</div>
				<div class="form-group">
					<input name="Contact[phone]" type="text" class="phone form-control" maxlength="20" placeholder="Số điện thoại"  >
					<label class="control-label error-label">Vui lòng nhập điện thoại</label>
				</div>
				<div class="form-group">
					<input name="Contact[subject]" type="text" class="subject form-control" maxlength="250" placeholder="Tiêu đề"  >
					<label class="control-label error-label">Vui lòng nhập tiêu đề</label>
				</div>
				<div class="form-group">
					<textarea name="Contact[content]" class="content form-control" rows="5" maxlength="500" placeholder="Nội dung"></textarea>
					<label class="control-label error-label">Vui lòng nhập nội dung liên hệ</label>
				</div>
				<div class="clearfix"> </div>
				<div class="sub-button">
					<input type="submit" class="btnSendContact" value="Gửi liên hệ">
				</div>
			</div>
			{!! Form::close() !!}

			@if ( $errors->any() )
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>	
			@endif

		</div>
		<div class="col-md-4 company-right">
			<div class="company_ad">
				<h3>Văn phòng gia sư Hoa Văn</h3>
				<!-- <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit velit justo.</span> -->
				<address>
					@inject('config', 'App\Config')
					<p>{{ $config->getValueByKey('headquarter_address') }}</p>
					<p>email:<a href="mailto:{{ $config->getValueByKey('address_received_mail') }}">{{ $config->getValueByKey('address_received_mail') }}</a></p>
					<p>phone: {{ $config->getValueByKey('headquarter_phone_number') }}</p>
				</address>
			</div>

		</div>	
		<div class="clearfix"> </div>

	</div>
</div>
<script type="text/javascript">

</script>
@endsection

@section('body.js')
{!! Minify::javascript('/frontend/js/pages/contact.js') !!}
@endsection