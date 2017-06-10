            <!-- START LEFT SIDEBAR NAV-->
            <aside id="left-sidebar-nav" class="blancoAside">
                <ul id="slide-out" class="side-nav leftside-navigation {{ isset($nav_tabs) ? 'nav-tabs-aside' : '' }}">
                    @if(Auth::guard("client")->check())
                    <li class="user-details celeste" style="background-image: url('/frontend/images/entre.jpg')">
                        <div class="row">
                            <div class="col col s4 m4 l4">
                                <img src="{{ url('imagenes/'. Auth::guard("client")->user()->user_foto) }}" alt="" class="circle responsive-img valign profile-image">
                            </div>
                            <div class="col col s8 m8 l8">
                                <ul id="profile-dropdown" class="dropdown-content">
                                    <li><a href="#"><i class="mdi-action-face-unlock"></i> Perfil</a>
                                    </li>
                                    <li><a href="#"><i class="mdi-action-settings"></i> Configurar</a>
                                    </li>
                                    <li><a href="#"><i class="mdi-communication-live-help"></i> Ayuda</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li><a href="/auth/logout"><i class="mdi-hardware-keyboard-tab"></i> Salir</a>
                                    </li>
                                </ul>
                                <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">{{ Auth::guard("client")->user()->user_nombre }}<i class="mdi-navigation-arrow-drop-down right"></i></a>
                                <p class="user-roal">Emprendedor</p>
                            </div>
                        </div>
                    </li>
                    @endif
                    <li class="bold"><a href="{{ url('/') }}" class="waves-effect waves-cyan active"><i class="mdi-action-dashboard"></i> Inicio</a>
                </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi mdi-format-list-bulleted"></i> Categorias</a>
                            <div class="collapsible-body" style="padding: 0px">
                                <ul>
                                    @foreach (App\Categoria::all() as $cat)
                                      <li><a href="#">{{ $cat->cat_nombre }}</a>
                                      </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="bold"><a href="#" class="waves-effect waves-cyan"><i class="mdi mdi-library"></i> Cursos </a>
                </li>
                <li class="bold"><a href="#" class="waves-effect waves-cyan"><i class="mdi mdi-cash"></i> Precios <span class="new badge">Pronto</span></a>
                </li>
                <li class="bold"><a href="#" class="waves-effect waves-cyan"><i class="mdi mdi-book-open"></i> Blog &amp; Tutoriales </a>
                </li>
                <li class="bold"><a href="#" class="waves-effect waves-cyan"><i class="mdi mdi-camcorder-box"></i> En vivo <span class="new badge">Pronto</span></a>
                </li>
                <li class="bold"><a href="#" class="waves-effect waves-cyan"><i class="mdi mdi-comment-question-outline"></i> Ayuda </a>
                </li>
                <li class="bold"><a href="#" class="waves-effect waves-cyan"><i class="mdi mdi-cellphone-link"></i> Apps <span class="new badge">Pronto</span></a>
                </li>
                <li class="bold"><a href="#" class="waves-effect waves-cyan"><i class="mdi mdi-city"></i> Cursania </a>
                </li>
                <li class="li-hover"><div class="divider"></div></li>
                <li class="li-hover"><p class="ultra-small margin more-text">MÁS</p></li>
                <li class="bold"><a href="angular-ui.html"><i class="mdi-action-verified-user"></i> Formas de pago </a>
                </li>
                <li class="bold"><a href="#"><i class="mdi mdi-help"></i> FAQ</a>
                </li>
                </ul>
                <a href="#" data-activates="slide-out" class="sin-sombra sidebar-collapse btn-floating btn-medium waves-effect iconNav waves-light"><i class="mdi-navigation-menu {{ isset($white_menu) ? '' : 'iconNav_plomo'}}"></i></a>
            </aside>
            <!-- END LEFT SIDEBAR NAV-->
