@extends('admin.layouts.master')

@section('head.title', 'Cấu hình hệ thống')

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
		<h1>Danh sách lịch học <small></small></h1>
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
		<a href="{{ route('admin.teachtimes.index') }}">Lịch học</a>
		<i class="fa fa-circle"></i>
	</li>
	<li>
		<a href="{{ route('admin.teachtimes.index') }}">Danh sách</a>
	</li>
</ul>
<!-- END PAGE BREADCRUMB -->
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
	<div class="col-md-12">
		 <div class="portlet light bordered">
			<div class="portlet-body">
				<table id="tblteachtimes" class="table table-striped table-bordered table-hover">
					<thead>
					<tr>
						<th>#</th>
						<th>Buổi</th>
						<th>Thời gian</th>
						<th></th>
					</tr>
					</thead>
					<tbody>
						@foreach ($teachtimes as $key=>$teachtime)
						<tr>
							<td>{{ $key + 1 }}</td>
							<?php if($teachtime->type =='S'):?>
							<td>Sáng</td>
							<?php endif; ?>
							<?php if($teachtime->type =='C'): ?>
							<td>Chiều</td>
							<?php endif; ?>
							<?php if($teachtime->type =='T'): ?>
							<td>Tối</td>
							<?php endif; ?>
							<td>{{ $teachtime->key }}</td>
							<td>
								<a href="{{ route('admin.teachtimes.edit', ['teachtime' => $teachtime->id]) }}" class="btn btn-xs green-jungle">
									<i class="fa fa-edit"></i> Sửa
								</a>
								<a href="javascript:;" class="btn btn-xs red-thunderbird action-delete" data-id="{{ $teachtime->id }}">
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
<script src="/admin/assets/pages/teachtimes/crazyify.teachtimes.index.js" type="text/javascript"></script>
@endsection