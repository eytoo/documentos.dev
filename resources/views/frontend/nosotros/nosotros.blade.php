@extends("frontend.template.v1.layout")

<?php
$tiene_sombra = true;
$sombra_cero = true;
?>

@section('main')
<section class="nosotros">
	<div class="banners nosotros-banner">
		<div class="container">
		    <div class="row">
						<div class="col l12 m12 s12">
							<div class="banners-titulo">
								<h2>Nosotros</h2>
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
                    <a href="#!" class="breadcrumb">Nosotros</a>
                </div>
            </div>
        </div>
    </nav>
    <section class="section-content">
    	<div class="container">
	    	<div class="row">
	    		<div class="col l12 s12 m12 center">
	                <div class="titulo">
	                    <h2>Nuestro <span>Equipo</span></h2>
	                    <p>Lorem Ipsum is the printing and typesetting industry has been <br> the industry's standard been when an unknown printer.</p>
	                </div>
	            </div>
	    	</div>
	    	<div class="row">
				<div class="col l3 m6 s12">
					<div class="content-icon right">
						<div class="icon-bx-md right light-blue darken-2">
							<a href="">
								<i class="fa fa-paint-brush"></i>
							</a>
						</div>
						<div class="icon-content right">
							<h5 class="dez-tilte">Special Education</h5>
							<div class="dez-separator-outer ">
								<div class="dez-separator bg-primary style-liner"></div>
							</div>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing  sed diam nibh euismod [...]</p>
						</div>
					</div>
					<div class="content-icon right">
						<div class="icon-bx-md right light-blue darken-2"> <a href="#" class="icon-cell"><i class="fa fa-book"></i></a> </div>
						<div class="icon-content right">
							<h5 class="dez-tilte">Full Day Session</h5>
							<div class="dez-separator-outer ">
								<div class="dez-separator bg-primary style-liner"></div>
							</div>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing  sed diam nibh euismod [...]</p>
						</div>
					</div>
					<div class="content-icon right">
						<div class="icon-bx-md right light-blue darken-2"> <a href="#" class="icon-cell"><i class="fa fa-user"></i></a> </div>
						<div class="icon-content right">
							<h5 class="dez-tilte ">Qualified Teachers</h5>
							<div class="dez-separator-outer ">
								<div class="dez-separator bg-primary style-liner"></div>
							</div>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing  sed diam nibh euismod [...]</p>
						</div>
					</div>
				</div>
				<div class="col l6 m2 text-center hide-on-med-and-down">
					<img src="../frontend/img/nosotros.png" class="responsive-img">
				</div>
				<div class="col l3 m6 s12">
					<div class="content-icon left">
						<div class="icon-bx-md left light-blue darken-2"> <a href="#" class="icon-cell"><i class="fa fa-calendar"></i></a> </div>
						<div class="icon-content left">
							<h5 class="dez-tilte ">Events</h5>
							<div class="dez-separator-outer ">
								<div class="dez-separator bg-primary style-liner"></div>
							</div>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing  sed diam nibh euismod [...]</p>
						</div>
					</div>
					<div class="content-icon left">
						<div class="icon-bx-md left light-blue darken-2"> <a href="#" class="icon-cell"><i class="fa fa-graduation-cap"></i></a> </div>
						<div class="icon-content left">
							<h5 class="dez-tilte ">Pre School </h5>
							<div class="dez-separator-outer ">
								<div class="dez-separator bg-primary style-liner"></div>
							</div>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing  sed diam nibh euismod [...]</p>
						</div>
					</div>
					<div class="content-icon left">
						<div class="icon-bx-md left light-blue darken-2"> <a href="#" class="icon-cell"><i class="fa fa-clock-o"></i></a> </div>
						<div class="icon-content left">
							<h5 class="dez-tilte ">24/7 Support Center</h5>
							<div class="dez-separator-outer ">
								<div class="dez-separator bg-primary style-liner"></div>
							</div>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing  sed diam nibh euismod [...]</p>
						</div>
					</div>
				</div>
			</div>
	    </div>
		</section>
		<section class="ventajas">
			<div class="container">
				<div class="row">
					<div class="col l12 s12 m12 center">
						<div class="titulo">
							<h2>Our Philosophy</h2>
							<p>Lorem ipsum dolor sit amet,vel fugit. <br> Molestiae et ducimus,eos magni?</p>
						</div>
					</div>
					<div class="col l3 s12 m6">
						<div class="ventajas-item">
							 <div class="imagen">
							 		<img src="../frontend/img/icono/icon-1.png" alt="product-img" class="responsive-img">
							 </div>
							 <div class="contenido center">
									<h5>Safety First</h5>
									<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam[...]</p>
							 </div>
						</div>
					</div>
					<div class="col l3 s12 m6">
						<div class="ventajas-item">
							 <div class="imagen">
							 		<img src="../frontend/img/icono/icon-1.png" alt="product-img" class="responsive-img">
							 </div>
							 <div class="contenido center">
									<h5>Safety First</h5>
									<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam[...]</p>
							 </div>
						</div>
					</div>
					<div class="col l3 s12 m6">
						<div class="ventajas-item">
							 <div class="imagen">
							 		<img src="../frontend/img/icono/icon-1.png" alt="product-img" class="responsive-img">
							 </div>
							 <div class="contenido center">
									<h5>Safety First</h5>
									<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam[...]</p>
							 </div>
						</div>
					</div>
					<div class="col l3 s12 m6">
						<div class="ventajas-item">
							 <div class="imagen">
							 		<img src="../frontend/img/icono/icon-1.png" alt="product-img" class="responsive-img">
							 </div>
							 <div class="contenido center">
									<h5>Safety First</h5>
									<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam[...]</p>
							 </div>
						</div>
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

</section>
@endsection
