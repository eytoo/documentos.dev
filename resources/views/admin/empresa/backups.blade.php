@extends('admin.empresa.temp')

@section('title')
Copias de seguridad <a class="btn btn-sm btn-primary" href="/acopiosystem-generate-backup">Generar ahora</a>
@stop

@section('cont')
  <div class="row">  
    <div class="col-md-12">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Backup</th>
            <th>Fecha</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($backups as $b)
            <tr>
              <td><i class="icon-file-zip"></i> {{ $b }}</td>
              <td> {{ date('d/m/Y H:i:s',filemtime(getFilePath($b))) }}</td>
              <td><a href="/descargar/{{ $b }}">Descargar</a></td>
            </tr>
          @empty
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
@stop