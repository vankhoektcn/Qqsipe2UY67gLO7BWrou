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
<div class="description" id="project-amenity">
	<div class="custom">
		<div class="content-block">
			<h2>Tiện ích</h2>
			<div class="descript-content">
				<p><span ><span >THIẾT KẾ:</span></span></p>

				<p><span ><span >Mỗi căn được trang bị đầy đủ tiện nghi trong việc trang trí nội thất, nhà bếp đủ dụng cụ và đường truyền Internet băng thông rộng. Hoàn thiện với các tiện nghi hiện đại và các tiện ích cân thiết, các căn hộ được thiết kế đa dạng với các loại từ hai tới năm phòng ngủ. Tính thanh lịch và phong cách riêng ở từng căn hộ được biến đổi để thích hợp với nhu cầu cá nhân khi bạn công tác hay du lịch.</span></span></p>
			</div>
		</div>
	</div>
</div>

@endsection

@section('body.js')
{!! Minify::javascript('/frontend/js/pages/project.js') !!}
@endsection