@extends('admin.partials.template')

@section('title')
Ventas
@stop

@section("action-cta")
<a class="btn btn-sm btn-success" data-modal="byUrl" href='{{ route("ventas.create") }}'>Crear nuevo <i class="icon-plus"></i></a>
@endsection

@section('table')
<table id="myTable" class="datatable table table-hover card-table zero-configuration">
    <thead>
        <tr>
            <th>#</th>
            <th>Cliente</th>
            <th>Peso total</th>
            <th>Total compra</th>
            <th>Fecha</th>
            <th class="text-center"><i class="icon-cog"></i></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($ventas as $p)
        <tr>
            <td>{{ $p->codigo }}</td>
            <td>{{ isset($p->planta) ? $p->planta->nombre : '- No definido -' }}</td>
            <td>{{ getPeso($p->peso) }}</td>
            <td>{{ getMoneda($p->total_venta) }}</td>
            <td><span class="badge badge-primary">{{ date('d/m/Y',strtotime($p->fecha)) }}</span></td>
            <td class="text-center has-action">
                <form id="form-delete-{{ $p->id }}" action="{{ route("ventas.destroy",[$p->id]) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field("DELETE") }}
                </form>
                <a type="button" href="javascript:eliminar({{ $p->id }});" class="btn btn-sm btn-danger"><i class="icon-times"></i></a>
                <a type="button" data-modal="byUrl" href='{{ route("ventas.edit",[$p->id]) }}' class="btn btn-sm btn-default"><i class="icon-pencil"></i></a>
                
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7">
                <div class="text-center">No hay ventas de momento</div>
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection