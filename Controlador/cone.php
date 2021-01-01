<?php
class Conexion
{
	private $conexion;
	
	public function __construct () {
		$this->conexion = new mysqli("localhost","root","12345678","bd_arapas");
		$this->conexion->set_charset('utf8');
	}

	public function consultar ($sql) {
		$query = $this->conexion->query($sql);
		return $query;
	}

	function consultar_retornarID($sql)
	{
		$query = $this->conexion->query($sql);
		$id = $this->conexion->insert_id;
		return $id;
	}

	public function cerrar () {
		$this->conexion->close();
	}
}
?>