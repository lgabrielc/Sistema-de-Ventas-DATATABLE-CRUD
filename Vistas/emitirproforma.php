<?php
	session_start();
	if (isset($_SESSION["nombre"])) {
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>
			Emitir Proforma
		</title>
	</head>
	<body>
	<?php require_once("header.php"); ?>
	<section id="container">
	<h1>AQUI SE EMITE LA PROFORMA</h1>	
	</section>
	</body>
	</html>
	<?php
	}	
	else
	{
		header("Location: ../index.php");
	}
 ?>
