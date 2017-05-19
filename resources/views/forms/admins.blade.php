{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('admin_nombre', 'Admin_nombre:') !!}
			{!! Form::text('admin_nombre') !!}
		</li>
		<li>
			{!! Form::label('admin_apellidos', 'Admin_apellidos:') !!}
			{!! Form::text('admin_apellidos') !!}
		</li>
		<li>
			{!! Form::label('admin_email', 'Admin_email:') !!}
			{!! Form::text('admin_email') !!}
		</li>
		<li>
			{!! Form::label('admin_password', 'Admin_password:') !!}
			{!! Form::text('admin_password') !!}
		</li>
		<li>
			{!! Form::label('admin_estado', 'Admin_estado:') !!}
			{!! Form::text('admin_estado') !!}
		</li>
		<li>
			{!! Form::label('admin_rem_token', 'Admin_rem_token:') !!}
			{!! Form::text('admin_rem_token') !!}
		</li>
		<li>
			{!! Form::label('admin_foto', 'Admin_foto:') !!}
			{!! Form::text('admin_foto') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}