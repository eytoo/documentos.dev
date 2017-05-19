{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('ser_pa_entidad', 'Ser_pa_entidad:') !!}
			{!! Form::text('ser_pa_entidad') !!}
		</li>
		<li>
			{!! Form::label('ser_pa_porcentaje', 'Ser_pa_porcentaje:') !!}
			{!! Form::text('ser_pa_porcentaje') !!}
		</li>
		<li>
			{!! Form::label('ser_pa_costo', 'Ser_pa_costo:') !!}
			{!! Form::text('ser_pa_costo') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}