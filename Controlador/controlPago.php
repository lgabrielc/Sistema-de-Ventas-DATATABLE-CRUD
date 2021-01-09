<?php

    include_once("../Modelo/pago.php");
    class controlPago
    {
        public function __construct(){
            $this->objPago = new pago;
        }

        public function listarPago(){
            $respuesta = $this->objPago->listarPago();
            $data = $respuesta->fetch_all(MYSQLI_ASSOC);
            return $data;
        }
    }
?>