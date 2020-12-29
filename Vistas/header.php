<?php

  if (isset($_SESSION["nombre"])) {
      ?>
      <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
      <link rel="stylesheet" type="text/css" href="../css/style.css">
      </head>       
      <body>  
      <header>
        <div class="header">
          <a href="principal.php"><h1 style="color:#fff;">Arapa Network</h1></a>  
          <div class="optionsBar">
            <p>
             <?php   date_default_timezone_set("America/Lima"); echo date("d") . " del " . date("m") . " del " . date("Y");
             ?>
            </p>
            <span>|</span>
            <span class="user">
              <?php 
               echo $_SESSION["nombre"] ." ". $_SESSION["apepat"] . " " . $_SESSION["apemat"];
               ?>
            </span>
            <img class="photouser" src="../imagenes/iconuser.png" alt="Usuario">
            <a href="cerrar_session.php"><img class="close" src="../imagenes/saliruser.png" alt="Salir del sistema" title="Salir"></a>
          </div>
      </div>
        <nav>
          <ul>
            <a class="principal" href="../Vistas/miperfil.php"><?php echo "Mi Perfil" ?></a>
            <li>
        <?php
        require_once("../Controlador/controlUsuario.php");
        $cprivilegios = new controlusuario;
        $privilegios = $cprivilegios ->privilegioUsuario($_SESSION['usuario']);
        $num_privilegios = count($privilegios);
        for($i = 0; $i < $num_privilegios; $i++)
        {
        ?>        
           <a class="principal" href="<?php echo $privilegios[$i]['path']?>"><?php echo $privilegios[$i]['nombrep'] ?></a>       
           </li>
        <?php
        }
        ?>
          </ul>
        </nav>
      </header>
      <?php
  }
    else{
    Header("../index.php");
  }
?>