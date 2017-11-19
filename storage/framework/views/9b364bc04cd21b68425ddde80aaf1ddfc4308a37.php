<?php $__env->startSection('title'); ?>
Escritorio
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header no-border-bottom">
                <!--<h4 class="card-title">Gráficos de monitoreo</h4>-->
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                
            </div>
            <div class="card-body collapse in">
                <div class="card-block">
                    <div class="row">
                        <div class="col-lg-2 col-md-12">
                            <div class="chart-stats text-xs-center">
                                <div class="new-users my-2 overflow-hidden clearfix">
                                    <span>Usuarios/<?php echo e($mesactual); ?></span>
                                    <h1 class="display-4"><?php echo e($usuariosmes); ?></h1>
                                </div>
                                <div class="returning-users my-2 overflow-hidden">
                                    <span>Usuarios activos</span>
                                    <h1 class="display-4"><?php echo e($usuariosa); ?></h1>
                                </div>
                                <div class="returning-users my-2 overflow-hidden">
                                    <span>Conductores activos</span>
                                    <h1 class="display-4"><?php echo e($conductoresa); ?></h1>
                                </div>
                                <div class="page-views my-2 overflow-hidden">
                                    <span>Conductores inactivos</span>
                                    <h1 class="display-4"><?php echo e($conductoresi); ?></h1>
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
                                        <h6><i class="icon-circle primary"></i> Usuarios (<?php echo e($usuariost); ?>)</h6>
                                    </li>
                                    <li>
                                        <h6><i class="icon-circle success pl-1"></i> Conductores (<?php echo e($conductorest); ?>)</h6>
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
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Analytics charts -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts_vendor'); ?>
<script type="text/javascript" charset="utf-8">
    Morris.Bar({
        element: "monthly-sales",
        data: <?php echo json_encode($data); ?>,
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>