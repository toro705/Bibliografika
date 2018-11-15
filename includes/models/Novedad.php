<?php

Class Novedad extends Modelo{

	public $id;
	public $fecha;

	public $titulo;
	public $bajada;
	public $cuerpo;

	protected $foto_id;

	function foto(){
		return Foto::obtener(array('id' => $this->foto_id), array(
		 	'medidas' => array(
				array(
		 			'ancho' 		=> 751,
		 			'alto'  		=> 'auto',
		 			'src_default'  	=> '',
				),
				array(
		 			'ancho' 		=> 332,
		 			'alto'  		=> 220,
		 			'src_default'  	=> '',
				),
				array(
		 			'ancho' 		=> 263,
		 			'alto'  		=> 174,
		 			'src_default'  	=> '',
				),
		 	),
		 	'controlador' => array(
				'nombre' => 'novedades',
				'id'     => $this->id
		 	)
		));
	}


	/** Constructor
	* @param array Recibe todos los datos con los que se va a construir el objeto
	*
	*/
	function __construct($datos){
		$this->id = $datos->id;
		$this->foto_id = $datos->foto;
		$this->fecha = new Fecha($datos->fecha);
		$this->cargar_traducciones(array('titulo','bajada','cuerpo'), $datos);
	}


	/** Construye el SQL para un filtro específico
	*
	*/
	protected static function filtro($tabla, $tipo, $dato = null){
		$filtro = parent::filtro($tabla, $tipo, $dato);
		switch($tipo){
			case 'destacada':
				$filtro = array(
					'where'  => $tabla.'.destacada = 1',
					'limit'  => '3',
				);
				break;

			case 'año':
				$filtro = array(
					'where'  => 'YEAR('.$tabla.'.fecha) = "'.$dato.'"',
				);
				break;

			case 'sede':
				$sede = ($dato=='sf') ? 1 : 2;
				$filtro = array(
					'where'  =>  $tabla.'.sede LIKE "%'.$sede.'%"',
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

		$filtros = !is_array($filtros) ? array($filtros => $dato) : $filtros;
		$filtros = array_merge($filtros, array('activa' => 1));

		return parent::obtener($filtros, $dato, 'Novedad', 'novedades');
	}

	/** SQL por defecto
	* Defino los valores por defecto para todas las cláusulas
	* Ordeno las noticias por fecha
	*/
	protected static function sql_defecto($tabla, $clausula, $sentencias){
		switch($clausula){
			case 'order' :
				return 'ORDER BY '.(!empty($sentencias) ? implode(',', $sentencias).',' : '').' '.$tabla.'.fecha DESC, '.$tabla.'.orden ASC, '.$tabla.'.id ASC';
			default:
				return parent::sql_defecto($tabla, $clausula, $sentencias);
		}
	}


	/** Obtener años
	* Devuelve los distintos años en los que hay novedades
	*
	*/
	static function anios($sede){

		$sede = ($sede == 'sf') ? 1 : 2;

		include('config/db.php');

		$sql = 'SELECT DISTINCT YEAR(fecha) AS year FROM novedades WHERE sede LIKE "%'.$sede.'%" ORDER BY fecha DESC';
		$elementos = array();
		if(! $result = $mysqli->query( $sql )){
			$mysqli->close();
			return $elementos;
		}

		if( $result->num_rows>0 ){
			while( $item = $result->fetch_object() ){
				$elementos[$item->year] = $item->year;
			}
		}

		$mysqli->close();

		return $elementos;
	}
}