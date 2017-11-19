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
      @permission("comp_all")
      <li class=" nav-item"><a href="{{ route("usuarios.index") }}"><i class="icon-users2"></i><span data-i18n="nav.templates.main" class="menu-title">Trabajadores</span></a>
      </li>
      @endpermission
      @permission("comp_all")
      <li class=" nav-item"><a href="{{ route("conductores.index") }}"><i class="icon-file-pdf-o"></i><span data-i18n="nav.templates.main" class="menu-title">Documentos</span></a>
      </li>
      @endpermission
      @permission("comp_all")
      <li class=" nav-item"><a href="{{ route("carreras.index") }}"><i class="icon-users3"></i><span data-i18n="nav.templates.main" class="menu-title">Asignación</span></a>
      </li>
      @endpermission
      @permission("comp_all")
      <li class=" nav-item"><a href="{{ route("usuarios.index") }}"><i class="icon-office"></i><span data-i18n="nav.templates.main" class="menu-title">Empresas</span></a>
      </li>
      @endpermission
      {{--@permission("vent_all")
      <li class=" nav-item"><a href="#"><i class="icon-bomb"></i><span data-i18n="nav.templates.main" class="menu-title">Premios</span></a>
        <ul class="menu-content">
          <li><a data-modal="byUrl" href="{{ route('ventas.create') }}" data-i18n="nav.templates.vert.main" class="menu-item">Administrar</a>
          </li>
          <li><a href="{{ url("admin/ventas") }}" data-i18n="nav.templates.vert.main" class="menu-item">Eliminados</a>
          </li>
          <li><a href="{{ url("admin/ventas") }}" data-i18n="nav.templates.vert.main" class="menu-item">Poco stock</a>
          </li>
        </ul>
      </li>
      @endpermission--}}
      {{--<li class=" navigation-header"><span data-i18n="nav.category.layouts">Administración</span><i data-toggle="tooltip" data-placement="right" data-original-title="Layouts" class="icon-ellipsis icon-ellipsis"></i>
      </li>
      @permission("admin_curso_all")
      <li class=" nav-item"><a href="{{ url('admin/cursos') }}"><i class="icon-embed"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Ganadores</span></a>
      </li>
      @endpermission
      @permission("admin_curso_all")
      <li class=" nav-item"><a href="{{ url('admin/post') }}"><i class="icon-embed"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Reportados</span></a>
        <ul class="menu-content">
          <li><a href="{{ url('admin/entradas') }}" data-i18n="nav.page_layouts.2_columns" class="menu-item">Usuarios</a>
          </li>
          <li><a data-i18n="nav.page_layouts.1_column" class="menu-item" href='{{ route("postcategorias.index") }}'>Conductores</a>
          </li>
        </ul>
      </li>
      @endpermission--}}

      <!-- Reportes -->
      @permission("rep_*")
        <li class=" navigation-header"><span data-i18n="nav.category.general">Reportes y Análiticas</span><i data-toggle="tooltip" data-placement="right" data-original-title="General" class="icon-ellipsis icon-ellipsis"></i>
        </li>
        @permission("rep_emp_all")
        <li class=" nav-item"><a href="#"><i class="icon-stats-dots"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Informe de trabajadores</span></a>
          <ul class="menu-content">
            <li><a href="{{ route('gusuarios') }}" data-i18n="nav.page_layouts.1_column" class="menu-item">Gráfico</a>
            </li>
            <li><a href="{{ route('repusuarios') }}" data-i18n="nav.page_layouts.2_columns" class="menu-item">Reportes</a>
            </li>
          </ul>
        </li>
        @endpermission
        @permission("rep_cv_all")
        <li class=" nav-item"><a href="{{ route('repcompras') }}"><i class="icon-stats-dots"></i><span data-i18n="nav.starter_kit.main" class="menu-title">Informe de entregas</span></a>
        </li>
        <li class=" nav-item"><a href="{{ route('repventas') }}"><i class="icon-stats-dots"></i><span data-i18n="nav.starter_kit.main" class="menu-title">Informe de documentos</span></a>
        </li>
        @endpermission
        
      @endpermission
      <!-- Configuración -->
      @permission(["empresa_all","config_all"])
        <li class=" navigation-header"><span data-i18n="nav.category.general">Configuración</span><i data-toggle="tooltip" data-placement="right" data-original-title="General" class="icon-ellipsis icon-ellipsis"></i>
        </li>

        @permission("user_all")
        <li class=" nav-item"><a href="#"><i class="icon-users3"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Usuarios de sistema</span></a>
          <ul class="menu-content">
            <li><a data-modal="byUrl" href="{{ route("administradores.create") }}" data-i18n="nav.page_layouts.1_column" class="menu-item">Nuevo</a>
            </li>
            <li><a href="{{ route("administradores.index") }}" data-i18n="nav.page_layouts.2_columns" class="menu-item">Lista</a>
            </li>
          </ul>
        </li>
        @endpermission
        @permission("config_all")
        <li class=" nav-item"><a href="{{ url("admin/roles") }}"><i class="icon-toggle-on"></i><span data-i18n="nav.starter_kit.main" class="menu-title">Roles y permisos</span></a>
        </li>
        <li class=" nav-item"><a href="#"><i class="icon-industry"></i><span data-i18n="nav.page_layouts.main" class="menu-title">Sistema</span></a>
          <ul class="menu-content">
            <li>
            <a data-modal="byUrl" href="{{ url("admin/sistema/imagenes") }}" data-i18n="nav.page_layouts.1_column" class="menu-item">Testimonios</a>
            </li>
            <li><a data-modal="byUrl" href="{{ url("admin/sistema/onof") }}" data-i18n="nav.page_layouts.1_column" class="menu-item">Países</a>
            </li>
            <li>
              <a href="" title=""></a>
            </li>
          </ul>
        </li>
        @endpermission
      @endpermission
    </ul>
  </div>
  <!-- /main menu content-->
</div>
