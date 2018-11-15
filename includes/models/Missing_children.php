<?php

Class Missing_children{

	public $id;
	public $nombre;
	public $fecha_desaparicion;
	public $fecha_foto;
	public $fecha_nacimiento;
	public $residencia;
	public $edad;
	public $edad_foto;

	public $foto;

	/** Constructor
	*
	*/
	function __construct( $datos ){
		$this->id                 = $datos->id;
		$this->nombre             = ucwords(strtolower($datos->nombre).' '.strtolower($datos->apellido));
		$this->fecha_desaparicion = $datos->fecha_desaparicion;
		$this->fecha_foto         = $datos->fecha_foto;
		$this->fecha_nacimiento   = $datos->fecha_nacimiento;
		$this->residencia         = $datos->residencia;
		$this->edad               = $datos->edad;
		$this->edad_foto          = $datos->edad_foto;

		$this->foto  = 'https://static.noencontrado.org/img/'.$this->id.'.jpg';
	}


	/** Obtener
	*
	*/
	public static function obtener(){

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL, 'http://api.noencontrado.org/v1/search/?key=KEY');
		$result = curl_exec($ch);
		curl_close($ch);

		$datos = json_decode($result);

		return new Missing_children( $datos->data );
	}

}