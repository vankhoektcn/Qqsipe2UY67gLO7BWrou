@extends('admin.layouts.master')

@section('head.title', 'Danh sách bài viết dự án')

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
		<h1>Danh sách bài viết dự án <small><!-- {{ count($project_parts)>0 ? $project_parts[0]->project()->name}} --></small></h1>
	</div>
	<!-- END PAGE TITLE -->
</div>
<!-- END PAGE HEAD -->
<!-- BEGIN PAGE BREADCRUMB -->
<ul class="page-breadcrumb breadcrumb">
	<li>
		<a href="{{ route('admin.projects.edit', ['projects' => $project->id]) }}">{{ $project->name}}</a>
		<i class="fa fa-circle"></i>
	</li>
	<li>
		<a href="{{ route('admin.project_parts.index', ['project_id' => $project->id]) }}">Bài viết dự án</a>
		<i class="fa fa-circle"></i>
	</li>
	<li>
		<a href="{{ route('admin.project_parts.create', ['project_id' => $project->id]) }}">Tạo mới</a>
	</li>
</ul>
<!-- END PAGE BREADCRUMB -->
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
	<div class="col-md-12">
		 <div class="portlet light bordered">
			<div class="portlet-body">
				<table id="tblProject_parts" class="table table-striped table-bordered table-hover">
					<thead>
					<tr>
						<th>#</th>
						<th>Hình ảnh</th>
						<th>Tên bài viết dự án</th>
						<th>Mô tả</th>
						<th>Loại bài viết</th>
						<th>Thứ tự</th>
						<th>Xuất bản</th>
						<th>Thao tác</th>
					</tr>
					</thead>
					<tbody>
						@foreach ($project_parts as $key=>$project_part)
						<tr>
							<td>{{ $key + 1 }}</td>
							<td class="text-center">
								<img src="{{ str_replace('.', '-image(80x45-crop).', $project_part->thumnail) }}" alt="{{ $project_part->name }}" class="img-thumbnail">
							</td>
							<td>{{ $project_part->name }}</td>
							<td>{{ $project_part->summary }}</td>
							<td>{{ $project_part->type == 'E' ? 'Thành phần' : 'Bài viết' }}</td>
							<td class="text-right">{{ $project_part->priority }}</td>
							<td class="text-center">
								<a class="action-xuatban" data-id="{{$product->id}}" data-model="project_part" data-active="{{$product->active}}">
								{!! $project_part->active == 1 ? '<i class="fa fa-check-square font-green-jungle"></i>' : '<i class="fa fa-square-o font-yellow-crusta"></i>' !!}
								</a>
							</td>
							<td>
								<a href="{{ route('admin.project_parts.edit', ['project_parts' => $project_part->id]) }}" class="btn btn-xs green-jungle">
									<i class="fa fa-edit"></i> Sửa
								</a>
								@if($project_part->type == 'A')
								<a href="{{ $project_part->getLink() }}" class="btn btn-xs green-sharp">
									<i class="fa fa-eye"></i> View
								</a>
								@endif
								<a href="javascript:;" class="btn btn-xs red-thunderbird action-delete" data-id="{{ $project_part->id }}">
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
<script src="/admin/assets/pages/project_parts/crazyify.project_parts.index.js" type="text/javascript"></script>
@endsection