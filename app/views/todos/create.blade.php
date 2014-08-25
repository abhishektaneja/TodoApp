@extends('layouts.main')
@section('content')
	<!-- <form action="http://homestead.app:8000/todos/" method="POST">
		<label for="title"> List Title</label>
		<input type="text" id="title" name="title">
		<input type="submit" class="button" value="Create">
	</form> -->

	{{ Form::open(array('route' => 'todos.store')) }}
		@include('todos.partials.form')
	{{ Form::close()}}

@stop