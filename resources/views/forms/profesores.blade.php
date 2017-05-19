{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('prof_nombre', 'Prof_nombre:') !!}
			{!! Form::text('prof_nombre') !!}
		</li>
		<li>
			{!! Form::label('prof_apellidos', 'Prof_apellidos:') !!}
			{!! Form::text('prof_apellidos') !!}
		</li>
		<li>
			{!! Form::label('prof_correo', 'Prof_correo:') !!}
			{!! Form::text('prof_correo') !!}
		</li>
		<li>
			{!! Form::label('prof_url', 'Prof_url:') !!}
			{!! Form::text('prof_url') !!}
		</li>
		<li>
			{!! Form::label('prof_foto', 'Prof_foto:') !!}
			{!! Form::text('prof_foto') !!}
		</li>
		<li>
			{!! Form::label('prof_historia', 'Prof_historia:') !!}
			{!! Form::textarea('prof_historia') !!}
		</li>
		<li>
			{!! Form::label('prof_otros', 'Prof_otros:') !!}
			{!! Form::textarea('prof_otros') !!}
		</li>
		<li>
			{!! Form::label('prof_telefono', 'Prof_telefono:') !!}
			{!! Form::text('prof_telefono') !!}
		</li>
		<li>
			{!! Form::label('prof_web', 'Prof_web:') !!}
			{!! Form::text('prof_web') !!}
		</li>
		<li>
			{!! Form::label('prof_ocupacion', 'Prof_ocupacion:') !!}
			{!! Form::text('prof_ocupacion') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}