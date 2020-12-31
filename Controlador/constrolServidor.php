<?php 
	include_once("../Modelo/servidor.php");

	class controlServidor
	{
		public function agregarServidor($nombreServidor,$ipEntrada,$ipSalida)
		{
			$objServidor=new servidor();
			$respuesta=$objServidor->agregarServidor($nombreServidor,$ipEntrada,$ipSalida);
			$data = $respuesta->fetch_all(MYSQLI_ASSOC);
			return $data;

		}
		public function editarServidor($idServidor,$nombreServidor,$ipEntrada,$ipSalida)
		{
			$objServidor=new servidor();
			$respuesta=$objServidor->editarServidor($idServidor,$nombreServidor,$ipEntrada,$ipSalida);
			$data=$respuesta->fetch_all(MYSQLI_ASSOC);
			return $data;
		}
		public function eliminarServidor($idServidor)
		{
			$objServidor=new servidor();
			$respuesta=$objServidor->eliminarServidor($idServidor);
			$data=$respuesta->fetch_all(MYSQLI_ASSOC);
			return $data;
		}
		public function listarServidor()
		{
			$objServidor=new servidor();
			$respuesta=$objServidor->listarServidor();
			$data=$respuesta->fetch_all(MYSQLI_ASSOC);
			return $data;
		}						
	}

 ?>