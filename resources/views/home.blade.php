@extends('layouts.admin.app')

@section('title')
Escritorio
@stop
@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header no-border-bottom">
                <!--<h4 class="card-title">Gráficos de monitoreo</h4>-->
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                {{--<div class="heading-elements">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn btn-outline-primary btn-round active">Día</button>
                        <button type="button" class="btn btn-outline-primary btn-round">Mes</button>
                        <button type="button" class="btn btn-outline-primary btn-round">Año</button>
                    </div>
                </div>--}}
            </div>
            <div class="card-body collapse in">
                <div class="card-block">
                    <div class="row">
                        <div class="col-lg-2 col-md-12">
                            <div class="chart-stats text-xs-center">
                                <div class="new-users my-2 overflow-hidden clearfix">
                                    <span>Documentos/{{$mesactual}}</span>
                                    <h1 class="display-4">{{$usuariosmes}}</h1>
                                </div>
                                <div class="returning-users my-2 overflow-hidden">
                                    <span>Por entregar</span>
                                    <h1 class="display-4">{{$usuariosa}}</h1>
                                </div>
                                <div class="returning-users my-2 overflow-hidden">
                                    <span>Entregados hoy</span>
                                    <h1 class="display-4">{{$conductoresa}}</h1>
                                </div>
                                <div class="page-views my-2 overflow-hidden">
                                    <span>Vencidos</span>
                                    <h1 class="display-4">{{$conductoresi}}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-10">
                            <div class="card">
                                <div class="card-title">
                                    <br>
                                    <h4 style="text-align:center">Gráfico de datos</h4>
                                </div>
                                <ul class="list-inline text-xs-center mt-3">
                                    <li>
                                        <h6><i class="icon-circle primary"></i> Documentos entregados ({{$usuariost}})</h6>
                                    </li>
                                    <li>
                                        <h6><i class="icon-circle success pl-1"></i> Nuevos documentos ({{$conductorest}})</h6>
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
                    {{--<div class="row my-1">
                        <div class="col-lg-4 col-lg-offset-4 col-xs-12 p-1 border-right-blue-grey border-right-lighten-5">
                            <div class="text-xs-center">
                                <p class="text-muted"> Total al mes <span class="success darken-2"><i class="icon-arrow-up4"></i></span></p>
                                <div id="sp-bar-total-cost"></div>
                            </div>
                        </div>
                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Analytics charts -->
@endsection

@section('scripts_vendor')
<script type="text/javascript" charset="utf-8">
    Morris.Bar({
        element: "monthly-sales",
        data: {!! json_encode($data) !!},
        xkey: "month",
        ykeys: ["usuarios","conductores"],
        labels: ["Usuarios","Conductores"],
        barGap: 4,
        barSizeRatio: .3,
        gridTextColor: "#bfbfbf",
        gridLineColor: "#e3e3e3",
        numLines: 5,
        gridtextSize: 14,
        resize: !0,
        barColors: ["#ff1f3e","#37BC9B"],
        hideHover: "auto"
    });
</script>
@stop
