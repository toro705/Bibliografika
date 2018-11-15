<?php

/** Clase base para todos los objetos
*
*/
abstract Class Modelo{


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


	/** Obtener elementos filtrados desde la BD
	* @param filtros Puede ser: todos, id o un array con cualquiera de esos filtros
	*
	*/
	public static function obtener( $filtros = array('todos' => ''), $dato = null, $modelo = '', $tabla = ''){

		$filtros = !is_array($filtros) ? array($filtros => $dato) : $filtros;

		if(array_key_exists('id', $filtros) AND $filtros['id'] == 0){
			return null;
		}

		include(INCLUDE_PATH.'config/db.php');

		//$sql = $modelo::sql($tabla, $modelo, $filtros);
		$sql = call_user_func_array(array($modelo,'sql'), array($tabla, $modelo, $filtros));

		if( isset($_GET['sql']) AND $_GET['sql']=='wdjat' ){
			//$GLOBALS['log'][] = $modelo.' - '.$sql;
			echo $modelo.' - '.$sql;
		}

		if(! ($result = $mysqli->query( $sql ))){
			return null;
		}

		$elementos = array();
		if( $result->num_rows>0 ){
			while( $datos = $result->fetch_object() ){
				$elementos[] = new $modelo( $datos );
			}
		}

		$mysqli->close();

		return (array_key_exists( 'id', $filtros )) ? ( count($elementos)>0 ? reset($elementos) : null ): $elementos;
	}


	/** Crear SQL para obtener los elementos de la BD
	* @param filtros Puede ser: todos, id o un array con cualquiera de esos filtros
	*
	*/
	protected static function sql($tabla, $modelo, $filtros){

		$sql = array(
			'select'   => array(),
			'from'     => array(),
			'where'    => array(),
			'group_by' => array(),
			'order'    => array(),
			'limit'    => array(),
		);

		foreach($filtros AS $tipo => $dato){

			//$filtro = $modelo::filtro($tabla, $tipo, $dato);
			$filtro = call_user_func_array(array($modelo,'filtro'), array($tabla, $tipo, $dato));
			foreach($sql AS $clausula => $sentencias){
				if(array_key_exists($clausula, $filtro)){
					$sql[ $clausula ][] = $filtro[ $clausula ];
				}
			}
		}

		// Construyo el SQL y agrego los valores por defecto
		foreach($sql AS $clausula => $sentencias){

			$sql[ $clausula ] = call_user_func_array(
				array($modelo,'sql_defecto'),
				array($tabla, $clausula, $sentencias)
				);
		}

		return implode(' ', $sql);
	}


	/** Construye el SQL para un filtro específico
	*
	*/
	protected static function filtro($tabla, $tipo, $dato = null){
		$filtro = array();
		switch($tipo){
			case 'id':
				$filtro = array(
					'where'  => $tabla.'.id = '.intval($dato),
					'limit'  => '1',
				);
				break;

			case 'ultimos':
			case 'ultimas':
				$filtro = array(
					'limit'  => $dato ? intval($dato) : 1,
				);
				break;

			case 'activa':
			case 'activo':
			case 'destacada':
			case 'destacado':
				$filtro = array(
					'where'  => $tabla.'.'.$tipo.' = 1',
				);

			case 'todos':
			case 'todas':
				// No se aplica ningún filtro.
				break;
		}

		return $filtro;
	}


	/** Traducir propiedad
	*
	*/
	protected function traducir($propiedad, $idioma = IDIOMA){
		if( trim($this->{$propiedad.'_'.$idioma})=='' ){
			if($idioma != IDIOMA_DEFAULT){
				$idioma = IDIOMA_DEFAULT;

			}else{
				// Obtengo un array de todos los otros idiomas disponibles
				$idiomas_disponibles = json_decode(IDIOMA_ENABLED);
				if(($key = array_search(IDIOMA_DEFAULT, $idiomas_disponibles)) !== false) {
				    unset($idiomas_disponibles[$key]);
				}
				$idioma = !empty($idiomas_disponibles) ? array_shift($idiomas_disponibles) : IDIOMA_DEFAULT;
			}
		}

		return $this->{$propiedad.'_'.$idioma};
	}


	/** Cargar traducciones
	* Genera las propiedades con traducción en cada idioma y crea una propiedad
	* genérica (sin el prefijo de idioma)
	*/
	protected function cargar_traducciones($propiedades, $datos){
		foreach($propiedades as $propiedad){
			foreach(json_decode(IDIOMA_ENABLED) as $idioma){
				$campo_idioma = $propiedad."_".$idioma;
				$this->formatear_propiedad($campo_idioma, $datos->$campo_idioma);
			}
			$this->$propiedad = $this->traducir($propiedad, IDIOMA);
		}
	}


	/** Formatear propiedad
	* Especifica las reglas que le dan formato a las propiedades.
	* Por defecto no se le da ningún formato.
	*/
	protected function formatear_propiedad($propiedad_nombre, $propiedad_valor){
		$this->$propiedad_nombre = $propiedad_valor;
	}


	/** SQL por defecto
	* Defino los valores por defecto para todas las cláusulas
	*/
	protected static function sql_defecto($tabla, $clausula, $sentencias){
		switch($clausula){
			case 'select' :
				return 'SELECT '.$tabla.'.* '.(!empty($sentencias) ? ', '.implode(',', $sentencias) : '');

			case 'from' :
				return 'FROM '.$tabla.' '.(!empty($sentencias) ? implode(' ', $sentencias) : '');

			case 'where' :
				return !empty($sentencias) ? 'WHERE ('.implode(' AND ', $sentencias).') ' : '';

			case 'group_by' :
				return !empty($sentencias) ? 'GROUP BY '.implode(',', $sentencias) : '';

			case 'order' :
				return 'ORDER BY '.(!empty($sentencias) ? implode(',', $sentencias).',' : '').' '.$tabla.'.orden ASC, '.$tabla.'.id ASC';

			case 'limit' :
				return !empty($sentencias) ? 'LIMIT '.trim($sentencias[0]) : '';
		}
	}
}