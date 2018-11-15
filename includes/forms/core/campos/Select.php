<?php

/** Campo dropdown
*
*/
Class Input_select extends Campo{

	public $opciones;

	/** Crea un campo con la configuración básica
	*
	*/
	function __construct( $datos ){

		parent::__construct( $datos );

		if(isset($datos['opciones'])){
			$this->opciones = $datos['opciones'];
		}else{
			$this->opciones = array('' => 'Seleccione una opción');
		}
	}


	/** Genera del input del campo
	*
	*/
	public function input(){
		$html = '<select '.
					'id="'. $this->name .'" '.
					'class="form-control" '.
					'name="'. $this->name .'" '.
					'>';

		foreach($this->opciones as $opc_i => $opc_v){
			$html .= '<option value="'.$opc_i.'" '.
						((isset($_POST[$this->name]) AND $_POST[$this->name] == $opc_i) ? 'selected' : '').
					 '>'.$opc_v.'</option>';
		}

		$html .= '</select>';

		return $html;
	}
}
