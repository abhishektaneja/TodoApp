{{ Form::label('name' , 'List name')}}
{{ Form::text('name')}}
{{ Form::submit('create', array('class' => 'button'))}}
{{ $errors -> first('name', '<small class="error">:message</small>')}}