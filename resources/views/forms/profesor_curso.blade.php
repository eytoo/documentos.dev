{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('prof_id', 'Prof_id:') !!}
			{!! Form::text('prof_id') !!}
		</li>
		<li>
			{!! Form::label('cur_id', 'Cur_id:') !!}
			{!! Form::text('cur_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}