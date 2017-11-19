

<?php $__env->startSection('formTitle'); ?>
<?php if(isset($role)): ?>
Editar rol
<?php else: ?>
Crear nuevo rol
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('form'); ?>

<?php if(isset($role)): ?>
<input type="hidden" name="id" value="<?php echo e($role->id); ?>">
<?php endif; ?>

<div class="form-group">
	<label for="nombre">Nombre <small>(without spaces)</small></label>
	<input value="<?php echo e(isset($role)?$role->display_name:''); ?>" type="text" name="nombre" class="clean-input form-control hasFocus" required id="nombre" placeholder="Supervisor">
</div>
<div class="form-group">
	<label for="detalle">Detalles</label>
	<textarea name="detalles" required class="clean-input form-control" rows="6" id="detalle" placeholder="..."><?php echo e(isset($role)?$role->description:''); ?></textarea>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.partials.formTemplate', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>