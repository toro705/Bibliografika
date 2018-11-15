<?php

Class Video{

	public $codigo;

	/** Constructor
	* @param array Recibe todas los datos necesarios para leer la BD
	*
	*/
	function __construct($datos){
		$this->codigo = $datos->codigo;
	}


	/** Obtener el HTMl del embed
	*
	*/
	public function embed(){
		return '<div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="'.$this->embed_url().'" frameborder="0" allowfullscreen></iframe>
                </div> ';
	}

	/** Obtener la URL del video para embeber
	*
	*/
	public function embed_url(){
		return 'https://www.youtube.com/embed/'.$this->codigo;
	}

	/** Obtener la URL del video para compartir
	*
	*/
	public function url(){
		return 'https://youtu.be/'.$this->codigo;
	}

}
