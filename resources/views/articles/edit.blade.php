@extends('app')

@section('content')

	<h1>Edit: {!! $article->title !!}</h1>

	{!! Form::model($article, ['method' => 'PATCH', 'action' => ['ArticlesController@update', $article->id]]) !!}
		@include('articles.partials.form', ['submit_button_text' => 'Edit Article'])
	{!! Form::close() !!}

	@include('errors.list')

@stop