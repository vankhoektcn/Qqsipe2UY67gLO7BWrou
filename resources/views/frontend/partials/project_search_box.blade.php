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
											<select class="form-control" name="project_type">
											</select>
										</div>
									</div>
									<div class="form-section col-md-3">
										<label>Tỉnh/thành phố</label>
										<div class="select-box">
											<select class="form-control" name="province">
											</select>
										</div>
									</div>
									<div class="form-section col-md-3">
										<label>Quận/Huyện</label>
										<div class="select-box">
											<select class="form-control" name="district">
												
											</select>
										</div>
									</div>
									<div class="form-section col-md-3">
										<label>Phường/Xã</label>
										<div class="select-box">
											<select class="form-control" name="ward">
												
											</select>
										</div>
									</div>
									<div class="form-section col-md-3">
										<label>Đường/Phố</label>
										<div class="select-box">
											<select class="form-control" name="street">												
											</select>
										</div>
									</div>
									<div class="form-section col-md-3 pull-right">
										<label>Tìm</label>
										<button type="submit" class="btn btn-primary form-control">Tìm kiếm</button>
									</div>
								</div>
							</div>
						<!-- </form> -->
						{!! Form::close() !!}
					</div>
				</div>
			</div>