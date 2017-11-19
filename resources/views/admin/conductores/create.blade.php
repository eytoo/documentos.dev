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
        <div class="col-md-7">
            <legend>Información personal</legend>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input value="{{ isset($object)?$object->driver->nombres:'' }}" type="text" class="form-control hasFocus" required name="nombre" id="nombre" placeholder="Nombre">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nombre">Apellidos</label>
                        <input value="{{ isset($object)?$object->driver->apellidos:'' }}" type="text" class="form-control hasFocus" required name="apellidos" id="apellidos" placeholder="Apellidos">
                    </div>
                </div>                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input value="{{ isset($object)?$object->email:'' }}" type="text" class="form-control" required name="email" id="email" placeholder="E-mail">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nombre">Teléfono</label>
                        <input value="{{ isset($object)?$object->telefono:'' }}" type="text" class="form-control hasFocus" required name="telefono" id="telefono" placeholder="Teléfono">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="text" class="form-control" {{ isset($object)?'':'required' }} name="password" id="password" placeholder="Contraseña">
                    </div>
                </div>                
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="fechanac">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" value="{{isset($object) ? date('Y-m-d',strtotime($object->driver->fechanac)): ''}}" name="fechanac" id="fechanac">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input type="text" class="form-control" value="{{ isset($object)?$object->driver->dni:'' }}" name="dni" id="dni">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="genero">Género</label>
                        <select name="genero" required id="ent_3" class="form-control select2">
                            <option value=""> -- Selecciona -- </option>
                            <option {{ isset($object) && $object->driver->genero == 'Masculino' ? 'selected' : '' }} value='Masculino'>Masculino</option>
                            <option {{ isset($object) && $object->driver->genero == 'Femenino' ? 'selected' : '' }} value="Femenino">Femenino</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control" name="direccion" value="{{ isset($object)?$object->driver->direccion:'' }}" id="direccion">
                    </div>
                </div>
            </div>
            <legend>Documentos</legend>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="modo">Licencia</label>
                        <input type="text" class="form-control" value="{{ isset($object)?$object->driver->licencia:'' }}" name="licencia" id="licencia">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Fecha de caducidad</label>
                        <input type="text" class="form-control" value="{{ isset($object)?$object->driver->fechacadlic:'' }}" id="fechacadlic" name="fechacadlic">
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
                                <option {{ isset($object) && $object->user_reg_modo == 'Correo' ? 'selected' : '' }} value="Correo">E-mail</option>
                                <option {{ isset($object) && $object->user_reg_modo == 'Facebook' ? 'selected' : '' }} value="Facebook">Facebook</option>
                                <option {{ isset($object) && $object->user_reg_modo == 'Google' ? 'selected' : '' }} value="Google">Google</option>
                                <option {{ isset($object) && $object->user_reg_modo == 'Telefono' ? 'selected' : '' }} value="Telefono">Telefono</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label" for="ent_3">Estado</label>
                        <select name="estado" required id="ent_3" class="form-control select2">
                            <option value=""> -- Selecciona -- </option>
                            <option {{ isset($object) && $object->activo == 1 ? 'selected' : '' }} value="1">Activo</option>
                            <option {{ isset($object) && $object->activo == 0 ? 'selected' : '' }} value="0">Inactivo</option>
                        </select>
                    </div>
                </div>
            </div>            
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label for="foto">Foto</label>
                <input name="foto" type="file" id="foto" class="dropify" data-default-file="{{ isset($object) ? url('imagenes/'.$object->user_foto) : "Foto del usuario" }}" />
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
