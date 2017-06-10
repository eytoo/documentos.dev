<!-- Modal Iniciar Sección-->
<div id="mRegistro" class="modal modales">
    <div class="modal-content">
        <div class="iniciarSesion center">
            <h4>Crea tu cuenta</h4>
            <p>Y obten acceso a todos nuestros contenidos gratuitos</p>
        </div>
        <div class="row">
            <form method="post" action="{{ url('auth/doregister') }}" class="col s12 formulario form-send">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="input-field col s12">
                        <input required class="hasFocus" id="nombre" name="nombre" type="text">
                        <label for="nombre" class="active">Nombres</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-field col s12">
                        <input required id="email" name="email" type="email">
                        <label for="email" class="active">Email</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-field col s12">
                        <input required id="contrasena" name="password" type="password">
                        <label for="contrasena">Contraseña</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <button class="btn light-blue darken-2 waves-effect waves-light right" type="submit" name="action">Crear cuenta
                        </button>
                    </div>
                    <div class="input-field col s6">
                        <a class="left link modal-trigger" data-hidemodal="#mRegistro" href="#mLogin">Ya tengo una</a>
                    </div>
                    <div class="input-field col s12 center">
                        <a href="">Olvide mi contraseña</a> <br>
                        <hr>
                        <span>Crealo con tu Red Social</span> <br><br>
                        <a href="#" class="waves-effect waves-light btn indigo darken-3">Facebook</a>
                        <a href="#" class="waves-effect waves-light btn red darken-4">Google +</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
