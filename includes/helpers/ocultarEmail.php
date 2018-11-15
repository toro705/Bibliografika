<?php

function ocultarEmail( $email ){

	$output = '';
	for ($i = 0; $i < strlen($email); $i++) {
		$output .= '&#'.ord($email[$i]).';';
	}
	return $output;
}