{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('desc_nombre', 'Desc_nombre:') !!}
			{!! Form::text('desc_nombre') !!}
		</li>
		<li>
			{!! Form::label('desc_porcentaje', 'Desc_porcentaje:') !!}
			{!! Form::text('desc_porcentaje') !!}
		</li>
		<li>
			{!! Form::label('desc_rel_id', 'Desc_rel_id:') !!}
			{!! Form::text('desc_rel_id') !!}
		</li>
		<li>
			{!! Form::label('desc_rel_contenido', 'Desc_rel_contenido:') !!}
			{!! Form::text('desc_rel_contenido') !!}
		</li>
		<li>
			{!! Form::label('desc_feho_inicio', 'Desc_feho_inicio:') !!}
			{!! Form::text('desc_feho_inicio') !!}
		</li>
		<li>
			{!! Form::label('desc_feho_fin', 'Desc_feho_fin:') !!}
			{!! Form::text('desc_feho_fin') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}