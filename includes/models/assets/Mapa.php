<?php

Class Mapa extends Modelo{

	public $id;
	public $lat;
	public $lng;
	public $streetview;


	/** Constructor
	* @param array Recibe todas los datos necesarios para leer la BD
	*
	*/
	function __construct($datos){
		$this->id = $datos->id;
		$this->lat = $datos->lat;
		$this->lng = $datos->lng;
		$this->streetview = $datos->streetview;
	}


	/** Obtener el HTMl del mapa
	*
	*/
	public function html(){
		return
		'<div class="js-mapa google-map" data-lng="'.$this->lng.'" data-lat="'.$this->lat.'" data-cargado="false">
			Esto va a ser reemplazado por un mapa de Google.
		</div>';
	}


	/** Obtener elementos filtrados desde la BD
	* @param filtros Puede ser: todos, id o un array con cualquiera de esos filtros
	*
	*/
	static function obtener( $filtros = array(), $dato = null, $modelo = '', $tabla = ''){
		$filtros = !is_array($filtros) ? array($filtros => $dato) : $filtros;
		$filtros += array('activo' => 1);
		return parent::obtener($filtros, $dato, 'Mapa', 'mapas');
	}


	/** Construye el SQL para cada filtro
	*
	*/
	protected static function filtro($tabla, $tipo, $dato = null){

		// Sobreescribo o agrego filtros
		$filtro = parent::filtro($tabla, $tipo, $dato);
		switch($tipo){
			case 'activo':
				$filtro = array(
					'where'  => $tabla.'.activo=1 AND '.$tabla.'.lat!= 0 AND '.$tabla.'.lng!=0',
				);
				break;
		}

		return $filtro;
	}

}
