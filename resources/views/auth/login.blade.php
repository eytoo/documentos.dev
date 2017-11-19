<!DOCTYPE html>
<html lang="es" data-textdirection="LTR" class="loading">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="author" content="DacDevs">
    <title>Administración | Login</title>
    <link rel="shortcut icon" type="image/png" href="/public/favicon.png?v=2">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" href="/public/admin/robust-assets/css/vendors.min.css"/>
    <!-- BEGIN VENDOR CSS-->
    <!-- BEGIN Font icons-->
    <link rel="stylesheet" type="text/css" href="/public/admin/robust-assets/fonts/icomoon.css">
    <link rel="stylesheet" type="text/css" href="/public/admin/robust-assets/fonts/flag-icon-css/css/flag-icon.min.css">
    <!-- END Font icons-->
    <!-- BEGIN Plugins CSS-->
    <link rel="stylesheet" type="text/css" href="/public/admin/robust-assets/css/plugins/sliders/slick/slick.css">
    <!-- END Plugins CSS-->

    <!-- BEGIN Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="/public/admin/robust-assets/css/plugins/forms/icheck/icheck.css">
    <link rel="stylesheet" type="text/css" href="/public/admin/robust-assets/css/plugins/forms/icheck/custom.css">
    <!-- END Vendor CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" href="/public/admin/robust-assets/css/app.min.css"/>
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="/public/admin/assets/css/style.css">
    <!-- END Custom CSS-->
</head>
<body data-open="click" data-menu="vertical-content-menu" data-col="1-column" class="vertical-layout vertical-content-menu 1-column  blank-page blank-page">
    <!-- START PRELOADER-->


<!-- END PRELOADER-->
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="robust-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body"><section class="flexbox-container">
        <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1  box-shadow-2 p-0">
            <div class="card border-grey border-lighten-3 m-0">
                <div class="card-header no-border">
                    <div class="card-title text-xs-center">
                        <div class="p-1"><img style="width: 160px;" src="/public/admin/img/logo.png" alt="branding logo"></div>
                    </div>
                    <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>Inicia sesión con tu cuenta</span></h6>
                </div>
                <div class="card-body collapse in">
                    <div class="card-block">
                        <form class="form-horizontal form-simple"  role="form" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <fieldset class="form-group has-feedback has-icon-left mb-0{{ $errors->has('login') ? ' has-error' : '' }}">
                                <input type="text" class="form-control form-control-lg input-lg" id="user-name" placeholder="Usuario o E-mail" name="login" value="{{ old('email') }}" required autofocus>
                                <div class="form-control-position">
                                    <i class="icon-head"></i>
                                </div>
                                @if ($errors->has('login'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </fieldset>
                            <fieldset class="form-group has-feedback has-icon-left{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input type="password" class="form-control form-control-lg input-lg" id="user-password" name="password" placeholder="Ingresa tu contraseña" required>
                                <div class="form-control-position">
                                    <i class="icon-key3"></i>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </fieldset>
                            <fieldset class="form-group row">
                                <div class="col-md-6 col-xs-12 text-xs-center text-md-left">
                                    <fieldset>
                                        <input {{ old('remember') ? 'checked' : '' }} type="checkbox" id="remember-me" name="remember" class="chk-remember">
                                        <label for="remember-me"> Recordarme</label>
                                    </fieldset>
                                </div>
                                <div class="col-md-6 col-xs-12 text-xs-center text-md-right"><a href="recover-password.html" class="card-link">¿Olvidastes tu contraseña?</a></div>
                            </fieldset>
                            <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="icon-unlock2"></i> Iniciar sesión</button>
                        </form>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="">
                        <p class="float-sm-left text-xs-center m-0"><a href="recover-password.html" class="card-link">Recuperar contraseña</a></p>
                        <p class="float-sm-right text-xs-center m-0">¿Necesitas ayuda? <a href="register-simple.html" class="card-link">FAQ</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
</div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->

<!-- BEGIN VENDOR JS-->
<script src="/public/admin/robust-assets/js/vendors.min.js"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="/public/admin/robust-assets/js/plugins/ui/headroom.min.js" type="text/javascript"></script>
<script src="/public/admin/robust-assets/js/plugins/forms/icheck/icheck.min.js" type="text/javascript"></script>
<script src="/public/admin/robust-assets/js/plugins/forms/validation/jqBootstrapValidation.js" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN ROBUST JS-->
<script src="/public/admin/robust-assets/js/app.min.js"></script>
<!-- END ROBUST JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="/public/admin/robust-assets/js/components/forms/form-login-register.js" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
</body>
</html>
