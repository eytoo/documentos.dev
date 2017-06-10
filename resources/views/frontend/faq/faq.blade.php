@extends("frontend.template.v1.layout")

<?php
$tiene_sombra = true;
$sombra_cero = true;
?>

@section('main')
<section class="faq">
	<div class="banners faq-banner">
		<div class="container">
		    <div class="row">
						<div class="col l12 m12 s12">
							<div class="banners-titulo">
								<h2>FAQ</h2>
							</div>
						</div>
		    </div>
		</div>
	</div>
	<nav class="grey lighten-3 black-text hide-on-small-only">
        <div class="nav-wrapper">
            <div class="container">
                <div class="col s12">
                    <a href="#!" class="breadcrumb">Cursania</a>
                    <a href="#!" class="breadcrumb">FAQ</a>
                </div>
            </div>
        </div>
    </nav>
    <section class="section-content">
    	<div class="container">
	    	<div class="row">
	    		<div class="col l12 s12 m12 center">
              <div class="titulo">
                  <h2>Preguntas <span>Frecuentes</span></h2>
                  <p>Lorem Ipsum is the printing and typesetting industry has been <br> the industry's standard been when an unknown printer.</p>
              </div>
          </div>
					<div class="col l8 s12 m12">
						<ul class="collapsible" data-collapsible="accordion">
					    <li>
					      <div class="collapsible-header">1. ¿Con qué medios de pago cuentan?</div>
					      <div class="collapsible-body"><span>Podrás realizar tu pago de dos modos: a) De forma directa en la plataforma a través de tu tarjeta de crédito o débito. b) Enviando un correo a hola@devcode.la si deseas realizar un depósito por Paypal, Western Unión o a través de una transferencia bancaria según el país en el que te encuentres.</span></div>
					    </li>
					    <li>
					      <div class="collapsible-header">2. ¿Tienen política de devolución? </div>
					      <div class="collapsible-body"><span>Claro que sí­. Si DevCode incumple con lo ofrecido o no llegamos a cubrir tus expectativas, puedes comunicarte con nosotros y solicitarnos tu reembolso en el plazo de 7 días desde la fecha de tu primera compra.</span></div>
					    </li>
					    <li>
					      <div class="collapsible-header">3. ¿Desde cuándo puedo ingresar a ver los cursos?</div>
					      <div class="collapsible-body"><span>Podrás acceder a los cursos a los que te suscribas inmediatamente después de realizar el pago.</span></div>
					    </li>
							<li>
					      <div class="collapsible-header">4. ¿Necesito conocimientos previos para registrarme?</div>
					      <div class="collapsible-body"><span>No es necesario tener conocimientos previos, ya que en Devcode.la podrás aprender todo desde cero y paso a paso.</span></div>
					    </li>
					  </ul>
					</div>
	    	</div>
	    </div>
		</section>
</section>
@endsection
