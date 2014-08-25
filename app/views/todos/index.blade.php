@extends('layouts.main')
@section('content')

<h1>All todos lists</h1>

@foreach ($todo_lists as $list) 
<h4>{{ link_to_route('todos.show',  $list->name, [$list -> id], ['class' => 'link'] ); }}
</h4>
<ul class="no-bullet button-group">
	<li>
		{{ link_to_route('todos.edit', 'edit', [$list->id], ['class' => 'tiny button'])}}
	</li>
	<li>
		{{ Form::model($list, array('route' => ['todos.destroy', $list -> id], 'method' => 'DELETE')) }}
		{{ Form::button('Delete', ['type' => 'submit', 'class' => 'tiny alert button'])}}
		{{ Form::close() }}
	</li>
</ul>
@endforeach

{{ link_to_route('todos.create', 'Create new list', null, ['class' => 'success button'])}}
@stop