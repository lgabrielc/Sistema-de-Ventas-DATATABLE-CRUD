<?php 
	include_once("../Controlador/cone.php");
	class torre
	{
		public function ingresarTorre($nombreTorre,$direccion,$duenoLocal,$telofono,$pago)
		{
			$conexion= new Conexion();
			$consulta="INSERT INTO `torre`(`nombreTorre`, `direccion`, `dueñoLocal`, `telofono`, `pago`) VALUES ('$nombreTorre','$direccion','$duenoLocal','$telofono','$pago')";
            $respuesta= $conexion->consultar($consulta);
			return $respuesta;
		}
		public function actualizarTorre($idTorre,$nombreTorre,$direccion,$duenoLocal,$telofono,$pago)
		{
			$conexion=new Conexion();
			$consulta="UPDATE torre SET nombreTorre='$nombreTorre',direccion='$direccion',dueñoLocal='$duenoLocal', telofono='$telofono' WHERE idTorre='$idTorre' ";
			$respuesta=$conexion->consultar($consulta);
			$consulta="SELECT * FROM torre";
			$respuesta=$conexion->consultar($consulta);
			return $respuesta;
		}
		public function eliminarTorre($idTorre)
		{
			$conexion=new Conexion();
			$consulta="DELETE FROM torre WHERE idTorre='$idTorre' ";
			$respuesta=$conexion->consultar($consulta);
			return $respuesta;
		}	
		public  function listarTorre()
		{
			$conexion=new Conexion();
			$consulta="SELECT * FROM torre";
			$respuesta=$conexion->consultar($consulta);
			return $respuesta;
		}
	}


 ?>