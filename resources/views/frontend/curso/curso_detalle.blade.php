@extends("frontend.template.v1.layout")

<?php
$logo="bn";
$white_menu = true;
$color_menu = $curso->cur_color;
$nav_tabs = true;
?>

@section('menu_vars')
style="background:{{ $color_menu }}"
@endsection

@section('menu_add')
<div class="nav-tabs">
  <div class="container-fluid">
     <div class="row">
         <div class="color blanco tiene-sombra nav-sombra" style="background-color: {{ $color_menu }}">
           <div class="col s12 l6 offset-l3">
              <ul class="tabs" style="background-color: {{ $color_menu }}">
                 <li class="tab col s3"><a data-url="curso" class="{{ ((Request::has("op") && Request::input('op') == "curso") || (Request::has("op") == false)) ? 'active' : '' }} tabs-colorBlanco" href="#curso">Curso</a></li>
                 <li class="tab col s3"><a data-url="comentarios" class="{{ Request::has("op") && Request::input('op') == "comentarios" ? 'active' : '' }} tabs-colorBlanco" href="#comentarios">Comentarios</a></li>
                 <li class="tab col s3 disabled"><a data-url="recursos" class="{{ Request::has("op") && Request::input('op') == "recursos" ? 'active' : '' }} tabs-colorBlanco" href="#test3">Recursos</a></li>
             </ul>
         </div>
     </div>
 </div>
</div>
</div>
@endsection

