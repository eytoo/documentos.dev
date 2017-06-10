 @extends("frontend.template.v1.layout")

<?php
$tiene_sombra = true;
$sombra_cero = true;
?>

@section('estilos')
  <link rel="stylesheet" type="text/css" href="/public/admin/robust-assets/css/plugins/editors/quill/monokai-sublime.min.css">
  <link rel="stylesheet" type="text/css" href="/public/frontend/css/custom/quill.snow.custom.css">
@endsection

@section('main')
<div class="container-fluid">
    <div class="row">
        <div id="test1" class="col s12 no-padding">
            <nav class="grey lighten-3 black-text hide-on-small-only">
                <div class="nav-wrapper">
                    <div class="container">
                        <div class="col s12">
                            <a href="#!" class="breadcrumb">Cursania</a>
                            <a href="#!" class="breadcrumb">Blog</a>
                            <a href="#!" class="breadcrumb">{{ $post->post_nombre }}</a>
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
                                    <h2>{{ $post->post_nombre }}</h2>
                                    <p class="truncate">{{ $post->post_resumen }}</p>
                                </div>
                                <div class="video-container">
                                    <img class="responsive-img" src="{{ url("imagenes/".$post->post_imagen) }}" alt="{{ $post->post_nombre }}">
                                </div>
                                <div class="ql-snow">
                                    <div class="ql-editor">
                                        {!! $post->post_cuerpo !!}
                                    </div>
                                </div>
                                <hr>
                            <div class="row" id="comentarios">
                              <div class="col l6 m6 hide-on-med-and-down">
                                  <br>
                                  <a class="waves-effect waves-light btn light-blue darken-2 botom-precio modal-trigger" data-modal="true" data-href="{{ url('comentario/formulario',["tipo"=>'post',"cont_id"=>$post->post_id,"cont_url"=>$post->post_url]) }}" href="#mainModal">Comentar <i class="mdi-action-question-answer right"></i></a>
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
                        <div class="comentarios p-15">
                          @include("frontend.template.v1.comentarios.comsys",["tipo"=>"post","cont_id"=>$post->post_id,"cont_url"=>$post->post_url])
                        </div>
                    </div>
                    <div class="col l4 s12 m5">
                        <div class="seccion2" style="margin-top: 120px;">
                                <ul class="categoria col l12 s12 m12">
                                    <li>
                                        <i class="flaticon-diamond icono"></i>
                                        <span class="letra">Fecha </span>
                                        <a href="">{{ date("d/m",strtotime($post->created_at)) }}</a>
                                    </li>
                                    <li>
                                        <i class="flaticon-diamond icono"></i>
                                        <span class="letra">Categoría </span>
                                        <a href="">{{ $post->categoria->pos_cat_nombre }}</a>
                                    </li>
                                    <li>
                                        <i class="flaticon-diamond icono"></i>
                                        <span class="letra">Autor </span>
                                        <a href="">{{ $post->profesor->prof_nombre }}</a>
                                    </li>
                                    <li>
                                        <i class="flaticon-diamond icono"></i>
                                        <span class="letra">Comentarios </span>
                                        <a href=""> 21</a>
                                    </li>
                                    <li>
                                        <i class="flaticon-diamond icono"></i>
                                        <span class="letra">Recursos</span>
                                        <a href="">2</a>
                                    </li>
                                </ul>
                                <div class="tutor col l12 s12 m12">
                                    <div class="titulo-border">
                                        <h3>Tutor</h3>
                                    </div>
                                    <div class="col l4 m4 s4">
                                        <img src="{{ url('imagenes/'.$post->profesor->prof_foto) }}" class="circle responsive-img" alt="Tutor">
                                    </div>
                                    <div class="col l8 m8 s8">
                                        <h5>{{ $post->profesor->prof_nombre }}</h5>
                                        <span>{{ $post->profesor->prof_ocupacion }}</span>
                                        <ul class="social">
                                            <li><a href="" class="ease-all twitter"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="" class="ease-all facebook"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="" class="ease-all instagram"><i class="fa fa-github-alt"></i></a></li>
                                            <li><a href="" class="ease-all youtube"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="relacionados col l12 s12">
                                    <div class="titulo-border">
                                        <h3>Post Relacionados</h3>
                                    </div>
                                    @forelse ($relpost as $rc)
                                        <div class="relacionados-content">
                                            <a href="{{ url("post/".$rc->post_url) }}">
                                            <div style="    height: 100px;
                                            width: 114px;
                                            float: left;
                                            overflow: hidden!important;
                                            background-image: url({{ url('imagenes/'.$rc->post_imagen) }});
                                            background-position: center;
                                            background-size: 220px;
                                            border-radius: 9px;"></div></a>
                                            <div class="descrip">
                                                <a href="{{ url("post/".$rc->post_url) }}"><h4>{{ $rc->post_nombre }}</h4></a>
                                                <p >{{ $rc->post_resumen }}</p>
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
</div>
<!-- Modal Iniciar Sección-->
    <div id="modal1" class="modal modales">
        <div class="modal-content">
            <div class="iniciarSesion center">
                <h4>Iniciar Sesión</h4>
                <p>Ingresa tu E-mail y Contraseña</p>
            </div>
            <div class="row">
                <form class="col s12 formulario">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" type="email">
                            <label for="email" class="active">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="contrasena" type="text">
                            <label for="contrasena" class="">Contraseña</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <button class="btn light-blue darken-2 waves-effect waves-light right" type="submit" name="action">Iniciar Sesión
                            </button>
                        </div>
                        <div class="input-field col s6">
                            <button class="btn light-blue darken-2 waves-effect waves-light left" type="submit" name="action">Crear mi cuenta
                            </button>
                        </div>
                        <div class="input-field col s12 center">
                            <a href="">Olvide mi contraseña</a> <br>
                            <hr>
                            <span>Inicia con tu Red Social</span>
                            <ul class="social">
                                <li><a href="" class="ease-all twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="" class="ease-all facebook"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="" class="ease-all instagram"><i class="fa fa-github-alt"></i></a></li>
                                <li><a href="" class="ease-all youtube"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        @if (Request::has("op") && Request::input("op") == "comentarios")
          window.location.href = "#comentarios";
        @endif
        $(document).ready(function(){
            $('.ql-editor img').materialbox();
        });
    </script>
@endsection
