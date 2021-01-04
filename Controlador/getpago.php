<?php

    include_once("controlPago.php");
    $objPago = new controlPago;

    $opcion  = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
    
    header('Content-Type: application/json');
    switch ($opcion) {
        case 4:
            $data = $objPago->listarPago();
            print json_encode($data,JSON_UNESCAPED_UNICODE);
            break;

    }
?>