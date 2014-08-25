@extends('layouts.main')
@section('content')
<div class="large-12 columns">
	<h1>{{{$list -> name}}}</h1>
	<ul>
		@foreach ($items as $item)
			<li>
				{{{ $item -> content}}}
			</li>
		@endforeach
	</ul>
	<p>{{ link_to_route('todos.index', 'Back') }}</p>
</div>
@stop