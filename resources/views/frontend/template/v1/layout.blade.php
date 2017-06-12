<!DOCTYPE html>
<html lang="es">
<head>
    <title>Cursania</title>
    @include("frontend.template.v1.partials.head")
    @yield("estilos")
</head>
<body>
    <div id="mainModal" class="modal modales">
        <div class="modal-content">
          <div id="demo" data-spinner='{"radius": 80}'></div>
        </div>
    </div>
    <div id="ip-container">
        <header class="ip-header" id="ip-header-pre">
                <div class="ip-logo">
                    <svg class="ip-inner" width="100%" height="100%" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                         viewBox="0 0 1366 768" style="enable-background:new 0 0 1366 768;" preserveAspectRatio="xMidYMin meet">
                        <style type="text/css">
                            .st0{fill:#4795E2;}
                            .st1{fill:#2D67BA;}
                        </style>
                        <title  id="logo_title">Cursania</title>
                        <g>
                            <path class="st0" style="background-color: fill:#4795E2;" d="M895.2,369.3H373.9l107.8-291c8.1-21.8,28.9-36.3,52.2-36.3h402.6c38.8,0,65.6,38.6,52.2,75L895.2,369.3z"/>
                            <path class="st1" style="background-color: fill:#2D67BA;" d="M895.2,404.7H373.9l107.8,291c8.1,21.8,28.9,36.3,52.2,36.3h402.6c38.8,0,65.6-38.6,52.2-75L895.2,404.7z"/>
                        </g>
                    </svg>
                </div>
                <div class="ip-loader">
                    <svg class="ip-inner" width="60px" height="60px" viewBox="0 0 80 80">
                        <path class="ip-loader-circlebg" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>
                        <path id="ip-loader-circle" class="ip-loader-circle" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>
                    </svg>
                </div>
        </header>
    </div>
    @include("frontend.template.v1.partials.menu")
    @include("frontend.template.v1.partials.aside")
    @yield('menu_add')

    <!-- START MAIN -->
    <div id="main">
    @yield("main")
    </div>
    <!-- END MAIN -->

    @include("frontend.template.v1.partials.footer")
    @include("frontend.template.v1.modal.login")
    @include("frontend.template.v1.modal.registro")
    <!-- //////////// SCRIPT ////////// -->
    @include("frontend.template.v1.partials.script")
    @yield("script")
</body>
</html>
