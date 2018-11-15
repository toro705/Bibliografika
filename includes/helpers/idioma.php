<?php

function idioma(){

	// Le damos prioridad al idioma pasado por url
	if( isset($_GET['idioma']) AND in_array($_GET['idioma'],json_decode(IDIOMA_ENABLED)) ){
		define('IDIOMA', $_GET['idioma']);

	// Si no al idioma de una cookie
	}elseif( isset($_COOKIE['idioma']) AND  in_array($_COOKIE['idioma'],json_decode(IDIOMA_ENABLED)) ){
		define('IDIOMA', $_COOKIE['idioma']);

	// Si no al idioma según el país determinado por la IP
	}elseif( ($idioma_IP = idiomaIP()) !== false ){
		define('IDIOMA', $idioma_IP);

	// Si no al idioma del navegador
	}elseif( ($idioma_navegador = idiomaNavegador()) !== false ){
		define('IDIOMA', $idioma_navegador);

	// Y si nos quedamos sin opciones usamos el idioma por defecto
	}else{
		define('IDIOMA', IDIOMA_DEFAULT);
	}

	//Guardamos los datos en una cookie
	setcookie("idioma", IDIOMA, time()+3600,"/", "");

}

/** Determina el nuevo idioma en base a los idiomas que entiende el navegador
*  @return El idioma actual o false si el navegador no acepta ninguno de los idiomas habilitados
*/
function idiomaNavegador() {

	$idiomas_navegador = preg_replace('/(;q=\d+.\d+)/i', '', getenv('HTTP_ACCEPT_LANGUAGE'));

	//Comprobamos si el navegador usa alguno de los idiomas que hemos predefinido.
	foreach (json_decode(IDIOMA_ENABLED) as $idioma) {
		if (preg_match('/' . $idioma . '/i', $idiomas_navegador)) {
			return $idioma;
		}
	}

	return false;

}

/** Determina el nuevo idioma en base a los países desde donde se accede.
*  @return El idioma actual o false si no se encontraron coincidencias
*/
function idiomaIP() {

	$map_paises_idioma = array(
		'es' => array('AR','CL','BO','VE','PR','PY','PE','EC','ES','MX','CO','UY'),
		'en' => array('GB','US','CA','AU'),
		'pr' => array('BR','PT'),
	);
	if( ($response = file_get_contents("http://ipinfo.io/".filter_var($_SERVER['REMOTE_ADDR'],FILTER_VALIDATE_IP)."/json")) !== FALSE){
		$data = json_decode($response);
		foreach($map_paises_idioma as $idioma => $paises){
			if(!in_array($idioma, json_decode(IDIOMA_ENABLED))){
				continue;
			}
			if(in_array($data->country, $paises)){
				return $idioma;
			}
		}
	}

	return false;
}
