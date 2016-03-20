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
											<select class="form-control" name="project_type" id="project_type_id" type="PROJECT">
											</select>
										</div>
									</div>
									<div class="form-section col-md-3">
										<label>Tỉnh/thành phố</label>
										<div class="select-box">
											<select class="form-control" name="province" id="province_id" type="PROJECT">
											</select>
										</div>
									</div>
									<div class="form-section col-md-3">
										<label>Quận/Huyện</label>
										<div class="select-box">
											<select class="form-control" name="district" id="district_id" type="PROJECT">
												<option value="">--Chọn Quận/Huyện--</option>
											</select>
										</div>
									</div>
									<div class="form-section col-md-3">
										<label>Phường/Xã</label>
										<div class="select-box">
											<select class="form-control" name="ward" id="ward_id" type="PROJECT">
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
										<button type="submit" class="btn btn-primary form-control" id="btn-projects-search">Tìm kiếm</button>
									</div>
								</div>
							</div>
						<!-- </form> -->
						{!! Form::close() !!}
					</div>
				</div>
			</div>