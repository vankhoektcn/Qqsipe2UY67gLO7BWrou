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
		<a href="{{ route('admin.articles.index') }}">Bài viết</a>
		<i class="fa fa-circle"></i>
	</li>
	<li>
		<a href="{{ route('admin.articles.index') }}">Danh sách</a>
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
						<th>Hình ảnh</th>
						<th>Tên bài viết</th>
						<th>Thứ tự</th>
						<th>Xuất bản</th>
						<th>Thao tác</th>
					</tr>
					</thead>
					<tbody>
						@foreach ($articles as $key=>$article)
						<tr>
							<td>{{ $key + 1 }}</td>
							<td class="text-center">
								<img src="{{ str_replace('.', '-image(80x45-crop).', $article->getFirstAttachment()) }}" alt="{{ $article->name }}" class="img-thumbnail">
							</td>
							<td>{{ $article->name }}</td>
							<td class="text-right">{{ $article->priority }}</td>
							<td class="text-center">
								<a class="action-xuatban" data-id="{{$article->id}}" data-model="article" data-active="{{$article->is_publish}}">
								{!! $article->is_publish == 1 ? '<i class="fa fa-check-square font-green-jungle"></i>' : '<i class="fa fa-square-o font-yellow-crusta"></i>' !!}
								</a>
							</td>
							<td>
								<a href="{{ route('admin.articles.edit', ['articles' => $article->id]) }}" class="btn btn-xs green-jungle">
									<i class="fa fa-edit"></i> Sửa
								</a>
								<a href="javascript:;" class="btn btn-xs red-thunderbird action-delete" data-id="{{ $article->id }}">
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
<script src="/admin/assets/pages/articles/crazyify.articles.index.js" type="text/javascript"></script>
@endsection