<?php

include_once('forms/core/Formulario.php');

$form_newsletter = new Formulario(
	array(
		'destinatarios' => array(
			'soporte@synapsis.com.ar'//Empresa::$email
		),
		'asunto' 	=> 'Contacto - '.Empresa::$nombre,
		'remitente' => array(
			'nombre' => 'Web '.Empresa::$nombre,
			'email' => 'web@bibliografika.com.ar'
		),
		'responder_a' => array(
			'nombre' => 'nombre',
			'email' => 'email'
		),
		'opciones' => array(
			'debug' => false,
			'guardar_contacto' => false,
			'guardar_form' => false
		)
	)
);

$form_newsletter->agregarCampos(
	array(

		array(
			'name' 		=> 'email',
			'label' 	=> 'Email',
			'tipo' 		=> 'email',
			'validar' 	=> array('requerido','formato'),
		),

		array(
			'name' 		=> 'captcha',
			'label' 	=> 'Captcha',
			'tipo' 		=> 'Captcha',
			 'validar' 	=> array('requerido'),
		),
	)
);

$form_newsletter->agregarMensajeEstado(
	array(
		'incompleto' =>	'Todos los campos son requeridos.',
	)
);

if( isset($_POST['enviar_newsletter']) ){
	$form_newsletter->enviar();
}


