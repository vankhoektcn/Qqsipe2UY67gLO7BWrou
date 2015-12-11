@extends('frontend.layouts.master')
@section('head.title', 'Gia sư hiện có')
@section('body.content')
	
	<div class="blog">
		<div class="blog-content">
			<div class="blog-content-left pull-right">
				<h3 class="h3-title"><i class="fa fa-list-alt"></i>  Danh sách lớp mới cập nhật</h3>
				<?php 
					$filter = null;
					$filter = Request::input('status');
				?>
				{!! Form::open(['route' => 'searchNewClass', 'method' => 'POST', 'id' => 'formSearchNewClass', 'class' => 'form-horizontal']) !!}	
				<div class="form-group">
					<label class="control-label col-sm-4" for="sex">Lọc theo tình trạng:</label>
					<div class="col-sm-8">
						<select class="form-control"  name="status" id="status" onchange="document.getElementById('formSearchNewClass').submit()">
						    <option value="" <?php if(is_null($filter)) echo "selected"; ?> >Tất cả</option>
						    <option value="0" <?php if(!is_null($filter) && $filter=="0") echo "selected"; ?> >Chưa giao</option>
						    <option value="1" <?php if(!is_null($filter) && $filter=="1") echo "selected"; ?> >Đã giao</option>
						  </select>
					</div>
				</div>
				{!! Form::close() !!}
				<div class="blog-articals tutorList float_left">
					<div class="class-row float_left full class-top">
						<div class="col-md-4 class-header">
							Trạng thái
						</div>
						<div class="col-md-8 class-detail class-header">
							Thông tin lớp
						</div>
					</div>					
					<div class="class-row float_left full class-top-min">
						<div class="col-md-4 class-header">
							Lớp mới
						</div>
					</div>
					@foreach ($newclass as $index => $class)				
					<div class="class-row float_left full">
						<div class="col-md-4 class-status">
							<p>Mã lớp :<b>{{ $class->code }}</b></p>
							<br/>
							<b><?php $status ='Chưa giao'; if($class->status == 1){ $status = 'Đã giao'; } ?> {{ $status }}</b>
							<div class="clearfix"> </div>
						</div>
						<div class="col-md-8 class-detail">
							<table cellspacing="0" cellpadding="0" class="tblTutor">
								<tbody>
									<tr class="row1">
										<td class="col_tutor_left">Tên lớp</td>
										<td width="5">:</td>
										<td><span class="tutor_name">{{ $class->name }}</span></td>
									</tr>
									<tr class="row0">
										<td class="col_tutor_left">Lớp dạy</td>
										<td width="5">:</td>
										<td><span class="tutor_name">{{ $class->for_class }}</span></td>
									</tr>
									<tr class="row1">
										<td class="col_tutor_left">Môn dạy</td>
										<td>:</td>
										<td>{{ $class->subject->name }}</td>
									</tr>
									<tr class="row0">
										<td class="col_tutor_left">Địa chỉ</td>
										<td>:</td>
										<td>{{ $class->address }}</td>
									</tr>
									<tr class="row1">
										<td class="col_tutor_left">Mức lương</td>
										<td>:</td>
										<td>{{ number_format($class->salary, 0, ',', '.') }} VNĐ</td>
									</tr>
									<tr class="row0">
										<td class="col_tutor_left">Thời gian dạy</td>
										<td>:</td>
										<td>{{ $class->time }}</td>
									</tr>
									<tr class="row1">
										<td class="col_tutor_left">Yêu cầu</td>
										<td>:</td>
										<td>{{ $class->required }}</td>
									</tr>
									<tr class="row0 color-them">
										<td class="col_tutor_left">Liên hệ</td>
										<td>:</td>
										<td>{{ $class->contactinfo }}</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					@endforeach
				</div>
				<nav>
					{!! $newclass->render() !!}
				</nav>
			</div>
			<div class="blog-content-right bann-left pull-left">
				@include('frontend.layouts.rightBox')
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
@endsection

@section('body.js')
@endsection