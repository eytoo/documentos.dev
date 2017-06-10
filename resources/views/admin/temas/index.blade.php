@extends('admin.partials.template')

@section('title')
    {{$entity_p}} @if(Request::has("lista") && Request::input("lista") == "eliminados") Eliminados <i class="icon-trash2"></i> @endif del Curso [ {{$curso->cur_nombre}} ]
@stop

@section("styles")
    <link rel="stylesheet" href="/public/admin/plugins/dropify/dist/css/dropify.min.css">
@stop

@section("action-cta")
    <a class="btn btn-sm btn-primary ladda-button" data-style="expand-right" data-size="s" data-modal="byUrl" href='{{ route( str_slug($entity_p) .".create") }}'><span class="ladda-label">Agregar <i class="icon-plus"></i></span><span class="ladda-spinner"></span></a>
    <a class="btn btn-sm btn-secondary ladda-button" data-style="expand-right" data-size="s" href='{{ route( str_slug($entity_p) .".index") . "?lista=eliminados" }}'> Archivados <i class="icon-box-add"></i></a>
@endsection

@section('table')
    <table id="myTable" class="datatable table-white-space table table-hover card-table zero-configuration table-middle">
        <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Fecha C.</th>
            <th class="text-center"><i class="icon-cog"></i></th>
        </tr>
        </thead>
        <tbody>
        @forelse ($dataList as $object)
            <tr>
                <td>{{ $object->tema_id }}</td>
                <td><a data-modal="byUrl" href="{{ route(str_slug($entity_p).".edit",[$object->tema_id]) }}">{{ $object->tema_nombre }}</a></td>
                <td>{{ date("d/m/Y",strtotime($object->created_at)) }}</td>
                <td class="text-center has-action">
                    <span class="dropdown">
                        <form
                                id="form-delete-{{ $object->tema_id }}"
                                action="{{ route( str_slug($entity_p).".destroy",[$object->tema_id,(isset($object) && $object->trashed() ? 'type=delete':'')]) }}"
                                method="POST" {{isset($object) && $object->trashed()?'data-type=delete':''}}>
                            {{ csrf_field() }}
                            {{ method_field("DELETE") }}
                        </form>
                        <button id="btnSearchDrop4" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-sm btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>
                        <span aria-labelledby="btnSearchDrop4" class="dropdown-menu mt-1 dropdown-menu-right">
                            <a href="{{ route("lecciones.index",["tema=".$object->tema_id]) }}" class="dropdown-item"><i class="icon-book2"></i> Videos del {{$entity_s}}</a>
                            <div class="dropdown-divider"></div>
                            <a data-modal="byUrl" href="{{ route(str_slug($entity_p).".edit",[$object->tema_id]) }}" class="dropdown-item"><i class="icon-pen3"></i> Editar {{$entity_s}}</a>
                            <a href="javascript:eliminar({{ $object->tema_id }});" class="dropdown-item"><i class="{{isset($object) && $object->trashed()?'icon-trash4':'icon-box-add'}}"></i> {{isset($object) && $object->trashed()?'Eliminar':'Archivar'}} {{$entity_s}}</a>
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
        <a class="btn btn-sm btn-primary" href='{{ route( str_slug($entity_p) .".index") }}'><i class="icon-android-arrow-back"></i> Lista </a>
    @endif
    <a class="btn btn-sm btn-primary" href='{{ route( "cursos.index") }}'><i class="icon-android-arrow-back"></i> Cursos </a>
@stop
