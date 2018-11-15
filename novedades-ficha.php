<?php

	include_once('includes/config/inicio.php');

	// Configuración de la página
 	define('SECCION', 'novedades-ficha');

 	$metas = array(
		'titulo' 		=> 'Novedades',
		'descripcion' 	=> 'Detalle de la novedad.',
		'img' 			=> '',
		'slider' 		=> '<p class="h1">NOVEDADES</p>
				        				<h1 class="h1">MERCADO EDITORIAL<h1>'
	);

	include('includes/header.php');

?>

	<article>
		<section id="novedades-ficha" class="banda">	
			<div class="container">	
				<div class="row">
					<div class="col-xs-12">
						<a href="<?=url('novedades')?>" class="btn-volver paragraph-2"><i class="fa fa-chevron-left" aria-hidden="true"></i> Volver a listado</a>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-7 wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
						<h2 class="color-3">Tecnología: Adobe lanza “Document Cloud”</h2>
						<p class="paragraph-2 line-24">Adobe anunció la creación de su propia nube, Adobe Document Cloud que consiste en un set de servicios integrados que utilizan un sistema en línea y un concentrador de documentos personales. Desde la empresa se muestran muy optimistas con esta nueva creación, y sostienen que “Adobe va a transformar la forma en que las personas y empresas realicen sus trabajos. <br><br>

						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras non eleifend leo, quis fringilla mi. Integer sit amet ante eget ligula accumsan dapibus vitae non orci. Proin bibendum nulla sodales eros pellentesque cursus. Ut rutrum fringilla vestibulum. Sed vel quam ut dolor tincidunt mattis quis nec arcu. Fusce at convallis ante. Donec vel dictum leo, nec dapibus risus. Fusce sollicitudin eros cursus porttitor eleifend. In hac habitasse platea dictumst. Sed nec vulputate magna. Maecenas a consequat massa. Nullam egestas feugiat justo sit amet lobortis. Maecenas suscipit lectus urna, nec sodales nibh euismod eu. Nulla lacinia vulputate elit, in volutpat massa feugiat sit amet. Vestibulum facilisis sed magna ac varius. Sed tristique sem eu odio convallis placerat. <br><br>

						Integer ullamcorper libero eget tincidunt tristique. Ut eros orci, imperdiet eget posuere maximus, fringilla eu lacus. Curabitur eget orci rutrum, pulvinar est ut, dignissim orci. Quisque commodo est non eros lobortis, a aliquet nisl vestibulum. Nullam eget erat in arcu facilisis pharetra. Fusce tempor, justo sed mollis ullamcorper, lacus nibh viverra mi, ac placerat tortor nisi vel nulla. Cras lacinia, ante ac finibus lacinia, neque nibh finibus justo, quis fermentum nisi urna eget lorem. Interdum et malesuada fames ac ante ipsum primis in faucibus. <br><br>

						Fusce ullamcorper, tortor sed finibus congue, felis mauris volutpat urna, a finibus elit nisl in risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In efficitur ex augue, eget tempor ante faucibus nec. Phasellus ornare tortor ut ligula convallis, vitae cursus risus blandit. Etiam convallis tincidunt ante sit amet ultrices. Curabitur semper nunc vitae augue volutpat elementum. Integer quis ullamcorper erat. Sed mattis risus sit amet nibh tincidunt sagittis sit amet vel lacus.</p>
					</div>
					<div class="col-sm-4 col-sm-offset-1 wow fadeIn" data-wow-duration="1000ms" data-wow-delay="500ms">
						<div class="box-3">
							<p class="paragraph-1"><a href="<?=url('novedades-ficha')?>"><b>Entrevista a: Xiluén Zenker de Solar</b></a></p>
							<p class="paragraph-2">Xiluén Zenker, gerente comercial de Solar, partner de Bibliomanager en México, nos cuenta su experiencia en el país y cuál es la perspectiva de la impresión por demanda a futuro.</p>
							<a href="<?=url('novedades-ficha')?>" class="btn-plus"><span>+</span></a>
						</div>
						<div class="box-3">
							<p class="paragraph-1"><a href="<?=url('novedades-ficha')?>"><b>Entrevista a: Xiluén Zenker de Solar</b></a></p>
							<p class="paragraph-2">Xiluén Zenker, gerente comercial de Solar, partner de Bibliomanager en México, nos cuenta su experiencia en el país y cuál es la perspectiva de la impresión por demanda a futuro.</p>
							<a href="<?=url('novedades-ficha')?>" class="btn-plus"><span>+</span></a>
						</div>
						<div class="box-3">
							<p class="paragraph-1"><a href="<?=url('novedades-ficha')?>"><b>Entrevista a: Xiluén Zenker de Solar</b></a></p>
							<p class="paragraph-2">Xiluén Zenker, gerente comercial de Solar, partner de Bibliomanager en México, nos cuenta su experiencia en el país y cuál es la perspectiva de la impresión por demanda a futuro.</p>
							<a href="<?=url('novedades-ficha')?>" class="btn-plus"><span>+</span></a>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
				<hr class="footer-divider">
			</div>
		</section>
	</article>

<?php include('includes/footer.php'); ?>