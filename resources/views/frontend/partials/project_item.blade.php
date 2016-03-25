					@foreach ($projects as $project)				
					<li class="col-md-4 mrgb5x col-sm-4">
						<div class="property-box sale-2 animated out" data-delay="0" data-animation="fadeInUp">
							<div class="appartment-img">
								<a href="{{$project->getLink()}}" target="_blank">
									<img src="{{ Image::url($project->getFirstImage(),300,200,array('crop'))}}" class="img-responsive" alt="{{$project->name}}" />
								</a>
								<!-- <div class="room-price"><span>$699<sup>/week</sup></span></div> -->
								<div class="like-btn"><a href="javascript:;"><i class="fa fa-heart"></i></a></div>
							</div>
							<div class="property-text clearfix">
								<div class="resort-name">
									<a href="{{$project->getLink()}}" target="_blank"><h4>{{$project->name}}</h4></a>
									<div class="address">
										<i class="fa fa-map-marker project-marker mrgr05"></i>
										<small><em>{{$project->addressFull()}}</em></small>
									</div>
									<p>{!!$project->content!!}</p>
								</div>
								<div class="detail-btn mrgt3x"> <a href="{{$project->getLink()}}" target="_blank" class="sale">CHI TIẾT DỰ ÁN</a> </div>						     
							</div>
						</div>
					</li>
					@endforeach	