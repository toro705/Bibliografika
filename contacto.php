<?php

	include_once('includes/config/inicio.php');

	// Configuración de la página
 	define('SECCION', 'contacto');

 	$metas = array(
		'titulo' 		=> 'Contacto',
		'descripcion' 	=> 'Contactenos.',
		'img' 			=> '',
		'slider' 		=> '<p class="h1">CONTACTO</p>
				        				<h1 class="h1">CONTÁCTESE <br class="visible-lg visible-md">CON NOSOTROS<h1>'
	);

	include('includes/header.php');

?>

	<article>
		<section id="contacto" class="banda">	
			<div class="container wow fadeIn">	
			<div class="row">
				<div class="col-xs-12 text-center">
					<h2 class="h3">A LA BREVEDAD NOS PONDREMOS <br> EN CONTACTO CON USTED </h2>
				</div>
			</div>
				<div class="row">
					<div class="col-xs-12 col-lg-8 col-lg-offset-2">
						<?php include('forms/contacto.php'); ?>
						<?= $form_contacto->mensaje_estado ?>
						<?php if ($form_contacto->estado != 'ok') { ?>
						<form id="contact-form" class="form-horizontal" role="form" method="post">
						  <div class="form-group text-left">
							    <label for="nombre" class="col-md-3 control-label paragraph-3">Nombre y apellido</label>
							    <div class="col-md-9">
							      <input type="nombre" class="form-control" id="nombre" name="nombre" value="<?= (isset($_POST['nombre'])) ? $_POST['nombre'] : ''; ?>" placeholder="">
							    </div>
						  </div>
						  <div class="form-group text-left">
							    <label for="empresa" class="col-md-3 control-label paragraph-3">Empresa</label>
							    <div class="col-md-9">
							      <input type="text" class="form-control" id="empresa" name="empresa" value="<?= (isset($_POST['empresa'])) ? $_POST['empresa'] : ''; ?>" placeholder="">
							    </div>
						  </div>
						  <div class="form-group text-left">
							    <label for="email" class="col-md-3 control-label paragraph-3">E-mail</label>
							    <div class="col-md-9">
							      <input type="email" class="form-control" id="email" name="email" value="<?= (isset($_POST['email'])) ? $_POST['email'] : ''; ?>" placeholder="">
							    </div>
						  </div>
						  <div class="form-group text-left">
							    <label for="telefono" class="col-md-3 control-label paragraph-3">Teléfono</label>
							    <div class="col-md-9">
							      <input type="number" class="form-control" id="telefono" name="telefono" <?= (isset($_POST['telefono'])) ? $_POST['telefono'] : ''; ?>" placeholder="">
							    </div>
						  </div>
						  <div class="form-group text-left">
							    <label for="pais" class="col-md-3 control-label paragraph-3">Pais</label>
							    <div class="col-md-9">
							      <input type="text" class="form-control" id="pais" name="pais" value="<?= (isset($_POST['pais'])) ? $_POST['pais'] : ''; ?>" placeholder="">
							    </div>
						  </div>
						  <div class="form-group text-left">
							    <label for="motivo" class="col-md-3 control-label paragraph-3">Motivo de consulta</label>
							    <div class="col-md-9">
							      <input type="text" class="form-control" id="motivo" name="motivo" value="<?= (isset($_POST['motivo'])) ? $_POST['motivo'] : ''; ?>" placeholder="">
							    </div>
						  </div>
						  <div class="form-group text-left">
							    <label for="como_conocio" class="col-md-3 control-label paragraph-3">¿Cómo nos conoció?</label>
							    <div class="col-md-9">
						    		<div class="select icono">
										<select class="form-control" name="como_conocio" id="como_conocio" value="<?= (isset($_POST['como_conocio'])) ? $_POST['como_conocio'] : ''; ?>">
											<option value="Internet">Internet</option>
											<option value="Facebook">Facebook</option>
											<option value="Vía Pública">Vía Pública</option>
										</select>
						    		</div>
							    </div>
						  </div>
						  <div class="form-group text-left">
							    <label for="comentarios" class="col-md-3 control-label paragraph-3">Consulta</label>
							    <div class="col-md-9">
									<textarea name="comentarios" id="comentarios" cols="30" rows="5" class="form-control"><?= (isset($_POST['comentarios'])) ? $_POST['comentarios'] : ''; ?></textarea>
							    </div>
						  </div>
						  <div class="form-group text-left">
					            <div class="col-xs-12 col-md-9 col-md-offset-3">
									<?php foreach($form_contacto->campos AS $c){
										if($c->name == 'captcha'){
										?>
										<div class="form-group">
											<div class="col-xs-12 text-center">
							                    <div class="grecaptcha" data-sitekey="<?=$c->site_key; ?>" data-theme="light" data-size="normal" style="overflow: hidden; border-radius: 5px; margin: 0 auto; display: inline-block">
													<noscript>
													  	<div style="width: 100%; height: 500px; margin: 0 auto;">
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
				            </div>
						  <div class="form-group">
						    <div class="col-xs-12 col-md-9 col-md-offset-3 text-center">
						      <button type="submit" class="btn btn-rojo" name="enviar_contacto">ENVIAR</button>
						    </div>
						  </div>
						</form>
						<?php } ?>
					</div>
				</div>
				<div class="clearfix"></div>
				<hr class="footer-divider">
			</div>
		</section>
	</article>

<?php include('includes/footer.php'); ?>