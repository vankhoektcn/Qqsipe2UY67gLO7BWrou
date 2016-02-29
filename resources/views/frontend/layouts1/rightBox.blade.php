@inject('articleCategory', 'App\ArticleCategory')
<div class="rightBox">
	@include('frontend.layouts.searchBox')
	<h3><i class="fa fa-angle-double-right"></i> Gia sư - học viên</h3>
	<div class="blo-top right-register">
		<li><a href="{{ route('tutorRegister') }}"><i class="fa fa-user-plus menuRightIcon greenMain"></i> Đăng ký làm gia sư</a></li>
		<li><a href="{{ route('studentRegister') }}"><i class="fa fa-hand-o-right menuRightIcon greenMain"></i> Đăng ký tìm gia sư</a></li>
	</div>
	@foreach ($articleCategory->getAllTopLevel() as $category)
	<h3><i class="fa fa-angle-double-right"></i> {{$category->name}}</h3>
	<div class="blo-top">
		<?php $articles = $category->articles()->where('is_publish', 1)->orderBy('priority')->orderBy('created_at','desc')->get(); ?>
		@if ($articles != null)
			@foreach ($articles as $article)
				<li><i class="fa fa-angle-double-right"></i><a href="{{ $article->getLink() }}">{{ $article->name }}</a></li>
			@endforeach
		@endif
	</div>		
	@endforeach

	@inject('config', 'App\Config')
	<h3><i class="fa fa-angle-double-right"></i> Liên kết gia sư Hoa Văn</h3>
	<div class="blo-top">
		<div class="social-link text-center">
			<a class="color-fb" title="Facebook" target="_blank" href="{{ $config->getValueByKey('facebook_page') }}"><i class="fa fa-facebook-square"></i></a>
			<a class="color-skype" title="Skype" href="skype:{{ $config->getValueByKey('skype_support') }}?call"><i class="fa fa-skype"></i></a>
			<!-- <a class="color-google" target="_blank" href="https://plus.google.com"><i class="fa fa-google-plus-square"></i></a> -->
			<a class="color-youtube" target="_blank" href="https://www.youtube.com"><i class="fa fa-youtube-square"></i></a>
			<a class="color-twitter" target="_blank" href="https://twitter.com"><i class="fa fa-twitter-square"></i></a>
		</div>
	</div>

	<h3><i class="fa fa-angle-double-right"></i> Hỗ trợ trực tuyến</h3>
	<div class="blo-top">
		<div class="text-center">
			<a class="a-yahoo-support" href="ymsgr:sendim?{{ $config->getvaluebykey('yahoo_support') }}" mce_href="ymsgr:sendim?{{ $config->getvaluebykey('yahoo_support') }}" border="0">
				<img src="http://opi.yahoo.com/online?u={{ $config->getvaluebykey('yahoo_support') }}&t=2" mce_src="http://opi.yahoo.com/online?u={{ $config->getvaluebykey('yahoo_support') }}&t=2">
			</a><br/>
			<p class="p-yahoo-support">0972.789.007 (Mr.)</p>
		</div>
		<div class="text-center">
			<a class="a-yahoo-support" href="ymsgr:sendim?{{ $config->getvaluebykey('yahoo_support') }}" mce_href="ymsgr:sendim?{{ $config->getvaluebykey('yahoo_support') }}" border="0">
				<img src="http://opi.yahoo.com/online?u={{ $config->getvaluebykey('yahoo_support') }}&t=9" mce_src="http://opi.yahoo.com/online?u={{ $config->getvaluebykey('yahoo_support') }}&t=9">
			</a><br/>
			<p class="p-yahoo-support">0972.789.007 (Mr.)</p>
		</div>
		<div class="text-center">
			<a  class="a-yahoo-support" href="ymsgr:sendim?{{ $config->getvaluebykey('yahoo_support') }}" mce_href="ymsgr:sendim?{{ $config->getvaluebykey('yahoo_support') }}" border="0">
				<img src="http://opi.yahoo.com/online?u={{ $config->getvaluebykey('yahoo_support') }}&t=14" mce_src="http://opi.yahoo.com/online?u={{ $config->getvaluebykey('yahoo_support') }}&t=14">
			</a><br/>
			<p class="p-yahoo-support">0972.789.007 (Mr.)</p>
		</div>
	</div>

	<h3><i class="fa fa-angle-double-right"></i> Thống kê truy cập</h3>
	<div class="blo-top">
		<!-- Histats.com  (div with counter) -->
		<div id="histats_counter" style="text-align: center;"></div>
		<!-- Histats.com  START  (aync)-->
		<script type="text/javascript">
		var _Hasync= _Hasync|| [];
		_Hasync.push(['Histats.startgif', '1,3251775,4,10042,"div#histatsC {position: absolute;top:0px;left:0px;}body>div#histatsC {position: fixed;}"']);
		_Hasync.push(['Histats.fasi', '1']);
		_Hasync.push(['Histats.track_hits', '']);
		(function() {
		var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
		hs.src = ('http://s10.histats.com/js15_gif_as.js');
		(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
		})();
		</script>
		<noscript>
			<a href="http://www.histats.com" alt="hit tracker" target="_blank" ><div id="histatsC"><img width="80%" height="30px" border="0" src="http://s4is.histats.com/stats/i/3251775.gif?3251775&103"></div></a>
		</noscript>
		<!-- Histats.com  END  -->
	</div>
</div>