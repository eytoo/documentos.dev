@extends('admin.partials.formTemplate')

<?php
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
	<input type="hidden" name="id" value="{{ $object->tema_id }}">
	@endif
	<div class="row">
        <div class="col-md-12">
            <legend>Información del tema</legend>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input value="{{ isset($object)?$object->tema_nombre:'' }}" type="text" class="form-control hasFocus" required name="nombre" id="nombre" placeholder="Nombre">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Descripción </label>
                <textarea class="summernote" rows="20" name="descripcion" placeholder="La experiencia del maestro">
                    @if(isset($object))
                        {{$object->tema_descripcion}}
                    @else
                    @endif
                </textarea>
            </div>
        </div>
    </div>
	<!--<div class="form-group">
		<label for="username">Details</label>
		<textarea  type="text" class="form-control" name="detail" id="username" placeholder="Details">{{ isset($object)?$object->detail:'' }}</textarea>
	</div>-->
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
            <a href="javascript:recuperar({{ $object->tema_id }});" class="btn btn-success"><i class="icon-reply"></i> Restaurar {{$entity_s}}</a>
        @endif
    @endif
@stop

@section('add-form')
    @if(isset($object) && $object->trashed())
        <form id="form-restore-{{ $object->tema_id }}" action="{{ route( str_slug($entity_p).".destroy",[$object->tema_id,"type=restore"]) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field("DELETE") }}
        </form>
    @endif
@stop