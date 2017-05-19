{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('cat_nombre', 'Cat_nombre:') !!}
			{!! Form::text('cat_nombre') !!}
		</li>
		<li>
			{!! Form::label('cat_parent_id', 'Cat_parent_id:') !!}
			{!! Form::text('cat_parent_id') !!}
		</li>
		<li>
			{!! Form::label('cat_otros', 'Cat_otros:') !!}
			{!! Form::textarea('cat_otros') !!}
		</li>
		<li>
			{!! Form::label('rubro_id', 'Rubro_id:') !!}
			{!! Form::text('rubro_id') !!}
		</li>
		<li>
			{!! Form::label('cat_url', 'Cat_url:') !!}
			{!! Form::text('cat_url') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}