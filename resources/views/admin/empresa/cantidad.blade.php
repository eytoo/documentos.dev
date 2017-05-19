@extends('admin.empresa.temp')

@section('title')
Configuración de almacen
@stop

@section('cont')
  <div class="row">  
    <div class="col-md-6">
      <div class="form-group">
        <label for="">Cantidad en almacen</label>
        <div class="input-group">
          <input type="text" disabled class="form-control" placeholder="0" value="{{ App\Producto::find(1)->cantidad }}">
          <span class="input-group-btn">
            <a data-modal="byUrl" href='{{ route("empresa.create") }}?campo=cantidad' class="btn btn-primary"><i class="icon-pencil"></i> Modificar</a>
          </span>
        </div>
      </div>
    </div>
  </div>
@stop