{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('lec_nombre', 'Lec_nombre:') !!}
			{!! Form::text('lec_nombre') !!}
		</li>
		<li>
			{!! Form::label('lec_descripcion', 'Lec_descripcion:') !!}
			{!! Form::textarea('lec_descripcion') !!}
		</li>
		<li>
			{!! Form::label('lec_url', 'Lec_url:') !!}
			{!! Form::text('lec_url') !!}
		</li>
		<li>
			{!! Form::label('lec_estado', 'Lec_estado:') !!}
			{!! Form::text('lec_estado') !!}
		</li>
		<li>
			{!! Form::label('lec_tipo', 'Lec_tipo:') !!}
			{!! Form::text('lec_tipo') !!}
		</li>
		<li>
			{!! Form::label('tema_id', 'Tema_id:') !!}
			{!! Form::text('tema_id') !!}
		</li>
		<li>
			{!! Form::label('lec_ruta_video', 'Lec_ruta_video:') !!}
			{!! Form::textarea('lec_ruta_video') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}