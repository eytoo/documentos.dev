@extends('admin.empresa.temp')

@section('title')
Configuración de bonificación
@stop

@section('cont')
  <div class="row">  
    <div class="col-md-6">
      <div class="form-group">
        <label for="">Bonificación para productores</label>
        <div class="input-group">
          <input type="text" disabled class="form-control" placeholder="L. 0.00" value="{{ getMoneda($c->bono_productor) }}">
          <span class="input-group-btn">
            <a data-modal="byUrl" href='{{ route("empresa.create") }}?campo=bono_productor' class="btn btn-primary"><i class="icon-pencil"></i> Modificar</a>
          </span>
        </div>
      </div>
    </div>
  </div>
@stop