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
	<input type="hidden" name="id" value="{{ $object->id }}">
	@endif
	<div class="row">
        <div class="col-md-6">
            <legend>Información personal</legend>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input value="{{ isset($object)?$object->name:'' }}" type="text" class="form-control hasFocus" required name="nombre" id="nombre" placeholder="Nombre">
                    </div>
                </div>
                {{--<div class="col-md-6">
                    <div class="form-group">
                        <label for="apellidos">Apellido</label>
                        <input value="{{ isset($object)?$object->user_apellidos:'' }}" type="text" class="form-control" required name="apellidos" id="apellidos" placeholder="Apellidos">
                    </div>
                </div>--}}
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input value="{{ isset($object)?$object->email:'' }}" type="text" class="form-control" required name="email" id="email" placeholder="E-mail">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="text" class="form-control" {{ isset($object)?'':'required' }} name="password" id="password" placeholder="Contraseña">
                    </div>
                </div>
            </div>
            <legend>Información adicional</legend>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="modo">Modo de registro</label>
                        <select name="modo" required id="ent_2" class="form-control select2">
                            <option value=""> -- Selecciona -- </option>
                                <option {{ isset($object) && $object->user_reg_modo == 'Correo' ? 'selected' : '' }} value="email">E-mail</option>
                                <option {{ isset($object) && $object->user_reg_modo == 'Facebook' ? 'selected' : '' }} value="facebook">Facebook</option>
                                <option {{ isset($object) && $object->user_reg_modo == 'Google' ? 'selected' : '' }} value="google">Google</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label" for="ent_3">Estado</label>
                        <select name="estado" required id="ent_3" class="form-control select2">
                            <option value=""> -- Selecciona -- </option>
                            <option {{ isset($object) && $object->user_confirmado == 1 ? 'selected' : '' }} value="1">Confirmado</option>
                            <option {{ isset($object) && $object->user_confirmado == 0 ? 'selected' : '' }} value="0">Sin confirmar</option>
                        </select>
                    </div>
                </div>
            </div>
            {{--<div class="form-group">
                <label for="pais">País</label>
                <select name="pais" required id="ent_3" class="form-control select2">
                    <option value=""> -- Selecciona -- </option>
                    @forelse ($countries as $c)
                        <option {{ isset($object) && $object->user_country_id == $c->id ? 'selected' : '' }} value="{{ $c->id }}">{{ $c->name }}</option>
                    @empty
                        
                    @endforelse

                </select>
            </div>--}}
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="foto">Foto</label>
                <input name="foto" type="file" id="foto" class="dropify" data-default-file="{{ getImgUsuario($object) }}" />
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
