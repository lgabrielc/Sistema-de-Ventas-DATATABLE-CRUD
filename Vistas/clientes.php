<?php
    session_start();
    if (isset($_SESSION["nombre"])) 
{
    ?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="#" />  
    <title>DataTables</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <!-- CSS personalizado --> 
    <link rel="stylesheet" href="../css/main.css">  
      
      
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="../assets/datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="../assets/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">    
      
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">  
    <?php include_once("header.php"); ?>
  </head>
  <body> 
    <br><br><br><br><br><br>
     <header>
     <h3 class='text-center'></h3>
     </header>    
    <div class="container">
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnNuevo" type="button" class="btn btn-info" data-toggle="modal"><i class="material-icons">library_add</i></button>    
            </div>    
        </div>    
    </div>    
    <br>  
    <div class="contenedor caja">
        <div class="row">
            <div class="col-lg-12">
            <div class="table-responsive">        
                <table id="tablaCliente" class="table table-striped table-bordered table-condensed" style="width:100%" >
                    <thead class="text-center">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Dni</th>                                
                            <th>direccion</th>  
                            <th>Correo</th>
                            <th>f_Inicio</th>
                            <th>Tarifa</th>
                            <th>f_Vencimiento</th>
                            <th>f_Corte</th>
                            <th>c_Antena</th>
                            <th>Mac</th>
                            <th>ip</th>
                            <th>Frecuencia</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>                            
                    </tbody>        
                </table>               
            </div>
            </div>
        </div>  
    </div>   
<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formCliente">    
            <div class="modal-body">
                <div class="row"> 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">Nombres</label>
                    <input type="text" class="form-control" id="nombre">
                    </div>
                    </div> 

                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">Apellidos</label>
                    <input type="text" class="form-control" id="apellido">
                    </div>               
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">DNI</label>
                    <input type="text" class="form-control" id="DNI">
                    </div>               
                    </div> 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">Direccion</label>
                    <input type="text" class="form-control" id="direccion">
                    </div>               
                    </div>                                       
                </div>
                <div class="row"> 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">Correo</label>
                    <input type="text" class="form-control" id="correo">
                    </div>               
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">f_Inicio</label>
                    <input type="date" class="form-control" id="f_Inicio">
                    </div>
                    </div> 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">Tarifa</label>
                    <input type="text" class="form-control" id="tarifa">
                    </div>
                    </div> 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">f_Vencimiento</label>
                    <input type="text" class="form-control" id="f_Vencimiento">
                    </div>
                    </div>  
                </div>
                <div class="row"> 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">f_Corte</label>
                    <input type="text" class="form-control" id="f_Corte">
                    </div>               
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">C_Antena</label>
                    <input type="text" class="form-control" id="condicionAntena">
                    </div>
                    </div> 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">Mac</label>
                    <input type="text" class="form-control" id="mac">
                    </div>
                    </div> 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">IP</label>
                    <input type="text" class="form-control" id="ip">
                    </div>
                    </div>  
                </div> 
                <div class="row"> 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">Frecuencia</label>
                    <input type="text" class="form-control" id="frecuencia">
                    </div>               
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">Ancho_Banda</label>
                    <input type="text" class="form-control" id="anchoBanda">
                    </div>
                    </div> 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">id Estado</label>
                    <input type="text" class="form-control" id="idEstado">
                    </div>
                    </div> 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">id Antena</label>
                    <input type="number" class="form-control" id="idAntena">
                    </div>
                    </div>  
                </div>                
                <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">Observacion</label>
                    <input type="text" class="form-control" id="observacion">
                    </div>
                    </div>    
                    <div class="col-lg-6">    
                    <div class="form-group">
                    <label for="" class="col-form-label">Marca</label>
                    <input type="text" class="form-control" id="marca">
                    </div>            
                    </div>                    
                    <div class="col-lg-3">
                    <div class="form-group">
                    <label for="" class="col-form-label">F_Congelada</label>
                    <input type="number" class="form-control" id="F_Congelada">
                    </div>
                    </div>
                    <div class="col-lg-3">
                    <div class="form-group">
                    <label for="" class="col-form-label">Saldo</label>
                    <input type="text" class="form-control" id="saldo">
                    </div>
                    </div>   
                </div>
                <div>
                    <div class="col-lg-3">
                    <div class="form-group">
                    <label for="" class="col-form-label">F_Pago_Saldo</label>
                    <input type="number" class="form-control" id="F_pago_Saldo">
                    </div>
                    </div>
                </div>            
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal" >Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>  
    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="../assets/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/popper/popper.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>  
    <!-- datatables JS -->
    <script type="text/javascript" src="../assets/datatables/datatables.min.js"></script>    
    <script type="text/javascript" src="../js/cliente.js"></script>  
  </body>
</html>
    <?php
}
    else
    {
        header("Location: ../index.php");
    }
 ?>