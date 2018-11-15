<?php

	include_once('includes/config/inicio.php');

	// Configuración de la página
 	define('SECCION', 'novedades');

 	$metas = array(
		'titulo' 		=> 'Novedades',
		'descripcion' 	=> 'Novedades de Bibliográfika.',
		'img' 			=> '',
		'slider' 		=> '<p class="h1">NOVEDADES</p>
				        				<h1 class="h1">MERCADO EDITORIAL<h1>'
	);

	include('includes/header.php');

?>

	<article id="novedades-section">
		<section id="novedades" class="banda">	
			<div class="container">	
				<div class="row">
					<div class="table-cell box-2 wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
						<p class="paragraph-1"><a href="<?=url('novedades-ficha')?>"><b>Tecnología: Adobe lanza “Document Cloud”</b></a></p>
						<p class="paragraph-2">Adobe anunció la creación de su propia nube, Adobe Document Cloud que consiste en un set de servicios
						integrados que utilizan un sistema en línea y un concentrador de documentos personales. Desde la empresa se muestran muy optimistas con esta nueva creación, y 	sostienen que “Adobe va a transformar la forma en que las personas y empresas realicen
						sus trabajos”.</p>
						<a href="<?=url('novedades-ficha')?>" class="btn-plus"><span>+</span></a>
					</div>
					<div class="table-cell box-2 wow fadeIn" data-wow-duration="1000ms" data-wow-delay="400ms">
						<p class="paragraph-1"><a href="<?=url('novedades-ficha')?>"><b>Adobe y Microsoft se unen para transformar el márketing</b></a></p>
						<p class="paragraph-2">Las compañías anunciaron su alianza estratégica dentro del contexto del Adobe’s anual European Digital
Marketing conference, celebrado a fines del mes de abril. Esta unión les permitirá redefinir la forma en que las empresas gestionan su área de márketing, ventas y servicios de manera de comprometerse mejor con
sus clientes.</p>
						<a href="<?=url('novedades-ficha')?>" class="btn-plus"><span>+</span></a>
					</div>
					<div class="table-cell box-2 wow fadeIn" data-wow-duration="1000ms" data-wow-delay="500ms">
						<p class="paragraph-1"><a href="<?=url('novedades-ficha')?>"><b>Entrevista a: Xiluén Zenker de Solar</b></a></p>
						<p class="paragraph-2">Xiluén Zenker, gerente comercial de Solar, partner de Bibliomanager en México, nos cuenta su experiencia en el país y cuál es la perspectiva de la impresión por demanda a futuro.</p>
						<a href="<?=url('novedades-ficha')?>" class="btn-plus"><span>+</span></a>
					</div>										
				<br class="hidden-xs hidden-sm">	
					<div class="table-cell box-2 wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
						<p class="paragraph-1"><a href="<?=url('novedades-ficha')?>"><b>Tecnología: Adobe lanza “Document Cloud”</b></a></p>
						<p class="paragraph-2">Adobe anunció la creación de su propia nube, Adobe Document Cloud que consiste en un set de servicios
						integrados que utilizan un sistema en línea y un concentrador de documentos personales. Desde la empresa se muestran muy optimistas con esta nueva creación, y 	sostienen que “Adobe va a transformar la forma en que las personas y empresas realicen
						sus trabajos”.</p>
						<a href="<?=url('novedades-ficha')?>" class="btn-plus"><span>+</span></a>
					</div>
					<div class="table-cell box-2 wow fadeIn" data-wow-duration="1000ms" data-wow-delay="700ms">
						<p class="paragraph-1"><a href="<?=url('novedades-ficha')?>"><b>Adobe y Microsoft se unen para transformar el márketing</b></a></p>
						<p class="paragraph-2">Las compañías anunciaron su alianza estratégica dentro del contexto del Adobe’s anual European Digital
Marketing conference, celebrado a fines del mes de abril. Esta unión les permitirá redefinir la forma en que las empresas gestionan su área de márketing, ventas y servicios de manera de comprometerse mejor con
sus clientes.</p>
						<a href="<?=url('novedades-ficha')?>" class="btn-plus"><span>+</span></a>
					</div>
					<div class="table-cell box-2 wow fadeIn" data-wow-duration="1000ms" data-wow-delay="800ms">
						<p class="paragraph-1"><a href="<?=url('novedades-ficha')?>"><b>Entrevista a: Xiluén Zenker de Solar</b></a></p>
						<p class="paragraph-2">Xiluén Zenker, gerente comercial de Solar, partner de Bibliomanager en México, nos cuenta su experiencia en el país y cuál es la perspectiva de la impresión por demanda a futuro.</p>
						<a href="<?=url('novedades-ficha')?>" class="btn-plus"><span>+</span></a>
					</div>										
				</div>
				<hr class="footer-divider">
			</div>
		</section>
	</article>

<?php include('includes/footer.php'); ?>