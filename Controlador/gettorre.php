<?php 
        include_once("controlTorre.php");
        $objTorre = new controlTorre;
        
        $nombreTorre   = (isset($_POST['nombreTorre'])) ? $_POST['nombreTorre'] : '';
		$direccion     = (isset($_POST['direccion'])) ? $_POST['direccion'] : '';
		$duenoLocal    = (isset($_POST['duenoLocal'])) ? $_POST['duenoLocal'] : '';
		$telofono      = (isset($_POST['telofono'])) ? $_POST['telofono'] : '';
		$pago          = (isset($_POST['pago'])) ? $_POST['pago'] : '';
        $idTorre       = (isset($_POST['idTorre'])) ? $_POST['idTorre'] : '';
        $opcion        = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

        header('Content-Type: application/json');
		switch($opcion){
		case 1:
			$data = $objTorre->ingresarTorre($nombreTorre,$direccion,$duenoLocal,$telofono,$pago);
			print json_encode($data, JSON_UNESCAPED_UNICODE);
			break;
		case 2:

			$data = $objTorre->actualizarTorre($idTorre,$nombreTorre,$direccion,$duenoLocal,$telofono,$pago);
			print json_encode($data, JSON_UNESCAPED_UNICODE);
			break;
		case 3:

			$objTorre->eliminarTorre($idTorre);
			break;
		case 4:
			$data = $objTorre->listarTorre();
            print json_encode($data, JSON_UNESCAPED_UNICODE);
			break;
		}
 ?>