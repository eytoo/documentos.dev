@extends('admin.partials.formTemplate')

<?php
$modalLg = true;
$sendType = "normal";
?>

@section('formTitle')
    Vehiculo
@stop

@section('formAction')
#
@stop

@section('form')
	@if(isset($object))
	<input type="hidden" name="id" value="{{ $object->id }}">
	@endif
	<div class="row">
        <div class="col-md-7">
            <legend>Información del vehiculo</legend>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nombre">Marca</label>
                        <p>{{ $vehiculo->marca->name }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nombre">Modelo</label>
                        <p>{{ $vehiculo->modelo->name }}</p>
                    </div>
                </div>                
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="email">Capacidad</label>
                        <p>Para {{ $vehiculo->capacidad }} personas</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nombre">Año de fábrica</label>
                        <p>{{ $vehiculo->anio }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nombre">Tipo</label>
                        <p style="text-transform: capitalize;">{{ $vehiculo->tipo }}</p>
                    </div>
                </div>
            </div>
            <legend>Documentos</legend>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="modo">SOAT</label>
                        <p>{{ $vehiculo->soat }}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Fecha de caducidad de SOAT</label>
                        <p>{{ isset($vehiculo)? date("d/m/Y",strtotime($vehiculo->fechacadsoat)) :'- No especificado -' }}</p>
                    </div>
                </div>
            </div>        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label for="foto">Foto</label>
                <img class="img-responsive img-thumbnail" src="{{ isset($vehiculo) ? url('imagenes/'.$vehiculo->imagen) : "https://i2.wp.com/www.juniorcardesigner.com/wp-content/uploads/2013/07/4-door-car-side-view-drawing-5.jpg" }}" alt="vehiculo">
            </div>
        </div>
    </div>
	<!--<div class="form-group">
		<label for="username">Details</label>
		<textarea  type="text" class="form-control" name="detail" id="username" placeholder="Details">{{ isset($object)?$object->detail:'' }}</textarea>
	</div>-->
@stop

@section("js")
	<script src="/public/admin/plugins/dropify/dist/js/dropify.min.js"></script>
    <script src="/public/admin/robust-assets/js/plugins/editors/summernote/summernote.js" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('.dropify').dropify();
            $(".summernote").summernote();
            @if(isset($object) && $object->trashed())
            $('.main-form input,button[type=submit]').attr("disabled",true);
            @endif
        });
    </script>
    <script src="/public/admin/robust-assets/js/plugins/forms/tags/bootstrap-tagsinput.min.js" type="text/javascript"></script>
    <script src="/public/admin/robust-assets/js/plugins/forms/tags/tagging.min.js" type="text/javascript"></script>
    <script src="/public/admin/robust-assets/js/plugins/forms/tags/tagging.js" type="text/javascript"></script>
    <!--Input Mask-->
    <script src="/public/admin/robust-assets/js/plugins/forms/extended/inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
    <script src="/public/admin/robust-assets/js/components/forms/extended/form-inputmask.js" type="text/javascript"></script>
@stop

@section('modal-left-buttons')
    @if(isset($object))
        @if($object->trashed())
            <a href="javascript:recuperar({{ $object->id }});" class="btn btn-success"><i class="icon-reply"></i> Restaurar {{$entity_s}}</a>
        @endif
    @endif
@stop

@section('add-form')
    @if(isset($object) && $object->trashed())
        <form id="form-restore-{{ $object->id }}" action="{{ route( str_slug($entity_p).".destroy",[$object->id,"type=restore"]) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field("DELETE") }}
        </form>
    @endif
@stop
