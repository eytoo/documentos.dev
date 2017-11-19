<div class="main-menu menu-light menu-border menu-shadow menu-accordion">
  <!-- main menu header-->
  <div class="main-menu-header">
    <input type="text" placeholder="Buscar" class="menu-search form-control round">
  </div>
  <!-- / main menu header-->
  <!-- main menu content-->
  <div class="main-menu-content">
    <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
      <li class=" nav-item"><a href="/home"><i class="icon-home3"></i><span data-i18n="nav.dash.main" class="menu-title">Escritorio</span></a>
      </li>
      <?php if (\Entrust::can("comp_all")) : ?>
      <li class=" nav-item"><a href="<?php echo e(route("usuarios.index")); ?>"><i class="icon-users2"></i><span data-i18n="nav.templates.main" class="menu-title">Trabajadores</span></a>
      </li>
      <?php endif; // Entrust::can ?>
      <?php if (\Entrust::can("comp_all")) : ?>
      <li class=" nav-item"><a href="<?php echo e(route("conductores.index")); ?>"><i class="icon-file-pdf-o"></i><span data-i18n="nav.templates.main" class="menu-title">Documentos</span></a>
      </li>
      <?php endif; // Entrust::can ?>
      <?php if (\Entrust::can("comp_all")) : ?>
      <li class=" nav-item"><a href="<?php echo e(route("carreras.index")); ?>"><i class="icon-users3"></i><span data-i18n="nav.templates.main" class="menu-title">Asignación</span></a>
      </li>
      <?php endif; // Entrust::can ?>
      <?php if (\Entrust::can("comp_all")) : ?>
      <li class=" nav-item"><a href="<?php echo e(route("usuarios.index")); ?>"><i class="icon-office"></i><span data-i18n="nav.templates.main" class="menu-title">Empresas</span></a>
      </li>
      <?php endif; // Entrust::can ?>
      
      

      <!-- Reportes -->
      <?php if (\Entrust::can("rep_*")) : ?>
        <li class=" navigation-header"><span data-i18n="nav.category.general">Reportes y Análiticas</span><i data-toggle="tooltip" data-placement="right" data-original-title="General" class="icon-ellipsis icon-ellipsis"></i>
        </li>
        <?php if (\Entrust::can("rep_emp_all")) : ?>
        <li class=" nav-item"><a href="#"><i class="icon-stats-dots"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Informe de trabajadores</span></a>
          <ul class="menu-content">
            <li><a href="<?php echo e(route('gusuarios')); ?>" data-i18n="nav.page_layouts.1_column" class="menu-item">Gráfico</a>
            </li>
            <li><a href="<?php echo e(route('repusuarios')); ?>" data-i18n="nav.page_layouts.2_columns" class="menu-item">Reportes</a>
            </li>
          </ul>
        </li>
        <?php endif; // Entrust::can ?>
        <?php if (\Entrust::can("rep_cv_all")) : ?>
        <li class=" nav-item"><a href="<?php echo e(route('repcompras')); ?>"><i class="icon-stats-dots"></i><span data-i18n="nav.starter_kit.main" class="menu-title">Informe de entregas</span></a>
        </li>
        <li class=" nav-item"><a href="<?php echo e(route('repventas')); ?>"><i class="icon-stats-dots"></i><span data-i18n="nav.starter_kit.main" class="menu-title">Informe de documentos</span></a>
        </li>
        <?php endif; // Entrust::can ?>
        
      <?php endif; // Entrust::can ?>
      <!-- Configuración -->
      <?php if (\Entrust::can(["empresa_all","config_all"])) : ?>
        <li class=" navigation-header"><span data-i18n="nav.category.general">Configuración</span><i data-toggle="tooltip" data-placement="right" data-original-title="General" class="icon-ellipsis icon-ellipsis"></i>
        </li>

        <?php if (\Entrust::can("user_all")) : ?>
        <li class=" nav-item"><a href="#"><i class="icon-users3"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Usuarios de sistema</span></a>
          <ul class="menu-content">
            <li><a data-modal="byUrl" href="<?php echo e(route("administradores.create")); ?>" data-i18n="nav.page_layouts.1_column" class="menu-item">Nuevo</a>
            </li>
            <li><a href="<?php echo e(route("administradores.index")); ?>" data-i18n="nav.page_layouts.2_columns" class="menu-item">Lista</a>
            </li>
          </ul>
        </li>
        <?php endif; // Entrust::can ?>
        <?php if (\Entrust::can("config_all")) : ?>
        <li class=" nav-item"><a href="<?php echo e(url("admin/roles")); ?>"><i class="icon-toggle-on"></i><span data-i18n="nav.starter_kit.main" class="menu-title">Roles y permisos</span></a>
        </li>
        <li class=" nav-item"><a href="#"><i class="icon-industry"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Sistema</span></a>
          <ul class="menu-content">
            <li>
            <a data-modal="byUrl" href="<?php echo e(url("admin/sistema/imagenes")); ?>" data-i18n="nav.page_layouts.1_column" class="menu-item">Testimonios</a>
            </li>
            <li><a data-modal="byUrl" href="<?php echo e(url("admin/sistema/onof")); ?>" data-i18n="nav.page_layouts.1_column" class="menu-item">Países</a>
            </li>
            <li>
              <a href="" title=""></a>
            </li>
          </ul>
        </li>
        <?php endif; // Entrust::can ?>
      <?php endif; // Entrust::can ?>
    </ul>
  </div>
  <!-- /main menu content-->
</div>
