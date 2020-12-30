<?php

    include_once("../Modelo/antena.php");
    class controlAntena
    {
        public function listarAntena()
        {
            $objAntena = new Antena;
            $respuesta = $objAntena->listarAntena();
            $data = $respuesta->fetch_all(MYSQLI_ASSOC);
            return $data;
        }

        public function ingresarAntena($nombreAntena,$ip,$mac,$frecuencia,$canal,$idServidor,$idTorre,$idTipo)
        {
            $objAntena = new Antena;
            $respuesta = $objAntena->ingresarAntena($nombreAntena,$ip,$mac,$frecuencia,$canal,$idServidor,$idTorre,$idTipo);
            $data = $respuesta->fetch_all(MYSQLI_ASSOC);
            return $respuesta;
        }

        public function actualizarAntena($idAntena,$nombreAntena,$ip,$mac,$frecuencia,$canal,$idServidor,$idTorre,$idTipo)
        {
            $objAntena = new Antena;
            $respuesta = $objAntena->actualizarAntena($idAntena,$nombreAntena,$ip,$mac,$frecuencia,$canal,$idServidor,$idTorre,$idTipo);
            $data=$respuesta ->fetch_all(MYSQLI_ASSOC);
			return $data;
        }

        public function eliminarAntena($idAntena)
        {
            $objAntena=new Antena;
            $respuesta=$objAntena->eliminarAntena($idAntena);
 //           $data = $respuesta->fetch_all(MYSQLI_ASSOC);
            return $respuesta;
        }
    }
?>