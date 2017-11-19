

<?php $__env->startSection('title'); ?>
    <?php echo e($entity_p); ?> <?php if(Request::has("lista") && Request::input("lista") == "eliminados"): ?> Eliminados <i class="icon-trash2"></i> <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("styles"); ?>
    <link rel="stylesheet" href="/public/admin/plugins/dropify/dist/css/dropify.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection("action-cta"); ?>
    <a class="btn btn-sm btn-primary ladda-button" data-style="expand-right" data-size="s" data-modal="byUrl" href='<?php echo e(route( str_slug($entity_p) .".create" )); ?>'> Agregar <i class="icon-plus"></i></a>

    <a class="btn btn-sm btn-secondary ladda-button" data-style="expand-right" data-size="s" href='<?php echo e(route( str_slug($entity_p) .".index") . "?lista=eliminados"); ?>'> Archivados <i class="icon-box-add"></i></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('table'); ?>
    <table id="myTable" class="datatable table-white-space table table-hover card-table zero-configuration table-middle">
        <thead>
        <tr>
            <th>Id</th>
            <th>Nombres</th>
            <th>E-mail</th>
            <th>Estado</th>
            <th>Teléfono</th>
            <th class="text-center"><i class="icon-cog"></i></th>
        </tr>
        </thead>
        <tbody>
        <?php $__empty_1 = true; $__currentLoopData = $dataList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $object): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td><?php echo e($object->id); ?></td>
                <td><a data-modal="byUrl" href="<?php echo e(route(str_slug($entity_p).".edit",[$object->id])); ?>"><?php echo e($object->driver->nombres); ?> <?php echo e($object->driver->apellidos); ?></a></td>
                <td>
                    <a style="display: block; width: 110px; text-overflow: ellipsis; overflow: hidden;" href="mailto:<?php echo e($object->email); ?>"><?php echo e($object->email); ?></a>
                </td>
                <td class="text-center">
                    <span style="padding-top: 6px;" class="tag tag-<?php echo e($object->activo == 0?'danger':'success'); ?>">
                        <?php if($object->activo): ?>
                            <i class="icon-check"></i>
                        <?php else: ?>
                            <i class="icon-close"></i>
                        <?php endif; ?>
                    </span>
                </td>
                
                <td><?php echo e($object->telefono); ?></td>
                <td class="text-center has-action">
                    <span class="dropdown">
                        <form
                                id="form-delete-<?php echo e($object->id); ?>"
                                action="<?php echo e(route( str_slug($entity_p).".destroy",[$object->id,(isset($object) && $object->trashed() ? 'type=delete':'')])); ?>"
                                method="POST" <?php echo e(isset($object) && $object->trashed()?'data-type=delete':''); ?>>
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field("DELETE")); ?>

                        </form>
                        <button id="btnSearchDrop4" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-sm btn-primary dropdown-toggle dropdown-menu-right"><i class="icon-cog3"></i></button>
                        <span aria-labelledby="btnSearchDrop4" class="dropdown-menu mt-1 dropdown-menu-right">
                            <a data-modal="byUrl" href="<?php echo e(route(str_slug($entity_p).".edit",[$object->id])); ?>" class="dropdown-item"><i class="icon-pen3"></i> Editar <?php echo e($entity_s); ?></a>
                            <a href="javascript:eliminar(<?php echo e($object->id); ?>);" class="dropdown-item"><i class="<?php echo e(isset($object) && $object->trashed()?'icon-trash4':'icon-box-add'); ?>"></i> <?php echo e(isset($object) && $object->trashed()?'Eliminar':'Archivar'); ?> <?php echo e($entity_s); ?></a>
                        </span>
                    </span>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <?php endif; ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('action-cta-footer'); ?>
    <?php if(Request::has("lista")): ?>
        <a class="btn btn-sm btn-primary ladda-button" data-style="expand-right" data-size="s" href='<?php echo e(route( str_slug($entity_p) .".index")); ?>'><i class="icon-android-arrow-back"></i> Lista </a>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.partials.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>