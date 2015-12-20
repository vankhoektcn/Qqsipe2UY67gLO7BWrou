@inject('articleCategory', 'App\ArticleCategory')
<link href="/frontend/css/agent_small.css" rel="stylesheet" type="text/css">
<div class="rightBox">
	@if (!empty($project_articles) && $project_articles->count()>0)
	<h3><i class="fa fa-angle-double-right"></i> Thông tin dự án</h3>
	<div class="blo-top right-register">
		@foreach ($project_articles as $article)
				<li><i class="fa fa-angle-double-right"></i><a href="{{ $article->link }}">{{ $article->name }}</a></li>
		@endforeach
	</div>
	@endif
	@if (!empty($other_projects) && $other_projects->count()>0)
	<h3><i class="fa fa-angle-double-right"></i> Dự án khác</h3>
	<div class="blo-top">
		@foreach ($other_projects as $project)
		<div class="property-small">
            <a href="{{ $project->getLink() }}" class="property-simple-image">
            	<i class="fa fa-search-plus property-simple-hover-icon"></i>
                <img width="100%" src="http://preview.byaviators.com/template/realsite/assets/img/tmp/medium/6.jpg" alt="">
            </a>

            <div class="property-small-content">
                <a class="property-small-title" href="{{ $project->getLink() }}">{{$project->name}}</a>
                <div class="property-small-address"><i class="fa fa-map-marker project-marker"></i> {{$project->address}}</div>
            </div>
        </div>
		@endforeach
	</div>		
	@endif

	@if (!empty($project_agents) && $project_agents->count()>0)
	<h3><i class="fa fa-angle-double-right"></i> Chuyên viên môi giới</h3>
	<div class="blo-top">
		@foreach ($project_agents as $agent)
		<div class="agent-small">
            <div class="agent-small-inner">
                <div class="agent-small-image">
                    <a href="#" class="agent-small-image-inner">
                        <img src="{{$agent->thumnail}}" alt="">
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
	@endif

</div>