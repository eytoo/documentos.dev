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
	<input type="hidden" name="id" value="{{ $object->cat_id }}">
	@endif
	<div class="form-group">
		<label for="name">Nombre</label>
		<input value="{{ isset($object)?$object->cat_nombre:'' }}" type="text" class="form-control hasFocus" required name="nombre" id="name" placeholder="Nombre">
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label" for="ent_1">Rubro</label>
				<select name="rubro" required id="ent_1" class="form-control select2">
					<option value=""> -- Selecciona -- </option>
					@forelse($rubros as $o)
						<option {{ isset($object) && $object->rubro_id == $o->rubro_id ? 'selected' : '' }} value="{{$o->rubro_id}}">{{ $o->rubro_nombre }}</option>
					@empty
					@endforelse
				</select>
			</div>
		</div>
	</div>
@stop