@section('main')
<div class="container-fluid" style="margin-top: 48px;">
    <div class="row">
        <div id="curso" class="col s12 no-padding">
            <nav class="grey lighten-3 black-text hide-on-small-only">
                <div class="nav-wrapper">
                    <div class="container">
                        <div class="col s12">
                            <a href="#!" class="breadcrumb">Cursania</a>
                            <a href="#!" class="breadcrumb">Cursos</a>
                            <a href="#!" class="breadcrumb">{{ $curso->cur_nombre }}</a>
                        </div>
                    </div>
                </div>
            </nav>
            <section class="cursoItem">
                <div class="container">
                    <div class="row">
                        <div class="col l8 s12 m7">
                            <div class="seccion1">
                                <div class="titulo">
                                    <h2>{{ $curso->cur_nombre }}</h2>
                                    <p class="truncate">{{ $curso->cur_slogan }}</p>
                                </div>
                                <div class="video-container">
                                    @if ($curso->en_preventa)
                                      <div class="pre-container">
                                        <div class="pre-tiempo">
                                          <div class="pre-texto">
                                            <h3>Proximamente</h3>
                                            <p>Este curso estará listo en</p>
                                          </div>
                                          <div class="pre-contador">
                                            <ul id="tiempo_restante"></ul>
                                          </div>
                                          <div class="pre-cta">
                                            <a class="cta-btn slow-scroll waves-effect waves-light mt-10" href="#detallecurso">Ver detalles</a>
                                          </div>
                                        </div>
                                        <img src="{{ url("imagenes/".$curso->cur_portada) }}" class="responsive-img pre-img" alt="{{ $curso->cur_nombre }}">
                                      </div>
                                    @else
                                      <iframe src="https://player.vimeo.com/video/{{ $curso->temas->first()->lecciones->first()->lec_ruta_video }}" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                    @endif
                                </div>
                                <div id="detallecurso"></div>
                                {!! $curso->cur_descripcion !!}
                                @if (!$curso->en_preventa)
                                  <h3 class="Subtitulos">Contenido del Curso</h3>
                                  <ul class="collapsible" data-collapsible="accordion">
                                    @forelse ($curso->temas as $tema)
                                      <li>
                                          <div class="collapsible-header titulo-listado active">{{ $tema->tema_nombre }}</div>
                                          <div class="collapsible-body">
                                              <span>{{ $tema->tema_descripcion }}</span>
                                              <ul class="listado">
                                                  @forelse ($tema->lecciones as $lec)
                                                    <li><i class="material-icons">play_circle_outline</i><a href=""> {{ $lec->lec_nombre }}</a></li>
                                                  @empty
                                                  @endforelse
                                              </ul>
                                          </div>
                                      </li>
                                    @empty
                                    @endforelse
                                  </ul>
                                @endif
                                <br>
                                <hr>
                            <div class="row">
                              <div class="col l6 m6 hide-on-med-and-down">
                                  <br>
                                  @if ($curso->en_preventa)
                                    <a class="waves-effect waves-light btn light-blue darken-2 botom-precio">Notificarme</a><br>
                                  @else
                                    <a class="waves-effect waves-light btn light-blue darken-2 botom-precio">{{ $curso->cur_gratuito == 1 ? 'Tomar' : 'Comprar' }} curso | <span class="soles">@if($curso->cur_gratuito == 1) Gratis @else {!! formatMon($curso->cur_precio) !!} @endif</span></a>
                                  @endif
                              </div>
                              <div class="col l6 m6 hide-on-med-and-down right-align" style="position: relative; margin-top: 12px;">
                                  <span class="compartir">Compartir:</span>
                                  <ul class="social">
                                      <li><a href="" class="ease-all twitter"><i class="fa fa-twitter"></i></a></li>
                                      <li><a href="" class="ease-all facebook"><i class="fa fa-facebook"></i></a></li>
                                      <li><a href="" class="ease-all instagram"><i class="fa fa-github-alt"></i></a></li>
                                      <li><a href="" class="ease-all youtube"><i class="fa fa-google-plus"></i></a></li>
                                  </ul>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="col l4 s12 m5">
                        <div class="seccion2">
                                <div class="bn-botom hide-on-med-and-up center">
                                    <a class="waves-effect waves-light btn light-blue darken-2 botom-precio">{{ $curso->cur_gratuito == 1 ? 'Tomar' : 'Comprar' }} curso | <span class="soles">@if($curso->cur_gratuito == 1) Gratis @else {!! formatMon($curso->cur_precio) !!} @endif</span></a>
                                </div>
                                <div class="suscripcion-botones center hide-on-small-only">
                                    @if ($curso->en_preventa)
                                      <a class="waves-effect waves-light btn light-blue darken-2 botom-precio">Notificarme</a><br>
                                      <span class="raya">o</span><br>
                                      <a href="?op=comentarios&ac=sm">Hacer un comentario</a>
                                    @else
                                      <a class="waves-effect waves-light btn light-blue darken-2 botom-precio">{{ $curso->cur_gratuito == 1 ? 'Tomar' : 'Comprar' }} curso | <span class="soles">@if($curso->cur_gratuito == 1) Gratis @else {!! formatMon($curso->cur_precio) !!} @endif</span></a><br>
                                      <span class="raya">o</span><br>
                                      <a href="">Obtener Suscripción</a>
                                    @endif
                                </div>
                                <ul class="categoria col l12 s12 m12">
                                    @if ($curso->en_preventa)
                                      <li>
                                          <i class="flaticon-diamond icono"></i>
                                          <span class="letra">Fecha prevista </span>
                                          <a href="">{{ date("d/m/Y",strtotime($curso->pre_fecha)) }}</a>
                                      </li>
                                    @endif
                                    <li>
                                        <i class="flaticon-diamond icono"></i>
                                        <span class="letra">{{ $curso->en_preventa ? 'Promedio de duración':'Duración' }}</span>
                                        <a href="">{{ $curso->cur_duracion }} Horas</a>
                                    </li>
                                    <li>
                                        <i class="flaticon-diamond icono"></i>
                                        <span class="letra">Categoría </span>
                                        <a href="">{{ $curso->categoria->cat_nombre }}</a>
                                    </li>
                                    <li>
                                        <i class="flaticon-diamond icono"></i>
                                        <span class="letra">Tipo </span>
                                        <a href="">{{ $curso->cur_gratuito == 1 ? 'Gratuito' : 'Premium' }}</a>
                                    </li>
                                    <li>
                                        <i class="flaticon-diamond icono"></i>
                                        <span class="letra">{{ $curso->en_preventa ? 'Promedio de lecciones':'Lecciones' }}</span>
                                        <a href="">{{ $curso->en_preventa ? $curso->pre_videos : cantLecciones($curso) }}</a>
                                    </li>
                                    @if(!$curso->en_preventa)
                                      <li>
                                          <i class="flaticon-diamond icono"></i>
                                          <span class="letra">Usuarios</span>
                                          <a href="">20</a>
                                      </li>
                                    @endif
                                </ul>
                                <div class="tutor col l12 s12 m12">
                                    <div class="titulo-border">
                                        <h3>Tutor</h3>
                                    </div>
                                    <div class="col l4 m4 s4">
                                        <img src="{{ url('imagenes/'.$curso->profesor->prof_foto) }}" class="circle responsive-img" alt="Tutor">
                                    </div>
                                    <div class="col l8 m8 s8">
                                        <h5>{{ $curso->profesor->prof_nombre }}</h5>
                                        <span>{{ $curso->profesor->prof_ocupacion }}</span>
                                        <!--<a class="waves-effect waves-light btn btn-transparente">Contactar <i class="fa fa-envelope"></i></a>-->
                                    </div>
                                </div>
                                <div class="relacionados col l12 s12">
                                    <div class="titulo-border">
                                        <h3>Cursos Relacionados</h3>   </div>
                                    @forelse ($relcursos as $rc)
                                        <div class="relacionados-content">
                                            <a href="{{ url("curso/".$rc->cur_url) }}">
                                            <div class="imagen" style="background-image: url({{ url('imagenes/'.$rc->cur_icono) }});"></div></a>
                                            <div class="descrip">
                                                <a href="{{ url("curso/".$rc->cur_url) }}"><h4>{{ $rc->cur_nombre }}</h4></a>
                                                <p >{{ $rc->cur_slogan }}</p>
                                                <span>Tutor: <a href="">{{ $rc->profesor->prof_nombre }}</a></span>
                                            </div>
                                        </div>
                                        <br>
                                    @empty
                                    @endforelse


                                    <div class="calificacion">
                                        <div class="titulo-border">
                                            <h3>Calificación</h3>
                                        </div>
                                        <div class="puntaje">
                                            <h3 class="puntaje-numero">4.5</h3>
                                            <div class="puntaje-estrellitas">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                                <span>5 Comentarios</span>
                                            </div>
                                        </div>
                                        <a class="waves-effect waves-light light-blue darken-2 btn modal-trigger botom-precio" href="#modal1"><i class="mdi-action-question-answer right"></i>Comentar ahora</a>
                                    </div>
                                </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
  </div>
  <div id="comentarios" class="col s12 no-padding">
    <section class="comentarios">
        <div class="container">
          <div class="row">
              <div class="col  @if(count($comentarios)) l9 @else l8 offset-l2 @endif">
              @include("frontend.template.v1.comentarios.comsys",["tipo"=>"curso","cont_id"=>$curso->cur_id,"cont_url"=>$curso->cur_url])
              </div>
              @if(count($comentarios))
              <div class="col l3">
                  <div class="puntaje">
                      <h3 class="puntaje-numero">4.5</h3>
                      <div class="puntaje-estrellitas">
                          <i class="fa fa-star" aria-hidden="true"></i>
                          <i class="fa fa-star" aria-hidden="true"></i>
                          <i class="fa fa-star" aria-hidden="true"></i>
                          <i class="fa fa-star" aria-hidden="true"></i>
                          <i class="fa fa-star-o" aria-hidden="true"></i>
                          <span>5 Comentarios</span>
                      </div>
                  </div>
                  <a class="waves-effect waves-light btn  light-blue darken-2 modal-trigger" id="btn_comentario" data-modal="true" data-href="{{ url('comentario/formulario',["tipo"=>'curso',"cont_id"=>$curso->cur_id,"cont_url"=>$curso->cur_url]) }}" href="#mainModal"><i class="mdi-action-question-answer right"></i>Comentar ahora</a>
              </div>
             @endif
          </div>
        </div>
    </section>
</div>
<div id="test3" class="col s12 no-padding">
  <!-- Recursos -->
</div>
</div>
</div>
@endsection

@section('script')
  @if ($curso->en_preventa)
    <script type="text/javascript">
      $('#tiempo_restante').countdown('{{ date("Y/m/d",strtotime($curso->pre_fecha)) }}', function(event) {
        var $this = $(this).html(event.strftime(''
          + '<li><h3>%D</h3><span>Días</span></li>'
          + '<li><h3>%H</h3><span>Horas</span></li>'
          + '<li><h3>%M</h3><span>Minutos</span></li>'
          + '<li><h3>%S</h3><span>Segundos</span></li>'));
      });
    </script>
  @endif
  @if(Request::has("op") && Request::input("op") == "comentarios")
    @if(Request::has("ac")  && Request::input("ac") == "sm")
      <script type="text/javascript">
        $(document).ready(function() {
          $('#btn_comentario').trigger('click');
        });
      </script>
    @endif
  @endif
@endsection
