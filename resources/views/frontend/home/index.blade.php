@extends("frontend.template.v1.layout")

<?php
$tiene_sombra = true;
?>

@section('main')
        <!-- START WRAPPER -->
        <div class="wrapper">
            @include("frontend.template.v1.partials.slider")
            <section class="porqueCursania">
                <div class="container">
                    <div class="row" style="margin-bottom: 0">
                        <div class="col l6 hide-on-med-and-down">
                            <img src="/frontend/img/porqueCursania.png" class="responsive-img" alt="">
                        </div>
                        <div class="col l5 m8 offset-m2 s10 offset-s1">
                            <div class="titulo">
                                <h2>¿Porqué <span>Cursania?</span></h2>
                            </div>
                            <div class="porqueCursania-contenido">
                                <p class="parrafo">Tenemos materiales de mucha utilidad preparados en videos de alta calidad. Cada curso esta trabajado a medida por nosotros, siempre pensando en que estos mejoren tus habilidades.</p>
                                <ul>
                                    <li>
                                        <img src="/frontend/img/icono/icon-diamante.svg" alt="">
                                        <div class="item">
                                            <h3>Premium o Pago único</h3>
                                            <p>En Cursania pordrás obtener un solo curso para toda la vida o tambien podras acceder a todos comprando una suscripción.</p>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="/frontend/img/icono/icon-computadora.svg" alt="">
                                        <div class="item">
                                            <h3>Tecnologías actuales</h3>
                                            <p>Tendremos siempre actualizada nuestra biblioteca de cursos con las tecnologías al día de hoy.</p>
                                        </div>
                                    </li>
                                    <li class="center">
                                        <a class="waves-effect waves-light btn btn-celeste">OBTEN UN PLAN</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col m8 offset-m2 s12 hide-on-large-only">
                            <img src="/frontend/img/porqueCursania.png" class="responsive-img" alt="">
                        </div>
                    </div>
                </div>
            </section>
            <!-- START CONTENT -->
            <section id="content" class="cursos">
                <!--start container-->
                <div class="container">
                 <!--card widgets start-->
                    <div id="card-widgets">
                        <div class="row">
                           <div class="col l12 s12 m12">
                               <div class="titulo">
                                   <h2>Cursos <span>Populares</span></h2>
                                   <div class="hr"></div>
                                   <p>Conoce nuestros cursos más solicitados</p>
                               </div>
                           </div>
                            <!-- product-card -->
                            <!-- owl Carousel -->
                            <div id="owl-demo" class="owl-carousel owl-theme product-card">
                              @forelse ($cursos as $objCurso)
                                <div class="item">
                                    @include("frontend.template.v1.curso.item_curso",["curso"=>$objCurso])
                                </div>
                              @empty
                              @endforelse
                           </div>
                        </div>
                    </div>
                    <!--card widgets end-->
                </div>
                <!--end container-->
            </section>
            <!-- END CONTENT -->
            <!--STAR METAS -->
            <section class="metas">
                <div class="container">
                    <div class="row">
                        <div class="col l9 s12 m8">
                           <div class="metas-img">
                               <img src="/frontend/img/home_nino.svg" class="responsive-img ninoEstudiando" alt="">
                           </div>
                            <div class="metas-contenido">
                                <h3>Tú pones tus metas</h3>
                                <p>Aprende con los mejores cursos de programación en español.</p>
                            </div>
                        </div>
                        <div class="col l3 s12 m4">
                            <div class="metas-boton">
                                <a class="waves-effect waves-light btn btn-celeste">Crear mi cuenta</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END METAS -->

            <!-- STAR SUSCRIPCION -->
            {{--<section class="suscripcion">
                <div class="container">
                    <div class="row">
                        <div class="col l12 s12 m12 center">
                            <div class="titulo">
                                <h2>Planes de <span>Suscripción</span></h2>
                                <p>Con un solo pago accede a todos los contenidos <br>en cualquier momento, por el tiempo que decidas.</p>
                            </div>
                        </div>
                        <div class="col l12 center">
                            <div class="card-panel precio">
                                <div class="precio-top center">
                                    <h3>Mensual</h3>
                                    <div class="numero">
                                        <span><sup>S/</sup>30</span>
                                    </div>
                                </div>
                                <div class="precio-bottom">
                                    <ul class="item">
                                        <li><span class="puntos"></span> Acceso  a todos los videos 24/7 </li>
                                        <li><span class="puntos"></span> Soporte de los tutores </li>
                                        <li><span class="puntos"></span> Descarga los materiales de los cursos </li>
                                    </ul>
                                </div>
                                <div class="boton center">
                                    <a class="waves-effect waves-light btn btn-celeste">Obtener</a>
                                </div>
                            </div>
                             <div class="card-panel precio">
                                <div class="precio-top center">
                                    <h3>Anual</h3>
                                    <div class="numero">
                                        <span><sup>S/</sup>299</span>
                                    </div>
                                </div>
                                <div class="precio-bottom">
                                    <ul class="item">
                                        <li><span class="puntos"></span> Acceso  a todos los videos 24/7 </li>
                                        <li><span class="puntos"></span> Soporte de los tutores </li>
                                        <li><span class="puntos"></span> Descarga los materiales de los cursos </li>
                                        <li><span class="puntos"></span> Descarga los materiales de los cursos </li>
                                    </ul>
                                </div>
                                <div class="boton center">
                                    <a class="waves-effect waves-light btn btn-celeste">Obtener</a>
                                </div>
                            </div>
                            <div class="card-panel precio">
                                <div class="precio-top center">
                                    <h3>Semestral</h3>
                                    <div class="numero">
                                        <span><sup>S/</sup>150</span>
                                    </div>
                                </div>
                                <div class="precio-bottom">
                                    <ul class="item">
                                        <li><span class="puntos"></span> Acceso  a todos los videos 24/7 </li>
                                        <li><span class="puntos"></span> Soporte de los tutores </li>
                                        <li><span class="puntos"></span> Descarga los materiales de los cursos </li>
                                    </ul>
                                </div>
                                <div class="boton center">
                                    <a class="waves-effect waves-light btn btn-celeste">Obtener</a>
                                </div>
                            </div>
                        </div>
                        <div class="col l12 s12 m12 center">
                            <div class="mas-info">
                                <a href="" class="animated infinite pulse">Quiero más información </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>--}}
            <!-- END SUSCRIPCION -->

            <!-- STAR POST -->
            <section class="post">
                <div class="container">
                    <div class="row">
                        <div class="col l12 s12 m12">
                            <div class="titulo">
                                <h2>Post más <span>Vistos</span></h2>
                                <div class="hr"></div>
                            </div>
                        </div>
                        <!-- product-card -->
                            <!-- owl Carousel -->
                            <div id="owl-demo" class="owl-carousel1 owl-theme product-card">
                                    @forelse ($post as $objPost)
                                        <div class="item">
                                            @include("frontend.template.v1.post.item_post",["post"=>$objPost])
                                        </div>
                                    @empty
                                    @endforelse
                            </div>
                    </div>
                </div>
            </section>
            <section class="testimonios">
                <div class="container">
                    <div class="row">
                        <div class="col l12 center">
                            <div class="titulo">
                                <h2><span>Testimonios</span></h2>
                                <p>¿Qué opinan nuestros usuarios de la plataforma?</p>
                            </div>
                        </div>
                        <div class="col l5 offset-l1">
                            <div class="card-panel">
                                <div class="items">
                                    <img src="/frontend/img/img-circle.jpeg" class="circle responsive-img " alt="Contact Person">
                                    <div class="nombre">
                                        <h4>Cesar Mejia</h4>
                                        <span>Suscriptor</span>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores optio quas numquam esse hic repudiandae quo rerum rem vel fugit. Molestiae et ducimus, praesentium? Obcaecati omnis, quos cumque eos magni?</p>
                                </div>
                            </div>
                        </div>
                        <div class="col l5 ">
                            <div class="card-panel">
                                <div class="items">
                                    <img src="/frontend/img/img-circle.jpeg" class="circle responsive-img " alt="Contact Person">
                                    <div class="nombre">
                                        <h4>Cesar Mejia</h4>
                                        <span>Suscriptor</span>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores optio quas numquam esse hic repudiandae quo rerum rem vel fugit. Molestiae et ducimus, praesentium? Obcaecati omnis, quos cumque eos magni?</p>
                                </div>
                            </div>
                        </div>
                        <div class="col l5 offset-l1">
                            <div class="card-panel">
                                <div class="items">
                                    <img src="/frontend/img/img-circle.jpeg" class="circle responsive-img " alt="Contact Person">
                                    <div class="nombre">
                                        <h4>Cesar Mejia</h4>
                                        <span>Suscriptor</span>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores optio quas numquam esse hic repudiandae quo rerum rem vel fugit. Molestiae et ducimus, praesentium? Obcaecati omnis, quos cumque eos magni?</p>
                                </div>
                            </div>
                        </div>
                        <div class="col l5 ">
                            <div class="card-panel">
                                <div class="items">
                                    <img src="/frontend/img/img-circle.jpeg" class="circle responsive-img " alt="Contact Person">
                                    <div class="nombre">
                                        <h4>Cesar Mejia</h4>
                                        <span>Suscriptor</span>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores optio quas numquam esse hic repudiandae quo rerum rem vel fugit. Molestiae et ducimus, praesentium? Obcaecati omnis, quos cumque eos magni?</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- ////////////////////// -->
            <!-- START RIGHT SIDEBAR NAV-->
            <aside id="right-sidebar-nav">
                <ul id="chat-out" class="side-nav rightside-navigation">
                    <li class="li-hover">
                    <a href="#" data-activates="chat-out" class="chat-close-collapse right"><i class="mdi-navigation-close"></i></a>
                    <div id="right-search" class="row">
                        <form class="col s12">
                            <div class="input-field">
                                <i class="mdi-action-search prefix"></i>
                                <input id="icon_prefix" type="text" class="validate">
                                <label for="icon_prefix">Buscador</label>
                            </div>
                        </form>
                    </div>
                    </li>
                    <li class="li-hover">
                        <ul class="chat-collapsible" data-collapsible="expandable">
                        <li>
                            <div class="collapsible-header teal white-text active"><i class="mdi-social-whatshot"></i>Recent Activity</div>
                            <div class="collapsible-body recent-activity">
                                <div class="recent-activity-list chat-out-list row">
                                    <div class="col s3 recent-activity-list-icon"><i class="mdi-action-add-shopping-cart"></i>
                                    </div>
                                    <div class="col s9 recent-activity-list-text">
                                        <a href="#">just now</a>
                                        <p>Jim Doe Purchased new equipments for zonal office.</p>
                                    </div>
                                </div>
                                <div class="recent-activity-list chat-out-list row">
                                    <div class="col s3 recent-activity-list-icon"><i class="mdi-device-airplanemode-on"></i>
                                    </div>
                                    <div class="col s9 recent-activity-list-text">
                                        <a href="#">Yesterday</a>
                                        <p>Your Next flight for USA will be on 15th August 2015.</p>
                                    </div>
                                </div>
                                <div class="recent-activity-list chat-out-list row">
                                    <div class="col s3 recent-activity-list-icon"><i class="mdi-action-settings-voice"></i>
                                    </div>
                                    <div class="col s9 recent-activity-list-text">
                                        <a href="#">5 Days Ago</a>
                                        <p>Natalya Parker Send you a voice mail for next conference.</p>
                                    </div>
                                </div>
                                <div class="recent-activity-list chat-out-list row">
                                    <div class="col s3 recent-activity-list-icon"><i class="mdi-action-store"></i>
                                    </div>
                                    <div class="col s9 recent-activity-list-text">
                                        <a href="#">Last Week</a>
                                        <p>Jessy Jay open a new store at S.G Road.</p>
                                    </div>
                                </div>
                                <div class="recent-activity-list chat-out-list row">
                                    <div class="col s3 recent-activity-list-icon"><i class="mdi-action-settings-voice"></i>
                                    </div>
                                    <div class="col s9 recent-activity-list-text">
                                        <a href="#">5 Days Ago</a>
                                        <p>Natalya Parker Send you a voice mail for next conference.</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header light-blue white-text active"><i class="mdi-editor-attach-money"></i>Sales Repoart</div>
                            <div class="collapsible-body sales-repoart">
                                <div class="sales-repoart-list  chat-out-list row">
                                    <div class="col s8">Target Salse</div>
                                    <div class="col s4"><span id="sales-line-1"></span>
                                    </div>
                                </div>
                                <div class="sales-repoart-list chat-out-list row">
                                    <div class="col s8">Payment Due</div>
                                    <div class="col s4"><span id="sales-bar-1"></span>
                                    </div>
                                </div>
                                <div class="sales-repoart-list chat-out-list row">
                                    <div class="col s8">Total Delivery</div>
                                    <div class="col s4"><span id="sales-line-2"></span>
                                    </div>
                                </div>
                                <div class="sales-repoart-list chat-out-list row">
                                    <div class="col s8">Total Progress</div>
                                    <div class="col s4"><span id="sales-bar-2"></span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="collapsible-header red white-text"><i class="mdi-action-stars"></i>Favorite Associates</div>
                            <div class="collapsible-body favorite-associates">
                                <div class="favorite-associate-list chat-out-list row">
                                    <div class="col s4"><img src="/frontend/img/avatar.jpg" alt="" class="circle responsive-img online-user valign profile-image">
                                    </div>
                                    <div class="col s8">
                                        <p>Eileen Sideways</p>
                                        <p class="place">Los Angeles, CA</p>
                                    </div>
                                </div>
                                <div class="favorite-associate-list chat-out-list row">
                                    <div class="col s4"><img src="/frontend/img/avatar.jpg" alt="" class="circle responsive-img online-user valign profile-image">
                                    </div>
                                    <div class="col s8">
                                        <p>Zaham Sindil</p>
                                        <p class="place">San Francisco, CA</p>
                                    </div>
                                </div>
                                <div class="favorite-associate-list chat-out-list row">
                                    <div class="col s4"><img src="/frontend/img/avatar.jpg" alt="" class="circle responsive-img offline-user valign profile-image">
                                    </div>
                                    <div class="col s8">
                                        <p>Renov Leongal</p>
                                        <p class="place">Cebu City, Philippines</p>
                                    </div>
                                </div>
                                <div class="favorite-associate-list chat-out-list row">
                                    <div class="col s4"><img src="/frontend/img/avatar.jpg" alt="" class="circle responsive-img online-user valign profile-image">
                                    </div>
                                    <div class="col s8">
                                        <p>Weno Carasbong</p>
                                        <p>Tokyo, Japan</p>
                                    </div>
                                </div>
                                <div class="favorite-associate-list chat-out-list row">
                                    <div class="col s4"><img src="/frontend/img/avatar.jpg" alt="" class="circle responsive-img offline-user valign profile-image">
                                    </div>
                                    <div class="col s8">
                                        <p>Nusja Nawancali</p>
                                        <p class="place">Bangkok, Thailand</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        </ul>
                    </li>
                </ul>
            </aside>
            <!-- LEFT RIGHT SIDEBAR NAV-->

        </div>
        <!-- END WRAPPER -->
@endsection

@section('script')
    <!-- slider-->
    <script src="/frontend/slider-responsive/js/jquery.easing-1.3.pack.js"></script>
    <script src="/frontend/slider-responsive/js/jquery.mobile.just-touch.js"></script>
    <script src="/frontend/slider-responsive/js/mightyslider.min.js"></script>
    <script src="/frontend/slider-responsive/js/retina.js" type="text/javascript"></script>
    <script src="/frontend/slider-responsive/js/jquery.stellar.js" type="text/javascript"></script>
    <script src="/frontend/slider-responsive/js/tweenlite.js" type="text/javascript"></script>
    <script src="/frontend/js/index.init.js" type="text/javascript"></script>
@endsection
