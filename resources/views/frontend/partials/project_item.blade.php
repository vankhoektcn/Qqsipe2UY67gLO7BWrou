					<li class="col-md-4 mrgb5x col-sm-4 li-project-item">
						<div class="property-box sale-2 animated out" data-delay="0" data-animation="fadeInUp">
							<div class="appartment-img">
								<a href="{{$project->getLink()}}" target="_blank">
									<img class="lazy img-responsive" src="/frontend/images/spacer.gif" data-src="{{ Image::url($project->getFirstImage(),300,200,array('crop'))}}" alt="{{$project->name}}" />
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
									<div class="read-more-container divSummary">
									<p>{{$project->summary}}</p>
									</div>
								</div>
								<div class="detail-btn mrgt3x full text-center"> <a href="{{$project->getLink()}}" target="_blank" class="sale">CHI TIẾT DỰ ÁN</a> </div>						     
							</div>
						</div>
					</li>
