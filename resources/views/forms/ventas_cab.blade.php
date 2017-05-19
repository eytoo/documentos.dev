{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('vc_feho', 'Vc_feho:') !!}
			{!! Form::text('vc_feho') !!}
		</li>
		<li>
			{!! Form::label('tipo_pag_id', 'Tipo_pag_id:') !!}
			{!! Form::text('tipo_pag_id') !!}
		</li>
		<li>
			{!! Form::label('pag_pen_id', 'Pag_pen_id:') !!}
			{!! Form::text('pag_pen_id') !!}
		</li>
		<li>
			{!! Form::label('user_id', 'User_id:') !!}
			{!! Form::text('user_id') !!}
		</li>
		<li>
			{!! Form::label('vc_subtotal', 'Vc_subtotal:') !!}
			{!! Form::text('vc_subtotal') !!}
		</li>
		<li>
			{!! Form::label('vc_igv', 'Vc_igv:') !!}
			{!! Form::text('vc_igv') !!}
		</li>
		<li>
			{!! Form::label('vc_comision', 'Vc_comision:') !!}
			{!! Form::text('vc_comision') !!}
		</li>
		<li>
			{!! Form::label('vc_total', 'Vc_total:') !!}
			{!! Form::text('vc_total') !!}
		</li>
		<li>
			{!! Form::label('vc_desc_valor', 'Vc_desc_valor:') !!}
			{!! Form::text('vc_desc_valor') !!}
		</li>
		<li>
			{!! Form::label('vc_cupon_valor', 'Vc_cupon_valor:') !!}
			{!! Form::text('vc_cupon_valor') !!}
		</li>
		<li>
			{!! Form::label('vc_estado_pago', 'Vc_estado_pago:') !!}
			{!! Form::text('vc_estado_pago') !!}
		</li>
		<li>
			{!! Form::label('vc_feho_pago', 'Vc_feho_pago:') !!}
			{!! Form::text('vc_feho_pago') !!}
		</li>
		<li>
			{!! Form::label('vc_anulado', 'Vc_anulado:') !!}
			{!! Form::text('vc_anulado') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}