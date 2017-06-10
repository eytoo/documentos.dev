@forelse ($comentarios as $com)
  @if ($com->com_parent_id == 0)
    <div class="card-panel">
        <div class="items">
            <img src="{{ url("imagenes/". $com->user->user_foto) }}" class="circle responsive-img " alt="Contact Person">
            <div class="nombre">
                <h4>{{ $com->user->user_nombre }}</h4>
                <span class="fecha-publicacion">{{ getFechaDif($com->created_at) }}</span>
                <br>
            </div>
            <p>{{ $com->com_descripcion }}</p>
            <div class="estrella">
              <a class="modal-trigger" data-modal="true" data-href="{{ url('comentario/formulario',["tipo"=>$tipo,"cont_id"=>$cont_id,"cont_url"=>$cont_url]) }}?com_id={{$com->com_id}}" href="#mainModal">Responder</a>
              @if ($com->com_calificacion > 0)
                <span class="color-plomo">|</span>
                {!! getEstrellas($com->com_calificacion) !!}
              @endif
            </div>
        </div>
        @if (hasComChild($com))
          <hr class="mt-24">
        @endif
        @php
          $icomc = 1;
        @endphp
        @forelse ($comchild as $comc)
          @if ($comc->com_parent_id == $com->com_id)
            <div class="items comentarios2">
                <img src="{{ url("imagenes/". $comc->user->user_foto) }}" class="circle responsive-img " alt="Usuario cursania">
                <div class="nombre">
                    <h4>{{ $comc->user->user_nombre }}</h4>
                    <span class="fecha-publicacion">{{ getFechaDif($comc->created_at) }}</span>
                    <br>
                </div>
                <p>{{ $comc->com_descripcion }}</p>
                <div class="estrella">
                  <a class="modal-trigger" data-modal="true" data-href="{{ url('comentario/formulario',["tipo"=>$tipo,"cont_id"=>$cont_id,"cont_url"=>$cont_url]) }}?com_id={{$com->com_id}}" href="#mainModal">Responder</a>
                </div>
                @if ($icomc != hasComChild($com))
                  <hr class="mt-24">
                @endif
            </div>
            @php
              $icomc++;
            @endphp
          @endif
        @empty
        @endforelse
    </div>
  @endif
@empty
  <div class="card-panel">
      <div class="items center">
          <h3>0 Comentarios</h3>
          <p>Este curso no cuenta con comentarios aún, puedes ser el primero en dejar tu apreción, duda o consulta.</p>
          <a class="waves-effect waves-light btn  light-blue darken-2 modal-trigger" id="btn_comentario" data-modal="true" data-href="{{ url('comentario/formulario',["tipo"=>$tipo,"cont_id"=>$cont_id,"cont_url"=>$cont_url]) }}" href="#mainModal"><i class="mdi-action-question-answer right"></i>Comentar ahora</a>
      </div>
    </div>
@endforelse
        {{--<div class="card-panel">
            <div class="items">
                <img src="img/avatar.jpg" class="circle responsive-img " alt="Contact Person">
                <div class="nombre">
                    <h4>Cesar Mejia</h4>
                    <br>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores optio quas numquam esse hic repudiandae quo rerum rem vel fugit. Molestiae et ducimus, praesentium? Obcaecati omnis, quos cumque eos magni?</p>
                <div class="estrella">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                </div>
            </div>
            <hr>
            <div class="items comentarios2">
                <img src="img/avatar.jpg" class="circle responsive-img " alt="Contact Person">
                <div class="nombre">
                    <h4>Cesar Mejia</h4>
                    <br>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores optio quas numquam esse hic repudiandae quo rerum rem vel fugit. Molestiae et ducimus, praesentium? Obcaecati omnis, quos cumque eos magni?</p>
                <div class="estrella">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                </div>
            </div>
        </div>--}}

{{--<div id="comsys_form" class="modal modales"></div>--}}
