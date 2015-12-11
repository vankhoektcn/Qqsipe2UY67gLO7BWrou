@if (session('announcement'))
	<div class="note note-success">
		<h4 class="block">Thông báo</h4>
		<p>
			{{ session('announcement') }}
		</p>
	</div>
@endif