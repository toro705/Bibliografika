<?php

// Dependencias
include('Campo.php');

/** Clase para validar, construir un mensaje y enviarlo por mail
*
*/
Class Formulario{

	public $estado;
	public $mensaje_estado;
	public $campos = array();

	private $mensajes_estado = array(
		'incompleto' 		=> 'Todos los campos con asterisco (*) son requeridos.',

		'error' 			=> 'Hubo un problema al enviar el mensaje. Por favor, vuelva a intentarlo.',

		'mail_invalido' 	=> 'El email ingresado es inválido. Por favor, vuelva a ingresarlo.',

		'captcha_invalido' 	=> 'El captcha no fue completado correctamente. Vuelva a intentarlo.',

		'ok' 				=> 'Su mensaje ha sido enviado, muchas gracias por comunicarse con nosotros.<br />
								En breve nos pondremos en contacto con Ud.',
	);

	public function __construct( $config ){
		$this->config = $config;

		$clave_nombre = $this->config['responder_a']['nombre'];
		$clave_email = $this->config['responder_a']['email'];

		$this->config['responder_a']['nombre'] = isset($_POST[$clave_nombre]) ? $_POST[$clave_nombre] : '';
		$this->config['responder_a']['email'] = isset($_POST[$clave_email]) ? $_POST[$clave_email] : '';

		$this->config['debug'] = isset($this->config['opciones']['debug']) ? $this->config['opciones']['debug'] : false;
		$this->config['guardar_contacto'] = isset($this->config['opciones']['guardar_contacto']) ? $this->config['opciones']['guardar_contacto'] : true;
		$this->config['guardar_form'] = isset($this->config['opciones']['guardar_form']) ? $this->config['opciones']['guardar_form'] : true;
	}

	/** Agregar campos
	* Genera todos los campos con sus validaciones y formatos
	*/
	public function agregarCampos( $campos ){
		foreach($campos as $c){
			$this->agregarCampo( $c );
		}
	}

	/** Agregar campo
	* Genera 1 campo con sus validaciones y formatos
	*/
	public function agregarCampo( $campo ){
		switch ($campo['tipo']) {
			case 'grupo':
				$grupo = $campo;
				foreach($grupo['campos'] as $c){

					$c['grupo'] = array(
						'name' => $grupo['name'],
						'label' => $grupo['label']
					);

					$name = $grupo['name'].'_'.$c['name'];
					$tipo = 'Input_'.$c['tipo'];
					$this->campos[$name] = new $tipo( $c );
				}
				break;

			default:
				$tipo = 'Input_'.$campo['tipo'];
				$this->campos[$campo['name']] = new $tipo( $campo );
				break;
		}
	}

	/** Construye el mensaje para enviar
	*
	*/
	public function contruirMensaje(){

		//Preformateo de las variables
		//$_POST['checkbox_ejemplo'] = isset($_POST['checkbox_ejemplo']) ? 'si' : 'no';

		$this->cuerpo = '<html><body style="font-family:Arial, Helvetica, sans-serif; font-size:12px;">';
		$this->cuerpo .= '<h3>'.$this->config['asunto'].'</h3>';
		$this->cuerpo .= '<p style="font-size:80%;">Enviado el '.  date("d/m/Y \a \l\a\s h:i\h\s").'</p>';
		$this->cuerpo .= '<hr /><p>';

		$grupo = '';
		foreach($this->campos AS $c){
			if($html_campo = $c->mostrar()){
				if($c->grupo){
					if($grupo != $c->grupo['label']){
						$grupo = $c->grupo['label'];
						$this->cuerpo .= '<h3>'.$grupo.'</h3>';
					}
				}else{
					if($grupo != ''){
						$grupo = '';
						$this->cuerpo .= '<br>';
					}
				}
			}
			$this->cuerpo .= $html_campo.'<br>';
		}


		$this->cuerpo .= '</p><hr /></body></html>';

		return $this->cuerpo;
	}

	/** Define el mensaje y el estado de envío del formulario según el código de estado
	*
	*/
	public function cambiarEstado( $codigo ){

		$this->estado = array_key_exists($codigo, $this->mensajes_estado) ? $codigo : 'error';
		$mensaje = $this->mensajes_estado[ $this->estado ];

		$this->mensaje_estado = '<p class="msje-estado '.($this->estado=='ok' ? 'ok' : 'error').'">'.$mensaje.'</p>';

		return ($this->estado == 'ok') ? true : false;
	}

	/** Agrega o actualiza un mensaje de estado
	*
	*/
	public function agregarMensajeEstado($nuevo_mensaje_estado){

		$this->mensajes_estado = array_merge($this->mensajes_estado, $nuevo_mensaje_estado);
	}

	/** Valida el formulario
	*
	*/
	public function validar(){

		if( ! $this->validarCampos() ){
			return false;
		}

		//Acá se puede agregar alguna validación adicional

		return true;
	}

	/** Valida los datos de los campos del formulario
	*
	*/
	public function validarCampos(){

		//Preparo selects
		//if($_POST['select-ejemplo'] == 0){ unset($_POST['select-ejemplo']); }

		foreach($this->campos AS $c){
			$resultado = $c->validar();
			if(!$resultado['valida']){
				if($this->config['opciones']['debug']){
					echo '<pre>'; print_r($c); echo '</pre>';
					trigger_error('El campo "'.(isset($c->grupo) ? $c->grupo['name'].'_' : '').$c->name.'" no valida.');
				}
				return $this->cambiarEstado( $resultado['estado'] );
			}
		}

		return true;
	}

	/** Envía el formulario
	* Envía el formulario y realiza todas las acciones post envío (guardar en BD datos enviados y contacto)
	*/
	function enviar(){

		if($this->config['guardar_contacto']){
			$this->guardarContacto($this->config['remitente']['nombre'], $this->config['remitente']['email']);
		}

		if( $this->validar() ){

			if($this->config['opciones']['debug']){
				echo '<pre id="formularioDebugMsj" style="position: fixed; top: 0; left: 0; width: 100%; height: auto; z-index: 9999999;">
						<div style="width:500px; margin: 0 auto;">
							<a href="" onclick="document.getElementById(\'formularioDebugMsj\').style.display=\'none\'; return false;">Cerrar</a>';
				print_r($this->contruirMensaje());
				echo 	'</div>
					</pre>';

				$this->enviado = true;

			}else{

				require('forms/libs/PHPMailer/PHPMailerAutoload.php');

				$PHPMailer = new PHPMailer();

				$PHPMailer->CharSet  = "UTF-8";
				$PHPMailer->IsHTML(true);
				$PHPMailer->Subject  = $this->config['asunto'];
				$PHPMailer->From     = $this->config['remitente']['email'];
				$PHPMailer->FromName = $this->config['remitente']['nombre'];
				$PHPMailer->AddReplyTo(
					$this->config['responder_a']['email'],
					$this->config['responder_a']['nombre']
				);

				foreach($this->config['destinatarios'] as $d){
					$PHPMailer->AddAddress($d);
				}

				$PHPMailer->Body = $this->contruirMensaje();

				//Adjuntos
				foreach($this->campos AS $c){
					if($c->tipo == 'file'){
						$PHPMailer->AddAttachment($c->nombre_tmp , $c->nombre_real);
					}
				}

				// Se realizan hasta 3 intentos de envio del correo
				for($i=0; $i<3; $i++){
					if($this->enviado = $PHPMailer->Send()){
						break;
					}
					sleep(2);
				}
			}

			if($this->enviado){
				$this->cambiarEstado('ok');
				if($this->config['guardar_form']){
					$this->guardarFormulario();
				}

			}else{
				$this->cambiarEstado('error');
			}
		}
	}

	/** Guarda contacto en BD
	*
	*/
	function guardarContacto(){

		$nombre = $this->config['responder_a']['nombre'];
		$email = $this->config['responder_a']['email'];

		//No guardo el contacto si ya existe o es de synapsis
		if( $this->existeContacto( $email ) OR stripos($email, 'synapsis.com.ar')!==false ){
			return;
		}

		include('config/db.php');

		$sql = 'INSERT INTO contactos(id, nombre, email, fecha) VALUES (null, "'.$mysqli->real_escape_string($nombre).'", "'.$mysqli->real_escape_string($email).'", "'.date('Y-m-d').'")';
		$mysqli->query( $sql );

	}

	/** Verifica que exista el contacto en la BD
	*
	*/
	function existeContacto( $email ){

		include('config/db.php');

		$sql = 'SELECT * FROM contactos WHERE email ="'.$mysqli->real_escape_string($email).'"';
		$result = $mysqli->query( $sql );

		return ( $result->num_rows>0 ) ? true : false;
	}

	/** Guarda todos los datos enviados en la BD
	*
	*/
	function guardarFormulario(){

		include('config/db.php');

		$valores = array();
		$nombres = array();
		foreach ($this->campos as $campo) {
			if(strtolower($campo->tipo) == 'captcha'){
				continue;
			}
			$nombres[] = $campo->name;
			if(! is_array($campo->valor)){
				$valores[] = $campo->valor!='' ? '"'.$mysqli->real_escape_string($campo->valor).'"' : '""';
			}else{
				$valores[] = !empty($campo->valor) ? '"'.$mysqli->real_escape_string(implode(', ', $campo->valor)).'"' : '""';
			}
		}

		$sql = 'INSERT INTO formularios(id, '.implode(',',$nombres).', fecha) VALUES (null, '.implode(',',$valores).', "'.date('Y-m-d').'")';
		$mysqli->query( $sql );

	}


}

