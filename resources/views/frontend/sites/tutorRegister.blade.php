@extends('frontend.layouts.master')
@section('head.title', 'Đăng ký làm gia sư')
@section('body.content')
	<div class="col-md-9 bann-right pull-right"> 
		<div class="banner">
			<h3 class="h3-title"><i class="fa fa-user-plus greenMain"></i>  Đăng ký làm gia sư</h3>
			@if (session('register-status'))
				<div class="alert alert-success">
					{{ session('register-status') }}
				</div>
			@endif
			{!! Form::open(['route' => 'createTutorRegister', 'method' => 'POST', 'class' => 'form-horizontal tutorRegisterForm registerForm']) !!}	
				<div class="form-group">
					<label class="control-label col-sm-4" for="name">Họ tên:</label>
					<div class="col-sm-8">
						<input type="text" class="form-control required" required="required" name="TutorRegister[name]" id="name" placeholder="Nhập họ tên">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="email">Email:</label>
					<div class="col-sm-8">
						<input type="email" class="form-control required" required="required" name="TutorRegister[email]" id="email" placeholder="Nhập email">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="mobile">Điện thoại:</label>
					<div class="col-sm-8">
						<input type="text" class="form-control required" required="required" name="TutorRegister[mobile]" id="mobile" placeholder="Nhập điện thoại">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="sex">Giới tính:</label>
					<div class="col-sm-8">
						<select class="form-control"  name="TutorRegister[sex]" id="sex">
						    <option value="1">Nam</option>
						    <option value="0">Nữ</option>
						    <option value="2">Khác</option>
						  </select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="district">Quận (huyện):</label>
					<div class="col-sm-8">
						<select class="form-control required" required="required" name="TutorRegister[district_id]" id="district_id" >
							@foreach ($districts as $district)
						    <option value="{{$district->id}}">{{$district->name}}</option>
							@endforeach
						  </select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="address">Địa chỉ:</label>
					<div class="col-sm-8">
						<input type="text" class="form-control novalid" name="TutorRegister[address]" id="address" placeholder="Nhập địa chỉ">
					</div>
				</div>
				<div class="from-group">
				  <h4 class="subTitleGreen">Thông tin gia sư</h4>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="teacherlevel">Trình độ:</label>
					<div class="col-sm-8">
						<select class="form-control required" required="required" name="TutorRegister[teacher_level]" id="teacher_level" >
						    <option value="1">Đại học</option>
						    <option value="2">Đã tốt nghiệp Đại Học</option>
						    <option value="3">Thạc sĩ</option>
						    <option value="4">Giáo viên</option>
						    <option value="5">Sinh viên</option>
						  </select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="experient">Năm kinh nghiệm:</label>
					<div class="col-sm-8">
						<input type="number" class="form-control novalid number" name="TutorRegister[experient]" id="experient" placeholder="Nhập năm kinh nghiệm">
					</div>
				</div>	
				<div class="form-group">
					<label class="control-label col-sm-4" for="company">Nơi công tác:</label>
					<div class="col-sm-8">
						<input type="text" class="form-control novalid" name="TutorRegister[company]" id="company" placeholder="Nơi công tác">
					</div>
				</div>			
				<div class="from-group">
				  <h4 class="subTitleGreen">Thông tin yêu cầu</h4>
				</div>
				<div class="form-group"> 
					<label class="control-label col-sm-4" >Có thể dạy cấp:</label>
					<div class="col-sm-8">
						<label class="checkbox-inline"> <input type="checkbox" class="teacher_level" name="TutorRegister[primary]" id="primary" >Tiểu học </label>
						<label class="checkbox-inline"> <input type="checkbox" class="teacher_level" name="TutorRegister[secondary]" id="secondary" >THCS </label>
						<label class="checkbox-inline"> <input type="checkbox" class="teacher_level" name="TutorRegister[highshool]" id="highshool" >THPT </label>
					</div>
				</div>
				<div class="form-group"> 
					<label class="control-label col-sm-4" >Môn có thể dạy:</label>
					<input type="hidden" name="arrSubjects" id="arrSubjects" value="" >
					<div class="col-sm-8">
						@foreach($subjects as $subject)
						<div class="col-sm-4">
							<label class="checkbox-inline"> <input type="checkbox" class="subjects novalid" value="{{$subject->id}}">{{$subject->name}}</label>
						</div>
						@endforeach
						<div class="clearfix"></div>
						<label class="control-label error-label">Vui lòng chọn môn có thể dạy</label>
					</div>
				</div>
				<div class="form-group"> 
					<label class="control-label col-sm-4">Thời gian có thể dạy:</label>
					<input type="hidden" name="arrTeachTime" id="arrTeachTime" value="" >
					<div class="col-sm-8">
						<div class="col-sm-4">
							<div>Sáng</div>
							<?php $ttS = $teachTimes->where('type','S'); ?>
							@foreach($ttS as $teachTime)
							<div>
								<label class="checkbox-inline"> <input type="checkbox" class="teachTime novalid" value="{{$teachTime->id}}" >{{$teachTime->key}}</label>	
							</div>
							@endforeach
						</div>
						<div class="col-sm-4">
							<div>Chiều</div>
							<?php $ttS = $teachTimes->where('type','C'); ?>
							@foreach($ttS as $teachTime)
							<div>
								<label class="checkbox-inline"> <input type="checkbox" class="teachTime novalid" value="{{$teachTime->id}}" >{{$teachTime->key}}</label>	
							</div>
							@endforeach
						</div>
						<div class="col-sm-4">
							<div>Tối</div>
							<?php $ttS = $teachTimes->where('type','T'); ?>
							@foreach($ttS as $teachTime)
							<div>
								<label class="checkbox-inline"> <input type="checkbox" class="teachTime novalid" value="{{$teachTime->id}}" >{{$teachTime->key}}</label>	
							</div>
							@endforeach
						</div>
						<div class="clearfix"></div>
						<label class="control-label error-label">Vui lòng chọn thời gian có thể dạy</label>
					</div>
				</div>
				<div class="form-group"> 
					<label class="control-label col-sm-4">Khu vực có thể dạy:</label>
					<input type="hidden" name="arrDistrict" id="arrDistrict" value="" >
					<div class="col-sm-8">
						@foreach ($districts as $district)
						<div class="col-sm-4">
							<label class="checkbox-inline"> <input type="checkbox" class="districtTeach novalid" value="{{$district->id}}" >{{$district->name}}</label>
						</div>
						@endforeach
						<div class="clearfix"></div>
						<label class="control-label error-label">Vui lòng chọn khu vực có thể dạy</label>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="salary">Học phí mong muốn/buổi:</label>
					<div class="col-sm-8">
						<input type="text" class="form-control novalid number" name="TutorRegister[salary]" id="salary" placeholder="VNĐ">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" for="other_require">Yêu cầu khác:</label>
					<div class="col-sm-8">
						<textarea class="form-control" row="5" cols="2" name="TutorRegister[other_require]" id="other_require"  placeholder="Yêu cầu khác"></textarea>
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
{!! Minify::javascript('/frontend/js/pages/tutorRegister.js') !!}
@endsection