{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('pos_cat_nombre', 'Pos_cat_nombre:') !!}
			{!! Form::text('pos_cat_nombre') !!}
		</li>
		<li>
			{!! Form::label('post_cat_parent_id', 'Post_cat_parent_id:') !!}
			{!! Form::text('post_cat_parent_id') !!}
		</li>
		<li>
			{!! Form::label('post_cat_url', 'Post_cat_url:') !!}
			{!! Form::text('post_cat_url') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}