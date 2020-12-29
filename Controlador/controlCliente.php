<?php 
	class controlCliente
	{
		public function listarCliente()
		{
			include_once("../Modelo/cliente.php");
			$objCliente = new Cliente;
			$respuesta = $objCliente->listarCliente();
	     	$data = $respuesta->fetch_all(MYSQLI_ASSOC);
	     	return $data;
		}
		public function ingresarCliente($nombre, $apellido, $DNI, $direccion, $correo,$f_Inicio,$tarifa,$f_Vencimiento,$f_Corte,$condicionAntena,$mac,$ip,$frecuencia,$anchoBanda,$idEstado,$idAntena,$observacion,$marca)
		{
			include_once("../Modelo/cliente.php");
			$objCliente=new Cliente;
			$respuesta=$objCliente->ingresarCliente($nombre, $apellido, $DNI, $direccion, $correo,$f_Inicio,$tarifa,$f_Vencimiento,$f_Corte,$condicionAntena,$mac,$ip,$frecuencia,$anchoBanda,$idEstado,$idAntena,$observacion,$marca);
			$data=$respuesta ->fetch_all(MYSQLI_ASSOC);
			return $data;
		}
		public function actualizarCliente($idCliente,$nombre, $apellido, $DNI, $direccion, $correo,$f_Inicio,$tarifa,$f_Vencimiento,$f_Corte,$condicionAntena,$mac,$ip,$frecuencia,$anchoBanda,$idEstado,$idAntena,$observacion,$marca)
		{
			include_once("../Modelo/cliente.php");
			$objCliente=new Cliente;
			$respuesta=$objCliente->actualizarCliente($idCliente,$nombre, $apellido, $DNI, $direccion, $correo,$f_Inicio,$tarifa,$f_Vencimiento,$f_Corte,$condicionAntena,$mac,$ip,$frecuencia,$anchoBanda,$idEstado,$idAntena,$observacion,$marca);
			$data=$respuesta ->fetch_all(MYSQLI_ASSOC);
			return $data;
		}
		public function eliminarCliente($idCliente)
		{
			include_once("../Modelo/cliente.php");
			$objCliente=new Cliente;
			$objCliente->eliminarCliente($idCliente);
			//$data=$respuesta ->fetch_all(MYSQLI_ASSOC);
		}		
	}

?>