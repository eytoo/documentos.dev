@extends('admin.partials.template')

@section('title')
Clientes
@stop

@section("action-cta")
<a class="btn btn-sm btn-success" data-modal="byUrl" href='{{ route("plantas.create") }}'>Crear nuevo <i class="icon-plus"></i></a>
@endsection

@section('table')
<table id="myTable" class="datatable table table-hover card-table zero-configuration">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Fecha Reg.</th>
            <th class="text-center"><i class="icon-cog"></i></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($plantas as $p)
        <tr>
            <td>{{ $p->id }}</td>
            <td>{{ $p->nombre }} @if($p->otros == 1) <span class="tag tag-success">{{ getMoneda($p->bono) }}</span> @endif</td>
            <td>
                {{ $p->direccion }}
            </td>
            <td><span class="badge badge-primary">{{ date('d/m/Y',strtotime($p->created_at)) }}</span></td>            
            <td class="text-center has-action">
                <form id="form-delete-{{ $p->id }}" action="{{ route("plantas.destroy",[$p->id]) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field("DELETE") }}
                </form>
                <a type="button" href="javascript:eliminar({{ $p->id }});" class="btn btn-sm btn-danger"><i class="icon-times"></i></a>
                <a type="button" data-modal="byUrl" href='{{ route("plantas.edit",[$p->id]) }}' class="btn btn-sm btn-default"><i class="icon-pencil"></i></a>
                
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7">
                <div class="text-center">No hay plantas de momento</div>
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection