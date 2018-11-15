<?php

include_once('forms/core/Formulario.php');

$form_contacto = new Formulario(
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

$form_contacto->agregarCampos(
	array(

		array(
			'name' 		=> 'nombre',
			'label' 	=> 'Nombre y Apellido',
			'tipo' 		=> 'text',
			'validar' 	=> array('requerido'),
		),

		array(
			'name' 		=> 'empresa',
			'label' 	=> 'Empresa',
			'tipo' 		=> 'text',
			'validar' 	=> array('requerido'),
		),

		array(
			'name' 		=> 'email',
			'label' 	=> 'Email',
			'tipo' 		=> 'email',
			'validar' 	=> array('requerido','formato'),
		),

		array(
			'name' 		=> 'telefono',
			'label' 	=> 'Teléfono',
			'tipo' 		=> 'tel',
			'validar' 	=> array('requerido'),
		),

		array(
			'name' 		=> 'pais',
			'label' 	=> 'País',
			'tipo' 		=> 'text',
			'validar' 	=> array('requerido'),
		),

		array(
			'name' 		=> 'motivo',
			'label' 	=> 'Motivo de consulta',
			'tipo' 		=> 'text',
			'validar' 	=> array('requerido'),
		),

		array(
			'name' 		=> 'como_conocio',
			'label' 	=> 'Cómo nos conocio?',
			'tipo' 		=> 'select',
			'validar' 	=> array('requerido'),
		),

		array(
			'name' 		=> 'comentarios',
			'label' 	=> 'Consulta',
			'tipo' 		=> 'textarea',
			'validar' 	=> array('requerido'),
		),

		array(
			'name' 		=> 'captcha',
			'label' 	=> 'Captcha',
			'tipo' 		=> 'Captcha',
			 'validar' 	=> array('requerido'),
		),
	)
);

$form_contacto->agregarMensajeEstado(
	array(
		'incompleto' =>	'Todos los campos son requeridos.',
	)
);

if( isset($_POST['enviar_contacto']) ){
	$form_contacto->enviar();
}


