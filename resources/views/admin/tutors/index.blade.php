@extends('admin.layouts.master')

@section('head.title', 'Danh sách gia sư đăng ký')

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
		<h1>Danh sách gia sư đăng ký <small></small></h1>
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
		<a href="{{ route('admin.tutors.index') }}">Gia sư đăng ký</a>
		<i class="fa fa-circle"></i>
	</li>
	<li>
		<a href="{{ route('admin.tutors.index') }}">Danh sách</a>
	</li>
</ul>
<!-- END PAGE BREADCRUMB -->
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
	<div class="col-md-12">
		 <div class="portlet light bordered">
			<div class="portlet-body">
				<table id="tbltutors" class="table table-striped table-bordered table-hover">
					<thead>
					<tr>
						<th>#</th>
						<th>Họ tên</th>
						<th>Email</th>
						<th>Điện thoại</th>
						<th>Giới tính</th>
						<th>Địa chỉ</th>
						<th>Môn dạy</th>
						<th>Khu vực</th>
						<th>Thời gian dạy</th>
						<th>Kinh nghiệm</th>
						<th>Lương mong muốn</th>
						<th>Ngày đăng ký</th>
						<th></th>
					</tr>
					</thead>
					<tbody>
						@foreach ($tutors as $key=>$tutor)
						<tr>
							<td>{{ $key + 1 }}</td>
							<td>{{ $tutor->name }}</td>
							<td><a href="mailto:{{ $tutor->email }}">{{ $tutor->email }}</a></td>
							<td><a href="tel:{{ $tutor->mobile }}">{{ $tutor->mobile }}</a></td>
							<td>{{ $tutor->sex ==1 ? 'Nam' : ($tutor->sex ==2 ? 'Khác' : 'Nữ')  }}</td>
							<td>{{ $tutor->address }}, {{$tutor->district->name}}</td>
							<?php 
								$strSubject = null;
								foreach ($tutor->subjects as $key => $subject) {
									$strSubject = is_null($strSubject) ? $subject->name : $strSubject.', '.$subject->name;
								}
							?>
							<td>{{ $strSubject }}</td>
							<?php 
								$strArea = null;
								foreach ($tutor->districts as $key => $area) {
									$strArea = is_null($strArea) ? $area->name : $strArea.', '.$area->name;
								}
							?>
							<td>{{ $strArea }}</td>
							<td>{{ $tutor->getStudyTime() }}</td>
							<?php $experient = null;
								$diploma = null;
								switch ($tutor->experient) {
								    case 1:
								        $diploma = 'Đại học';
								        break;
								    case 2:
								        $diploma = 'Đã tốt nghiệp đại học';
								        break;
								    case 3:
								        $diploma = 'Thạc sĩ';
								        break;
								    case 4:
								        $diploma = 'Giáo viên';
								        break;
								    case 5:
								        $diploma = 'Sinh viên';
								        break;
								}
								$experient = ', kinh nghiệm '.$tutor->experient.' năm';
								$exper = $diploma.$experient;
							?>
							<td>{{ $exper }}</td>
							<td>{{ number_format($tutor->salary, 0, ',', '.')}} VNĐ</td>					
							<td>{{ $tutor->created_at }}</td>							
							<td>
								<a href="{{ route('admin.tutors.edit', ['tutor' => $tutor->id]) }}" class="btn btn-xs green-jungle">
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
<script src="/admin/assets/pages/tutors/crazyify.tutors.index.js" type="text/javascript"></script>
@endsection