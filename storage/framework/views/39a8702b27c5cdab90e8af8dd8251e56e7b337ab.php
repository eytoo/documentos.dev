

<?php $__env->startSection('style'); ?>
  <link rel="stylesheet" type="text/css" href="/public/admin/robust-assets/css/plugins/tables/datatable/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="/public/admin/robust-assets/css/plugins/pickers/pickadate/pickadate.css">
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
  <!-- TAGS INPUT -->
  <link rel="stylesheet" type="text/css" href="/public/admin/robust-assets/css/plugins/ui/prism.min.css">
  <link rel="stylesheet" type="text/css" href="/public/admin/robust-assets/css/plugins/forms/tags/bootstrap-tagsinput.css">
  <link rel="stylesheet" type="text/css" href="/public/admin/robust-assets/css/plugins/forms/tags/tagging.css">
  <!--Editor-->
  <link rel="stylesheet" type="text/css" href="/public/admin/robust-assets/css/plugins/editors/summernote.css">
  <link rel="stylesheet" type="text/css" href="/public/admin/robust-assets/css/plugins/editors/quill/katex.min.css">
  <link rel="stylesheet" type="text/css" href="/public/admin/robust-assets/css/plugins/editors/quill/monokai-sublime.min.css">
  <link rel="stylesheet" type="text/css" href="/public/admin/robust-assets/css/plugins/editors/quill/quill.snow.css">
  <link rel="stylesheet" type="text/css" href="/public/admin/robust-assets/css/plugins/editors/quill/quill.bubble.css">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section id="basic-tag-input">
  <div class="row">
    <div class="col-md-12">
      <div style="margin-bottom: 8px;">
        <?php echo $__env->yieldContent("action-cta"); ?>
      </div>
    </div>
    <div class="col-xs-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title"><?php echo $__env->yieldContent("title"); ?> </h4>
          <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
          <div class="heading-elements">
            <ul class="list-inline mb-0">
              <?php echo $__env->yieldContent("link"); ?>
              <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
              <li><a data-action="close"><i class="icon-cross2"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="card-body collapse in">
          <div class="card-block">
            <?php echo $__env->yieldContent("table"); ?>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div>
        <?php echo $__env->yieldContent("action-cta-footer"); ?>
      </div>
    </div>
  </div>
</section>
<?php echo $__env->yieldContent("add"); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts_vendor'); ?>
  <?php if(!Request::is("admin/reportes*")): ?>
    <script src="/public/admin/robust-assets/js/plugins/tables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="/public/admin/robust-assets/js/plugins/tables/datatable/dataTables.bootstrap4.min.js" type="text/javascript"></script>
    <!-- Tags input -->
    <script src="/public/admin/robust-assets/js/plugins/forms/extended/typeahead/typeahead.bundle.min.js" type="text/javascript"></script>
    <script src="/public/admin/robust-assets/js/plugins/ui/prism.min.js" type="text/javascript"></script>
  <?php else: ?>
    <script src="/public/admin/robust-assets/js/plugins/tables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="/public/admin/robust-assets/js/plugins/tables/datatable/dataTables.bootstrap4.min.js" type="text/javascript"></script>
    <script src="/public/admin/robust-assets/js/plugins/tables/datatable/dataTables.buttons.min.js" type="text/javascript"></script>
    <script src="/public/admin/robust-assets/js/plugins/tables/buttons.flash.min.js" type="text/javascript"></script>
    <script src="/public/admin/robust-assets/js/plugins/tables/jszip.min.js" type="text/javascript"></script>
    <script src="/public/admin/robust-assets/js/plugins/tables/pdfmake.min.js" type="text/javascript"></script>
    <script src="/public/admin/robust-assets/js/plugins/tables/vfs_fonts.js" type="text/javascript"></script>
    <script src="/public/admin/robust-assets/js/plugins/tables/buttons.html5.min.js" type="text/javascript"></script>
    <script src="/public/admin/robust-assets/js/plugins/tables/buttons.print.min.js" type="text/javascript"></script>
    <!--- date -->
    <script src="/public/admin/robust-assets/js/plugins/pickers/dateTime/moment-with-locales.min.js" type="text/javascript"></script>
    <script src="/public/admin/robust-assets/js/plugins/pickers/dateTime/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="/public/admin/robust-assets/js/plugins/pickers/pickadate/picker.js" type="text/javascript"></script>
    <script src="/public/admin/robust-assets/js/plugins/pickers/pickadate/picker.date.js" type="text/javascript"></script>
    <script src="/public/admin/robust-assets/js/plugins/pickers/pickadate/picker.time.js" type="text/javascript"></script>
    <script src="/public/admin/robust-assets/js/plugins/pickers/pickadate/legacy.js" type="text/javascript"></script>
    <script src="/public/admin/robust-assets/js/plugins/pickers/daterange/daterangepicker.js" type="text/javascript"></script>
  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts_load'); ?>
  <?php if(!Request::is("admin/reportes*")): ?>
    <script src="/public/admin/robust-assets/js/components/tables/datatables/datatable-basic.js" type="text/javascript"></script>
  <?php else: ?>

    <script src="/public/admin/robust-assets/js/components/tables/datatables/datatable-advanced.js" type="text/javascript"></script>

  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>