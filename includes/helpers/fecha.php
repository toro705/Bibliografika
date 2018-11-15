<?php

function fecha($formato, $fecha){

	$fechas = array(
		'F' => array(
			'Enero',
			'Febrero',
			'Marzo',
			'Abril',
			'Mayo',
			'Junio',
			'Julio',
			'Agosto',
			'Septiembre',
			'Octubre',
			'Noviembre',
			'Diciembre'
		)
	);
	switch($formato){
		case 'F':
			$fecha_formateada = $fechas['F'][ date('n',$fecha)-1 ];
			break;

		default: $fecha_formateada = date($formato, $fecha);
	}

	return	$fecha_formateada;
}