<?php

/**
 * Autocargador de modelos
 *
 * @param string $clase El nombre del modelo.
 * @return void
 */
function autocargadorModelos($clase) {

    $modelo = INCLUDE_PATH.'models/'.$clase.'.php';

    // Evito la carga automática en el administrador
    if(stripos($modelo, CARPETA_CMS) !== false){
    	return;
    }

    if (file_exists($modelo)) {
        require $modelo;
    }
}
spl_autoload_register('autocargadorModelos');


/**
 * Autocargador de librerías
 *
 * @param string $clase El nombre del helper.
 * @return void
 */
function autocargadorLibs($clase) {

	// Evito la carga automática en el administrador
    if(stripos($clase, CARPETA_CMS) !== false){
    	return;
    }

    $lib = INCLUDE_PATH.'libs/'.$clase.'.php';

    if (file_exists($lib)) {
        require $lib;
    }
}
spl_autoload_register('autocargadorLibs');

