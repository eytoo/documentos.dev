{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('test_nombres', 'Test_nombres:') !!}
			{!! Form::text('test_nombres') !!}
		</li>
		<li>
			{!! Form::label('test_ocupacion', 'Test_ocupacion:') !!}
			{!! Form::text('test_ocupacion') !!}
		</li>
		<li>
			{!! Form::label('test_foto', 'Test_foto:') !!}
			{!! Form::text('test_foto') !!}
		</li>
		<li>
			{!! Form::label('test_detalle', 'Test_detalle:') !!}
			{!! Form::textarea('test_detalle') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}