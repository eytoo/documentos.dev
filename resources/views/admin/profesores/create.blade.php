@extends('admin.partials.formTemplate')

<?php
$modalLg = true;
$sendType = "normal";
?>

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

@section('adicional-form')
enctype="multipart/form-data"
@stop

@section('form')
	@if(isset($object))
	<input type="hidden" name="id" value="{{ $object->prof_id }}">
	@endif
	<div class="row">
        <div class="col-md-6">
            <legend>Información personal</legend>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input value="{{ isset($object)?$object->prof_nombre:'' }}" type="text" class="form-control hasFocus" required name="nombre" id="nombre" placeholder="Nombre">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="apellidos">Apellido</label>
                        <input value="{{ isset($object)?$object->prof_apellidos:'' }}" type="text" class="form-control" required name="apellidos" id="apellidos" placeholder="Apellidos">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="ocupacion">Ocupación</label>
                        <input value="{{ isset($object)?$object->prof_ocupacion:'' }}" type="text" class="form-control" required name="ocupacion" id="ocupacion" placeholder="Ocupacion">
                    </div>
                </div>
            </div>
            <legend>Información de contacto</legend>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input value="{{ isset($object)?$object->prof_correo:'' }}" type="email" class="form-control" required name="email" id="email" placeholder="E-mail">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input value="{{ isset($object)?$object->prof_telefono:'' }}" type="number" class="form-control" name="telefono" id="telefono" placeholder="Teléfono">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="web">Sitio Web</label>
                <input value="{{ isset($object)?$object->prof_web:'' }}" type="url" class="form-control" name="web" id="web" placeholder="URL">
            </div>

            <legend>Detalles adicionales</legend>
            <div class="form-group">
                <label>Historia <small>(Experiencia del profesor)</small></label>
                <textarea class="summernote" rows="20" name="historia" placeholder="La experiencia del maestro" required>
                    @if(isset($object))
                        {{$object->prof_historia}}
                    @else
                    @endif
                </textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="foto">Foto</label>
                <input name="foto" type="file" id="foto" class="dropify" data-default-file="{{ isset($object) ? url('imagenes/'.$object->prof_foto) : "Foto del profesor" }}" />
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
            <a href="javascript:recuperar({{ $object->prof_id }});" class="btn btn-success"><i class="icon-reply"></i> Restaurar {{$entity_s}}</a>
        @endif
    @endif
@stop

@section('add-form')
    @if(isset($object) && $object->trashed())
        <form id="form-restore-{{ $object->prof_id }}" action="{{ route( str_slug($entity_p).".destroy",[$object->prof_id,"type=restore"]) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field("DELETE") }}
        </form>
    @endif
@stop
