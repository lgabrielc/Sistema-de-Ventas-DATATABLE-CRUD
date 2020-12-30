<?php
    require_once("../Controlador/cone.php");
    class Antena
    {
        public function listarAntena()
        {
            $conexion = new conexion();
            $consulta = "SELECT * FROM antena";
            $resultado = $conexion->consultar($consulta);
            return $resultado;
        }

        public function eliminarAntena($idAntena)
        {
            $conexion = new conexion();
            $consulta = "DELETE FROM antena WHERE idAntena='$idAntena'";
            $resultado = $conexion->consultar($consulta);
            return $resultado;
        }

        public function ingresarAntena($nombreAntena,$ip,$mac,$frecuencia,$canal,$idServidor,$idTorre,$idTipo)
        {
            $conexion = new conexion();
            $consulta = "INSERT INTO antena(nombreAntena, ip,mac, frecuencia,canal, passwConfig, passwConeccion, idAntenaEnlace, idServidor, idTorre, idTipo) VALUES ('$nombreAntena','$ip','$mac','$frecuencia','$canal','xx','xx',0,'$idServidor','$idTorre','$idTipo')";
            $resultado = $conexion->consultar($consulta);
            $consulta = "SELECT `idAntena`,`nombreAntena`,`ip`,`mac`,`frecuencia`,`canal`,`idServidor`,`idTorre`,`idTipo` FROM `antena`";
            $resultado = $conexion->consultar($consulta);
            return $resultado;
        }

        public function actualizarAntena($idAntena,$nombreAntena,$ip,$mac,$frecuencia,$canal,$idServidor,$idTorre,$idTipo)
        {
            $conexion = new Conexion();
            $consulta = "UPDATE antena SET nombreAntena='$nombreAntena', ip='$ip', mac='$mac', frecuencia='$frecuencia', canal='$canal', idServidor='$idServidor', idTorre='$idTorre', idTipo='$idTipo' WHERE idAntena = '$idAntena' ";
            $resultado = $conexion->consultar($consulta);
            $consulta = "SELECT * FROM antena";
            $resultado = $conexion->consultar($consulta);
            return $resultado;
        }
    }
?>