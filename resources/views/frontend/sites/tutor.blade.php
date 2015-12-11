@extends('frontend.layouts.master')
@section('head.title', 'Gia sư hiện có')
@section('body.content')
	
	<div class="blog">
		<div class="blog-content">
			<div class="blog-content-left pull-right">
				<h3 class="h3-title"><i class="fa fa-list-alt"></i>  Danh sách gia sư hiện có</h3>
				<div class="blog-articals tutorList">
					<div class="col-md-4">
						<img src="/frontend/images/co.png" title="Gia sư">
						<div class="clearfix"> </div>
					</div>
					<div class="col-md-8">
						<table cellspacing="0" cellpadding="0" class="tblTutor">
							<tbody>
								<tr class="row0">
									<td class="col_tutor_left">Họ tên</td>
									<td width="5">:</td>
									<td><span class="tutor_name">Huỳnh Phương Hoài My</span></td>
								</tr>
								<tr class="row1">
									<td class="col_tutor_left">Hiện là</td>
									<td>:</td>
									<td>Giáo Viên</td>
								</tr>
								<tr class="row0">
									<td class="col_tutor_left">Trường</td>
									<td>:</td>
									<td>Bình Phú</td>
								</tr>
								<tr class="row1">
									<td class="col_tutor_left">Các môn dạy</td>
									<td>:</td>
									<td>Anh Văn</td>
								</tr>
								<tr class="row0">
									<td class="col_tutor_left">Thời gian dạy</td>
									<td>:</td>
									<td>Thỏa Thuận</td>
								</tr>
								<tr class="row1">
									<td class="col_tutor_left">Tại các khu vực</td>
									<td>:</td>
									<td>Q1,3,4,5,6,7,8,10</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<nav>
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