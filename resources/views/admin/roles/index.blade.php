@extends('admin.partials.template')

@section('title')
Roles
@stop

@section('style')
    <link rel="stylesheet" type="text/css" href="/robust-assets/css/plugins/forms/icheck/icheck.css">
    <link rel="stylesheet" type="text/css" href="/robust-assets/css/plugins/forms/icheck/custom.css">
@stop

@section("action-cta")
<a class="btn btn-sm btn-success" data-modal="byUrl" href='{{ route("roles.create") }}'>Nuevo rol <i class="icon-plus"></i></a>
@endsection

@section('table')
<table id="myTable" class="table table-hover card-table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Rol</th>
            <th>Detalles</th>
            <th class="text-center"><i class="fa fa-cog"></i></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($roles as $u)
        <tr>
            <td>{{ $u->id }}</td>
            <td>{{ $u->display_name }}</td>
            <td>{{ $u->description }}</td>
            <td class="text-center has-action">
                
                <!--<a href="#" data-modal="byUrl" class="btn btn-sm btn-info"><i class="fa fa fa-toggle-off"></i> Permission</a>-->
                @if($u->id > 3)
                <form id="form-delete-{{ $u->id }}" action="{{ route("roles.destroy",[$u->id]) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field("DELETE") }}
                </form>
                <a type="button" href="javascript:eliminar({{ $u->id }});" class="btn btn-sm btn-danger"><i class="icon-times"></i></a>
                @endif
                <a href="{{ route("roles.edit",[$u->id]) }}" data-modal="byUrl" class="btn btn-sm btn-success"><i class="icon-pencil"></i></a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7">
                <div class="text-center">No existen datos en esta tabla aún</div>
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
@section('add')
<div class="row">
    <div class="col-md-12">
      <div class="card card-mini">
          <div class="card-header">
            <div class="card-title big-title">Permisos del sistema</div>
        </div>
        <div class="card-body no-padding table-responsive">
            <form action="/admin/config/saveperms" method="post">
                {{csrf_field()}}
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Permisos</th>
                            @foreach($roles as $rol)
                            <th class="text-center">{{ $rol->display_name }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pers as $p)
                        <tr>
                            <td>{{$p->display_name}}</td>
                            @foreach ($roles as $rol)
                            <th class="text-center icheck_minimal skin">
                                <fieldset>
                                 <label for="check_{{$rol->id}}_{{$p->id}}">
                                  <input type="checkbox" id="check_{{$rol->id}}_{{$p->id}}" name="permission[{!!$rol->id!!}][{!!$p->id!!}]" value = '1' {!! (in_array($rol->id.'-'.$p->id,$per_role)) ? 'checked' : '' !!}>
                                  </label>
                                </fieldset>
                            </th>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="col-md-12">
                    <div class="pull-right">
                        <button class="btn btn-success btn-sm">Guardar</button>
                        <br>
                        <br>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@stop

@section('scripts')
    <script src="/robust-assets/js/plugins/ui/headroom.min.js" type="text/javascript"></script>
    <script src="/robust-assets/js/plugins/forms/icheck/icheck.min.js" type="text/javascript"></script>
    <script src="/robust-assets/js/components/forms/checkbox-radio.js" type="text/javascript"></script>
    
@stop