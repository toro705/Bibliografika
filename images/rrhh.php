<?php

	include_once('includes/config/inicio.php');

	// Configuración de la página
 	define('SECCION', 'rrhh');

 	$metas = array(
		'titulo' 		=> 'Trabaje con nosotros',
		'descripcion' 	=> '',
		'keywords' 		=> '',
		'img' 			=> '',
		'slider' 		=> '<h1>Trabaje con<br>nosotros</h1>',
	);

	include('includes/header.php');

?>
	<article>
		<section class="banda gris">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-md-5 col-md-offset-1">
						<h2 class="icono">Postúlate a nuestras búsquedas laborales</h2>
						<p>Si te interesa formar parte de nuestro equipo, diligencia tus datos en el formulario o envíanos tu CV a: <a href="mailto:<?=ocultarEmail('info@partesyrodajes.com.ar')?>"><?=ocultarEmail('info@partesyrodajes.com.ar')?></a></p>
					</div>
					<div class="col-xs-12 col-md-6">
						<?php include('includes/forms/rrhh.php'); ?>
						<?= $form_rrhh->mensaje_estado ?>
						<?php if ($form_rrhh->estado != 'ok') { ?>
						  	<form class="form-horizontal formulario" role="form" method="post">
				                <div class="form-group">
				                	<div class="col-xs-12">
				                    	<input class="form-control" aria-label="nombre" type="text" id="nombre" name="nombre" value="<?= (isset($_POST['nombre'])) ? $_POST['nombre'] : ''; ?>" placeholder="Nombre y Apellido*"/>
				                    </div>
				                </div>
				                <div class="form-group">
				                	<div class="col-xs-12">
				                    	<input class="form-control" aria-label="domicilio" type="text" id="domicilio" name="domicilio" value="<?= (isset($_POST['domicilio'])) ? $_POST['domicilio'] : ''; ?>" placeholder="Domicilio"/>
				                    </div>
				                </div>
						  		<div class="row">
							  		<div class="col-xs-12 col-sm-6">
								  		<div class="form-group">
						                	<div class="col-xs-12">
						                    	<input class="form-control" aria-label="localidad" type="text" id="localidad" name="localidad" value="<?= (isset($_POST['localidad'])) ? $_POST['localidad'] : ''; ?>" placeholder="Localidad"/>
						                    </div>
						                </div>
						            </div>
						            <div class="col-xs-12 col-sm-6">
								  		<div class="form-group">
						                	<div class="col-xs-12">
						                    	<input class="form-control" aria-label="provincia" type="text" id="provincia" name="provincia" value="<?= (isset($_POST['provincia'])) ? $_POST['provincia'] : ''; ?>" placeholder="Provincia"/>
						                    </div>
						                </div>
						            </div>
						        </div>
						        <div class="row">
							  		<div class="col-xs-12 col-sm-6">
								  		<div class="form-group">
						                	<div class="col-xs-12">
						                    	<input class="form-control" aria-label="pais" type="text" id="pais" name="pais" value="<?= (isset($_POST['pais'])) ? $_POST['pais'] : ''; ?>" placeholder="País"/>
						                    </div>
						                </div>
						            </div>
						            <div class="col-xs-12 col-sm-6">
								  		<div class="form-group">
						                	<div class="col-xs-12">
						                    	<input class="form-control" aria-label="cp" type="text" id="cp" name="cp" value="<?= (isset($_POST['cp'])) ? $_POST['cp'] : ''; ?>" placeholder="C.P."/>
						                    </div>
						                </div>
						            </div>
						        </div>
						        <div class="row">
						        	<div class="col-xs-12 col-sm-6">
										<div class="form-group">
						                	<div class="col-xs-12">
						                    	<input class="form-control" aria-label="telefono" type="tel" id="telefono" name="telefono" value="<?= (isset($_POST['telefono'])) ? $_POST['telefono'] : ''; ?>" placeholder="Teléfono*"/>
						                    </div>
						                </div>
						            </div>
						            <div class="col-xs-12 col-sm-6">
										<div class="form-group">
						                	<div class="col-xs-12">
						                    	<input class="form-control" aria-label="Email" type="email" id="email" name="email" value="<?= (isset($_POST['email'])) ? $_POST['email'] : ''; ?>" placeholder="Email*"/>
						                    </div>
						                </div>
						            </div>
						        </div>
						        <div class="form-group">
				                	<div class="col-xs-12">
				                		<textarea class="form-control" aria-label="Estudios" id="estudios" name="estudios" placeholder="Estudios*"><?= (isset($_POST['estudios'])) ? $_POST['estudios'] : ''; ?></textarea>
				                	</div>
				                </div>
				                <div class="form-group">
				                	<div class="col-xs-12">
				                		<textarea class="form-control" aria-label="Experiencia laboral" id="experiencia_laboral" name="experiencia_laboral" placeholder="Experiencia laboral*"><?= (isset($_POST['experiencia_laboral'])) ? $_POST['experiencia_laboral'] : ''; ?></textarea>
				                	</div>
				                </div>
						        <div class="row">
						            <div class="col-xs-12 col-sm-8">
										<?php foreach($form_rrhh->campos AS $c){
											if($c->name == 'captcha'){
											?>
											<div class="form-group">
												<div class="col-xs-12">
								                    <div class="grecaptcha" data-sitekey="<?=$c->site_key; ?>" data-theme="light" data-size="normal" style="overflow: hidden; border-radius: 5px;">
														<noscript>
														  	<div style="width: 100%; height: 500px;">
																<iframe src="https://www.google.com/recaptcha/api/fallback?k=<?=$c->site_key; ?>"
																        frameborder="0" scrolling="no"
																        style="width: 100%; height:422px; border-style: none;">
																</iframe>
																<textarea style="width:285px; height:60px;" id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response"></textarea>
														  </div>
														</noscript>
								                    </div>
								                </div>
							                </div>
							                <?php }
						                } ?>
						            </div>
						            <div class="col-xs-12 col-sm-4">
						                <div class="form-group">
						                	<div class="col-xs-12">
						                		<div class="contactenos__boton">
							                		<button class="boton" type="submit" name="enviar_rrhh">
							                			Enviar <i class="fa fa-chevron-right"></i>
							                		</button>
							                	</div>
						                    </div>
						                </div>
						            </div>
						        </div>
						  	</form>
						<?php } ?>
					</div>
				</div>
			</div>
		</section>
	</article>

<?php include('includes/footer.php'); ?>