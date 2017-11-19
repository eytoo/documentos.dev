@extends('admin.partials.template')

@section('title')
Gráfico de usuarios (@if($fechaini == $fechafin) {{ $fechaini }} @else {{ $fechaini }} - {{ $fechafin }} @endif)
@stop

@section('link')
<li>
   <!--" <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
        <span></span> <b class="caret"></b>
    </div>-->
</li>
@stop

@section('table')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-title">
                <br>
                <h4 style="text-align:center">Gráfico de datos</h4>
            </div>
            <ul class="list-inline text-xs-center mt-3">
                <!--<li>
                    <h6><i class="icon-circle primary"></i> Usuarios</h6>
                </li>-->
                <li>
                    <h6><i class="icon-circle success pl-1" style="color: #00B050!important;"></i> Usuarios</h6>
                </li>
            </ul>
            <div class="card-body">
                <div class="card-block sales-growth-chart">
                    <div id="monthly-sales" class="height-300"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="/public/admin/robust-assets/js/plugins/pickers/dateTime/moment-with-locales.min.js" type="text/javascript"></script>
<script src="/public/admin/robust-assets/js/plugins/pickers/dateTime/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="/public/admin/robust-assets/js/plugins/pickers/pickadate/picker.js" type="text/javascript"></script>
<script src="/public/admin/robust-assets/js/plugins/pickers/pickadate/picker.date.js" type="text/javascript"></script>
<script src="/public/admin/robust-assets/js/plugins/pickers/pickadate/picker.time.js" type="text/javascript"></script>
<script src="/public/admin/robust-assets/js/plugins/pickers/pickadate/legacy.js" type="text/javascript"></script>
<script src="/public/admin/robust-assets/js/plugins/pickers/daterange/daterangepicker.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.0/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
    $(function() {

    @include("admin.partials.script_date_range")

    $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
      //do something, like clearing an input
      window.location.href = "/admin/reportes/usuarios?date-start="+ picker.startDate.format('DD-MM-YYYY') +"&date-end="+ picker.endDate.format('DD-MM-YYYY');
    });

});
</script>

<script type="text/javascript" charset="utf-8">
    Morris.Bar({
        element: "monthly-sales",
        data: {!! json_encode($data) !!},
        xkey: "month",
        ykeys: ["count"],
        labels: ["Cantidad de usuarios"],
        barGap: 4,
        barSizeRatio: .3,
        gridTextColor: "#bfbfbf",
        gridLineColor: "#e3e3e3",
        numLines: 5,
        gridtextSize: 14,
        resize: !0,
        barColors: ["#00B050"],
        hideHover: "auto"
    });
</script>
@stop
