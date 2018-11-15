<?php

/** Clase base para todos los campos
*
*/
abstract class Campo{

	public $name;
	public $label;
	public $valor;
	public $tipo;
	public $validar;

	/** Crea un campo con la configuración básica
	*
	*/
	function __construct( $datos ){
		$this->label = $datos['label'];
		$this->tipo  = $datos['tipo'];
		$this->grupo = array_key_exists('grupo',$datos) ? $datos['grupo'] : false;

		$this->name  = $this->grupo ? $this->grupo['name'].'_'.$datos['name'] : $datos['name'];

		if(isset( $_POST[$this->name])){
			if(! is_array( $_POST[$this->name])){
				$this->valor = trim( $_POST[$this->name]);

			}else{
				foreach( $_POST[$this->name] AS $i => $valor){
					$this->valor[$i] = trim($valor);
				}
			}
		}

		$this->validar = array_key_exists('validar', $datos) ? $datos['validar'] : array();
	}

	/** Carga perezosa para algunas propiedades
	* @param string $propiedad Variable a cargar
	*
	*/
	public function __get($propiedad) {
	    switch($propiedad) {
			default:
				if(method_exists( $this, $propiedad )){
					$this->$propiedad = $this->$propiedad();
				}else{
					return false;
				}
	    }
		return $this->$propiedad;
	}


	/** Valida un campo
	* Se valida el campo según las validaciones definidas en la propiedad $validar
	*
	*/
	public function validar(){

		$resultado = array(
			'estado' => 'ok',
			'valida' => true
		);

		foreach($this->validar as $regla){
			switch($regla){
				case 'requerido':
					if($this->valor == ''){
						$resultado['estado'] = 'incompleto';
						$resultado['valida'] = false;
						return $resultado;
					}
					break;
			}
		}

		return $resultado;
	}

	/** Mostrar un campo
	* @return Devuelve el HTML para construir el mensaje que se envía por mail
	*
	*/
	public function mostrar(){
		if($this->valor!= ''){
			return $this->label.': <strong>'.$this->valor.'</strong>';
		}
	}

	/** Genera del input del campo
	*
	*/
	public function input(){
		return '<input '.
					'type="'. $this->tipo .'" '.
					'id="'. $this->name .'" '.
					'name="'. $this->name .'" '.
					'class="form-control" '.
					'value="'.( isset($_POST[$this->name]) ? $_POST[$this->name] : '').'"'.
				'/>';
	}

	/** Genera el HTML del label del campo
	*
	*/
	public function label(){
		return '<label class="control-label" for="'.$this->name.'">'.$this->label.'</label>';
	}

	/** Genera el HTML del campo
	*
	*/
	public function html(){
		return '<div class="form-group">'.$this->label.$this->input.'</div>';
	}
}

/**
 * Autocargador de campos
 *
 * @param string $clase El nombre del campo.
 * @return void
 */
function autocargadorCampos($clase) {
	$clase = ucFirst(str_replace('Input_','',$clase));
    $campo = INCLUDE_PATH.'forms/core/campos/'.$clase.'.php';

    if (file_exists($campo)) {
        require $campo;
    }
}
spl_autoload_register('autocargadorCampos');

