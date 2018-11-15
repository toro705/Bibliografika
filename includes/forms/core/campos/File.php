<?php

/** Campo de archivo
* Incorpora la opción para validar si se subió el archivo
*
*/
Class Input_file extends Campo{

	public $nombre_real;
	public $nombre_tmp;
	public $tamano;

	function __construct( $datos ){
		parent::__construct( $datos );
		$this->nombre_real 	= isset($_FILES[$this->name]['name']) 		? $_FILES[$this->name]['name'] : '';
		$this->nombre_tmp 	= isset($_FILES[$this->name]['tmp_name']) 	? $_FILES[$this->name]['tmp_name'] : '';
		$this->tamano 		= isset($_FILES[$this->name]['size']) 		? $_FILES[$this->name]['size'] : 0;
	}

	public function validar(){

		$resultado = array(
			'estado' => 'ok',
			'valida' => true
		);

		foreach($this->validar as $regla){
			switch($regla){
				case 'requerido':
				    if($this->nombre_real==''){
						return array(
							'estado' => 'incompleto',
							'valida' => false
						);
				    }

					if ($this->tamano <= 0){
						return array(
							'estado' => 'error_archivo',
							'valida' => false
						);
				    }
					break;
			}
		}

		return $resultado;
	}
}
