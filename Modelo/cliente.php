<?php
	require_once("../Controlador/cone.php");
	class Cliente
	{
		public function listarCliente()
		{
			$conexion = new Conexion();
			$consulta="SELECT*FROM cliente";
			$resultado = $conexion->consultar($consulta);
			return $resultado;
		}

		public function eliminarCliente($idCliente)
		{
			$conexion = new Conexion();
			$consulta = "DELETE FROM cliente WHERE idCliente='$idCliente'";
			$resultado  = $conexion->consultar($consulta);
			return $resultado;
		}
		public function ingresarCliente($nombre, $apellido, $DNI, $direccion, $correo,$f_Inicio,$tarifa,$f_Vencimiento,$f_Corte,$condicionAntena,$mac,$ip,$frecuencia,$anchoBanda,$idEstado,$idAntena,$observacion,$marca)
		{
			$conexion = new Conexion();
			$consulta = "INSERT INTO cliente (nombre, apellido, DNI, direccion, correo, f_Inicio, tarifa, f_Vencimiento, f_Corte, condicionAntena, mac, ip, frecuencia, anchoBanda, idEstado, idAntena, observacion, marca) VALUES('$nombre', '$apellido', '$DNI', '$direccion', '$correo' , '$f_Inicio' , '$tarifa', '$f_Vencimiento', '$f_Corte', '$condicionAntena', '$mac', '$ip', '$frecuencia', '$anchoBanda', '$idEstado', '$idAntena', '$observacion', '$marca') ";
			$resultado =$conexion->consultar($consulta);
			$consulta="SELECT * FROM cliente";
			$resultado = $conexion->consultar($consulta);
			return $resultado;
		}
		public function actualizarCliente($idCliente,$nombre, $apellido, $DNI, $direccion, $correo,$f_Inicio,$tarifa,$f_Vencimiento,$f_Corte,$condicionAntena,$mac,$ip,$frecuencia,$anchoBanda,$idEstado,$idAntena,$observacion,$marca)
		{
			$conexion = new Conexion();
			$consulta = "UPDATE cliente SET nombre='$nombre', apellido='$apellido', DNI='$DNI', direccion='$direccion', correo='$correo',f_Inicio='$f_Inicio', tarifa='$tarifa', f_Vencimiento='$f_Vencimiento', f_Corte='$f_Corte', condicionAntena='$condicionAntena', mac='$mac', ip='$ip', frecuencia='$frecuencia', anchoBanda='$anchoBanda', idEstado='$idEstado', idAntena='idAntena',observacion='$observacion', marca='$marca' WHERE idCliente='$idCliente' ";
			$resultado =$conexion->consultar($consulta);
			$consulta="SELECT * FROM cliente";
			$resultado = $conexion->consultar($consulta);
			return $resultado;
		}
}
?>