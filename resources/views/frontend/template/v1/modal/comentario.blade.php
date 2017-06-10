<script type="text/javascript" src="/frontend/plugins/stars/stars.js"></script>
<script>
  $(document).ready(function() {
    formSend();
    //$('.moadl-content').animateCss('bounce');
  });
</script>
<div class="modal-content animated fadeInDown">
    <div class="iniciarSesion center">
        @if (isset($com))
          <h4>Responder a {{ $com->user->user_nombre }}</h4>
          <p>Escribe a continuación tu respuesta</p>
        @else
          <h4>Hacer un comentario</h4>
          <p>Deja una opinion o reseña sobre el curso</p>
        @endif
    </div>
    <div class="row">
        <form data-modalid="#mainModal" class="col s12 formulario form-send" @if(Auth::guard("client")->check()) method="post" action="{{ url('comentario/public') }}"  @else method="get" action="{{ url('comentario/publicar') }}" @endif>
            <input type="hidden" name="tipo" value="{{ $tipo }}">
            <input type="hidden" name="cont_id" value="{{ $cont_id }}">
            <input type="hidden" name="cont_url" value="{{ $cont_url }}">
            <input type="hidden" name="calificacion" value="0">
            @if(isset($com))
              <input type="hidden" name="com_id" value="{{ $com->com_id }}">
            @endif
            {{ csrf_field() }}
            <div class="form-group">
                <div class="input-field col s12">
                    <textarea class="materialize-textarea hasFocus" required name="descripcion" id="mensaje" name="mensaje"></textarea>
                    <label for="mensaje" class="active">Mensaje</label>
                </div>
            </div>
            @if(!isset($com))
              <div class="form-group">
                  <div class="col s12">
                      <label>Calificación</label>
                      <div id="hearts" class="starrr"></div>
                  </div>
              </div>
            @endif
            <div class="form-group">
                <div class="input-field col s12">
                    <button class="btn light-blue darken-2 waves-effect waves-light left" type="submit" name="action">Enviar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
