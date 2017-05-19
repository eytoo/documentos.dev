@extends('admin.partials.formTemplate')

@section('formTitle')
@if(isset($role))
Editar rol
@else
Crear nuevo rol
@endif
@stop

@section('form')

@if(isset($role))
<input type="hidden" name="id" value="{{ $role->id }}">
@endif

<div class="form-group">
	<label for="nombre">Nombre <small>(without spaces)</small></label>
	<input value="{{isset($role)?$role->display_name:''}}" type="text" name="nombre" class="clean-input form-control hasFocus" required id="nombre" placeholder="Supervisor">
</div>
<div class="form-group">
	<label for="detalle">Detalles</label>
	<textarea name="detalles" required class="clean-input form-control" rows="6" id="detalle" placeholder="...">{{isset($role)?$role->description:''}}</textarea>
</div>
@stop