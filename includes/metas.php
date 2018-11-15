<?php

/* Construyo las metas
* Tomo el valor del array $metas de cada página o
* del CMS o uso un valor por defecto.
*/

  $metas_config = array(
    'titulo' => array(
      'valor' => '{this} | '.Empresa::$nombre,
      'default' => array(
        'es' => Empresa::$nombre,
      )
    ),
    'descripcion' => array(
      'valor' => '{this}',
      'default' => array(
        'es' => 'Sin stock, sin riesgos, sin fronteras. Ofrecemos impresión y eDistribución nacional e internacional de libros. 14 años de experiencia nos respaldan. Desde un ejemplar, te ofrecemos imprimir tus títulos bajo demanda en Argentina, Colombia, España, México y Perú.',
      )
    ),
    'slider' => array(
      'valor' => '{this}',
      'default' => array(
        'es' => '',
      )
    ),
    'img' => array(
      'valor' => '{this}',
      'default' => array(
        'es' => BASE_URL.'images/favicons/mstile-310x310.png' 
      )
    ),
  );


  // Comentar esta línea para desactivar las metas dinámicas
  $meta_dinamica = Meta::obtener('seccion', SECCION);

  foreach($metas_config AS $meta_key => $meta_config){

    //Toma el valor definido en el archivo de idioma
    if( count(json_decode(IDIOMA_ENABLED)) > 1 ){
      if( isset(${'metas_'.$meta_key.'_'.SECCION}) ){
        $metas[ $meta_key ] = generar_meta($txt['metas_'.$meta_key.'_'.SECCION], $meta_config['valor']);
        continue;
      }
    }

    //Si no hay idioma o no está definida la variable en el archivo de idiomas toma el valor definido en cada página
    if( isset($metas) AND array_key_exists($meta_key, $metas) AND $metas[$meta_key]!=''){
       $metas[ $meta_key ] = generar_meta($metas[$meta_key], $meta_config['valor']);
       continue;
    }

    //Si no está definida o no tiene valor toma el valor definido en el administrador
    if( isset($meta_dinamica) AND ! is_null($meta_dinamica) AND isset($meta_dinamica->$meta_key) AND $meta_dinamica->$meta_key!='' ){
      $metas[ $meta_key ] = generar_meta($meta_dinamica->$meta_key, $meta_config['valor']);
      continue;
    }

    //O si no toma el valor por defecto (del idioma actual o del idioma por defecto)
    if(array_key_exists(IDIOMA, $meta_config['default'])) {
        $metas[ $meta_key ] = $meta_config['default'][IDIOMA];

    }else{
        $metas[ $meta_key ] = $meta_config['default'][IDIOMA_DEFAULT];
    }

  }

  /** Prepara el contenido de cada meta
  * Remueve las comillas dobles para que no se rompa el HTML
  */
  function generar_meta($valor, $plantilla){
    return str_replace('"', '\'', str_replace('{this}', $valor, $plantilla));
  }
