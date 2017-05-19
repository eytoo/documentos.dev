@extends('admin.partials.formTemplate')

@section('formTitle')
	@if(isset($productor))
	Editar datos del productor
	@else
	Nuevo productor
	@endif
@stop

@section('formAction')
{{ route("productores.store") }}
@stop

@section('form')
	@if(isset($productor))
	<input type="hidden" name="id" value="{{ $productor->id }}">
	@endif
	<div class="form-group">
		<label for="name">Nombre</label>
		<input value="{{ isset($productor)?$productor->nombre:'' }}" type="text" class="form-control hasFocus" required name="nombre" id="name" placeholder="Nombre">
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="fnac">Fecha de nacimiento</label>
				<input value="{{ isset($productor)?$productor->fecha_nacimiento:'' }}" type="date" class="form-control" required name="fecha_nac" id="fnac">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="telefono">Teléfono</label>
				<input value="{{ isset($productor)?$productor->telefono:'' }}" type="text" class="form-control" required name="telefono" id="telefono" placeholder="Ingresa télefono o celular">
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="direccion">Dirección</label>
		<input value="{{ isset($productor)?$productor->direccion:'' }}" type="text" class="form-control" required name="direccion" id="direccion" placeholder="Ingresa la dirección">
	</div>

	<!--<div class="form-group">
		<label for="username">Details</label>
		<textarea  type="text" class="form-control" name="detail" id="username" placeholder="Details">{{ isset($productor)?$productor->detail:'' }}</textarea>
	</div>-->
@stop