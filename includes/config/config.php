<?php

// Constantes personalizadas
// Las cargo de esta manera para evitar problemas al incluir el config en el CMS
$constantes = array(

    // Idiomas
	'IDIOMA_DEFAULT' => 'es',
	'IDIOMA_ENABLED' => json_encode(array( 'es', 'en')),

	// Carpetas
	'CARPETA_CMS'      => 'admin',
	'CARPETA_RECURSOS' => 'resources',
	'CARPETA_INCLUDES' => 'includes',

	'PROTOCOLO'        => 'http',
	'DOMINIO'          => $_SERVER['HTTP_HOST'],

	// Rutas
	'DS'             => DIRECTORY_SEPARATOR,
	'BASE_URL'       => 'http://200.85.152.184/~bibliografika/',
	'BASE_PATH'      => '/home/bibliografika/domains/bibliografika.com/public_html/',
	'CMS_URL'        => '{BASE_URL}{CARPETA_CMS}{DS}',
	'CMS_PATH'       => '{BASE_PATH}{CARPETA_CMS}{DS}',
	'RESOURCES_URL'  => '{CMS_URL}{CARPETA_RECURSOS}{DS}',
	'RESOURCES_PATH' => '{CMS_PATH}{CARPETA_RECURSOS}{DS}',
	'INCLUDE_PATH'   => '{BASE_PATH}{CARPETA_INCLUDES}{DS}',
);
foreach($constantes as $nombre => $valor){
	if(! defined($nombre)){

		//Reemplazo las constantes que están dentro de la constante
		preg_match_all("/{(.*?)}/", $valor, $str_constants);
		foreach($str_constants[1] as $str_const){
			$valor = str_replace('{'.$str_const.'}', constant($str_const), $valor);
		}
		define($nombre, $valor);
	}
}


// Configuraciones PHP
set_include_path(INCLUDE_PATH);

date_default_timezone_set('America/Argentina/Buenos_Aires');

error_reporting(-1);
ini_set('display_errors', -1);
clearstatcache();