@extends('frontend.layouts.master')
@section('head.title', 'Đăng ký tìm gia sư')
@section('body.content')
	<div class="col-md-9 bann-right pull-right">
		<div class="banner">
			<h3 class="h3-title"><i class="fa fa-hand-o-right greenMain"></i>  Đăng ký tìm gia sư</h3>
			@if (session('register-status'))
				<div class="alert alert-success">
					{{ session('register-status') }}
				</div>
			@endif
			{!! Form::open(['route' => 'createStudentRegister', 'method' => 'POST', 'class' => 'form-horizontal studentRegisterForm registerForm' ]) !!}	
				<div class="form-group">
					<label class="control-label col-sm-4" for="name">Họ tên:</label>
					<div class="col-sm-8">
						<input type="text" class="form-control required" required="required" name="StudentRegister[name]" id="name" placeholder="Nhập họ tên">
						<label class="control-label error-label">Vui lòng nhập họ tên</label>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="email">Email:</label>
					<div class="col-sm-8">
						<input type="email" class="form-control required" required="required" name="StudentRegister[email]" id="email" placeholder="Nhập email">
						<label class="control-label error-label">Vui lòng nhập email</label>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="mobile">Điện thoại:</label>
					<div class="col-sm-8">
						<input type="text" class="form-control required" required="required" name="StudentRegister[mobile]" id="mobile" placeholder="Nhập điện thoại">
						<label class="control-label error-label">Vui lòng nhập điện thoại</label>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="sex">Giới tính:</label>
					<div class="col-sm-8">
						<select class="form-control"  name="StudentRegister[sex]" id="sex">
						    <option value="1">Nam</option>
						    <option value="0">Nữ</option>
						    <option value="2">Khác</option>
						  </select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="district">Quận (huyện):</label>
					<div class="col-sm-8">
						<select class="form-control required" required="required" name="StudentRegister[district_id]" id="district_id" >
							@foreach ($districts as $district)
						    <option value="{{$district->id}}">{{$district->name}}</option>
							@endforeach
						  </select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="address">Địa chỉ:</label>
					<div class="col-sm-8">
						<input type="text" class="form-control novalid" name="StudentRegister[address]" id="address" placeholder="Nhập địa chỉ">
					</div>
				</div>
				<div class="from-group">
				  <h4 class="subTitleGreen">Thông tin về học sinh/học viên</h4>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="class">Trình độ:</label>
					<div class="col-sm-8">
						<select class="form-control required" required="required" name="StudentRegister[class]" id="class">				
		                  <option value="0">Mẫu giáo</option>
		                  <option value="1">Lớp 1</option>
		                  <option value="2">Lớp 2</option>						
		                  <option value="3">Lớp 3</option>						
		                  <option value="4">Lớp 4</option>						
		                  <option value="5">Lớp 5</option>						
		                  <option value="6">Lớp 6</option>						
		                  <option value="7">Lớp 7</option>						
		                  <option value="8">Lớp 8</option>						
		                  <option value="9">Lớp 9</option>						
		                  <option value="10">Lớp 10</option>						
		                  <option value="11">Lớp 11</option>						
		                  <option value="12">Lớp 12</option>					
		                  <option value="13">Sinh viên</option>						
		                  <option value="14">Cán bộ CNVC</option>						
		                  <option value="15">Khác</option>						
		               </select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="level">Học lực mong muốn:</label>
					<div class="col-sm-8">
						<select class="form-control required" required="required" name="StudentRegister[level]" id="level">				
		                   <!-- <option value="Y">Yếu</option>
		                   <option value="T">Trung bình</option> -->
						   <option value="K">Khá</option>
						   <option value="G">Giỏi</option>
						   <option value="X">Xuất Sắc</option>
		               </select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="school">Trường học/nơi công tác:</label>
					<div class="col-sm-8">
						<input type="text" class="form-control novalid" name="StudentRegister[school]" id="school" placeholder="Trường học">
					</div>
				</div>
				<div class="from-group">
				  <h4 class="subTitleGreen">Thông tin yêu cầu</h4>
				</div>
				<div class="form-group"> 
					<label class="control-label col-sm-4" >Đăng ký học:</label>
					<input type="hidden" name="arrSubjects" id="arrSubjects" value="" >
					<div class="col-sm-8">
						@foreach($subjects as $subject)
						<div class="col-sm-4">
							<label class="checkbox-inline"> <input type="checkbox" name="StudentRegister[subjects][]" class="subjects novalid" value="{{$subject->id}}">{{$subject->name}}</label>
						</div>
						@endforeach
						<div class="clearfix"></div>
						<label class="control-label error-label">Vui lòng chọn môn học</label>
					</div>
				</div>
				<div class="form-group"> 
					<label class="control-label col-sm-4">Thời gian học:</label>
					<input type="hidden" name="arrTeachTime" id="arrTeachTime" value="" >
					<div class="col-sm-8">
						<div class="col-sm-4">
							<div>Sáng</div>
							<?php $ttS = $teachTimes->where('type','S'); ?>
							@foreach($ttS as $teachTime)
							<div>
								<label class="checkbox-inline"> <input type="checkbox" name="StudentRegister[teachTimes][]" class="teachTime novalid" value="{{$teachTime->id}}" >{{$teachTime->key}}</label>	
							</div>
							@endforeach
						</div>
						<div class="col-sm-4">
							<div>Chiều</div>
							<?php $ttS = $teachTimes->where('type','C'); ?>
							@foreach($ttS as $teachTime)
							<div>
								<label class="checkbox-inline"> <input type="checkbox" name="StudentRegister[teachTimes][]" class="teachTime novalid" value="{{$teachTime->id}}" >{{$teachTime->key}}</label>	
							</div>
							@endforeach
						</div>
						<div class="col-sm-4">
							<div>Tối</div>
							<?php $ttS = $teachTimes->where('type','T'); ?>
							@foreach($ttS as $teachTime)
							<div>
								<label class="checkbox-inline"> <input type="checkbox" name="StudentRegister[teachTimes][]" class="teachTime novalid" value="{{$teachTime->id}}" >{{$teachTime->key}}</label>	
							</div>
							@endforeach
						</div>
						<div class="clearfix"></div>
						<label class="control-label error-label">Vui chọn thời gian học</label>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="cost">Học phí dự kiến:</label>
					<div class="col-sm-8">
						<input type="text" class="form-control novalid number" name="StudentRegister[cost]" id="cost" placeholder="VNĐ">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="other_require">Yêu cầu khác:</label>
					<div class="col-sm-8">
						<textarea class="form-control novalid" row="5" cols="2" name="StudentRegister[other_require]" id="other_require"  placeholder="Yêu cầu khác"></textarea>
					</div>
				</div>

				<div class="form-group"> 
					<label class="control-label col-sm-4" for="other"></label>
					<div class="col-sm-8 sub-button form_details">
						<input type="submit" id="btnRegister" value="Đăng ký" >
					</div>
				</div>
			{!! Form::close() !!}
			
			@if ( $errors->any() )
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>	
			@endif
		</div>
	</div>
	<div class="col-md-3 bann-left pull-left">
		@include('frontend.layouts.rightBox')
		
	</div>
	<div class="clearfix"> </div>
@endsection

@section('body.js')
{!! Minify::javascript('/frontend/js/pages/studentRegister.js') !!}
@endsection