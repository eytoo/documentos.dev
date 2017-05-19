@extends('admin.partials.template')

@section('title')
Reporte de ventas
@stop

@section('link')
<li>
    <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
        <span></span> <b class="caret"></b>
    </div>
</li>
@stop

@section('table')
<table id="myTable" class="datatable table table-hover card-table file-export">
    <thead>
        <tr>
            <th>#</th>
            <th>Productor</th>
            <th>Peso total</th>
            <th>Total compra</th>
            <th>Fecha</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($ventas as $p)
        <tr>
            <td>{{ $p->codigo }}</td>
            <td>{{ $p->planta->nombre }}</td>
            <td>{{ getPeso($p->peso) }}</td>
            <td>{{ getMoneda($p->total_venta) }}</td>
            <td><span class="badge badge-primary">{{ date('d/m/Y',strtotime($p->fecha)) }}</span></td>
        </tr>
        @empty
        @endforelse
    </tbody>
</table>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.0/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
    $(function() {

    @include("admin.partials.script_date_range")

    $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
      //do something, like clearing an input
      window.location.href = "/admin/reportes/ventas?date-start="+ picker.startDate.format('DD-MM-YYYY') +"&date-end="+ picker.endDate.format('DD-MM-YYYY');
    });
    
});
</script>
@stop