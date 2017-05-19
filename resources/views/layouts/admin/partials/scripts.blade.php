<script src="/robust-assets/js/vendors.min.js"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="/robust-assets/js/plugins/ui/headroom.min.js" type="text/javascript"></script>
<script src="/robust-assets/js/plugins/extensions/jquery.knob.min.js" type="text/javascript"></script>
<script src="/robust-assets/js/components/extensions/knob.js" type="text/javascript"></script>
<script src="/robust-assets/js/plugins/charts/raphael-min.js" type="text/javascript"></script>
<script src="/robust-assets/js/plugins/charts/morris.min.js" type="text/javascript"></script>
<script src="/robust-assets/js/plugins/charts/jvector/jquery-jvectormap-2.0.3.min.js" type="text/javascript"></script>
<script src="/robust-assets/js/plugins/charts/jvector/jquery-jvectormap-world-mill.js" type="text/javascript"></script>
<script src="/robust-assets/demo-data/jvector/visitor-data.js" type="text/javascript"></script>
<script src="/robust-assets/js/plugins/charts/chart.min.js" type="text/javascript"></script>
<script src="/robust-assets/js/plugins/charts/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="/robust-assets/js/plugins/extensions/unslider-min.js" type="text/javascript"></script>

<script src="/robust-assets/js/plugins/buttons/spin.min.js" type="text/javascript"></script>
<script src="/robust-assets/js/plugins/buttons/ladda.min.js" type="text/javascript"></script>
<script src="/robust-assets/js/components/buttons/button-ladda.js" type="text/javascript"></script>

@yield("scripts_vendor")
<!-- END PAGE VENDOR JS-->
<!-- BEGIN ROBUST JS-->
<script src="/robust-assets/js/app.min.js"></script>

<script src="/plugins/jquery-confirm/dist/jquery-confirm.min.js"></script>
<script src="/plugins/progressjs/progress.js"></script>
<script src="/plugins/notie/dist/notie.min.js"></script>
<script src="/plugins/select2/js/select2.min.js"></script>
<script src="/js/dacdevs.min.js"></script>
<script src="/js/util.js"></script>
@yield("scripts_load")
<!-- END ROBUST JS-->
<!-- BEGIN PAGE LEVEL JS-->
@if(Request::is("home"))
<!--<script src="/robust-assets/js/components/pages/dashboard-analytics.js" type="text/javascript"></script>-->
@endif