<?php if(!isset($customSend)): ?>
<script>
    formSend();
</script>
<?php endif; ?>
<script src="/public/admin/robust-assets/js/plugins/buttons/spin.min.js" type="text/javascript"></script>
<script src="/public/admin/robust-assets/js/plugins/buttons/ladda.jquery.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        $(".select2").select2();
        $('.ladda-button').ladda('bind',{ timeout: 2e3 });
    });
    //$(".time-input").inputmask("99.99");
</script>

<?php echo $__env->yieldContent("js"); ?>
<div class="modal-dialog <?php if(Request::is("admin/config/faq") || isset($modalLg)): ?> modal-lg <?php endif; ?>">
    <div class="modal-content">
    <form class="main-form <?php if(!isset($sendType)): ?> form-send <?php endif; ?>" data-closeonsub="mainModal" action="<?php echo $__env->yieldContent("formAction"); ?>" role="form" method="post" <?php echo $__env->yieldContent("adicional-form"); ?>>
            <?php echo e(csrf_field()); ?>

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><?php echo $__env->yieldContent("formTitle"); ?></h4>
            </div>
            <div class="modal-body">
                <?php echo $__env->yieldContent("form"); ?>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-6" style="text-align: left">
                        <?php echo $__env->yieldContent("modal-left-buttons"); ?>
                    </div>
                    <div class="col-md-6">
                        <?php echo $__env->yieldContent("modal-right-buttons"); ?>
                        <button type="button" class="btn btn-default ladda-button" data-style="expand-right" data-size="s" data-dismiss="modal"><span class="ladda-label">Cerrar </span><span class="ladda-spinner"></span></button>
                        <button id="btnSend" type="submit" class="btn btn-primary ladda-button" data-style="expand-right" data-size="s"><span class="ladda-label">Guardar </span><span class="ladda-spinner"></span></button>
                    </div>
                </div>
            </div>
        </form>
        <?php echo $__env->yieldContent("add-form"); ?>
    </div>
</div>
