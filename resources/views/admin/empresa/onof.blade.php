@extends('admin.partials.formTemplate')

@section('formTitle')
Configurar disponibilidad
@stop

@section('formAction')
{{ route("empresa.store") }}
@stop

@section('form')
@if(isset($empresa))
<input type="hidden" name="id" value="{{ $empresa->id }}">
@endif
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<fieldset>
				<div class="float-xs-left">
					<input type="checkbox" class="switchBootstrap" id="switchBootstrap18" data-on-color="success" name="encendido" data-off-color="danger" {{ $empresa->encendido == 1 ? 'checked' : '' }} />
				</div>
			</fieldset>
		</div>
	</div>
</div>
@stop
@section('js')
<script src="/robust-assets/js/plugins/forms/toggle/bootstrap-switch.min.js" type="text/javascript"></script>
<script src="/robust-assets/js/plugins/forms/toggle/bootstrap-checkbox.min.js" type="text/javascript"></script>
<script src="/robust-assets/js/plugins/forms/toggle/switchery.min.js" type="text/javascript"></script>
<script src="/robust-assets/js/components/forms/switch.js" type="text/javascript"></script>
@stop