<!-- Modal Iniciar Sección-->
    <div id="mLogin" class="modal modales">
        <div class="modal-content">
            <div class="iniciarSesion center">
                <h4>Iniciar Sesión</h4>
                <p>Ingresa tu E-mail y Contraseña</p>
            </div>
            <div class="row">
                <form method="post" action="{{ url('auth/dologin') }}" class="col s12 formulario form-send">
                    {{ csrf_field() }}
                    <br>
                    <div class="form-group">
                        <div class="input-field col s12">
                            <input required class="hasFocus" id="login" name="login" type="text">
                            <label for="login" class="active">Usuario o Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input name="password" required id="contrasena" type="password">
                            <label for="contrasena">Contraseña</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <button class="btn light-blue darken-2 waves-effect waves-light right" type="submit" name="action">Iniciar Sesión
                            </button>
                        </div>
                        <div class="input-field col s6">
                            <a class="left link modal-trigger" data-hidemodal="#mLogin" type="submit" name="action" href="#mRegistro">Crear mi cuenta</a>
                        </div>
                        <div class="input-field col s12 center">
                            <a href="">Olvide mi contraseña</a><br>
                            <hr>
                            <span>Inicia con tu Red Social</span> <br><br>
                            <a href="" class="waves-effect waves-light btn indigo darken-3">Facebook</a>
                            <a href="" class="waves-effect waves-light btn red darken-4">Google +</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
