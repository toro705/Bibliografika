<?php
	// Configuración
	require_once('config.php');
	include_once('empresa.php');

	// Autoload
	require_once('helpers/autoload.php');

	// Helpers
	$helpers = array(
		'url',
		'idioma',
		'fecha',
		'text2array',
		'recortarCadena',
		'ocultarEmail'
	);
	foreach($helpers as $h){
		$helper = 'helpers/'.$h.'.php';
	    if (file_exists('includes/'.$helper)) {
	        require $helper;
	    }
	}

	// Cambio de idioma
	if(count(json_decode(IDIOMA_ENABLED)) > 1){
		idioma();
		require_once("idioma/".IDIOMA.".php");

	}else{
		define('IDIOMA', IDIOMA_DEFAULT);
	}

	// Minificar CSS
	//https://github.com/bennettstone/magic-min
	$minified = new Minifier(
	    array(
	        'gzip' => true,
	        'closure' => true,
	        'hashed_filenames' => false,
	        'output_log' => false,
	        'echo' => false
	    )
	);


	// Array para registrar scripts JavaScript activos
	$js = array();


