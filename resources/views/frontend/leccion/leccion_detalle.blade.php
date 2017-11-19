@extends("frontend.template.v1.layout")

<?php
$logo="bn";
$white_menu = true;
$color_menu = '#333333';
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

</div>
<div id="comentarios" class="col s12 no-padding">
  {{--<section class="comentarios">
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
  </section>--}}
</div>
<div id="test3" class="col s12 no-padding">
<!-- Recursos -->
</div>
</div>
</div>
@endsection

@section('script')

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
