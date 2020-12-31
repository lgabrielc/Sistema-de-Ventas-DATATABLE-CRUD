<?php 
	include_once("../Controlador/cone.php");
	class servidor
	{
		public function agregarServidor($nombreServidor,$ipEntrada,$ipSalida)
		{
			$conexion= new Conexion();
			$consulta="INSERT INTO servidor(nombreServidor,ipEntrada,ipSalida) VALUES ('$nombreServidor','$ipEntrada','$ipSalida')";
			$respuesta= $conexion->consultar($consulta);
			return $respuesta;
		}
		public function editarServidor($idServidor,$nombreServidor,$ipEntrada,$ipSalida)
		{
			$conexion=new Conexion();
			$consulta="UPDATE servidor SET nombreServidor='$nombreServidor',ipEntrada='$ipEntrada',ipSalida='$ipSalida' WHERE ipServidor='$ipServidor' ";
			$respuesta=$conexion->consultar($consulta);
			return $respuesta;
		}
		public function eliminarServidor($idServidor)
		{
			$conexion=new Conexion();
			$consulta="DELETE FROM servidor WHERE idServidor='$idServidor' ";
			$respuesta=$conexion->consultar($consulta);
			return $respuesta;
		}	
		public  function listarServidor()
		{
			$conexion=new Conexion();
			$consulta="SELECT * FROM servidor";
			$respuesta=$conexion->consultar($consulta);
			return $respuesta;
		}
	}


 ?>