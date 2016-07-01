@inject('product_type', 'App\Product_type')
@inject('province', 'App\Province')
<?php 
	$product_type_inject = $product_type::where('active',1)->orderBy('priority')->orderBy('created_at','desc')->get(); 
	$province_inject = $province::where('is_publish',1)->orderBy('priority')->orderBy('created_at','desc')->get(); 
?>
<div id="products-search" class="tab-pane fade in">
				<div class="search-options">
					<div class="search-form">
						{!! Form::open(['route' => 'product_search', 'method' => 'GET', 'id' => 'product-search', 'name' => 'productsearch']) !!}	
							<div class="form-inner">
								<div class="left-options col-md-12">
									<div class="form-section col-md-3">
										<label>Loại tin đăng</label>
										<div class="select-box">
											<select class="form-control no-request no-ajax" name="product_type" id="product_type_id" type="PRODUCT">
												@foreach ($product_type_inject as $product_type)
													<option value="{{$product_type->id}}" key="{{$product_type->key}}">{{$product_type->name}}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="form-section col-md-3">
										<label>Tỉnh/thành phố</label>
										<div class="select-box">
											<select class="form-control no-request no-ajax" name="province" id="province_id" type="PRODUCT">
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
											<select class="form-control no-request" name="district" id="district_id" type="PRODUCT">
												<option value="">--Chọn Quận/Huyện--</option>
											</select>
										</div>
									</div>
									<div class="form-section col-md-3">
										<label>Phường/Xã</label>
										<div class="select-box">
											<select class="form-control no-request" name="ward" id="ward_id" id="ward_id" type="PRODUCT">
												<option value="">--Chọn Phường/Xã--</option>
											</select>
										</div>
									</div>
									<div class="form-section col-md-3">
										<label>Đường/Phố</label>
										<div class="select-box">
											<select class="form-control" name="street" id="street_id" type="PRODUCT">										
												<option value="">--Chọn Đường/Phố--</option>									
											</select>
										</div>
									</div>
									<div class="form-section col-md-3">
										<label>Dự án</label>
										<div class="select-box">
											<select class="form-control" name="project" id="project_id" type="PRODUCT">		
												<option value="">--Chọn dự án--</option>											
											</select>
										</div>
									</div>
									<div class="form-section col-md-3">
										<label>Tiện ích</label>
										<div class="">
											<select class="form-control" name="utility" id="utility_id" type="PRODUCT" multiple="multiple">											
											</select>
										</div>
									</div>
									<div class="form-section col-md-3">
										<label>Mức giá</label>
										<div class="select-box">
											<select class="form-control" name="price" id="price_range_id" type="PRODUCT">											
											</select>
										</div>
									</div>
									<div class="form-section col-md-3">
										<label>Diện tích</label>
										<div class="select-box">
											<select class="form-control" name="area" id="area_range_id" type="PRODUCT">											
											</select>
										</div>
									</div>
									<div class="form-section col-md-3">
										<label>Hướng</label>
										<div class="select-box">
											<select class="form-control" name="incense" id="incense_type_id" type="PRODUCT">											
											</select>
										</div>
									</div>
									<div class="form-section col-md-3 pull-right">
										<label>Tìm</label>
										<input type="button" class="btn btn-primary form-control" id="btn-products-search" value="Tìm kiếm" />
									</div>
								</div>
							</div>
						<!-- </form> -->
						{!! Form::close() !!}
					</div>
				</div>
			</div>