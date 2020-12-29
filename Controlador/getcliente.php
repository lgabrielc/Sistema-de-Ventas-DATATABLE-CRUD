<?php 
		$nombre     = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
		$apellido     = (isset($_POST['apellido'])) ? $_POST['apellido'] : '';
		$DNI     = (isset($_POST['DNI'])) ? $_POST['DNI'] : '';
		$direccion   = (isset($_POST['direccion'])) ? $_POST['direccion'] : '';
		$correo     = (isset($_POST['correo'])) ? $_POST['correo'] : '';
		$f_Inicio     = (isset($_POST['f_Inicio'])) ? $_POST['f_Inicio'] : '';
		$tarifa     = (isset($_POST['tarifa'])) ? $_POST['tarifa'] : '';
		$f_Vencimiento     = (isset($_POST['f_Vencimiento'])) ? $_POST['f_Vencimiento'] : '';
		$f_Corte     = (isset($_POST['f_Corte'])) ? $_POST['f_Corte'] : '';
		$condicionAntena     = (isset($_POST['condicionAntena'])) ? $_POST['condicionAntena'] : '';
		$mac     = (isset($_POST['mac'])) ? $_POST['mac'] : '';
		$ip     = (isset($_POST['ip'])) ? $_POST['ip'] : '';
		$frecuencia     = (isset($_POST['frecuencia'])) ? $_POST['frecuencia'] : '';
		$anchoBanda     = (isset($_POST['anchoBanda'])) ? $_POST['anchoBanda'] : '';
		$idEstado     = (isset($_POST['idEstado'])) ? $_POST['idEstado'] : '';
		$idAntena     = (isset($_POST['idAntena'])) ? $_POST['idAntena'] : '';
		$observacion     = (isset($_POST['observacion'])) ? $_POST['observacion'] : '';
		$marca     = (isset($_POST['marca'])) ? $_POST['marca'] : '';
		$opcion     = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
		$idCliente  = (isset($_POST['idCliente'])) ? $_POST['idCliente'] : '';

		switch($opcion){
		case 1:
			include_once("controlCliente.php");
			$objCliente=new controlCliente;
			$data = $objCliente->ingresarCliente($nombre, $apellido, $DNI, $direccion, $correo,$f_Inicio,$tarifa,$f_Vencimiento,$f_Corte,$condicionAntena,$mac,$ip,$frecuencia,$anchoBanda,$idEstado,$idAntena,$observacion,$marca);
			print json_encode($data, JSON_UNESCAPED_UNICODE);
			break;
		case 2:
			include_once("controlCliente.php");
			$objCliente=new controlCliente;
			$data = $objCliente->actualizarCliente($idCliente,$nombre, $apellido, $DNI, $direccion, $correo,$f_Inicio,$tarifa,$f_Vencimiento,$f_Corte,$condicionAntena,$mac,$ip,$frecuencia,$anchoBanda,$idEstado,$idAntena,$observacion,$marca);
			print json_encode($data, JSON_UNESCAPED_UNICODE);
			break;
		case 3:
			include_once("controlCliente.php");
			$objCliente=new controlCliente;
			$objCliente->eliminarCliente($idCliente);
			break;
		case 4:
			include_once("controlCliente.php");
			$objCliente=new controlCliente;
			$data = $objCliente->listarCliente();
			print json_encode($data, JSON_UNESCAPED_UNICODE);
			break;
		}
 ?>