{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('pag_pen_estado', 'Pag_pen_estado:') !!}
			{!! Form::text('pag_pen_estado') !!}
		</li>
		<li>
			{!! Form::label('vc_id', 'Vc_id:') !!}
			{!! Form::text('vc_id') !!}
		</li>
		<li>
			{!! Form::label('pag_pen_feho', 'Pag_pen_feho:') !!}
			{!! Form::text('pag_pen_feho') !!}
		</li>
		<li>
			{!! Form::label('pag_pen_imagen', 'Pag_pen_imagen:') !!}
			{!! Form::text('pag_pen_imagen') !!}
		</li>
		<li>
			{!! Form::label('pag_pen_cod_cobro', 'Pag_pen_cod_cobro:') !!}
			{!! Form::text('pag_pen_cod_cobro') !!}
		</li>
		<li>
			{!! Form::label('pag_pen_feho_fin', 'Pag_pen_feho_fin:') !!}
			{!! Form::text('pag_pen_feho_fin') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}