<?php

Class Foto extends Modelo{

	public $src;
	public $alt;
	public $creditos;
	public $medidas     = array();
	public $src_default = array();
	public $medida_default;

	public $ancho = 0;
	public $alto  = 0;

	private $nombre;
	private $ext;
	private $en_galeria = false;
	private $base_src;


	/** Constructor
	* @param array Recibe todas los datos necesarios para leer la BD
	* @param array Configaración de la foto. Tiene la forma:
	*
	* array(
	* 	'medidas' => array(
	*		array(
	* 			'ancho' 		=> '',
	* 			'alto'  		=> '',
	*			'default'		=> true,
	* 			'src_default'  	=> '',
	*		)
	* 	),
	*
	* 	'controlador' => array(
	*		'nombre' => '',
	*		'id' 	=> ''
	* 	)
	* )
	*
	*/
	function __construct( $datos, $config ){
		$this->nombre 	  = $datos->nombre;
		$this->ext 		  = $datos->ext;
		$this->alt 		  = $datos->alt;
		$this->en_galeria = $datos->en_galeria;

		foreach($config['medidas'] AS $medida){

			$m = $medida['ancho'].'x'.$medida['alto'];
			if($datos->en_galeria){
				$this->base_src = 'galleries/'.$datos->galeria.'/';
			}else{
				$this->base_src = 'images/'.$config['controlador']['nombre'].'/'.$config['controlador']['id'].'/';
			}

			$this->medidas[] 	 = $m;
			$this->src_default[] = $medida['src_default'];

			if( array_key_exists('default', $medida) AND $medida['default']==true ){
				$this->medida_default = $m;
			}
		}

		if( $this->medida_default==null ){
			$this->medida_default = $this->medidas[0];
		}

		$this->src = $this->src( $this->medida_default );
	}


	/** Obtener el src de una foto
	* @param string opcional Es la medida de la foto que se está pidiendo
	*
	*/
	public function src( $medida = '' ){

		if(! in_array($medida, $this->medidas)){
			$medida = $this->medida_default;
		}

		// Las fotos que no son galerías tienen las medidas al revéz (solo en la ruta)
		if( !$this->en_galeria ){
			$medida_ruta = substr($medida,  strpos($medida, 'x')+1). 'x' .substr($medida, 0, strpos($medida, 'x'));
		}else{
			$medida_ruta = $medida;
		}

		$ruta = $this->base_src.$this->nombre.($medida=='autoxauto' ? '' : '_'.$medida_ruta).'.'.$this->ext;

		// Si está activada la opción DEBUG devuelvo la ruta construida
		if( isset($_GET['debug_foto']) ){
			return RESOURCES_PATH.$ruta;
		}

		// Si existe la foto devuelvo la ruta real

		/*$curl = curl_init();
		curl_setopt_array($curl, array(
		    CURLOPT_RETURNTRANSFER => 1,
		    CURLOPT_URL => BASE_URL_BOA.$ruta,
		));
		$file_exists = curl_exec($curl);
		curl_close($curl);*/

		if( file_exists(RESOURCES_PATH.$ruta) ){
			//$this->calcularMedidaActual($medida);
			return BASE_URL.( stripos($ruta, 'images')===false  ? 'images/' : '').$ruta;
		}


		// Averiguo cuál es la foto por defecto
		$src_default_indice = array_search($medida, $this->medidas);
		if( $src_default_indice===false ){
			$src_default_indice = 0;
		}

		// Si no existe la foto devuelvo la foto por defecto para esa medida
		if( array_key_exists($src_default_indice, $this->src_default) AND
			$this->src_default[$src_default_indice]!='' ){
			$this->calcularMedidaActual($medida);
			return BASE_URL.'images/defecto/'.$this->src_default[$src_default_indice];
		}

		return false;
	}


	/** Calcula y actualiza el alto y ancho actuales de la foto
	*
	*/
	public function calcularMedidaActual( $medidas ){

		//Invierto ancho y alto si no es una galería
		if( !$this->en_galeria ){
			$medidas = substr($medidas,  strpos($medidas, 'x')+1). 'x' .substr($medidas, 0, strpos($medidas, 'x'));
		}

		$this->alto = substr($medidas,  strpos($medidas, 'x')+1);
		$this->ancho = substr($medidas, 0, strpos($medidas, 'x'));
	}


	/** Obtener una foto
	* @param string Es la medida de la foto que se está pidiendo
	*
	*/
	static public function obtener($filtros = array(), $config = null, $modelo = 'Foto', $tabla = 'fotos'){

		//Leo de la BD
		if( !array_key_exists('nombre', $filtros)){

			if(array_key_exists('id', $filtros) AND $filtros['id'] == 0){
				return new Foto( (object) array(
					'nombre' => 'no-existe-foto-ni-default',
					'ext' => 'jpg',
					'alt' => '',
					'en_galeria' => 0), $config );
			}

			if(array_key_exists('galeria', $filtros) AND $filtros['galeria'] <= 0){

				if( array_key_exists('default', $config) AND !$config['default'] ){
					return array();

				}else{
					return array(new Foto( (object) array(
					'nombre' => 'no-existe-galeria',
					'ext' => 'jpg',
					'alt' => '',
					'galeria' => 0,
					'en_galeria' => 1), $config ));
				}
			}

			include(INCLUDE_PATH.'config/db.php');

			$sql = 'SELECT 	id,
						filename 	AS nombre,
						extension 	AS ext,
						epigrafe 	AS alt,
						galerias_id AS galeria,
						(CASE WHEN (galerias_id>0 AND galerias_id IN(SELECT id FROM galerias)) THEN 1 ELSE 0 END) AS en_galeria

					FROM fotos';

			foreach($filtros AS $f => $dato){
				switch( $f ){

					case 'id' :
						$sql .= ' WHERE fotos.id='.$dato.' LIMIT 1';
						break;

					case 'galeria' :
						$sql .= ' WHERE fotos.galerias_id='.$dato.' ORDER BY orden ASC, id ASC';
						break;
				}
			}

			// Consulto la BD
			$fotos = array();
			$result = $mysqli->query( $sql );
			if( $result AND $result->num_rows>0 ){
				while( $datos = $result->fetch_object() ){
					$fotos[] = new Foto($datos, $config);
				}
			}
			$mysqli->close();


			// Reviso si la galería existía pero estaba vacía
			if(array_key_exists('galeria', $filtros) AND $filtros['galeria'] > 0 AND empty($fotos)){

				if( array_key_exists('default', $config) AND !$config['default'] ){
					return array();

				}else{
					return array(new Foto( (object) array(
					'nombre' => 'no-existe-galeria',
					'ext' => 'jpg',
					'alt' => '',
					'galeria' => 0,
					'en_galeria' => 1), $config ));
				}
			}

		//Creo la foto usando solamente la configuración
		}else{

			$datos = (object) array(
				'nombre' => '0_'.$filtros['nombre'],
				'ext' => 'jpg',
				'alt' => '',
				'en_galeria' => 0,
			);
			$fotos[] = new Foto( $datos, $config );
		}

		if(array_key_exists('id', $filtros) OR array_key_exists('nombre', $filtros)){
			return !empty($fotos) ? $fotos[0] : null;
		}else{
			return $fotos;
		}
	}

	/** Actualizar la medida por defecto de una foto
	*/
	function medidaDefault($medida){
		if(in_array($medida, $this->medidas)){
			$this->medida_default = $medida;
			$this->src = $this->src($medida);
		}
	}

}
