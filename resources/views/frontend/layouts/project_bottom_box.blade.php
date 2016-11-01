@inject('articleCategory', 'App\ArticleCategory')
<link href="/frontend/css/agent_small.css" rel="stylesheet" type="text/css">
<div class="bottomBox">
	@if (!empty($project_articles) && $project_articles->count()>0)
	<h3><i class="fa fa-angle-double-right"></i> Thông tin dự án</h3>
	<div class="blo-top right-register">
		@foreach ($project_articles as $article)
				<li><i class="fa fa-angle-double-right"></i><a href="{{ $article->getLink() }}">{{ $article->name }}</a></li>
		@endforeach
	</div>
	@endif
	@if (!empty($other_projects) && $other_projects->count()>0)
    <div class="row">
        <div class="col-md-12">
        	<h3><i class="fa fa-angle-double-right"></i> Dự án nổi bật</h3>
        	<div class="blo-top pull-left full">
        		@foreach ($other_projects as $project)
        		<div class="property-small col-md-4">
                    <a href="{{ $project->getLink() }}" class="property-simple-image">
                    	<i class="fa fa-search-plus property-simple-hover-icon"></i>
                        <img class="lazy" src="/frontend/images/spacer.gif" data-src="{{ Image::url($project->getFirstImage(),814,364,array('crop')) }}" alt="{{$project->name}}" width="100%">
                    </a>

                    <div class="property-small-content">
                        <a class="property-small-title" href="{{ $project->getLink() }}">{{$project->name}}</a>
                        <div class="property-small-address"><i class="fa fa-map-marker project-marker"></i> {{$project->addressFull()}}</div>
                    </div>
                </div>
        		@endforeach
        	</div>		
        </div>
    </div>
	@endif

	@if (!empty($project_agents) && $project_agents->count()>0)
    <div class="row">
        <div class="col-md-12">
        	<h3><i class="fa fa-angle-double-right"></i> Chuyên viên môi giới</h3>
        	<div class="blo-top pull-left full">
        		@foreach ($project_agents as $agent)
        		<div class="agent-small col-md-3">
                    <div class="agent-small-inner">
                        <div class="agent-small-image">
                            <a href="javascript:;" class="agent-small-image-inner">
                                <img class="lazy" src="/frontend/images/spacer.gif" data-src="{{$agent->thumnail}}" alt="">
                            </a><!-- /.agent-small-image-inner -->
                        </div><!-- /.agent-small-image -->

                        <div class="agent-small-content">
                            <div class="agent-small-title">
                                <a href="tel:{{$agent->mobile}}" title="Gọi {{$agent->name}}">{{$agent->name}}</a>
                            </div>

                            <div class="agent-small-email">
                                <i class="fa fa-at"></i> <a href="mailto:{{$agent->email}}?subject=Liên hệ từ myvanland.com"  title="Email tới {{$agent->name}}">{{$agent->email}}</a>
                            </div><!-- /.agent-small-email -->

                            <div class="agent-small-phone">
                                <a class="phone" href="tel:{{$agent->mobile}}" title="Gọi {{$agent->name}}"><i class="fa fa-phone"></i> {{$agent->mobile}}</a>
                            </div><!-- /.agent-small-phone -->
                        </div><!-- /.agent-small-content -->
                    </div><!-- /.agent-small-inner -->
                </div>
        		@endforeach
        	</div> 
        </div>
    </div>		
	@endif

</div>