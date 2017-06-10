
    <!-- START HEADER -->
    <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="navbar-color {{ isset($tiene_sombra) && $tiene_sombra == true ? 'tiene-sombra' : '' }} navegador {{isset($white_menu) ? 'nav-fondo-color':''}}  {{ isset($sombra_cero) ? 'nav-sombra' : '' }}" @yield("menu_vars")>
                <div class="nav-wrapper">
                    <ul class="left">
                      <li><h1 class="logo-wrapper"><a href="{{ url('/') }}" class="brand-logo darken-1"><img src="{{ isset($logo) && $logo == 'bn' ? "/public/frontend/img/logo-bn.svg" : "/public/frontend/img/logo.svg" }}" alt="Cursania logo"></a> <span class="logo-text">Cursania</span></h1></li>
                    </ul>
                    <div class="header-search-wrapper hide-on-med-and-down buscadorContent">
                        <i class="mdi-action-search icono-buscador {{ isset($white_menu)?'blanco':'plomo' }}"></i>
                        <input type="text" name="Search" class="header-search-input z-depth-2  {{ isset($white_menu) ? 'buscadorBlanco' : 'buscadorPlomo'}}" placeholder="Busca lo que quieres aprender"/>
                    </div>
                    <ul class="right hide-on-med-and-down" style="margin-right:13px;">
                        @if (Auth::guard("client")->check())
                          <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen"><i class="mdi-action-settings-overscan"></i></a>
                          </li>
                          <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light notification-button" data-activates="notifications-dropdown"><i class="mdi-social-notifications"><small class="notification-badge">5</small></i>

                          </a>
                          </li>
                          {{-- data-activates="chat-out" --}}
                          <li><a href="#"  class="waves-effect waves-block waves-light chat-collapse"><i class="mdi-communication-chat"></i></a>
                          </li>
                        @else
                          <li><a class="modal-trigger {{ isset($white_menu) ? 'white-text' : '' }}" href="#mLogin">INICIAR SESIÓN</a>
                          </li>
                          <li><a class="waves-effect waves-light btn {{ isset($white_menu) ? 'btn-transparente' : 'btn-celeste' }} modal-trigger" href="#mRegistro">CREA TU CUENTA</a></i>

                          </a>
                          </li>
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
        <!-- end header nav-->
    </header>
    <!-- END HEADER -->
