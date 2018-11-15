<?php

include_once('forms/core/Formulario.php');

$form_rrhh = new Formulario(
	array(
		'destinatarios' => array(
			Empresa::$email
		),
		'asunto' 	=> 'Trabaje con nosotros - '.Empresa::$nombre,
		'remitente' => array(
			'nombre' => 'Web '.Empresa::$nombre,
			'email' => 'web@partesyrodajes.com.ar'
		),
		'responder_a' => array(
			'nombre' => 'nombre',
			'email' => 'email'
		),
		'opciones' => array(
			'debug' => false
		)
	)
);

$form_rrhh->agregarCampos(
	array(

		array(
			'name' => 'nombre',
			'label' => 'Nombre',
			'tipo' => 'input_text',
			'validar' => array('requerido'),
		),

		array(
			'name' => 'domicilio',
			'label' => 'Domicilio',
			'tipo' => 'input_text',
			'validar' => array(''),
		),

		array(
			'name' => 'localidad',
			'label' => 'Localidad',
			'tipo' => 'input_text',
			'validar' => array(''),
		),

		array(
			'name' => 'provincia',
			'label' => 'Provincia',
			'tipo' => 'input_text',
			'validar' => array(''),
		),

		array(
			'name' => 'pais',
			'label' => 'País',
			'tipo' => 'input_text',
			'validar' => array(''),
		),

		array(
			'name' => 'cp',
			'label' => 'CP',
			'tipo' => 'input_text',
			'validar' => array(''),
		),

		array(
			'name' => 'telefono',
			'label' => 'Teléfono',
			'tipo' => 'input_text',
			'validar' => array('requerido'),
		),

		array(
			'name' => 'email',
			'label' => 'Email',
			'tipo' => 'input_email',
			'validar' => array('requerido','formato'),
		),

		array(
			'name' => 'estudios',
			'label' => 'Estudios',
			'tipo' => 'textarea',
			'validar' => array('requerido'),
		),

		array(
			'name' => 'experiencia_laboral',
			'label' => 'Experiencia laboral',
			'tipo' => 'textarea',
			'validar' => array('requerido'),
		),

		array(
			'name' => 'captcha',
			'label' => 'Captcha',
			'tipo' => 'Captcha',
			 'validar' => array('requerido'),
		),
	)
);

$form_rrhh->agregarMensajeEstado(
	array(
		'incompleto' =>	'Todos los campos son obligatorios.',
	)
);

if( isset($_POST['enviar_rrhh']) ){
	$form_rrhh->enviar();
}


