{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('emp_tyc', 'Emp_tyc:') !!}
			{!! Form::textarea('emp_tyc') !!}
		</li>
		<li>
			{!! Form::label('emp_poli_priv', 'Emp_poli_priv:') !!}
			{!! Form::textarea('emp_poli_priv') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}