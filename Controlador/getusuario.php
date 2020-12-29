<?php

	if (isset($_POST['btn_login'])) {
		$user = trim($_POST['txt_user']);
		$pass = trim($_POST['txt_pass']);
		if (strlen($user)>=4 and strlen($pass)>=4 ) 
		{
			include_once("controlUsuario.php");
			$objUsuario=new controlUsuario;
			$objUsuario->verificarUsuario($user,$pass);
		}
		else
		{	
			include_once("../mensaje.php");
			$msg=new Mensaje;
			$msg->MostrarMensaje("Error, los datos enviados no son correctos…. Vuelva a intentar","<a href='../index.php'>ir al inicio</a>");
		}	
	}			
		$usuario   = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
		$password   = (isset($_POST['password'])) ? $_POST['password'] : '';
		$dni        = (isset($_POST['dni'])) ? $_POST['dni'] : '';
		$nombre     = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
		$apepat     = (isset($_POST['apepat'])) ? $_POST['apepat'] : '';
		$apemat     = (isset($_POST['apemat'])) ? $_POST['apemat'] : '';
		$telefono   = (isset($_POST['telefono'])) ? $_POST['telefono'] : '';
		$correo     = (isset($_POST['correo'])) ? $_POST['correo'] : '';
		$estado     = (isset($_POST['estado'])) ? $_POST['estado'] : '';
		$opcion     = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
		$idusuario  = (isset($_POST['idusuario'])) ? $_POST['idusuario'] : '';

		switch($opcion){
		case 1:
			include_once("controlUsuario.php");
			$objUsuario=new controlUsuario;
			$data = $objUsuario->ingresarUsuario($usuario, $password, $dni, $nombre, $apepat,$apemat,$telefono,$correo,$estado);
			print json_encode($data, JSON_UNESCAPED_UNICODE);
			break;
		case 2:
			include_once("controlUsuario.php");
			$objUsuario=new controlUsuario;
			$data = $objUsuario->actualizarUsuario($idusuario,$usuario, $password, $dni, $nombre, $apepat,$apemat,$telefono,$correo,$estado);
			print json_encode($data, JSON_UNESCAPED_UNICODE);
			break;
		case 3:
			include_once("controlUsuario.php");
			$objUsuario=new controlUsuario;
			$objUsuario->eliminarUsuario($idusuario);
			print json_encode($data, JSON_UNESCAPED_UNICODE);
			break;
		case 4:
			include_once("controlUsuario.php");
			$objUsuario=new controlUsuario;
			$data = $objUsuario->listarUsuarios();
			print json_encode($data, JSON_UNESCAPED_UNICODE);
			break;
		}
?>