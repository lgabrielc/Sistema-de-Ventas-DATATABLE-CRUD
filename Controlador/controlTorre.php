<?php

    include_once("../Modelo/torre.php");
    class controlTorre
    {

        public function __construct(){

            $this->objTorre = new Torre;
        }

        public function listarTorre()
        {
            $respuesta = $this->objTorre->listarTorre();
            $data = $respuesta->fetch_all(MYSQLI_ASSOC);
            return $data;
        }

        public function ingresarTorre($nombreTorre,$direccion,$duenoLocal,$telofono,$pago)
        {

            $this->objTorre->ingresarTorre($nombreTorre,$direccion,$duenoLocal,$telofono,$pago);
            $respuesta = $this->objTorre->listarTorre();
            $data = $respuesta->fetch_all(MYSQLI_ASSOC);
            return $data;
        }

        public function actualizarTorre($idTorre,$nombreTorre,$direccion,$duenoLocal,$telofono,$pago)
        {
            $respuesta = $this->objTorre->actualizarTorre($idTorre,$nombreTorre,$direccion,$duenoLocal,$telofono,$pago);
            $data=$respuesta ->fetch_all(MYSQLI_ASSOC);
			return $data;
        }

        public function eliminarTorre($idTorre)
        {
            $respuesta= $this->objTorre->eliminarTorre($idTorre);
 //           $data = $respuesta->fetch_all(MYSQLI_ASSOC);
            return $respuesta;
        }
    }
?>