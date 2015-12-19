@if ($errors->any())
	<ul class="alert alert-danger" style="list-style: none;">
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
@endif