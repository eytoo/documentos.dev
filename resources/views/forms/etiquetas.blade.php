{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('eti_nombre', 'Eti_nombre:') !!}
			{!! Form::text('eti_nombre') !!}
		</li>
		<li>
			{!! Form::label('cat_id', 'Cat_id:') !!}
			{!! Form::text('cat_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}