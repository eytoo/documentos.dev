@extends("frontend.template.v1.layout")

<?php
$tiene_sombra = true;
$sombra_cero = true;
?>

@section('main')
<section class="error">
  <div class="container">
    <div class="row">
      <div class="col l6 offset-l3">
        <div class="card error-card">
          <div class="imagen-error">
            <img src="/public/frontend/img/error.svg" alt="Imagen de 404 | Cursania">
          </div>
          <div class="contenido-error">
            <h2>404 Error</h2>
            <p>disculpa, la página que buscas </br> no está disponible</p>
            <a href="#" class="btn waves-effect waves-light btn-celeste">Regresar al Inicio</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
