<?php
	session_start();
	if (isset($_SESSION["nombre"])) {
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>
			Mi Perfil
		</title>
	</head>
	<?php require_once("header.php"); ?>	
	<body>
		<section id="container">
		<table>
			<thead>
				<tr>
					<th>Usuario</th>
					<th>Dni</th>
					<th>Nombre</th>
					<th>Apepat</th>
					<th>Apemat</th>
					<th>Telefono</th>
					<th>Correo</th>	
				</tr>
			</thead>				
			<tr>		
				<td><?php echo $_SESSION['usuario'] ?></td>
				<td><?php echo $_SESSION['dni'] ?></td>
				<td><?php echo $_SESSION['nombre'] ?></td>
				<td><?php echo $_SESSION['apepat'] ?></td>
				<td><?php echo $_SESSION['apemat'] ?></td>
				<td><?php echo $_SESSION['telefono'] ?></td>
				<td><?php echo $_SESSION['correo'] ?></td>
			</tr>
		</table>			
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
