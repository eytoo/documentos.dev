{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('user_id', 'User_id:') !!}
			{!! Form::text('user_id') !!}
		</li>
		<li>
			{!! Form::label('vc_id', 'Vc_id:') !!}
			{!! Form::text('vc_id') !!}
		</li>
		<li>
			{!! Form::label('log_error_feho', 'Log_error_feho:') !!}
			{!! Form::text('log_error_feho') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}