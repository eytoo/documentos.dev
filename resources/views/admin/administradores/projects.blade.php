@extends('admin.partials.template')

@section('title')
Projects of {{$user->name}}
@stop

@section("action-cta")
<a class="btn btn-sm btn-success" data-modal="byUrl" href='{{ url("admin/users/project/assign/".$user->id) }}'>
Assign new project <i class="fa fa-plus"></i></a>
@endsection

@section('table')
<table id="myTable" class="datatable table table-hover card-table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <!--<th>Details</th>-->          
            <th>Hours</th>            
            <th>Date</th>            
            <th class="text-center"><i class="fa fa-cog"></i></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($assigned as $a)
        <tr>
            <td>{{ $a->project->id }}</td>
            <td>{{ $a->project->pname }}</td>
            <!--<td>{{ $a->project->detail }}</td>-->
            <td>
                {{formatHour($a->hours)}}
            </td>
            <td><span class="badge badge-primary">{{ date('m-d-Y',strtotime($a->project->created_at)) }}</span></td>            
            <td class="{{ $a->trashed() ? '' : 'text-center has-action' }}">
            <form id="form-delete-{{$a->id}}" action="{{url('admin/users/project/deleteassign')}}" class="form-send" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$a->id}}">
            </form>
            @if(!$a->trashed())
            <a type="button" data-modal="byUrl" href='{{ url('admin/users/project/editassign/'. $a->id)}}' class="btn btn-sm btn-default"><i class="fa fa-pencil"></i></a>
            <a type="button" href="javascript:eliminar({{ $a->id }});" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
            @else
            <div class="material-switch" style="margin-left: 30px;">
                <input onchange="$('#form-delete-{{$a->id}}').submit()" {{ $a->trashed() ? '' : 'checked' }} id="user_{{$a->id}}" name="check_u" value="0" type="checkbox"/>
                <label for="user_{{$a->id}}" class="label-success"></label>
            </div>
            @endif
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="7">
            <div class="text-center">There are no projects</div>
        </td>
    </tr>
    @endforelse
</tbody>
</table>
@include("admin.partials.mainModal")
@endsection