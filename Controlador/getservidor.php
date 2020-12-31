<?php 
	include_once("controlServidor.php");
	$ojbControlador=new controlServidor();

	$idServidor=(isset($_POST['idServidor'])) ? $_POST['idServidor'] : '';
	$nombreServidor=(isset($_POST['nombreServidor'])) ? $_POST['nombreServidor'] : '';
	$ipEntrada=(isset($_POST['ipEntrada'])) ? $_POST['ipEntrada'] : '';
	$ipSalida=(isset($_POST['ipSalida'])) ? $_POST['ipSalida'] : '';
	$opcion=(isset($_POST['opcion'])) ? $_POST['opcion'] : '';

	switch ($opcion) {

		case 1:
			$data=$ojbControlador->agregarServidor($nombreServidor,$ipEntrada,$ipSalida);
			print json_encode($data,JSON_UNESCAPED_UNICODE);
			break;
		case 2:
			$data=$ojbControlador->editarServidor($idServidor,$nombreServidor,$ipEntrada,$ipSalida);
			print json_encode($data,JSON_UNESCAPED_UNICODE);
			break;
		case 3:
			$data=$ojbControlador->eliminarServidor($idServidor);
			print json_encode($data,JSON_UNESCAPED_UNICODE);
			break;
		case 4:
			$data=$ojbControlador->listarServidor();
			print json_encode($data,JSON_UNESCAPED_UNICODE);
			break;
		
	}

 ?>