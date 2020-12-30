<?php

    include_once("controlAntena.php");
    $objAntena = new controlAntena;


   
    $nombreAntena   = (isset($_POST['nombreAntena'])) ? $_POST['nombreAntena'] : '';
    $ip             = (isset($_POST['ip'])) ? $_POST['ip'] : '';
    $mac            = (isset($_POST['mac'])) ? $_POST['mac'] : '';
    $frecuencia     = (isset($_POST['frecuencia'])) ? $_POST['frecuencia'] : '';
    $canal          = (isset($_POST['canal'])) ? $_POST['canal'] : '';
    $idServidor     = (isset($_POST['idServidor'])) ? $_POST['idServidor'] : '';
    $idTorre        = (isset($_POST['idTorre'])) ? $_POST['idTorre'] : '';
    $idTipo         = (isset($_POST['idTipo'])) ? $_POST['idTipo'] : '';
    $opcion         = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
    $idAntena       = (isset($_POST['idAntena'])) ? $_POST['idAntena'] : ''; 

    switch ($opcion) {
        case 1:
            $data = $objAntena->ingresarAntena($nombreAntena,$ip,$mac,$frecuencia,$canal,$idServidor,$idTorre,$idTipo);
            print json_encode($data, JSON_UNESCAPED_UNICODE);
            break;
        case 2:
            $data = $objAntena->actualizarAntena($idAntena,$nombreAntena,$ip,$mac,$frecuencia,$canal,$idServidor,$idTorre,$idTipo);
            print json_encode($data, JSON_UNESCAPED_UNICODE);
            break;
        
        case 3:
            $data = $objAntena->eliminarAntena($idAntena);
            print json_encode($data, JSON_UNESCAPED_UNICODE);
            break;
        
        case 4:
            $data = $objAntena->listarAntena();
            print json_encode($data, JSON_UNESCAPED_UNICODE);
            break;
            
    }
?>