{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('post_nombre', 'Post_nombre:') !!}
			{!! Form::text('post_nombre') !!}
		</li>
		<li>
			{!! Form::label('post_url', 'Post_url:') !!}
			{!! Form::text('post_url') !!}
		</li>
		<li>
			{!! Form::label('post_imagen', 'Post_imagen:') !!}
			{!! Form::text('post_imagen') !!}
		</li>
		<li>
			{!! Form::label('post_resumen', 'Post_resumen:') !!}
			{!! Form::textarea('post_resumen') !!}
		</li>
		<li>
			{!! Form::label('post_cuerpo', 'Post_cuerpo:') !!}
			{!! Form::textarea('post_cuerpo') !!}
		</li>
		<li>
			{!! Form::label('prof_id', 'Prof_id:') !!}
			{!! Form::text('prof_id') !!}
		</li>
		<li>
			{!! Form::label('post_cat_id', 'Post_cat_id:') !!}
			{!! Form::text('post_cat_id') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}