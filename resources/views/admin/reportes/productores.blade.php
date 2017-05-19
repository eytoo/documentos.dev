@extends('admin.partials.template')

@section('title')
Reporte de productores
@stop

@section('table')
<table id="myTable" class="datatable table table-hover card-table file-export">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Teléfono</th>       
            <th>Dirección</th>            
            <th>Fecha Nac.</th>            
        </tr>
    </thead>
    <tbody>
        @forelse ($productores as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->nombre }}</td>
            <td>{{ $p->telefono }}</td>
            <td>
                {{ $p->direccion }}
            </td>
            <td><span class="badge badge-primary">{{ date('d/m/Y',strtotime($p->created_at)) }}</span></td>           
        </tr>
        @empty
        @endforelse
    </tbody>
</table>
@endsection