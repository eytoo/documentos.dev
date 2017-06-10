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
<input type="hidden" name="id" value="{{ $object->post_id }}">
@endif
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="foto">Portada</label>
            <input name="foto" type="file" id="imagen" class="dropify" data-default-file="{{ isset($object) ? url('imagenes/'.$object->post_imagen) : "Imágen de portada" }}" />
        </div>
    </div>
    <div class="col-md-9">
        <legend>Información inicial</legend>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input value="{{ isset($object)?$object->post_nombre:'' }}" type="text" class="form-control hasFocus" required name="nombre" id="nombre" placeholder="Nombre">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="apellidos">Resumen</label>
                    <textarea class="form-control" required name="resumen" id="resumen" placeholder="Resumen" cols="30" rows="3">{{ isset($object)?$object->post_resumen:'' }}</textarea>
                </div>
            </div>
        </div>

        <legend>Escribir entrada</legend>
        <div class="form-group">
            <label>Entrada <small>(Detallado)</small></label>
                {{--<textarea class="summernote" rows="50" name="historia" placeholder="La experiencia del maestro" style="height: 300px;" required>
                    @if(isset($object))
                        {{$object->prof_historia}}
                    @else
                    @endif
                    <pre><code class="language-css">p { color: red }</code></pre>
                </textarea>--}}

                <div id="full-wrapper">
                    <div id="full-container">
                        <div class="editor">
                            {!! isset($object) ? $object->post_cuerpo : '' !!}
                        </div>
                    </div>
                </div>
                <input type="hidden" name="contenido" class="contenido-entrada" value="{{ isset($object) ? $object->post_cuerpo : '' }}">
                <input type="file" id="uploader" style="display: none;">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label" for="ent_1">Categoria</label>
                <select name="categoria" required id="ent_1" class="form-control select2">
                    <option value=""> -- Selecciona -- </option>
                    @forelse($categorias as $o)
                    <option {{ isset($object) && $object->post_cat_id == $o->pos_cat_id ? 'selected' : '' }} value="{{$o->pos_cat_id}}">{{ $o->pos_cat_nombre }}</option>
                    @empty
                    @endforelse
                </select>
            </div>
            <div class="form-group">
                <label class="control-label" for="ent_2">Escritor</label>
                <select name="profesor" required id="ent_2" class="form-control select2">
                    <option value=""> -- Selecciona -- </option>
                    @forelse($profesores as $p)
                    <option {{ isset($object) && $object->prof_id == $p->prof_id ? 'selected' : '' }} value="{{$p->prof_id}}">{{ $p->prof_nombre }}</option>
                    @empty
                    @endforelse
                </select>
            </div>
            <div class="form-group">
                <label for="etiquetas">Etiquetas</label>
                <input data-role="tagsinput" value="{{ isset($object)?$object->post_etiquetas:'' }}" type="text" class="form-control tagging no-duplicate" required name="etiquetas" id="etiquetas" placeholder="Etiquetas">
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
    <script src="/public/admin/robust-assets/js/plugins/editors/quill/katex.min.js" type="text/javascript"></script>
    <script src="/public/admin/robust-assets/js/plugins/editors/quill/highlight.min.js" type="text/javascript"></script>
    <script src="/public/admin/robust-assets/js/plugins/editors/quill/quill.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('.dropify').dropify();
            $(".summernote").summernote();
            @if(isset($object) && $object->trashed())
            $('.main-form input,button[type=submit]').attr("disabled",true);
            @endif
        });
    </script>
    <script src="/public/admin/robust-assets/js/components/editors/editor-quill.js" type="text/javascript"></script>
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
