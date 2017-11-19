<!DOCTYPE html>
<html lang="es" data-textdirection="LTR" class="loading">
<head>
    <?php echo $__env->make("layouts.admin.partials.head", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldContent("style"); ?>
</head>
<body data-open="click" data-menu="vertical-content-menu" data-col="2-columns" class="vertical-layout vertical-content-menu 2-columns  fixed-navbar">
    <!-- START PRELOADER-->



<!-- END PRELOADER-->

<!-- navbar-fixed-top-->
<?php echo $__env->make("layouts.admin.partials.menu_top", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="robust-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>


    <!-- main menu-->
    <?php echo $__env->make("layouts.admin.partials.menu_main", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <!-- / main menu-->

    <div class="content-body"><!-- Analytics charts -->
        <?php echo $__env->yieldContent("content"); ?>
    </div>
</div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->


<footer class="footer footer-light navbar-fixed-bottom navbar-hide-on-scroll">
  <p class="clearfix text-muted text-sm-center mb-0 px-2"><span class="float-md-left d-xs-block d-md-inline-block">Copyright  &copy; 2017 <a href="#" target="_blank" class="text-bold-800 grey darken-2"> TaxiGanga </a>, All rights reserved. </span><span class="float-md-right d-xs-block d-md-inline-block">With DacDevelopers </span></p>
</footer>

<?php echo $__env->make("admin.partials.mainModal", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<!-- BEGIN VENDOR JS-->
<?php echo $__env->make("layouts.admin.partials.scripts", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- END PAGE LEVEL JS-->

<?php if(session("estado") == "ok"): ?>
    <script>
        $(document).ready(function(){
            infoOk('<?php echo e(session('mensaje')); ?>');
        });
    </script>
<?php endif; ?>
<?php if(session("estado") == "error"): ?>
    <script>
        $(document).ready(function(){
            infoError('<?php echo e(session('mensaje')); ?>');
        });
    </script>
<?php endif; ?>
<?php echo $__env->yieldContent("scripts"); ?>
</body>
</html>
