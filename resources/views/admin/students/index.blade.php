@extends('admin.layouts.master')

@section('head.title', 'Danh sách học viên đăng ký')

@section('head.pluginstyle')
<link href="/admin/assets/global/plugins/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css"/>
<link href="/admin/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>
@endsection

@section('body.content')
<!-- BEGIN PAGE HEADER-->
<!-- BEGIN PAGE HEAD -->
<div class="page-head">
	<!-- BEGIN PAGE TITLE -->
	<div class="page-title">
		<h1>Danh sách học viên đăng ký <small></small></h1>
	</div>
	<!-- END PAGE TITLE -->
</div>
<!-- END PAGE HEAD -->
<!-- BEGIN PAGE BREADCRUMB -->
<ul class="page-breadcrumb breadcrumb">
	<li>
		<a href="{{ route('admin.dashboard.index') }}">Màn hình chính</a>
		<i class="fa fa-circle"></i>
	</li>
	<li>
		<a href="{{ route('admin.students.index') }}">Học viên</a>
		<i class="fa fa-circle"></i>
	</li>
	<li>
		<a href="{{ route('admin.students.index') }}">Danh sách</a>
	</li>
</ul>
<!-- END PAGE BREADCRUMB -->
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
	<div class="col-md-12">
		 <div class="portlet light bordered">
			<div class="portlet-body">
				<table id="tblstudents" class="table table-striped table-bordered table-hover">
					<thead>
					<tr>
						<th>#</th>
						<th>Họ tên</th>
						<th>Email</th>
						<th>Điện thoại</th>
						<th>Giới tính</th>
						<th>Địa chỉ</th>
						<th>Môn học</th>
						<th>Trình độ học viên</th>
						<th>Thời gian học</th>
						<th>Học phí/buổi</th>
						<th>Ngày đăng ký</th>
						<th></th>
					</tr>
					</thead>
					<tbody>
						@foreach ($students as $key=>$student)
						<tr>
							<td>{{ $key + 1 }}</td>
							<td>{{ $student->name }}</td>
							<td><a href="mailto:{{ $student->email }}">{{ $student->email }}</a></td>
							<td><a href="tel:{{ $student->mobile }}">{{ $student->mobile }}</a></td>
							<td>{{ $student->sex ==1 ? 'Nam' : ($student->sex ==2 ? 'Khác' : 'Nữ')  }}</td>
							<td>{{ $student->address }}, {{$student->district->name}}</td>
							<?php 
								$strSubject = null;
								foreach ($student->subjects as $key => $subject) {
									$strSubject = is_null($strSubject) ? $subject->name : $strSubject.', '.$subject->name;
								}
							?>
							<td>{{ $strSubject }}</td>
							<?php 
								$className = $student->getClassName();
								$level = $student->getLevelName();
								$exper = $className.', '.$level;
							?>
							<td>{{ $exper }}</td>
							<td>{{ $student->getStudyTime() }}</td>
							<td>{{ number_format($student->cost, 0, ',', '.')}} VNĐ/buổi</td>					
							<td>{{ $student->created_at }}</td>							
							<td>
								<a href="{{ route('admin.students.edit', ['student' => $student->id]) }}" class="btn btn-xs green-jungle">
									<i class="fa fa-eye"></i> Chi tiết
								</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- END PAGE CONTENT-->
@endsection

@section('body.jsplugins')
<script src="/admin/assets/global/plugins/bootstrap-toastr/toastr.min.js" type="text/javascript"></script>
<script src="/admin/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="/admin/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js" type="text/javascript"></script>
@endsection

@section('body.js')
<script src="/admin/assets/pages/students/crazyify.students.index.js" type="text/javascript"></script>
@endsection