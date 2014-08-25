@extends('layouts.main')
@section('content')
	@if (isset($lname))
		{{{$name}}}	
	@else
		no lname
	@endif
	@foreach ($add_data as $key => $value) 
		{{$key}} -> {{$value}}
		<br>
	@endforeach
@stop