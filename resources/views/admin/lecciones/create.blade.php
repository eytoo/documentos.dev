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

@section('adicional-form')
enctype="multipart/form-data"
@stop

@section('form')
	@if(isset($object))
	<input type="hidden" name="id" value="{{ $object->lec_id }}">
	@endif
	<div class="row">
        <div class="col-md-12">
            <legend>Información básica</legend>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input value="{{ isset($object)?$object->lec_nombre:'' }}" type="text" class="form-control hasFocus" required name="nombre" id="nombre" placeholder="Nombre">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Descripción </label>
                <textarea class="summernote" rows="20" name="descripcion" placeholder="La experiencia del maestro">
                    @if(isset($object))
                        {{$object->lec_descripcion}}
                    @else
                    @endif
                </textarea>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="ent_3">Estado</label>
                        <select name="estado" required id="ent_3" class="form-control select2">
                            <option value=""> -- Selecciona -- </option>
                            <option {{ isset($object) && $object->lec_estado == 1 ? 'selected' : '' }} value="1">Activo</option>
                            <option {{ isset($object) && $object->lec_estado == 0 ? 'selected' : '' }} value="0">Inactivo</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="ent_3">Tipo</label>
                        <select name="tipo" required id="ent_3" class="form-control select2">
                            <option value=""> -- Selecciona -- </option>
                            <option {{ isset($object) && $object->lec_tipo == 'G' ? 'selected' : '' }} value="G">Gratis</option>
                            <option {{ isset($object) && $object->lec_tipo == 'P' ? 'selected' : '' }} value="P">Premium</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>ID del video (Vimeo) <small>(Ejm: https://vimeo.com/<strong>172825105</strong>)</small></label>
                        <div class="input-group">
                            <span class="input-group-addon">https://vimeo.com/</span>
                            <input value="{{ isset($object)?$object->lec_ruta_video:'' }}" type="text" class="form-control vimeo-id" required name="ruta_video" id="ruta_video" placeholder="XXXXXXXXX">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section("js")
	<script src="/plugins/dropify/dist/js/dropify.min.js"></script>
    <script src="/robust-assets/js/plugins/editors/summernote/summernote.js" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('.dropify').dropify();
            $(".summernote").summernote();
            @if(isset($object) && $object->trashed())
            $('.main-form input,button[type=submit]').attr("disabled",true);
            @endif
        });
    </script>
    <script src="/robust-assets/js/plugins/forms/tags/bootstrap-tagsinput.min.js" type="text/javascript"></script>
    <script src="/robust-assets/js/plugins/forms/tags/tagging.min.js" type="text/javascript"></script>
    <script src="/robust-assets/js/plugins/forms/tags/tagging.js" type="text/javascript"></script>
    <!--Input Mask-->
    <script src="/robust-assets/js/plugins/forms/extended/inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
    <script src="/robust-assets/js/components/forms/extended/form-inputmask.js" type="text/javascript"></script>
@stop

@section('modal-left-buttons')
    @if(isset($object))
        @if($object->trashed())
            <a href="javascript:recuperar({{ $object->lec_id }});" class="btn btn-success"><i class="icon-reply"></i> Restaurar {{$entity_s}}</a>
        @endif
    @endif
@stop

@section('add-form')
    @if(isset($object) && $object->trashed())
        <form id="form-restore-{{ $object->lec_id }}" action="{{ route( str_slug($entity_p).".destroy",[$object->lec_id,"type=restore"]) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field("DELETE") }}
        </form>
    @endif
@stop