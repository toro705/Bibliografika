<?php

	include_once('includes/config/inicio.php');

	// Configuración de la página
 	define('SECCION', 'librerias');

 	$metas = array(
		'titulo' 		=> 'Librerías',
		'descripcion' 	=> 'Cada vez es más común escuchar que un libro está agotado o fuera de stock, lo que deja a miles de personas insatisfechas y cientos de potenciales ventas frustradas. Teniendo en cuenta esto, nos planteamos qué podíamos hacer para que más títulos llegaran a las librerías sin que implique un costo adicional tanto para editoriales como libreros.',
		'img' 			=> '',
		'slider' 		=> '<p class="h1">SIN STOCK Y SIN RIESGOS</p>
				        				<h1 class="h1">EL MAYOR CATÁLOGO DE LIBROS<br class="visible-lg"> POR DEMANDA</h1>'
	);

	include('includes/header.php');

?>

	<article>
		<section id="sin-stocks" class="banda blanca">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 text-center wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
						<h2 class="h3">SIN STOCKS Y SIN INVENTARIOS</h2>
						<P class="paragraph-3">Cada vez es más común escuchar que un libro está <i>agotado o fuera de stock</i>, lo que deja a miles de personas insatisfechas y cientos de potenciales ventas frustradas. Teniendo en cuenta esto, nos planteamos qué podíamos hacer para que más títulos llegaran a las librerías sin que implique un costo adicional tanto para editoriales como libreros.</P>
					</div>
				</div>
			</div>
		</section>
		<section id="edistribucion">
				<div class="box-service-container">
					<a class="bg-4" href="<?=url('editoriales')?>">
						<div class="box-service pull-right wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="300ms">
							<div class="row">
								<h4 class="color-2">eDISTRIBUCIÓN 1a1</h4>
								<p class="color-2">Conectamos tu catálogo a las principales librerías de Iberoamérica, eliminando stocks e imprimiendo los ejemplares una vez realizada la compra.</p>
								<p><i class="anim-suave fa fa-arrow-circle-right color-2" aria-hidden="true"></i></p>
							</div>
						</div>
					</a>
				</div>
				<div class="box-service-container">
					<a class="bg-4" href="<?=url('editoriales')?>">
						<div class="box-service-img box-service grow pull-left wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="300ms">
								<img class="anim-suave pull-right" src="images/2.jpg">
						</div>					
					</a>
				</div>	
				<div class="clearfix">	</div>				
		</section>
		<section id="beneficio-librerias" class="banda">
			<div class="container">
				<div class="row">
					<h2 class="h3 text-center wow fadeIn">¿CUÁL ES EL BENEFICIO PARA LAS LIBRERÍAS?</h2>
				</div>
				<div class="row text-center">
					<div class="col-xs-12 col-sm-6 col-md-3 wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
					<div class="icn-container text-center">
						<div class="icn icn-2 hvr-wobble-horizontal"></div>
					</div>
						<p class="paragraph-2">Adquisición de mayores catálogos<br class="hidden-sm">nacionales e internacionales para su oferta</p>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 wow fadeIn" data-wow-duration="1000ms" data-wow-delay="400ms">
					<div class="icn-container text-center">
						<div class="icn icn-7 hvr-wobble-horizontal"></div>
					</div>
						<p class="paragraph-2">Eliminación del stock gracias a la<br class="hidden-sm">impresión por demanda de los<br class="hidden-sm"> ejemplares comprados</p>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 wow fadeIn" data-wow-duration="1000ms" data-wow-delay="500ms">
					<div class="icn-container text-center">
						<div class="icn icn-6 hvr-wobble-horizontal"></div>
					</div>
						<p class="paragraph-2">Erradicar el "agotado"<br class="hidden-sm">como respuesta a <br class="hidden-sm"> potenciales clientes</p>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
					<div class="icn-container text-center">
						<div class="icn icn-5 hvr-wobble-horizontal"></div>
					</div>
						<p class="paragraph-2">El uso de la plataforma<br class="hidden-sm"> no supone ningún cargo<br class="hidden-sm">mensual adicional</p>
					</div>
				</div>
			</div>
		</section>
		<section id="que-estas-esperando" class="banda bg-3">
			<div class="container">
				<div class="row">
					<h2 class="h3 text-center">¿Qué estás esperando para formar parte <br class="visible-lg visible-md"> de esta nueva oportunidad de negocios?</h2>
				</div>
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<p class="paragraph-3 text-center">Las alianzas internacionales que se forjan gracias a Bibliomanager permiten que las librerías obtengan títulos de editoriales argentinas, colombianas, españolas, mexicanas y peruanas. Con esto, las librerías no sólo expanden sus horizontes a nivel nacional, sino que también cuentan con la posibilidad de comercializar catálogos extranjeros que, de otra manera,<br class="visible-lg">  no lo harían.<br><br>

						tematika.com, boutiquedellibro.com.ar, libreriapaidos.com, ozonum.com, libreriadelau.com 
						y gandhi.com.mx<br class="visible-lg">  ya se embarcaron en esta nueva aventura.
						</p>
					</div>
				</div>
			</div>
		</section>
		<section id="librerias-red" class="banda">
			<div class="container wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
				<div class="row">
					<h2 class="h3 text-center">Librerías que conforman nuestra red</h2>
				</div>
				<div class="row first-row">
					<div class="col-xs-12 col-sm-6 col-md-3 text-center">
						<div class="icn icn-8"></div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 text-center">
						<div class="icn icn-9"></div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 text-center">
						<div class="icn icn-10"></div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 text-center">
						<div class="icn icn-11"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-3 col-md-offset-3 text-center">
						<div class="icn icn-12"></div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 text-center">
						<div class="icn icn-13"></div>
					</div>
				</div>
				<hr class="footer-divider">
			</div>
		</section>
		<section class="bg_categorias">
			<div class="container">
				<div class="row contenedor-modulos">
				</div>
			</div>
		</section>
	</article>

<?php include('includes/footer.php'); ?>