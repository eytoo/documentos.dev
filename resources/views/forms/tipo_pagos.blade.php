{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('tipo_pag_nombre', 'Tipo_pag_nombre:') !!}
			{!! Form::text('tipo_pag_nombre') !!}
		</li>
		<li>
			{!! Form::label('tipo_pag_descripcion', 'Tipo_pag_descripcion:') !!}
			{!! Form::textarea('tipo_pag_descripcion') !!}
		</li>
		<li>
			{!! Form::label('tipo_pag_info', 'Tipo_pag_info:') !!}
			{!! Form::textarea('tipo_pag_info') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}