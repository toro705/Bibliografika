<?php

/** Campo de email
* Incorpora la opción para validar si el valor del campo tiene formato de mail
*
*/
Class Input_email extends Input_text{

	public function mostrar(){
		return $this->valor!= '' ? $this->label.': <strong><a href="mailto:'.$this->valor.'">'.$this->valor.'</a></strong>' : '';
	}

	public function validar(){

		$resultado = parent::validar();
		if(!$resultado['valida']){
			return $resultado;
		}

		foreach($this->validar as $regla){
			switch($regla){
				case 'formato':
					if( !preg_match("/[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})/i", $this->valor)){
						return array(
							'estado' => 'mail_invalido',
							'valida' => false
						);
					}
					break;
			}
		}

		return $resultado;
	}
}
