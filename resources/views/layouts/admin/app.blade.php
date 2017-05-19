<!DOCTYPE html>
<html lang="en" data-textdirection="LTR" class="loading">
<head>
    @include("layouts.admin.partials.head")
    @yield("style")
</head>
<body data-open="click" data-menu="vertical-content-menu" data-col="2-columns" class="vertical-layout vertical-content-menu 2-columns  fixed-navbar">
    <!-- START PRELOADER-->

{{--<div id="preloader-wrapper">
  <div id="loader">
    <div class="line-scale loader-white">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
  </div>
</div>
<div class="loader-section section-top bg-blue-grey"></div>
<div class="loader-section section-bottom bg-blue-grey"></div>
</div>--}}

<!-- END PRELOADER-->

<!-- navbar-fixed-top-->
@include("layouts.admin.partials.menu_top")

<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="robust-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>


    <!-- main menu-->
    @include("layouts.admin.partials.menu_main")
    <!-- / main menu-->

    <div class="content-body"><!-- Analytics charts -->
        @yield("content")
    </div>
</div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->


<footer class="footer footer-light navbar-fixed-bottom navbar-hide-on-scroll">
  <p class="clearfix text-muted text-sm-center mb-0 px-2"><span class="float-md-left d-xs-block d-md-inline-block">Copyright  &copy; 2017 <a href="#" target="_blank" class="text-bold-800 grey darken-2"> DacDevs </a>, All rights reserved. </span><span class="float-md-right d-xs-block d-md-inline-block">With DacDevelopers </span></p>
</footer>

@include("admin.partials.mainModal")

<!-- BEGIN VENDOR JS-->
@include("layouts.admin.partials.scripts")
<!-- END PAGE LEVEL JS-->

@if(session("estado") == "ok")
    <script>
        $(document).ready(function(){
            infoOk('{{session('mensaje')}}');
        });
    </script>
@endif
@if(session("estado") == "error")
    <script>
        $(document).ready(function(){
            infoError('{{session('mensaje')}}');
        });
    </script>
@endif
@yield("scripts")
</body>
</html>