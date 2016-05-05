@extends('frontend.layouts.project_master')
@section('body.content')
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="project-content"></div>
@if (!empty($project->content))
<div class="description" id="project-about">
	<div class="custom">
		<div class="content-block">
			<h2>Tổng quan <?php echo $project->name;?></h2>
			<div class="descript-content">
				<?php echo $project->content; ?>
			</div>
		</div>
	</div>
</div>
@endif

@foreach ($project_parts as $key => $part) 
<div class="description" id="{{ $part->link }}">
	<div class="custom">
		<div class="content-block">
			<h2>{{ $part->name }}</h2>
			<h4>{{ $part->sumary }}</h4>
			<div class="descript-content">
				<?php echo str_replace('<img src=', '<img class="lazy" src="" data-src=',$part->content);?>
			</div>
		</div>
	</div>
</div>
@endforeach

<div class="description" id="fb-comments">
	<div class="fb-comments" data-href="{{Request::url()}}" data-width="100%" data-numposts="10"></div>
</div>

@endsection

@section('body.js')
{!! Minify::javascript('/frontend/js/pages/project.js') !!}
@endsection