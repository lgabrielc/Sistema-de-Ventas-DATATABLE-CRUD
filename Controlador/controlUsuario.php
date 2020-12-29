<?php
class controlUsuario
{
	public function verificarUsuario($user,$password)
	{
		include_once("../Modelo/usuario.php");
		$objUsuario = new Usuario;
		$respuesta = $objUsuario -> validarUsuario($user,$password);
        while ($fila = mysqli_fetch_array($respuesta)){
       	session_start();
        $_SESSION["idusuario"] = $fila['idusuario'];
        $_SESSION["usuario"] = $fila['usuario'];
        $_SESSION["dni"] = $fila['dni'];
        $_SESSION["nombre"] = $fila['nombre'];
        $_SESSION["apepat"] = $fila['apepat'];
        $_SESSION["apemat"] = $fila['apemat'];
        $_SESSION["telefono"] = $fila['telefono'];
        $_SESSION["correo"] = $fila['correo'];
        $_SESSION["estado"] = $fila['estado'];
      }		
		$verificar=$respuesta -> num_rows;
		if ($verificar=='0')
		{
			include_once("../mensaje.php");
			$objMensaje = new Mensaje;
			$objMensaje -> MostrarMensaje("Error, el usuario no existe, el password es incorrecto o el usuario esta deshabilitado, contacte con el administrador del sistema","<a href='../index.php'>ir al inicio</a>");
		}
		else
		{
			header("Location: ../Vistas/principal.php");
		//	$objDatos = new detalleUsuario;		
	//		$datos = $objDatos->obtenerDatos($user);
		}
	}
	public function listarUsuarios()
	{
		include_once("../Modelo/usuario.php");
		$objUsuario = new Usuario;
		$respuesta = $objUsuario ->listarUsuarios();
     	$data = $respuesta ->fetch_all(MYSQLI_ASSOC);
     	return $data;
	}
	public function ingresarUsuario($usuario, $password, $dni, $nombre, $apepat,$apemat,$telefono,$correo,$estado)
	{
		include_once("../Modelo/usuario.php");
		$objUsuario=new Usuario;
		$respuesta=$objUsuario->ingresarUsuario($usuario, $password, $dni, $nombre, $apepat,$apemat,$telefono,$correo,$estado);
		$data=$respuesta ->fetch_all(MYSQLI_ASSOC);
		return $data;
	}
	public function actualizarUsuario($idusuario,$usuario, $password, $dni, $nombre, $apepat,$apemat,$telefono,$correo,$estado)
	{
		include_once("../Modelo/usuario.php");
		$objUsuario=new Usuario;
		$respuesta=$objUsuario->actualizarUsuario($idusuario,$usuario, $password, $dni, $nombre, $apepat,$apemat,$telefono,$correo,$estado);
		$data=$respuesta ->fetch_all(MYSQLI_ASSOC);
		return $data;
	}
	public function eliminarUsuario($idusuario)
	{
		include_once("../Modelo/usuario.php");
		$objUsuario=new Usuario;
		$objUsuario->eliminarUsuario($idusuario);
		//$data=$respuesta ->fetch_all(MYSQLI_ASSOC);
		return $respuesta;
	}
	public function privilegioUsuario($usuario)
	{
		include_once("../Modelo/usuario.php");
		$objUsuario=new Usuario;
		$fila=$objUsuario->privilegioUsuario($usuario);
		return $fila;
	}

}
?>
