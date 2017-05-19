{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('eti_id', 'Eti_id:') !!}
			{!! Form::text('eti_id') !!}
		</li>
		<li>
			{!! Form::label('eti_con_tipo', 'Eti_con_tipo:') !!}
			{!! Form::text('eti_con_tipo') !!}
		</li>
		<li>
			{!! Form::label('eti_cont_rel_id', 'Eti_cont_rel_id:') !!}
			{!! Form::text('eti_cont_rel_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}