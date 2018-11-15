<?php

Class Menu extends Modelo{

	public $id;
	public $fecha;

	protected $archivo_id;

	function archivo(){
		return Archivo::obtener('id', $this->archivo_id);
	}


	/** Constructor
	* @param array Recibe todos los datos con los que se va a construir el objeto
	*
	*/
	function __construct($datos){
		$this->id         = $datos->id;
		$this->archivo_id = $datos->archivo;
		$this->fecha      = new Fecha($datos->fecha);
	}


	/** Construye el SQL para un filtro específico
	*
	*/
	protected static function filtro($tabla, $tipo, $dato = null){
		$filtro = parent::filtro($tabla, $tipo, $dato);
		switch($tipo){
			case 'sede':
				$sede = ($dato=='sf') ? 1 : 2;
				$filtro = array(
					'where'  =>  $tabla.'.sede LIKE "%'.$sede.'%"',
				);
				break;
		}

		return $filtro;
	}


	/** Obtener elementos filtrados desde la BD
	* @param filtros Puede ser: todos, id o un array con cualquiera de esos filtros
	*
	*/
	static function obtener( $filtros = array('todas' => ''), $dato = null, $modelo = '', $tabla = ''){

		$filtros = !is_array($filtros) ? array($filtros => $dato) : $filtros;

		return parent::obtener($filtros, $dato, 'Menu', 'menu_mensual');
	}
}