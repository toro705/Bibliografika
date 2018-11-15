<?php

Class Archivo extends Modelo{

	public $id;
	public $nombre;
	public $ext;
	public $src;

	protected $controlador;

	static protected $modelo = 'Archivo';
	static protected $tabla  = 'archivos';

	/** Constructor
	* @param array Recibe todas los datos necesarios para leer la BD
	*
	*/
	function __construct($datos){
		$this->id          = $datos->id;
		$this->nombre      = $datos->nombre;
		$this->ext         = $datos->extension;
		$this->controlador = $datos->controlador;
		$this->src         = $this->src();
	}

	/** Obtener la URL de un archivo
	*
	*/
	public function src(){

		$ruta = $this->controlador.'/'.$this->id.'/'.$this->nombre.'.'.$this->ext;

		//Si el archivo devuelvo la URL
		if( file_exists(RESOURCES_PATH.'files/'.$ruta) OR isset($_GET['debug_archivo']) ){
			return BASE_URL.'archivos/'.$ruta;
		}
		return false;
	}


	/** Obtener elementos filtrados desde la BD
	* @param filtros Puede ser: todos, id o un array con cualquiera de esos filtros
	*
	*/
	static function obtener( $filtros = array(), $dato = null, $modelo = '', $tabla = ''){

		return parent::obtener($filtros, $dato, 'Archivo', 'archivos');
	}

}
