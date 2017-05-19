@extends('admin.partials.formTemplate')

@php
	$normalSend = true;
@endphp

@section('formTitle')
Configurar imágenes / logos
@stop

@section('formAction')
{{ route("empresa.store") }}
@stop

@section('adicional-form')
enctype="multipart/form-data"
@endsection

@section('form')
@if(isset($empresa))
<input type="hidden" name="id" value="{{ $empresa->id }}">
@endif
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			<label for="logo_login">Logo del login</label>
			<input type="file" name="logo_login" id="inputLogo_login" class="form-control">
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			<label for="logo_sistema">Logo del sistema</label>
			<input type="file" name="logo_sistema" id="inputLogo_login" class="form-control">
		</div>
	</div>
</div>
@stop