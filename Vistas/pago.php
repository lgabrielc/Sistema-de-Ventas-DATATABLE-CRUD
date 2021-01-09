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
    <!--<div class="container">
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnNuevo" type="button" class="btn btn-info" data-toggle="modal"><i class="material-icons">library_add</i></button>    
            </div>    
        </div>    
    </div>   -->
    <br>  
    <div class="contenedor caja">
        <div class="row">
            <div class="col-lg-12">
            <div class="table-responsive">        
                <table id="tablaPago" class="table table-striped table-bordered table-condensed" style="width:100%" >
                    <thead class="text-center">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>F_pago</th>  
                            <th>F_Corte</th>                                
                            <th>Estado</th>
                            <th>Mensualidad</th>
                            <th>Accion</th>
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
        <form id="formAntena">    
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">Cliente</label>
                    <input type="text" class="form-control" id="nombreCliente" disabled>
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">F_Pago</label>
                    <input type="text" class="form-control" id="F_Pago" disabled>
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">F_corte</label>
                    <input type="text" class="form-control" id="F_corte" disabled>
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">N° Dias/Retraso</label>
                    <input type="text" class="form-control" id="N_dias_retraso" disabled>
                    </div>
                    </div>
                     
                </div>
                <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">N° Dias en corte</label>
                    <input type="text" class="form-control" id="N_dias_corte" disabled>
                    </div> 
                    </div>    
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">Estado</label>
                    <input type="text" class="form-control" id="estado" disabled>
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">Proximo Pago</label>
                    <input type="date" class="form-control" id="proximo_pago" >
                    </div>               
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">Proximo Corte</label>
                    <input type="date" class="form-control" id="proximo_corte" >
                    </div>
                    </div>  
                </div>
                <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">Mensualidad</label>
                    <input type="text" class="form-control" id="mensualidad" disabled>
                    </div>
                    </div> 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">Periodo de Pago</label>
                    <input type="text" class="form-control" id="periodo_pago" disabled>
                    </div>               
                    </div>
                </div> 
                <div class="row"> 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">Total</label>
                    <input type="text" class="form-control" id="total" disabled> 
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
    
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>  
    <!-- datatables JS -->
    <script type="text/javascript" src="../assets/datatables/datatables.min.js"></script>    
    <script type="text/javascript" src="../js/pago.js"></script>  
  </body>
</html>
    <?php
}
    else
    {
        header("Location: ../index.php");
    }
 ?>