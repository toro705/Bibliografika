<?php

	include_once('includes/config/inicio.php');

	// Configuración de la página
 	define('SECCION', 'home');

 	$metas = array(
		'titulo' 		=> 'Impresión por demanda - Bibliográfika',
		'descripcion' 	=> 'Sin stock, sin riesgos, sin fronteras. Ofrecemos impresión y eDistribución nacional e internacional de libros. 14 años de experiencia nos respaldan. Desde un ejemplar, te ofrecemos imprimir tus títulos bajo demanda en Argentina, Colombia, España, México y Perú.',
		'img' 			=> '',
		'slider' 		=> '',
	);

	include('includes/header.php');

?>
 
	<article>
		<?php array_push($js, 'slider-principal');
			$slider_principal = array(
	        array(
	        	'SOMOS GLOBALES,<br class="visible-lg"> DERRIBAMOS FRONTERAS',
	        	'IMPRESIÓN Y eDISTRIBUCIÓN NACIONAL E INTERNACIONAL'
	        	),
	        array(
	        	'SIN STOCK Y SIN RIESGOS',
	        	'SU CATÁLOGO SIEMPRE VIVO<br class="visible-lg">EN LAS PRINCIPALES LIBRERÍAS DE HABLA HISPANA'
	        	),
	        array(
	        	'IMPRESIÓN DE LIBROS POR DEMANDA DESDE 1 EJEMPLAR',
	        	'TECNOLOGÍA DIGITAL'
	        	), 
	      );
		?>
		<div class="slider-principal">
			<ul class="owl-carousel">
			  <?php foreach ($slider_principal as $i => $slide) {
			  	$indice = $i+1;
			    $medidas = array(1920,1200,990,768,490);
			    $srcset = array();
			    $sources = '';
			    $default_src = '';
			    foreach($medidas as $m){
			      $new_sources = array();
			      for($x=1;$x<=2;$x++){
			        $new_sources[] = 'images/slider-principal/'.$indice.'-'.$m.'-x'.$x.'.jpg?v='.time().' '.$x*$m.'w';
			        if($default_src == ''){
			           $default_src = substr($new_sources[0], 0, strpos($new_sources[0],' '));
			        }
			      }
			      $sources .= '<source media="(min-width: '.$m.'px)" srcset="'.implode(',',$new_sources).'">';
			    }
			    $sources .= '<source srcset="'.implode(',',$new_sources).'">';
			      echo '<li>
			        <picture>
			          '.$sources.'
			          <img class="img-responsive" src="'.$default_src.'">
			        </picture>
			        <div class="slider-principal__contenido slide-'.$indice.'">
			        	<div class="container">
			        		<div class="row">
				        		<div class="col-xs-12">
				        			<div class="slider-principal__texto">
				        				<p class="h1">'.$slide[1].'</p>
				        				<h1 class="h1">'.$slide[0].'</h1>
				        			</div>
				        		</div>
				        	</div>
			        	</div>
			        </div>
			      </li>';
			    } ?>
			</ul>
		</div>
		<section id="home-service-1" class="banda bg-2">
			<div class="container">
				<div class="row service-container text-center wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
					<div class="col-xs-12 col-sm-6">
						<div class="icn icn-2 hvr-wobble-horizontal"></div>
						<h4 class="h4">IMPRESIÓN POR DEMANDA</h4>
						<p class="paragraph-2">Imprimimos la cantidad de ejemplares<br class="hidden-sm"> que se ajuste a tu necesidad</p>
					</div>
					<div class="col-xs-12 col-sm-6">
						<div class="icn icn-1 hvr-wobble-horizontal"></div>
						<h4 class="h4"> DISTRIBUCIÓN EN IBEROAMÉRICA</h4>
						<p class="paragraph-2">Sin stock, conectá tu catálogo para que esté disponible en<br class="hidden-sm"> las librerías más importantes de España y América Latina</p>
					</div>
				</div>
			</div>
		</section>
		<section id="home-service-2">
				<div class="box-service-container">
					<a class="bg-1" href="<?=url('editoriales#impresion-por-demanda')?>">
						<div class="box-service pull-right wow fadeInLeft">
							<div class="row">
								<h4 class="color-2">IMPRESIÓN POR DEMANDA</h4>
								<p class="color-2">14 años de experiencia nos respaldan. Desde un ejemplar, te ofrecemos imprimir tus títulos bajo demanda en Argentina, Colombia, España, México y Perú.</p>
								<P><i class="anim-suave fa fa-arrow-circle-right color-2" aria-hidden="true"></i></P>
							</div>
						</div>
						<div class="box-service-img box-service grow pull-right wow fadeInLeft">
								<img class="anim-suave pull-left" src="images/1.jpg">
						</div>
					</a>
				</div>
				<div class="box-service-container">
					<a class="bg-4" href="<?=url('editoriales#edistribucion')?>">
						<div class="box-service-img box-service grow pull-left hidden-xs wow fadeInRight">
							<img class="anim-suave pull-right" src="images/2.jpg">
						</div>					
						<div class="box-service pull-left wow fadeInRight">
							<div class="row">
								<h4 class="color-2">eDISTRIBUCIÓN 1a1</h4>
								<p class="color-2">Conectamos tu catálogo a las principales librerías de Iberoamérica, eliminando stocks e imprimiendo los ejemplares una vez realizada la compra.</p>
								<p><i class="anim-suave fa fa-arrow-circle-right color-2" aria-hidden="true"></i></p>
							</div>
						</div>
						<div class="box-service-img box-service grow pull-left visible-xs wow fadeInRight">
								<img class="anim-suave pull-right" src="images/2.jpg">
						</div>	
					</a>				
					
				</div>	
				<div class="clearfix">	</div>			
		</section>
		<section id="servicios-librerias" class="banda">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<h4 class="text-center color-3"><b>SERVICIOS A LIBRERÍAS</b></h4>
						<hr>
						<h2 class="h2 text-center">Sin stocks y sin inventarios, te acercamos<br class="visible-lg"> el mayor catálogo de libros por demanda</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<div id="slider-librerias" class="owl-carousel owl-theme">
						  <div class="item"><a href="javascript:;"><img src="images/slider-librerias/libro1.jpg"></a></div>
						  <div class="item"><a href="javascript:;"><img src="images/slider-librerias/libro2.jpg"></a></div>
						  <div class="item"><a href="javascript:;"><img src="images/slider-librerias/libro3.jpg"></a></div>
						  <div class="item"><a href="javascript:;"><img src="images/slider-librerias/libro4.jpg"></a></div>
						  <div class="item"><a href="javascript:;"><img src="images/slider-librerias/libro5.jpg"></a></div>
						  <div class="item"><a href="javascript:;"><img src="images/slider-librerias/libro6.jpg"></a></div>
						  <div class="item"><a href="javascript:;"><img src="images/slider-librerias/libro7.jpg"></a></div>
						  <div class="item"><a href="javascript:;"><img src="images/slider-librerias/libro8.jpg"></a></div>
						  <div class="item"><a href="javascript:;"><img src="images/slider-librerias/libro9.jpg"></a></div>
						  <div class="item"><a href="javascript:;"><img src="images/slider-librerias/libro10.jpg"></a></div>
						  <div class="item"><a href="javascript:;"><img src="images/slider-librerias/libro11.jpg"></a></div>
						  <div class="item"><a href="javascript:;"><img src="images/slider-librerias/libro1.jpg"></a></div>
						  <div class="item"><a href="javascript:;"><img src="images/slider-librerias/libro2.jpg"></a></div>
						  <div class="item"><a href="javascript:;"><img src="images/slider-librerias/libro3.jpg"></a></div>
						  <div class="item"><a href="javascript:;"><img src="images/slider-librerias/libro4.jpg"></a></div>
						  <div class="item"><a href="javascript:;"><img src="images/slider-librerias/libro5.jpg"></a></div>
						  <div class="item"><a href="javascript:;"><img src="images/slider-librerias/libro6.jpg"></a></div>
						  <div class="item"><a href="javascript:;"><img src="images/slider-librerias/libro7.jpg"></a></div>
						  <div class="item"><a href="javascript:;"><img src="images/slider-librerias/libro8.jpg"></a></div>
						  <div class="item"><a href="javascript:;"><img src="images/slider-librerias/libro9.jpg"></a></div>
						  <div class="item"><a href="javascript:;"><img src="images/slider-librerias/libro10.jpg"></a></div>
						  <div class="item"><a href="javascript:;"><img src="images/slider-librerias/libro11.jpg"></a></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 text-center">
						<p class="inline-block">¿Qué estás esperando para formar parte de esta nueva oportunidad de negocios?</p>
						<a href="<?=url('librerias')?>" class="btn btn-md btn-transparent"><b>MÁS INFO</b></a>
					</div>
				</div>
			</div>
		</section>	
		<section id="novedades" class="bg-3 banda">	
			<div class="container">	
				<div class="row">	
						<div class="col-xs-12 wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">	
								<h2 class="h2 color-3 text-center">Novedades</h2>
						</div>
				</div>
				<div class="row">
					<div class="table-cell box-2 wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
						<p class="paragraph-1"><a href="<?=url('novedades-ficha')?>"><b>Tecnología: Adobe lanza “Document Cloud”</b></a></p>
						<p class="paragraph-2">Adobe anunció la creación de su propia nube, Adobe Document Cloud que consiste en un set de servicios
	integrados que utilizan un sistema en línea y un concentrador de documentos personales. Desde la empresa se muestran muy optimistas con esta nueva creación, y 	sostienen que “Adobe va a transformar la forma en que las personas y empresas realicen
	sus trabajos”.</p>
						<a href="<?=url('novedades-ficha')?>" class="btn-plus"><span>+</span></a>
					</div>
					<div class="table-cell box-2 wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
						<p class="paragraph-1"><a href="<?=url('novedades-ficha')?>"><b>Adobe y Microsoft se unen para transformar el márketing</b></a></p>
						<p class="paragraph-2">Las compañías anunciaron su alianza estratégica dentro del contexto del Adobe’s anual European Digital
Marketing conference, celebrado a fines del mes de abril. Esta unión les permitirá redefinir la forma en que las empresas gestionan su área de márketing, ventas y servicios de manera de comprometerse mejor con
sus clientes.</p>
						<a href="<?=url('novedades-ficha')?>" class="btn-plus"><span>+</span></a>
					</div>
					<div class="table-cell box-2 wow fadeIn" data-wow-duration="1000ms" data-wow-delay="900ms">
						<p class="paragraph-1"><a href="<?=url('novedades-ficha')?>"><b>Entrevista a: Xiluén Zenker de Solar</b></a></p>
						<p class="paragraph-2">Xiluén Zenker, gerente comercial de Solar, partner de Bibliomanager en México, nos cuenta su experiencia en el país y cuál es la perspectiva de la impresión por demanda a futuro.</p>
						<a href="<?=url('novedades-ficha')?>" class="btn-plus"><span>+</span></a>
					</div>										
				</div>
				<div class="row text-center">
						<a href="<?=url('novedades')?>" class="btn btn-md btn-transparent wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms"><b>VER TODAS LAS NOVEDADES</b></a>
				</div>
			</div>
		</section>
	</article>

<?php include('includes/footer.php'); ?>