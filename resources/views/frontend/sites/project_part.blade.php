@extends('frontend.layouts.project_master')
@section('body.content')
<div id="project-content"></div>
@if (!empty($project_part) && !empty($project_part->content))
<div class="description" id="project-about">
	<div class="custom">
		<div class="content-block">
			<h2><?php echo $project_part->name;?></h2>
			<div class="single-content">
				<b><?php echo $project_part->summary; ?></b>
			</div>
			@if (!empty($project_part->thumnail))
			<div class="text-center project-part-thumnail">
				<img src="{{ Image::url($project_part->thumnail,814,364,array('crop')) }}" class="img-thumbnail">
			</div>
			@endif
			<div class="descript-content">
				<?php echo $project_part->content; ?>
			</div>
		</div>
	</div>
</div>
@endif

@endsection

@section('body.js')
{!! Minify::javascript('/frontend/js/pages/project.js') !!}
@endsection