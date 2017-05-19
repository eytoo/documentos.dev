@extends('admin.partials.template')

@section('title')
{{$entity_p}}
@stop

@section("action-cta")
<a class="btn btn-sm btn-primary ladda-button" data-style="expand-right" data-size="s" data-modal="byUrl" href='{{ route( str_slug($route) .".create") }}'> Agregar <i class="icon-plus"></i></a>
@endsection

@section('table')
<table id="myTable" class="datatable table-white-space table table-hover card-table zero-configuration table-middle">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Superior</th>
            <th>url</th>
            <th class="text-center"><i class="icon-cog"></i></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($dataList as $object)
        <tr>
            <td>{{ $object->pos_cat_id }}</td>
            <td><a data-modal="byUrl" href="{{ route(str_slug($route).".edit",[$object->pos_cat_id]) }}">{{ $object->pos_cat_nombre }}</a></td>
            <td>{{ $object->post_cat_parent_id != "" ? App\PostCategoria::find($object->post_cat_parent_id)->pos_cat_nombre : '-' }}</td>
            <td><span class="tag tag-default">{{ $object->post_cat_url }}</span></td>
            <td class="text-center has-action">
                <span class="dropdown">
                    <form id="form-delete-{{ $object->pos_cat_id }}" action="{{ route( str_slug($route).".destroy",[$object->pos_cat_id]) }}" method="POST">
                        {{ csrf_field() }}
                            {{ method_field("DELETE") }}
                    </form>
                    <button id="btnSearchDrop4" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-sm btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>
                    <span aria-labelledby="btnSearchDrop4" class="dropdown-menu mt-1 dropdown-menu-right">
                        <a data-modal="byUrl" href="{{ route(str_slug($route).".edit",[$object->pos_cat_id]) }}" class="dropdown-item"><i class="icon-pen3"></i> Editar {{$entity_s}}</a>
                        <a href="javascript:eliminar({{ $object->pos_cat_id }});" class="dropdown-item"><i class="icon-trash4"></i> Eliminar {{$entity_s}}</a>
                    </span>
                </span>

            </td>
        </tr>
        @empty
        @endforelse
    </tbody>
</table>
@endsection