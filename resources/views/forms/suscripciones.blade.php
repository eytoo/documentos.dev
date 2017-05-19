{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('user_id', 'User_id:') !!}
			{!! Form::text('user_id') !!}
		</li>
		<li>
			{!! Form::label('sus_feho_ini', 'Sus_feho_ini:') !!}
			{!! Form::text('sus_feho_ini') !!}
		</li>
		<li>
			{!! Form::label('sus_feho_fin', 'Sus_feho_fin:') !!}
			{!! Form::text('sus_feho_fin') !!}
		</li>
		<li>
			{!! Form::label('sus_estado', 'Sus_estado:') !!}
			{!! Form::text('sus_estado') !!}
		</li>
		<li>
			{!! Form::label('vc_id', 'Vc_id:') !!}
			{!! Form::text('vc_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}