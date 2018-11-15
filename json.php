<?php

 	include_once('includes/config/inicio.php');

	$modelo  = isset($_GET['m']) ? ucfirst($_GET['m']) : false;
	$filtros = isset($_GET['f']) ? $_GET['f'] : false;
	$profile = isset($_GET['profile']) ? true : false;

	if(! $modelo){
		die('Tenés que indicar algún modelo.');
	}

	if(! is_callable($modelo.'::obtener')){
		die('El modelo "'.$modelo.'" no existe.');
	}

	if($profile){
		$bench = new Ubench;
		$bench->start();
	}

	if( $filtros ){
		$resultado =  call_user_func( $modelo.'::obtener', $filtros);
	}else{
		$resultado = call_user_func($modelo.'::obtener');
	}

	if($profile){
		$bench->end();
		echo '<pre style="font-size: 18px;">';
		echo 'Tiempo: '.$bench->getTime(false, '%d%s')."\n"; // 156ms or 1s
		echo 'Memoria max: '.$bench->getMemoryPeak()."\n";  // 152B or 90.00Kb or 15.23Mb
		echo 'Memoria uso: '.$bench->getMemoryUsage()."\n"; // 152B or 90.00Kb or 15.23Mb
		echo '</pre>';
	}

	if(isset($_GET['sql']) AND $_GET['sql']=='wdjat'){
		foreach($GLOBALS['log'] as $log){
			echo '<pre>'.$log.'</pre>';
		}
	}

	$formato = isset($_GET['formato']) ? $_GET['formato'] : 'default';
	switch($formato){
		case 'html' :
			if(strtolower($modelo) == ''){
				foreach($resultado as $n){
					include('templates/modulo-.php');
				}
				break;
			}

		case 'json' :
			header('Content-type: application/json');
			echo json_encode($resultado, JSON_HEX_QUOT | JSON_HEX_TAG);
			break;

		default :
			echo '<pre>';
			print_r($resultado);
			echo '</pre>';
	}

 	exit;