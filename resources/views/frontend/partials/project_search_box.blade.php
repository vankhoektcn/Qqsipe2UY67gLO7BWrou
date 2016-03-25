@inject('project_type', 'App\Project_type')
@inject('province', 'App\Province')
<?php 
	$project_type_inject = $project_type::where('active',1)->orderBy('priority')->orderBy('created_at','desc')->get(); 
	$province_inject = $province::where('is_publish',1)->orderBy('priority')->orderBy('created_at','desc')->get(); 
?>
<div id="projects-search" class="tab-pane fade in active">
				<div class="search-options">
					<div class="search-form">
						{!! Form::open(['route' => 'project_search', 'method' => 'GET', 'id' => 'project-search', 'name' => 'projectsearch']) !!}	
						<!-- <form id="project-search" name="projectsearch" method="post"> -->
							<div class="form-inner">
								<div class="left-options col-md-12">
									<div class="form-section col-md-3">
										<label>Loại dự án</label>
										<div class="select-box">
											<select class="form-control no-request no-ajax" name="project_type" id="project_type_id" type="PROJECT">
												@foreach ($project_type_inject as $project_type)
													<option value="{{$project_type->id}}" key="{{$project_type->key}}">{{$project_type->name}}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="form-section col-md-3">
										<label>Tỉnh/thành phố</label>
										<div class="select-box">
											<select class="form-control no-request no-ajax" name="province" id="province_id" type="PROJECT">
												<option value="">--Chọn thành phố--</option>
												@foreach ($province_inject as $province)
													<option value="{{$province->id}}" key="{{$province->key}}">{{$province->name}}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="form-section col-md-3">
										<label>Quận/Huyện</label>
										<div class="select-box">
											<select class="form-control no-request" name="district" id="district_id" type="PROJECT">
												<option value="">--Chọn Quận/Huyện--</option>
											</select>
										</div>
									</div>
									<div class="form-section col-md-3">
										<label>Phường/Xã</label>
										<div class="select-box">
											<select class="form-control no-request" name="ward" id="ward_id" type="PROJECT">
												<option value="">--Chọn Phường/Xã--</option>
											</select>
										</div>
									</div>
									<div class="form-section col-md-3">
										<label>Đường/Phố</label>
										<div class="select-box">
											<select class="form-control" name="street" id="street_id" type="PROJECT">
												<option value="">--Chọn Đường/Phố--</option>									
											</select>
										</div>
									</div>
									<div class="form-section col-md-3">
										<label>Dự án</label>
										<div class="select-box">
											<select class="form-control" name="project" id="project_id" type="PROJECT">	
												<option value="">--Chọn dự án--</option>											
											</select>
										</div>
									</div>
									<div class="form-section col-md-3">
										<label>Tiện ích</label>
										<div class="">
											<select class="form-control" name="utility" id="utility_id" type="PROJECT" multiple="multiple">											
											</select>
										</div>
									</div>
									<div class="form-section col-md-3 pull-right">
										<label>Tìm</label>
										<input type="button" class="btn btn-primary form-control" id="btn-projects-search" value="Tìm kiếm" />
									</div>
								</div>
							</div>
						<!-- </form> -->
						{!! Form::close() !!}
					</div>
				</div>
			</div>