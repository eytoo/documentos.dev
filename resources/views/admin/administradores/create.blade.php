@extends('admin.partials.formTemplate')

@section('formTitle')
    @if(isset($object))
        Editar {{ $entity_s }}
    @else
        Agregar {{ $entity_s }}
    @endif
@stop

@section('formAction')
{{ route( str_slug($entity_p) .".store") }}
@stop

@section('form')
<legend> Información del usuario</legend>

@if(isset($object))
<input type="hidden" name="id" value="{{ $object->id }}">
@endif

<div class="form-group">
	<label for="name">Nombre</label>
	<input value="{{ isset($object)?$object->admin_nombre:'' }}" type="text" class="form-control hasFocus" required name="name" id="name" placeholder="Nombre">
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label for="username">Usuario</label>
			<input value="{{ isset($object)?$object->admin_apellidos:'' }}" type="text" class="form-control" required name="username" id="username" placeholder="Nombre de usuario">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label for="email">E-mail</label>
			<input value="{{ isset($object)?$object->email:'' }}" type="email" class="form-control" required name="email" id="email" placeholder="E-mail">
		</div>
	</div>
</div>
<div class="form-group">
	<label for="password">Contraseña</label>
	<input type="password" class="form-control" @if(!isset($object)) required @endif name="password" id="password" placeholder="*****">
</div>

<legend>Información del sistema</legend>
<div class="form-group">
	<label for="inputRol">Rol del usuario</label>
	<select name="rol_id" id="inputRol" class="form-control" required="required">
		<option value="">- Seleccionar -</option>
		@forelse (App\Role::all() as $rol)
		<option {{ isset($object) && ($object->roles()->first()->id == $rol->id) ? 'selected':'' }} value="{{ $rol->id }}">{{ $rol->display_name }}</option>
		@empty
		@endforelse
	</select>
</div>
@stop