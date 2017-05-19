{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('vc_id', 'Vc_id:') !!}
			{!! Form::text('vc_id') !!}
		</li>
		<li>
			{!! Form::label('vd_cod_rel_id', 'Vd_cod_rel_id:') !!}
			{!! Form::text('vd_cod_rel_id') !!}
		</li>
		<li>
			{!! Form::label('vd_tipo', 'Vd_tipo:') !!}
			{!! Form::text('vd_tipo') !!}
		</li>
		<li>
			{!! Form::label('vd_precio', 'Vd_precio:') !!}
			{!! Form::text('vd_precio') !!}
		</li>
		<li>
			{!! Form::label('vd_desc_por', 'Vd_desc_por:') !!}
			{!! Form::text('vd_desc_por') !!}
		</li>
		<li>
			{!! Form::label('vd_desc_monto', 'Vd_desc_monto:') !!}
			{!! Form::text('vd_desc_monto') !!}
		</li>
		<li>
			{!! Form::label('vd_cupon_cod', 'Vd_cupon_cod:') !!}
			{!! Form::text('vd_cupon_cod') !!}
		</li>
		<li>
			{!! Form::label('vd_cupon_por', 'Vd_cupon_por:') !!}
			{!! Form::text('vd_cupon_por') !!}
		</li>
		<li>
			{!! Form::label('vd_cupon_monto', 'Vd_cupon_monto:') !!}
			{!! Form::text('vd_cupon_monto') !!}
		</li>
		<li>
			{!! Form::label('vd_total', 'Vd_total:') !!}
			{!! Form::text('vd_total') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}