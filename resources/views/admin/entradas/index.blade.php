@extends('admin.partials.template')

@section('title')
{{$entity_p}} @if(Request::has("lista") && Request::input("lista") == "eliminados") Eliminados <i class="icon-trash2"></i> @endif
@stop

@section("styles")
<link rel="stylesheet" href="/public/admin/plugins/dropify/dist/css/dropify.min.css">
@stop

@section("action-cta")
<a class="btn btn-sm btn-primary ladda-button" data-style="expand-right" data-size="s" data-modal="byUrl" href='{{ route( str_slug($entity_p) .".create") }}'> Agregar <i class="icon-plus"></i></a>
<a class="btn btn-sm btn-secondary ladda-button" data-style="expand-right" data-size="s" href='{{ route( str_slug($entity_p) .".index") . "?lista=eliminados" }}'> Archivados <i class="icon-box-add"></i></a>
@endsection

@section('table')
<table id="myTable" class="datatable table-white-space table table-hover card-table zero-configuration table-middle">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Escritor</th>
            <th>Etiquetas</th>
            <th>Categoría</th>
            <th class="text-center"><i class="icon-cog"></i></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($dataList as $object)
        <tr>
        <td>{{ $object->post_id }}</td>
            <td><a data-modal="byUrl" href="{{ route(str_slug($entity_p).".edit",[$object->post_id]) }}">{{ $object->post_nombre }}</a></td>
            <td>{{ $object->profesor->prof_nombre }}</td>
            <td>
                {{ $object->post_etiquetas }}
            </td>
            <td>
                {{ $object->categoria->pos_cat_nombre }}
            </td>
            <td class="text-center has-action">
                <span class="dropdown">
                    <form
                    id="form-delete-{{ $object->post_id }}"
                    action="{{ route( str_slug($entity_p).".destroy",[$object->post_id,(isset($object) && $object->trashed() ? 'type=delete':'')]) }}"
                    method="POST" {{isset($object) && $object->trashed()?'data-type=delete':''}}>
                    {{ csrf_field() }}
                    {{ method_field("DELETE") }}
                </form>
                <button id="btnSearchDrop4" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-sm btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>
                <span aria-labelledby="btnSearchDrop4" class="dropdown-menu mt-1 dropdown-menu-right">
                    <a data-modal="byUrl" href="{{ route(str_slug($entity_p).".edit",[$object->post_id]) }}" class="dropdown-item"><i class="icon-pen3"></i> Editar {{$entity_s}}</a>
                    <a href="javascript:eliminar({{ $object->post_id }});" class="dropdown-item"><i class="{{isset($object) && $object->trashed()?'icon-trash4':'icon-box-add'}}"></i> {{isset($object) && $object->trashed()?'Eliminar':'Archivar'}} {{$entity_s}}</a>
                </span>
            </span>
        </td>
    </tr>
    @empty
    @endforelse
</tbody>
</table>
@endsection

@section('action-cta-footer')
@if(Request::has("lista"))
<a class="btn btn-sm btn-primary ladda-button" data-style="expand-right" data-size="s" href='{{ route( str_slug($entity_p) .".index") }}'><i class="icon-android-arrow-back"></i> Lista </a>
@endif
@stop
