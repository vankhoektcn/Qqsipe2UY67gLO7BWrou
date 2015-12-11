@if ($errors->has())
<div class="note note-danger">
	<h4 class="block">Lỗi nhập liệu! Vui lòng sửa các lỗi bên dưới</h4>
	<ul>
	@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
	@endforeach
	</ul>
</div>
@endif