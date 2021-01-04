<?php
    include_once("../Controlador/cone.php");
    class pago
    {
        
        public function __construct(){
            $this->conexion = new Conexion;
        }

        public function agregarPago($fecha,$monto,$periodo,$idCliente,$idPersonal,$Activado){
            $consulta = "INSERT INTO pago VALUES (NULL,'$fecha','$monto','$periodo','$idCliente','$idPersonal','$Activado')";
            $respuesta = $this->conexion->consultar($consulta);
            return $respuesta; 
        }

        public function listarPago(){
    
            $consulta = "SELECT C.idCliente,C.nombre,C.apellido,C.f_Vencimiento,C.f_Corte, ID.descripcion,C.tarifa FROM cliente C, idestado ID WHERE ID.idEstado = C.idEstado ";
            $respuesta = $this->conexion->consultar($consulta);
            return $respuesta;   
        }
    }

?>