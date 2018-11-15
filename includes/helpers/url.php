<?php

function url($seccion, $dato = null, $idioma = IDIOMA){

	// Definir cuáles URLs son dinámicas (ficha o listado)
	$urls_dinamicas = array(
		'categoria' => 'ficha'
	);

	// Nombre personalizado para las secciones (Definir solo cuando NO hay idiomas)//
	$secciones_sin_idioma = array(
	    'categoria' => 'productos',
	    'categorias' => 'productos',
	);

	// Esto es todo lo que hay que modificar. //


	include_once('cadenaUrl.php');

	// Veo si cargar el idioma y lo cargo si corresponde
	static $idioma_cargado = '';
	$idiomas_habilitados = json_decode(IDIOMA_ENABLED);

	static $cargar_idioma = false;
	if(count($idiomas_habilitados) > 1 AND in_array($idioma, $idiomas_habilitados)){
		$cargar_idioma = true;
	}

	// Defino el texto principal de la URL
	if($cargar_idioma AND $idioma_cargado != $idioma){
		include(INCLUDE_PATH.'idioma/'.$idioma.'.php');
		$secciones = $txt['secciones'];
		$idioma_cargado = $idioma;
	}else{
		$secciones = array_merge($secciones_sin_idioma, array('home'=>''));
	}

	// Por defecto el texto coincide con el nombre de la sección
	if(! array_key_exists($seccion, $secciones)){
		$secciones[ $seccion ] = str_replace('_', '-', $seccion);
	}

	// Defino los datos secundarios de la URL
	if(array_key_exists($seccion, $urls_dinamicas)){
		switch($urls_dinamicas[ $seccion ]){
			case 'ficha':
				$nombre = property_exists(get_class($dato),'nombre') ? $dato->nombre : $dato->titulo;
				$url = $dato->id.'-'.cadenaUrl($nombre);
				break;

			case 'listado':
				$url = $dato;
				break;
		}
	}

	// Construyo la URL y la devuelvo
	$url = $secciones[ $seccion ].(isset($url) ? '/'.$url : '');

	return BASE_URL . ($cargar_idioma ? $idioma.'/' : '') . $url;
}
