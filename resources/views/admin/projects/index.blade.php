@extends('admin.layouts.master')

@section('head.title', 'Danh sách bài viết')

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
		<h1>Danh sách bài viết <small></small></h1>
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
		<a href="{{ route('admin.projects.index') }}">Dự án</a>
		<i class="fa fa-circle"></i>
	</li>
	<li>
		<a href="{{ route('admin.projects.index') }}">Danh sách</a>
	</li>
</ul>
<!-- END PAGE BREADCRUMB -->
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
	<div class="col-md-12">
		 <div class="portlet light bordered">
			<div class="portlet-body">
				<table id="tblArticles" class="table table-striped table-bordered table-hover">
					<thead>
					<tr>
						<th>#</th>
						<th>Logo</th>
						<th>Tên dự án</th>
						<th>Thứ tự</th>
						<th>Xuất bản</th>
						<th>Thao tác</th>
					</tr>
					</thead>
					<tbody>
						@foreach ($projects as $key=>$project)
						<tr>
							<td>{{ $key + 1 }}</td>
							<td class="text-center">
								<img src="{{ str_replace('.', '-image(80x45-crop).', $project->logo) }}" alt="{{ $project->name }}" class="img-thumbnail">
							</td>
							<td>{{ $project->name }}</td>
							<td class="text-right">{{ $project->priority }}</td>
							<td class="text-center">{!! $project->active == 1 ? '<i class="fa fa-check-square font-green-jungle"></i>' : '<i class="fa fa-square-o font-yellow-crusta"></i>' !!}</td>
							<td>
								<a href="{{ route('admin.projects.edit', ['projects' => $project->id]) }}" class="btn btn-xs green-jungle" >
									<i class="fa fa-edit"></i> Sửa
								</a>
								<a href="{{ route('admin.project_parts.index', ['project_id' => $project->id]) }}" class="btn btn-xs yellow-gold" >
									<i class="fa fa-edit"></i> Nội dung
								</a>
								<a href="{{ $project->getLink() }}" class="btn btn-xs green-sharp" >
									<i class="fa fa-eye"></i> View
								</a>
								<a href="javascript:;" class="btn btn-xs red-thunderbird action-delete" data-id="{{ $project->id }}">
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
<script src="/admin/assets/pages/projects/crazyify.projects.index.js" type="text/javascript"></script>
@endsection