@extends('admin.layouts.master')

@section('head.title', 'Danh sách liên hệ')

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
		<h1>Danh sách liên hệ <small></small></h1>
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
		<a href="{{ route('admin.contacts.index') }}">Liên hệ</a>
		<i class="fa fa-circle"></i>
	</li>
	<li>
		<a href="{{ route('admin.contacts.index') }}">Danh sách</a>
	</li>
</ul>
<!-- END PAGE BREADCRUMB -->
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
	<div class="col-md-12">
		 <div class="portlet light bordered">
			<div class="portlet-body">
				<table id="tblContacts" class="table table-striped table-bordered table-hover">
					<thead>
					<tr>
						<th>#</th>
						<th>Họ tên</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Chủ đề</th>
						<th>Ngày liên hệ</th>
						<th></th>
					</tr>
					</thead>
					<tbody>
						@foreach ($contacts as $key=>$contact)
						<tr>
							<td>{{ $key + 1 }}</td>
							<td>{{ $contact->full_name }}</td>
							<td><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></td>
							<td><a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a></td>
							<td>{{ $contact->subject }}</td>
							<td>{{ $contact->created_at }}</td>							
							<td>
								<a href="{{ route('admin.contacts.edit', ['contact' => $contact->id]) }}" class="btn btn-xs green-jungle">
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
<script src="/admin/assets/pages/contacts/crazyify.contacts.index.js" type="text/javascript"></script>
@endsection