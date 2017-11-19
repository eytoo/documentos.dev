

<?php $__env->startSection('title'); ?>
Roles
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" type="text/css" href="/robust-assets/css/plugins/forms/icheck/icheck.css">
    <link rel="stylesheet" type="text/css" href="/robust-assets/css/plugins/forms/icheck/custom.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection("action-cta"); ?>
<a class="btn btn-sm btn-success" data-modal="byUrl" href='<?php echo e(route("roles.create")); ?>'>Nuevo rol <i class="icon-plus"></i></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('table'); ?>
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
        <?php $__empty_1 = true; $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
            <td><?php echo e($u->id); ?></td>
            <td><?php echo e($u->display_name); ?></td>
            <td><?php echo e($u->description); ?></td>
            <td class="text-center has-action">
                
                <!--<a href="#" data-modal="byUrl" class="btn btn-sm btn-info"><i class="fa fa fa-toggle-off"></i> Permission</a>-->
                <?php if($u->id > 3): ?>
                <form id="form-delete-<?php echo e($u->id); ?>" action="<?php echo e(route("roles.destroy",[$u->id])); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field("DELETE")); ?>

                </form>
                <a type="button" href="javascript:eliminar(<?php echo e($u->id); ?>);" class="btn btn-sm btn-danger"><i class="icon-times"></i></a>
                <?php endif; ?>
                <a href="<?php echo e(route("roles.edit",[$u->id])); ?>" data-modal="byUrl" class="btn btn-sm btn-success"><i class="icon-pencil"></i></a>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr>
            <td colspan="7">
                <div class="text-center">No existen datos en esta tabla aún</div>
            </td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('add'); ?>
<div class="row">
    <div class="col-md-12">
      <div class="card card-mini">
          <div class="card-header">
            <div class="card-title big-title">Permisos del sistema</div>
        </div>
        <div class="card-body no-padding table-responsive">
            <form action="/admin/config/saveperms" method="post">
                <?php echo e(csrf_field()); ?>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Permisos</th>
                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <th class="text-center"><?php echo e($rol->display_name); ?></th>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $pers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($p->display_name); ?></td>
                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <th class="text-center icheck_minimal skin">
                                <fieldset>
                                 <label for="check_<?php echo e($rol->id); ?>_<?php echo e($p->id); ?>">
                                  <input type="checkbox" id="check_<?php echo e($rol->id); ?>_<?php echo e($p->id); ?>" name="permission[<?php echo $rol->id; ?>][<?php echo $p->id; ?>]" value = '1' <?php echo (in_array($rol->id.'-'.$p->id,$per_role)) ? 'checked' : ''; ?>>
                                  </label>
                                </fieldset>
                            </th>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="/robust-assets/js/plugins/ui/headroom.min.js" type="text/javascript"></script>
    <script src="/robust-assets/js/plugins/forms/icheck/icheck.min.js" type="text/javascript"></script>
    <script src="/robust-assets/js/components/forms/checkbox-radio.js" type="text/javascript"></script>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.partials.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>