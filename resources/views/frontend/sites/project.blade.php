@extends('frontend.layouts.project_master')
@section('body.content')
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
				<?php echo $part->content;?>
			</div>
		</div>
	</div>
</div>
@endforeach

@endsection

@section('body.js')
{!! Minify::javascript('/frontend/js/pages/project.js') !!}
@endsection