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
	@if(isset($object))
	<input type="hidden" name="id" value="{{ $object->rubro_id }}">
	@endif
	<div class="form-group">
		<label for="name">Nombre</label>
		<input value="{{ isset($object)?$object->rubro_nombre:'' }}" type="text" class="form-control hasFocus" required name="nombre" id="name" placeholder="Nombre">
	</div>
@stop