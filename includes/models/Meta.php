<?php

Class Meta extends Modelo{

	public $seccion;
	public $titulo;
	public $descripcion;

	/** Constructor
	* @param array Recibe todas los datos con los que se va a construir el objeto
	*
	*/
	function __construct( $datos ){
		$this->seccion = $datos->seccion;
		$this->cargar_traducciones(array('titulo','descripcion'), $datos);
	}


	/** Construye el SQL para un filtro específico
	*
	*/
	protected static function filtro($tabla, $tipo, $dato = null){
		$filtro = parent::filtro($tabla, $tipo, $dato);
		switch($tipo){
			case 'seccion':
				$filtro = array(
					'where'  => $tabla.'.id = '.intval($dato),
					'limit'  => '1',
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
		return parent::obtener($filtros, $dato, 'Meta', 'metas');
	}

}