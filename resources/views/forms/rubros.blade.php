{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('rubro_nombre', 'Rubro_nombre:') !!}
			{!! Form::text('rubro_nombre') !!}
		</li>
		<li>
			{!! Form::label('rubro_otros', 'Rubro_otros:') !!}
			{!! Form::textarea('rubro_otros') !!}
		</li>
		<li>
			{!! Form::label('rubro_url', 'Rubro_url:') !!}
			{!! Form::text('rubro_url') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}