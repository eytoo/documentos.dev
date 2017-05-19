@extends('admin.empresa.temp')

@section('title')
Configuración de precios
@stop

@section('cont')
  <div class="row">  
    <div class="col-md-6">
      <div class="form-group">
        <label for="">Precio de compra</label>
        <div class="input-group">
          <input type="text" disabled class="form-control" placeholder="L. 0.00" value="{{ getMoneda($c->precio_compra,3) }}">
          <span class="input-group-btn">
            <a data-modal="byUrl" href='{{ route("empresa.create") }}?campo=precio_compra' class="btn btn-primary"><i class="icon-pencil"></i> Modificar</a>
          </span>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="">Precio de venta</label>
        <div class="input-group">
          <input type="text" disabled class="form-control" placeholder="L. 0.00" value="{{ getMoneda($c->precio_venta,3) }}">
          <span class="input-group-btn">
            <a data-modal="byUrl" href='{{ route("empresa.create") }}?campo=precio_venta' class="btn btn-primary"><i class="icon-pencil"></i> Modificar</a>
          </span>
        </div>
      </div>
    </div>
  </div>
@stop