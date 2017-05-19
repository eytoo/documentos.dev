{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('user_id', 'User_id:') !!}
			{!! Form::text('user_id') !!}
		</li>
		<li>
			{!! Form::label('ticket_nombre', 'Ticket_nombre:') !!}
			{!! Form::text('ticket_nombre') !!}
		</li>
		<li>
			{!! Form::label('ticket_email', 'Ticket_email:') !!}
			{!! Form::text('ticket_email') !!}
		</li>
		<li>
			{!! Form::label('ticket_asunto', 'Ticket_asunto:') !!}
			{!! Form::text('ticket_asunto') !!}
		</li>
		<li>
			{!! Form::label('ticket_mensaje', 'Ticket_mensaje:') !!}
			{!! Form::textarea('ticket_mensaje') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}