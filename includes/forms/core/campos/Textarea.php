<?php

/** Campo de textarea
*
*/
Class Input_textarea extends Campo{

	/** Genera del input del campo
	*
	*/
	public function input(){
		return '<textarea '.
					'id="'. $this->name .'" '.
					'class="form-control" '.
					'name="'. $this->name .'" >'.
					( isset($_POST[$this->name]) ? $_POST[$this->name] : '' ).
				'</textarea>';
	}
}
