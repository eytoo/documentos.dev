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
{{ route("cursos.store") }}
@stop

@section('adicional-form')
enctype="multipart/form-data"
@stop

@section('form')
	@if(isset($object))
	<input type="hidden" name="id" value="{{ $object->cur_id }}">
	@endif
	<div class="row">
        <div class="col-md-6">
            <legend>Información básica</legend>
            <div class="form-group">
                <label for="name">Nombre</label>
                <input value="{{ isset($object)?$object->cur_nombre:'' }}" type="text" class="form-control hasFocus" required name="nombre" id="tieneFoco" placeholder="Nombre">
            </div>
            <div class="form-group">
                <label for="slogan">Slogan</label>
                <input value="{{ isset($object)?$object->cur_slogan:'' }}" type="text" class="form-control" required name="slogan" id="slogan" placeholder="Slogan">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="ent_1">Categoria</label>
                        <select name="categoria" required id="ent_1" class="form-control select2">
                            <option value=""> -- Selecciona -- </option>
                            @forelse($categorias as $o)
                                <option {{ isset($object) && $object->cat_id == $o->cat_id ? 'selected' : '' }} value="{{$o->cat_id}}">{{ $o->cat_nombre }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="ent_2">Certificado</label>
                        <select name="certificado" required id="ent_2" class="form-control select2">
                            <option value=""> -- Selecciona -- </option>
                                <option {{ isset($object) && $object->cur_certificado == 1 ? 'selected' : '' }} value="1">Si</option>
                                <option {{ isset($object) && $object->cur_certificado == 0 ? 'selected' : '' }} value="0">No</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label" for="ent_2">Profesor</label>
                        <select name="profesor" required id="ent_2" class="form-control select2">
                            <option value=""> -- Selecciona -- </option>
                                @forelse($profesores as $p)
                                    <option {{ isset($object) && $object->prof_id == $p->prof_id ? 'selected' : '' }} value="{{$p->prof_id}}">{{ $p->prof_nombre }}</option>
                                @empty
                                @endforelse
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="ent_3">Estado</label>
                        <select name="estado" required id="ent_3" class="form-control select2">
                            <option value=""> -- Selecciona -- </option>
                            <option {{ isset($object) && $object->cur_estado == 1 ? 'selected' : '' }} value="1">Activo</option>
                            <option {{ isset($object) && $object->cur_estado == 0 ? 'selected' : '' }} value="0">Inactivo</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="ent_3">Gratis</label>
                        <select name="gratuito" required id="ent_3" class="form-control select2">
                            <option value=""> -- Sel. -- </option>
                            <option {{ isset($object) && $object->cur_gratuito == 1 ? 'selected' : '' }} value="1">Si</option>
                            <option {{ isset($object) && $object->cur_gratuito == 0 ? 'selected' : '' }} value="0">No</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="ent_4">Duración * </label>
                        <input value="{{ isset($object)?$object->cur_duracion:'' }}" name="duracion" required type="text" class="form-control date-inputmask" id="date-mask" placeholder="Ingresa el tiempo" />
                    </div>
                </div>
            </div>
            <legend>Información de pago</legend>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label class="control-label" for="ent_3">Tipo</label>
                        <select name="tipo" required id="ent_3" class="form-control select2">
                            <option value=""> -- Selecciona -- </option>
                            <option {{ isset($object) && $object->cur_tipo == 'SU' ? 'selected' : '' }} value="SU">Suscripción</option>
                            <option {{ isset($object) && $object->cur_tipo == 'PU' ? 'selected' : '' }} value="PU">Pago único</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label" for="ent_4">Precio *</label>
                        <input value="{{ isset($object)?$object->cur_precio:'' }}" name="precio" required type="text" class="form-control" id="date-mask" placeholder="0.00" />
                    </div>
                </div>
            </div>
            <legend>SEO y Detalles</legend>
            <div class="form-group">
                <label for="etiquetas">Etiquetas</label>
                <input data-role="tagsinput" value="{{ isset($object)?$object->cur_etiquetas:'' }}" type="text" class="form-control tagging no-duplicate" placeholder="Ingresa etiquetas" required name="etiquetas" id="etiquetas">
            </div>
            <div class="form-group">
                <label>Detalles del curso</label>
                <textarea class="summernote" name="descripcion" required>
                    @if(isset($object))
                        {{$object->cur_descripcion}}
                    @else
                        <h3 class="Subtitulos">Detalles del Curso</h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ulla
                        </p>
                        <h3 class="Subtitulos">Dirido a:</h3>
                        <ol>
                            <li> Diseñadores Web</li>
                            <li> Gente con conocimientos de Web</li>
                            <li> Programadores Web</li>
                            <li> Diseñadores Gráficos</li>
                        </ol>
                        <h3 class="Subtitulos">Requisitos</h3>
                        <ol>
                            <li> Tener conocimientos de Diseño Web</li>
                            <li> Nociones de programación Básica</li>
                        </ol>
                        <h3 class="Subtitulos">¿Qué aprenderás?</h3>
                        <ol class="col s12">
                            <li> Realizar Login y Registro</li>
                            <li> Registro de usuarios con PHP</li>
                            <li> Manejo de conexiòn por Ajax</li>
                            <li> Diseño del formulario con Bootstrap</li>
                        </ol>
                    @endif
                </textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="icono">Icono del Curso</label>
                <input name="icono" type="file" id="icono" class="dropify" data-default-file="{{ isset($object) ? url('imagenes/'.$object->cur_icono) : "Icono del curso" }}" />
            </div>
            <div class="form-group">
                <label for="portada">Portada del Curso</label>
                <input name="portada" type="file" id="portada" class="dropify" data-default-file="{{ isset($object) ? url('imagenes/'.$object->cur_portada) : "Portada del curso" }}" />
            </div>
            <div class="form-group">
                <label for="color">Color</label>
                <input value="{{ isset($object)?$object->cur_color:'' }}" type="text" class="form-control colorpicker colorpicker-element" id="color" required name="color" placeholder="Color hexadecimal: #000">
            </div>
        </div>
    </div>
    <div class="row">
      <div class="col-md-6">
          <legend>Información de pago</legend>
          <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                      <label class="control-label" for="ent_10">En preventa</label>
                      <select name="en_preventa" required id="ent_10" class="form-control select2">
                          <option value=""> -- Selecciona -- </option>
                          <option {{ isset($object) && $object->en_preventa == 1 ? 'selected' : '' }} value="1">Si</option>
                          <option {{ isset($object) && $object->en_preventa == 0 ? 'selected' : '' }} value="0">No</option>
                      </select>
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label class="control-label" for="ent_12">Videos</label>
                      <input value="{{ isset($object)?$object->pre_videos:'' }}" name="pre_videos" required type="number" class="form-control" />
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label class="control-label" for="ent_11">Fecha *</label>
                      <input value="{{ isset($object)?date('Y-m-d',strtotime($object->pre_fecha)):'' }}" name="pre_fecha" required type="date" class="form-control" />
                  </div>
              </div>
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
        });
    </script>
    <script src="/robust-assets/js/plugins/forms/tags/bootstrap-tagsinput.min.js" type="text/javascript"></script>
    <script src="/robust-assets/js/plugins/forms/tags/tagging.min.js" type="text/javascript"></script>
    <script src="/robust-assets/js/plugins/forms/tags/tagging.js" type="text/javascript"></script>
    <!--Input Mask-->
    <script src="/robust-assets/js/plugins/forms/extended/inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
    <script src="/robust-assets/js/components/forms/extended/form-inputmask.js" type="text/javascript"></script>
@stop
