{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('plan_nombre', 'Plan_nombre:') !!}
			{!! Form::text('plan_nombre') !!}
		</li>
		<li>
			{!! Form::label('plan_duracion', 'Plan_duracion:') !!}
			{!! Form::text('plan_duracion') !!}
		</li>
		<li>
			{!! Form::label('plan_codigo', 'Plan_codigo:') !!}
			{!! Form::text('plan_codigo') !!}
		</li>
		<li>
			{!! Form::label('plan_precio', 'Plan_precio:') !!}
			{!! Form::text('plan_precio') !!}
		</li>
		<li>
			{!! Form::label('plan_descripcion', 'Plan_descripcion:') !!}
			{!! Form::textarea('plan_descripcion') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}