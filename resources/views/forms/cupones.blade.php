{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('cupon_codigo', 'Cupon_codigo:') !!}
			{!! Form::text('cupon_codigo') !!}
		</li>
		<li>
			{!! Form::label('cupon_nombre', 'Cupon_nombre:') !!}
			{!! Form::text('cupon_nombre') !!}
		</li>
		<li>
			{!! Form::label('cupon_porcentaje', 'Cupon_porcentaje:') !!}
			{!! Form::text('cupon_porcentaje') !!}
		</li>
		<li>
			{!! Form::label('cupon_rel_id', 'Cupon_rel_id:') !!}
			{!! Form::text('cupon_rel_id') !!}
		</li>
		<li>
			{!! Form::label('cupon_rel_contenido', 'Cupon_rel_contenido:') !!}
			{!! Form::text('cupon_rel_contenido') !!}
		</li>
		<li>
			{!! Form::label('cupon_feho_inicio', 'Cupon_feho_inicio:') !!}
			{!! Form::text('cupon_feho_inicio') !!}
		</li>
		<li>
			{!! Form::label('cupon_feho_fin', 'Cupon_feho_fin:') !!}
			{!! Form::text('cupon_feho_fin') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}