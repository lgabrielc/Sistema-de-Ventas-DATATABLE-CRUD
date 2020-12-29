<?php

class Mensaje{
	public function MostrarMensaje($mensaje,$link)
	{
	?>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Mensaje</title>
	</head>
	<body>
	<center><strong><?php echo strtoupper($mensaje);?></strong></center><br/>
	<center><?php echo $link; ?></center>
	</body>
	</html>
	<?php
	}
}
?>
