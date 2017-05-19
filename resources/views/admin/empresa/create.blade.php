@extends('admin.partials.formTemplate')

@section('formTitle')
	@if(isset($empresa))
	Modificar configuración
	@else
	Nuevo precio
	@endif
@stop

@section('formAction')
{{ route("empresa.store") }}
@stop

@section('form')
	@if(isset($empresa))
	<input type="hidden" name="id" value="{{ $empresa->id }}">
	@endif
	<div class="row">
		@if(Request::has("campo") && Request::input("campo") == "precio_compra")
			<div class="col-md-4">
				<div class="form-group">
					<label for="name">Precio de compra <small>(* Kg.)</small></label>
					<div class="input-group">
	                    <span class="input-group-addon">L.</span>
	                    <input value="{{ $empresa->precio_compra }}" type="text" class="form-control" name="precio_compra" required>
	                </div>
				</div>
			</div>
		@elseif(Request::has("campo") && Request::input("campo") == "precio_venta")
			<div class="col-md-4">
				<div class="form-group">
					<label for="name">Precio de venta <small>(* Kg.)</small></label>
					<div class="input-group">
	                    <span class="input-group-addon">L.</span>
	                    <input value="{{ $empresa->precio_venta }}" type="text" class="form-control" name="precio_venta" required>
	                </div>
				</div>
			</div>
		@elseif(Request::has("campo") && Request::input("campo") == "cantidad")
			<div class="col-md-4">
				<div class="form-group">
					<label for="name">Cantidad de fruta en el centro <small>(* Kg.)</small></label>
					<div class="input-group">
	                    <input value="{{ App\Producto::find(1)->cantidad }}" type="text" class="form-control" name="cantidad" required>
	                    <span class="input-group-addon">Kg</span>
	                </div>
				</div>
			</div>
		@else
			<div class="col-md-4">
				<div class="form-group">
					<label for="name">Bonificación para productor <small>(* Tonelada.)</small></label>
					<div class="input-group">
	                    <span class="input-group-addon">L.</span>
	                    <input value="{{ $empresa->bono_productor }}" type="text" placeholder="0.00" class="form-control" name="bono_productor" required>
	                </div>
				</div>
			</div>
		@endif
	</div>
@stop