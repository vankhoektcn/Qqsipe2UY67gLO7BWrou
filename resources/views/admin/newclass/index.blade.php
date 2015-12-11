@extends('admin.layouts.master')

@section('head.title', 'Danh sách lớp mới')

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
		<h1>Danh sách lớp mới <small></small></h1>
	</div>
	<!-- END PAGE TITLE -->
</div>
<!-- END PAGE HEAD -->
<!-- BEGIN PAGE BREADCRUMB -->
<ul class="page-breadcrumb breadcrumb">
	<li>
		<a href="/admin/index">Màn hình chính</a>
		<i class="fa fa-circle"></i>
	</li>
	<li>
		<a href="{{ route('admin.newclass.index') }}">Lớp mới</a>
		<i class="fa fa-circle"></i>
	</li>
	<li>
		<a href="{{ route('admin.newclass.index') }}">Danh sách</a>
	</li>
</ul>
<!-- END PAGE BREADCRUMB -->
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
	<div class="col-md-12">
		 <div class="portlet light bordered">
			<div class="portlet-body">
				<table id="tblnewclass" class="table table-striped table-bordered table-hover">
					<thead>
					<tr>
						<th>#</th>
						<th>Mã lớp</th>
						<th>Tên lớp</th>
						<th>Lớp dạy</th>
						<th>Môn học</th>
						<th>Địa chỉ</th>
						<th>Lương</th>
						<th>Thời gian</th>
						<th>Số buổi</th>
						<th>Yêu cầu</th>
						<th>Liên hệ</th>
						<th>Tình trạng</th>
						<th></th>
					</tr>
					</thead>
					<tbody>
						@foreach ($newclass as $key=>$newclass)
						<tr>
							<td>{{ $key + 1 }}</td>
							<td>{{ $newclass->code }}</td>
							<td>{{ $newclass->name }}</td>
							<td>{{ $newclass->for_class }}</td>
							<td>{{ $newclass->subject->name }}</td>
							<td>{{ $newclass->address }}</td>
							<td>{{ $newclass->salary }}</td>
							<td>{{ $newclass->time }}</td>
							<td>{{ $newclass->day_number }}</td>
							<td>{{ $newclass->required }}</td>
							<td>{{ $newclass->contactinfo }}</td>
							<td><?php $status ='Chưa giao'; if($newclass->status == 1){ $status = 'Đã giao'; } ?> {{ $status }}</td>
							<td>
								<a href="{{ route('admin.newclass.edit', ['newclass' => $newclass->id]) }}" class="btn btn-xs green-jungle">
									<i class="fa fa-edit"></i> Sửa
								</a>
								<a href="javascript:;" class="btn btn-xs red-thunderbird action-delete" data-id="{{ $newclass->id }}">
									<i class="fa fa-trash-o"></i> Xóa
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
<script src="/admin/assets/pages/newclass/crazyify.newclass.index.js" type="text/javascript"></script>
@endsection