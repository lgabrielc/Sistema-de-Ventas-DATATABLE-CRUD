<?php 
session_start();

class Login
{
	public function ValidarLogin()
	{
	if (isset($_SESSION['usuario'])){

		header("Location: Vistas/principal.php");
	}
    ?>
	<html lang="es">
	<head>
    	<meta charset="UTF-8">
    	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    	<link rel="stylesheet" type="text/css" href="css/css.css">
    	<title>PRUEBAS</title>
	</head>
	<body>
	<form name="form1" class="login-form" action="Controlador/getusuario.php" method="POST">
	  <img src="imagenes/tyrone.png" width="200" >
	  <input type="user" name="txt_user" class="login-username" autofocus="true" required="true" placeholder="Email" />
	  <input type="password" name="txt_pass" class="login-password" required="true" placeholder="Password" />
	  <input type="submit" id="btn_login" name="btn_login" class="login-submit" />    
	</form>
	<div class="underlay-photo"></div>
	<div class="underlay-black"></div>
	</body>
	</html>
	<?php
	}
}
?>

