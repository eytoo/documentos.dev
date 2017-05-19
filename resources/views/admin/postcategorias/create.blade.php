@extends('admin.partials.formTemplate')

@section('formTitle')
	@if(isset($object))
	Editar {{ $entity_s }}
	@else
	Agregar {{ $entity_s }}
	@endif
@stop

@section('formAction')
{{ route( str_slug($route) .".store") }}
@stop

@section('form')
	@if(isset($object))
	<input type="hidden" name="id" value="{{ $object->pos_cat_id }}">
	@endif
	<div class="form-group">
		<label for="name">Nombre</label>
		<input value="{{ isset($object)?$object->pos_cat_nombre:'' }}" type="text" class="form-control hasFocus" required name="nombre" id="name" placeholder="Nombre">
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label class="control-label" for="ent_1">Superior</label>
				<select name="parent" id="ent_1" class="form-control select2">
					<option value=""> -- Selecciona -- </option>
					@forelse($categorias as $cat)
						<option {{ isset($object) && $object->post_cat_parent_id == $cat->pos_cat_id ? 'selected' : '' }} value="{{$cat->pos_cat_id}}">{{ $cat->pos_cat_nombre }}</option>
					@empty
					@endforelse
				</select>
			</div>
		</div>
	</div>
@stop