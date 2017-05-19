@extends('admin.partials.formTemplate')

@section('formTitle')
@if(isset($planta))
Editar datos del cliente
@else
Nuevo cliente
@endif
@stop

@section('formAction')
{{ route("plantas.store") }}
@stop

@section('form')
@if(isset($planta))
<input type="hidden" name="id" value="{{ $planta->id }}">
@endif
<div class="form-group">
	<label for="name">Razón social</label>
	<input value="{{ isset($planta)?$planta->nombre:'' }}" type="text" class="form-control hasFocus" required name="nombre" id="name" placeholder="Razón social">
</div>
<div class="form-group">
	<label for="direccion">Dirección</label>
	<input value="{{ isset($planta)?$planta->direccion:'' }}" type="text" class="form-control" required name="direccion" id="direccion" placeholder="Ingresa la dirección">
</div>
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label for="direccion">Monto de bonificación / Tonelada <br><small>(*Opcional - solo si el cliente lo brinda)</small></label>
			<fieldset>
				<div class="input-group">
					<span class="input-group-addon">L.</span>
					<input type="text" name="bono" class="form-control" placeholder="0.00" aria-describedby="radio-addon4" value="{{ isset($planta) ? $planta->bono : '' }}">
					<span class="input-group-addon" id="radio-addon4">
						<input type="checkbox" name="hasbono" id="switchery2" class="switchery" data-size="xs" {{ isset($planta) && $planta->otros == 1 ? 'checked':'' }}/>
					</span>
				</div>
			</fieldset>
		</div>
	</div>
</div>
@stop

@section('js')
<script src="/robust-assets/js/plugins/forms/icheck/icheck.min.js" type="text/javascript"></script>
<script src="/robust-assets/js/plugins/forms/toggle/bootstrap-checkbox.min.js" type="text/javascript"></script>
<script src="/robust-assets/js/plugins/forms/toggle/bootstrap-switch.min.js" type="text/javascript"></script>
<script src="/robust-assets/js/plugins/forms/toggle/switchery.min.js" type="text/javascript"></script>
<script src="/robust-assets/js/plugins/forms/spinner/jquery.bootstrap-touchspin.js" type="text/javascript"></script>

<script src="/robust-assets/js/components/forms/checkbox-radio.js" type="text/javascript"></script>
<script src="/robust-assets/js/components/forms/switch.js" type="text/javascript"></script>
<script src="/robust-assets/js/components/forms/input-groups.js" type="text/javascript"></script>
@stop