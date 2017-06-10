@extends('admin.partials.template')

@section('title')
    {{$entity_p}}
@stop

@section("styles")
    <link rel="stylesheet" href="/public/admin/plugins/dropify/dist/css/dropify.min.css">
@stop

@section("action-cta")
    <a class="btn btn-sm btn-primary ladda-button" data-style="expand-right" data-size="s" data-modal="byUrl" href='{{ route( str_slug($entity_p) .".create") }}'> Agregar <i class="icon-plus"></i></a>
@endsection

@section('table')
    <table id="myTable" class="datatable table-white-space table table-hover card-table zero-configuration table-middle">
        <thead>
        <tr>
            <!--<th>Id</th>-->
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Estado</th>
            <th>Tipo</th>
            <th>Lecc.</th>
            <th>Precio</th>
            <th class="text-center"><i class="icon-cog"></i></th>
        </tr>
        </thead>
        <tbody>
        @forelse ($dataList as $object)
            <tr>
                <!--<td>{{ $object->cur_id }}</td>-->
                <td><a data-modal="byUrl" href="{{ route(str_slug($entity_p).".edit",[$object->cur_id]) }}">{{ $object->cur_nombre }}</a></td>
                <td>{{ $object->categoria->cat_nombre }}</td>
                <td>
                    <span class="tag tag-{{$object->cur_estado == 0?'danger':'default'}}">{{ getEstado($object->cur_estado) }}</span>
                </td>
                <td>
                    <span class="tag tag-default">{{ getTipo($object->cur_tipo) }}</span>
                </td>
                <td>
                    {{ cantLecciones($object) }}
                </td>
                <td>
                    {{ getMoneda($object->cur_precio) }}
                </td>
                <td class="text-center has-action">
                <span class="dropdown">
                    <form id="form-delete-{{ $object->cur_id }}" action="{{ route( str_slug($entity_p).".destroy",[$object->cur_id]) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field("DELETE") }}
                    </form>
                    <button id="btnSearchDrop4" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-sm btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>
                    <span aria-labelledby="btnSearchDrop4" class="dropdown-menu mt-1 dropdown-menu-right">
                        <a href="{{ route("temas.index",["curso=".$object->cur_id]) }}" class="dropdown-item"><i class="icon-book2"></i> Temas del {{$entity_s}}</a>
                        <div class="dropdown-divider"></div>
                        <a data-modal="byUrl" href="{{ route(str_slug($entity_p).".edit",[$object->cur_id]) }}" class="dropdown-item"><i class="icon-pen3"></i> Editar {{$entity_s}}</a>
                        <a href="javascript:eliminar({{ $object->cur_id }});" class="dropdown-item"><i class="icon-trash4"></i> Eliminar {{$entity_s}}</a>
                    </span>
                </span>

                </td>
            </tr>
        @empty
        @endforelse
        </tbody>
    </table>
@endsection
