@inject('config', 'App\Config')
<div class="footer">
	<div class="col-md-4 foot-1">
		<h4>Liên hệ</h4>
		<ul>
			<li><i class="fa fa-angle-double-right"></i><a href="javascript:;">{{ $config->getValueByKey('headquarter_address') }}</a></li>
			<li><i class="fa fa-angle-double-right"></i><a href="mailto:{{ $config->getValueByKey('address_received_mail') }}">email: {{ $config->getValueByKey('address_received_mail') }}</a></li>
			<li><i class="fa fa-angle-double-right"></i><a href="tel:{{ $config->getValueByKey('headquarter_phone_number') }}">phone: {{ $config->getValueByKey('headquarter_phone_number') }}</a></li>
		</ul>
		<!-- <h4 class="title">Hỗ trợ trưc tuyến</h4>
		<div class="ph-hotline">
			<a title="Yahoo" href="ymsgr:sendim?{{ $config->getValueByKey('yahoo_support') }}" rel="nofollow"><i class="fa fa-yahoo fa-3x"></i></a>&nbsp;&nbsp;
			<a title="Skype" href="skype:{{ $config->getValueByKey('skype_support') }}?call" rel="nofollow"><i class="fa fa-skype fa-3x"></i></a>&nbsp;&nbsp;
			<a title="Facebook" href="{{ $config->getValueByKey('facebook_page') }}" target="_blank"><i class="fa fa-facebook-official fa-3x"></i></a>&nbsp;&nbsp;	
		</div> -->
	</div>
	<div class="col-md-4 foot-1">
		<h4>Bản đồ</h4>
		<div class="">
			@include('frontend.layouts.mapBox')
		</div>
	</div>
	<div class="col-md-4 foot-1">
		<h4>Sơ đồ website</h4>
		<ul>
			<li><i class="fa fa-angle-double-right"></i><a href="{{ route('homepage') }}">Trang chủ</a></li>
			<li><i class="fa fa-angle-double-right"></i><a href="{{ route('article', ['categorykey' => 'bai-viet', 'articlekey' => 'gioi-thieu'])}}">Giới thiệu</a></li>
			<li><i class="fa fa-angle-double-right"></i><a href="{{ route('newClass') }}">Lớp mới</a></li>
			<li><i class="fa fa-angle-double-right"></i><a href="{{ route('article', ['categorykey' => 'bai-viet', 'articlekey' => 'hoc-phi']) }}">Học phí</a></li>
			<li><i class="fa fa-angle-double-right"></i><a href="{{ route('article', ['categorykey' => 'bai-viet', 'articlekey' => 'gia-su-hien-co']) }}">Gia sư hiện có</a></li>
		</ul>
	</div>
	<div class="clearfix"> </div>	
	<div class="copyright">
		<p>Trung tâm Gia Sư Hoa Văn: {{ $config->getValueByKey('headquarter_address') }}</p>
		<p>© 2015 Gia Su Hoa Van. All rights reserved | Powered by <a target="_blank" href="http://crazyify.com/">crazyify.com</a></p>
	</div>
</div>
