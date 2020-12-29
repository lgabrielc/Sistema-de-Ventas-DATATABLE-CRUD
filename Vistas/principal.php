<?php
	session_start();
	if (isset($_SESSION["nombre"])) {
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>
			Menu Principal
		</title>
	</head>
	<body>
	<?php require_once("header.php"); ?>
	<section id="container">
	<h1>Bienvenido <?php echo $_SESSION['nombre']; ?></h1>	
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
