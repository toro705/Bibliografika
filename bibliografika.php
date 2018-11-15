<?php

	include_once('includes/config/inicio.php');

	// Configuración de la página
 	define('SECCION', 'bibliografika');

 	$metas = array(
		'titulo' 		=> 'Bibliografika',
		'descripcion' 	=> 'Vivimos en un mundo cada vez más conectado y sabemos la importancia que esto representa. Nos conectamos con Bibliomanager para imprimir tus libros y hacer más fácil tu trabajo. Eliminamos los costos de envío y gastos de exportación ya que el pedido se imprime en el destino solicitado.',
		'img' 			=> '',
		'slider' 		=> '<p class="h1">IMPRESIÓN Y eDISTRIBUCIÓN NACIONAL E INTERNACIONAL</p>
				        				<h1 class="h1">SOMOS GLOBALES, <br class="visible-lg visible-md">DERRIBAMOS FRONTERAS<h1>'
	);

	include('includes/header.php');

?>

	<article>
		<section id="mundo-conectado" class="banda">
			<div class="container">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1 text-center wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
						<h2 class="h3">VIVIMOS EN UN MUNDO CADA VEZ MÁS CONECTADO Y<br class="visible-md visible-lg">SABEMOS DE LA IMPORTANCIA QUE ESTO REPRESENTA</h2>
						<P class="paragraph-3">De Argentina al mundo: nos conectamos con Bibliomanager para imprimir tus libros y hacer más fácil tu trabajo.</P>
					</div>
				</div>
			</div>
		</section>
		<section id="impresion-bajo-demanda-internacional" class="banda">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 text-center wow fadeIn" data-wow-duration="1000ms" data-wow-delay="300ms">
						<h2 class="h3">¿CUÁLES SON LOS BENEFICIOS DE LA IMPRESIÓN<br class="visible-md visible-lg"> BAJO DEMANDA INTERNACIONAL?</h2>
					</div>
				</div>
				<div class="row wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
					<div class="col-sm-6 beneficios">	
						<div class="table-cell">
							<div class="icn icn-31"></div>
						</div>
						<div class="beneficio table-cell">
							<p class="paragraph-3 line-24"><b>Eliminación de costos de envío y gastos de exportación</b></p>
							<p class="paragraph-3 line-24">El pedido se imprime en el destino solicitado</p>
						</div>
					</div>
					<div class="col-sm-6 beneficios">	
						<div class="table-cell">
							<div class="icn icn-31"></div>
						</div>
						<div class="beneficio table-cell">
							<p class="paragraph-3 line-24"><b>Minimización de stocks en el exterior</b></p>
							<p class="paragraph-3 line-24">Se imprime sólo lo vendido</p>
						</div>
					</div>
					<div class="col-sm-6 beneficios">	
						<div class="table-cell">
							<div class="icn icn-31"></div>
						</div>
						<div class="beneficio table-cell">
							<p class="paragraph-3 line-24"><b>Agilidad en las entregas internacionales</b></p>
							<p class="paragraph-3 line-24">No hay imponderables relacionados con fletes ni trámites aduaneros</p>
						</div>
					</div>
					<div class="col-sm-6 beneficios">	
						<div class="table-cell">
							<div class="icn icn-31"></div>
						</div>
						<div class="beneficio table-cell">
							<p class="paragraph-3 line-24"><b>Facturación en una sola moneda</b></p>
							<p class="paragraph-3 line-24">Los pagos se realizan en la misma moneda del país de origen del pedido</p>
						</div>
					</div>
					<div class="col-sm-6 beneficios">	
						<div class="table-cell">
							<div class="icn icn-31"></div>
						</div>
						<div class="beneficio table-cell">
							<p class="paragraph-3 line-24"><b>Mayor catálogo disponible para el mercado internacional</b></p>
							<p class="paragraph-3 line-24">Permite ofrecer todo el catálogo sin importar la existencia o el volumen del pedido</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="equipo" class="banda bg-3">
			<div class="container">
				<div class="row">	
					<div class="col-sm-10 col-sm-offset-1">	
						<div class="row">
								<div class="col-sm-6 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="300ms">
										<img src="<?=BASE_URL?>images/gustavo.jpg" alt="" class="img-responsive">
										<div class="block equipo-titulo">	
											<p class="paragraph-3 line-24"><b>Gustavo Vorobechik</b></p>
											<p class="paragraph-2 line-24">CEO y fundador de Bibliográfika</p>
										</div>
										<hr>
										<div class="clearfix">	</div>	
										<div class="block equipo-descrip">	
											<p class="paragraph-2">Desde sus inicios en el 2002, se ocupa del desarrollo de negocios y alianzas estratégicas, que le ha permitido ir formando el actual portfolio de servicios de la empresa. Siempre focalizado en el estudio de la cadena de valor de la industria editorial, dirige personalmente el área de Nuevos Negocios y Expansión Regional de Bibliográfika. En 2013 lanza Bibliomanager, una plataforma de gestión de contenidos a través de la cual las editoriales, librerías e imprentas por demanda se vinculan tecnológicamente, tanto a nivel nacional como internacional, generando negocios para toda la red.</p>
										</div>
								</div>
								<div class="col-sm-6 wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="600ms">
										<img src="<?=BASE_URL?>images/diego.jpg" alt="" class="img-responsive">
										<div class="block equipo-titulo">	
											<p class="paragraph-3 line-24"><b>Diego Ruiz</b></p>
											<p class="paragraph-2 line-24">Gerente de Operaciones</p>
										</div>
										<hr>
										<div class="clearfix">	</div>	
										<div class="block equipo-descrip">	
											<p class="paragraph-2">Licenciado en Economía, Master en Finanzas, pero su verdadera pasión son los libros. Desde 1999 trabaja en el mundo de los ebooks, a través de su sitio elaleph.com, y en 2010 se suma a Bibliográfika para colaborar en los proyectos de eDistribución. Con el paso de los años, asume la Gerencia de Operaciones de la imprenta y actualmente tiene a su cargo el desarrollo de la plataforma Bibliomanager, a través de la cual se gestiona la producción local e internacional y se articulan todos los negocios digitales del libro.</p>
										</div>
								</div>
						</div>					
					</div>
				</div>

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