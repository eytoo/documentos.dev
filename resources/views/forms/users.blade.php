{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('user_nombre', 'User_nombre:') !!}
			{!! Form::text('user_nombre') !!}
		</li>
		<li>
			{!! Form::label('user_apellidos', 'User_apellidos:') !!}
			{!! Form::text('user_apellidos') !!}
		</li>
		<li>
			{!! Form::label('user_email', 'User_email:') !!}
			{!! Form::text('user_email') !!}
		</li>
		<li>
			{!! Form::label('user_password', 'User_password:') !!}
			{!! Form::text('user_password') !!}
		</li>
		<li>
			{!! Form::label('user_confirmado', 'User_confirmado:') !!}
			{!! Form::text('user_confirmado') !!}
		</li>
		<li>
			{!! Form::label('user_reg_modo', 'User_reg_modo:') !!}
			{!! Form::text('user_reg_modo') !!}
		</li>
		<li>
			{!! Form::label('user_rem_token', 'User_rem_token:') !!}
			{!! Form::text('user_rem_token') !!}
		</li>
		<li>
			{!! Form::label('user_foto', 'User_foto:') !!}
			{!! Form::text('user_foto') !!}
		</li>
		<li>
			{!! Form::label('user_ip', 'User_ip:') !!}
			{!! Form::text('user_ip') !!}
		</li>
		<li>
			{!! Form::label('user_country_id', 'User_country_id:') !!}
			{!! Form::text('user_country_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}