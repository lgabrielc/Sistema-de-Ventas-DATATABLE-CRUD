<?php
require_once("../Controlador/cone.php");
class Usuario
{
	public function validarUsuario($user,$password)
	{	
		$conexion = new Conexion();
		$consulta="SELECT * FROM usuarios WHERE usuario='$user' AND password='$password' AND estado = 1";
		$resultado = $conexion->consultar($consulta);
		return $resultado;
	}
	public function listarUsuarios()
	{
		$conexion = new conexion();
		$consulta="SELECT*FROM usuarios";
		$resultado = $conexion->consultar($consulta);
		return $resultado;
	}
	public function cambiarContraseña($p,$dni)
	{
		$conexion = $this->conectar();
		$consulta = "UPDATE usuario SET password = '$p' WHERE dni = '$dni' ";
		$resultado = mysqli_query($conexion,$consulta);
		$this->desconectar($c);

		if ( $resultado == 1 ){
			return (1);
		}else{
			return (0);
		}
	}
	public function eliminarUsuario($idusuario)
	{
		$conexion = new Conexion();
		$consulta = "DELETE FROM usuarios WHERE idusuario='$idusuario'";
		$resultado  = $conexion->consultar($consulta);
		return $resultado;
	}
	public function ingresarUsuario($usuario, $password, $dni, $nombre, $apepat,$apemat,$telefono,$correo,$estado)
	{
		$conexion = new Conexion();
		$consulta = "INSERT INTO usuarios (usuario, password, dni, nombre, apepat,apemat,telefono,correo, estado) VALUES('$usuario', '$password', '$dni', '$nombre', '$apepat','$apemat','$telefono','$correo', '$estado') ";
		$resultado =$conexion->consultar($consulta);
		$conexion = new conexion();
		$consulta="SELECT * FROM usuarios";
		$resultado = $conexion->consultar($consulta);
		return $resultado;
	}
	public function actualizarUsuario($idusuario,$usuario, $password, $dni, $nombre, $apepat,$apemat,$telefono,$correo,$estado)
	{
		$conexion = new Conexion();
		$consulta = "UPDATE usuarios SET usuario='$usuario', password='$password', dni='$dni', nombre='$nombre', apepat='$apepat',apemat='$apemat',telefono='$telefono',correo='$correo', estado='$estado' WHERE idusuario='$idusuario' ";
		$resultado =$conexion->consultar($consulta);
		$conexion = new conexion();
		$consulta="SELECT * FROM usuarios";
		$resultado = $conexion->consultar($consulta);
		return $resultado;
	}
	public function privilegioUsuario($usuario)
	{
		$conexion = new Conexion();
		$consulta = "SELECT P.nombrep, P.path
		             FROM usuarios U, privilegios P, detalleusuario DU
					 WHERE U.usuario = '$usuario' AND
					       U.usuario = DU.usuario AND
						   P.idprivilegios = DU.id ";
		$resultado =$conexion->consultar($consulta);
		$num_registros = mysqli_num_rows($resultado);
		for($i = 0; $i < $num_registros; $i++)
			$fila[$i] = mysqli_fetch_array($resultado);
		return ($fila);		
	//	return $resultado;
	}
}
?>
