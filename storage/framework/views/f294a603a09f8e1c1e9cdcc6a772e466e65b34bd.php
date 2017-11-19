<nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-light navbar-shadow navbar-border navbar-brand-center navbar-hide-on-scroll">
  <div class="navbar-wrapper">
    <div class="navbar-header">
      <ul class="nav navbar-nav">
        <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5 font-large-1"></i></a></li>
        <li class="nav-item">
          <a href="/home" class="navbar-brand nav-link">
            <!--<img alt="branding logo" style="width: 180px;" src="/public/admin/img/logo-top.png" data-expand="/public/admin/robust-assets/images/logo/robust-logo-dark.png" data-collapse="/public/admin/robust-assets/images/logo/robust-logo-small.png" class="brand-logo">-->
            <h1 style="margin-top: 9px;">Sistema de gestion de documentos</h1>
          </a>
        </li>
        <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>
      </ul>
    </div>
    <div class="navbar-container content container-fluid">
      <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
        <ul class="nav navbar-nav">
          <!--Icono menu-->
          <li class="nav-item hidden-sm-down"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5"></i></a></li>
          <!--Icono buscador-->
          <!--Icono pantalla completa-->
          <li class="nav-item hidden-sm-down"><a href="#" class="nav-link nav-link-expand"><i class="ficon icon-expand2"></i></a></li>
          <!--Icono menu mega-->
        </ul>
        <ul class="nav navbar-nav float-xs-right">
            <li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link"><span class="avatar avatar-online"><img src="/public/admin/usuario.png" alt="avatar"><i></i></span><span class="user-name"><?php echo e(Auth::user()->name); ?></span></a>
              <div class="dropdown-menu dropdown-menu-right">
                <form id="logout-form" action="<?php echo e(url('logout')); ?>" method="POST" style="display: none;">
                    <?php echo e(csrf_field()); ?>

                  </form>
                  <a class="dropdown-item" href="<?php echo e(url('logout')); ?>"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  <i class="icon-power3"></i> Cerrar sesión</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  
