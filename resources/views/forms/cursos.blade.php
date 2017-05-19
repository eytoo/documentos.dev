{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('cat_id', 'Cat_id:') !!}
			{!! Form::text('cat_id') !!}
		</li>
		<li>
			{!! Form::label('cur_nombre', 'Cur_nombre:') !!}
			{!! Form::text('cur_nombre') !!}
		</li>
		<li>
			{!! Form::label('cur_slogan', 'Cur_slogan:') !!}
			{!! Form::textarea('cur_slogan') !!}
		</li>
		<li>
			{!! Form::label('cur_icono', 'Cur_icono:') !!}
			{!! Form::text('cur_icono') !!}
		</li>
		<li>
			{!! Form::label('cur_url', 'Cur_url:') !!}
			{!! Form::text('cur_url') !!}
		</li>
		<li>
			{!! Form::label('cur_descripcion', 'Cur_descripcion:') !!}
			{!! Form::textarea('cur_descripcion') !!}
		</li>
		<li>
			{!! Form::label('cur_estado', 'Cur_estado:') !!}
			{!! Form::text('cur_estado') !!}
		</li>
		<li>
			{!! Form::label('cur_etiquetas', 'Cur_etiquetas:') !!}
			{!! Form::text('cur_etiquetas') !!}
		</li>
		<li>
			{!! Form::label('cur_portada', 'Cur_portada:') !!}
			{!! Form::text('cur_portada') !!}
		</li>
		<li>
			{!! Form::label('cur_duracion', 'Cur_duracion:') !!}
			{!! Form::text('cur_duracion') !!}
		</li>
		<li>
			{!! Form::label('cur_certificado', 'Cur_certificado:') !!}
			{!! Form::text('cur_certificado') !!}
		</li>
		<li>
			{!! Form::label('cur_gratuito', 'Cur_gratuito:') !!}
			{!! Form::text('cur_gratuito') !!}
		</li>
		<li>
			{!! Form::label('cur_tipo', 'Cur_tipo:') !!}
			{!! Form::text('cur_tipo') !!}
		</li>
		<li>
			{!! Form::label('cur_precio', 'Cur_precio:') !!}
			{!! Form::text('cur_precio') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}