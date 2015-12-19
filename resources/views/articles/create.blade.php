@extends('app')

@section('content')

	<h1>Write a New Article</h1>

	{!! Form::open(['url' => 'articles']) !!}
		@include('articles.partials.form', ['submit_button_text' => 'Add Article'])
	{!! Form::close() !!}

	@include('errors.list')

@stop