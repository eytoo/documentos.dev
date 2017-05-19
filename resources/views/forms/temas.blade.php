{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('tema_nombre', 'Tema_nombre:') !!}
			{!! Form::text('tema_nombre') !!}
		</li>
		<li>
			{!! Form::label('tema_descripcion', 'Tema_descripcion:') !!}
			{!! Form::textarea('tema_descripcion') !!}
		</li>
		<li>
			{!! Form::label('cur_id', 'Cur_id:') !!}
			{!! Form::text('cur_id') !!}
		</li>
		<li>
			{!! Form::label('tema_url', 'Tema_url:') !!}
			{!! Form::text('tema_url') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}