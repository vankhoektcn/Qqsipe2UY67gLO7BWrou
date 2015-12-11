<div class="b-search">
	{!! Form::open(['route' => 'search', 'method' => 'GET']) !!}	
	 {!! Form::text('keyword', null,
                           array('required',
                                'class'=>'',
                                'placeholder'=>'Tìm kiếm')) !!}
     {!! Form::submit('',array('class'=>'btn btn-default')) !!}
	{!! Form::close() !!}
	@if ( $errors->any() )
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>	
	@endif
</div>