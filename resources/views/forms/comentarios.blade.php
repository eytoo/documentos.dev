{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('com_descripcion', 'Com_descripcion:') !!}
			{!! Form::textarea('com_descripcion') !!}
		</li>
		<li>
			{!! Form::label('com_parent_id', 'Com_parent_id:') !!}
			{!! Form::text('com_parent_id') !!}
		</li>
		<li>
			{!! Form::label('com_tipo', 'Com_tipo:') !!}
			{!! Form::text('com_tipo') !!}
		</li>
		<li>
			{!! Form::label('com_cont_id', 'Com_cont_id:') !!}
			{!! Form::text('com_cont_id') !!}
		</li>
		<li>
			{!! Form::label('com_estado', 'Com_estado:') !!}
			{!! Form::text('com_estado') !!}
		</li>
		<li>
			{!! Form::label('com_calificacion', 'Com_calificacion:') !!}
			{!! Form::text('com_calificacion') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}