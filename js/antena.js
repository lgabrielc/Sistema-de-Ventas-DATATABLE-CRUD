$(document).ready(function() {
var idAntena, opcion;
opcion = 4;   
tablaAntena = $('#tablaAntena').DataTable({ 
    "ajax":{            
        "url": "../Controlador/getAntena.php", 
        "method": 'POST', //usamos el metodo POST
        "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
    },
    "columns":[
        {"data": "idAntena"},
        {"data": "nombreAntena"},
        {"data": "ip"},
        {"data": "mac"},
        {"data": "frecuencia"},
        {"data": "canal"},
        {"data": "idServidor"},
        {"data": "idTorre"},
        {"data": "idTipo"},
        {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
    ],
});     
var fila; //captura la fila, para editar o eliminar
$('#formAntena').submit(function(e){    //submit para el Alta y Actualización                
    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    nombreAntena = $.trim($('#nombreAntena').val());    
    ip = $.trim($('#ip').val());
    mac = $.trim($('#mac').val());    
    frecuencia = $.trim($('#frecuencia').val());    
    canal = $.trim($('#canal').val());
    idServidor = $.trim($('#idServidor').val());
    idTorre = $.trim($('#idTorre').val());
    idTipo = $.trim($('#idTipo').val());                       
        $.ajax({
          url: "../Controlador/getAntena.php",
          type: "POST",
          datatype:"json",    
          data:  {idAntena:idAntena, nombreAntena:nombreAntena, ip:ip, mac:mac, 
            frecuencia:frecuencia, canal:canal, idServidor:idServidor, idTorre:idTorre,
            idTipo:idTipo ,opcion:opcion},    
          success: function(data) {
            tablaAntena.ajax.reload(null, false);
           }
        });                 
    $('#modalCRUD').modal('hide');                                                          
});  
//para limpiar los campos antes de dar de Alta una Persona
$("#btnNuevo").click(function(){
    opcion = 1; //alta           
    idAntena=null;
    $("#formAntena").trigger("reset");
    $(".modal-header").css( "background-color", "#17a2b8");
    $(".modal-header").css( "color", "white" );
    $(".modal-title").text("Agregar Antena");
    $('#modalCRUD').modal('show');      
});
$(document).on("click", ".btnEditar", function(){   //Editar            
    opcion = 2;//editar
    fila = $(this).closest("tr");           
    idAntena = parseInt(fila.find('td:eq(0)').text()); //capturo el ID                 
    nombreAntena = fila.find('td:eq(1)').text();
    ip = fila.find('td:eq(2)').text();
    mac = fila.find('td:eq(3)').text();
    frecuencia = fila.find('td:eq(4)').text();
    canal = fila.find('td:eq(5)').text();
    idServidor = fila.find('td:eq(6)').text();
    idTorre = fila.find('td:eq(7)').text();
    idTipo = fila.find('td:eq(8)').text();
    $("#nombreAntena").val(nombreAntena);
    $("#ip").val(ip);
    $("#mac").val(mac);
    $("#frecuencia").val(frecuencia);
    $("#canal").val(canal);
    $("#idServidor").val(idServidor);
    $("#idTorre").val(idTorre);
    $("#idTipo").val(idTipo);
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white" );
    $(".modal-title").text("Editar Antena");       
    $('#modalCRUD').modal('show');     
});

//Borrar
$(document).on("click", ".btnBorrar", function(){
    fila = $(this);           
    idAntena= parseInt($(this).closest('tr').find('td:eq(0)').text()) ;        
    opcion = 3; //eliminar        
    var respuesta = confirm("¿Está seguro de borrar el registro "+idAntena+"?");                
    if (respuesta) {            
        $.ajax({
          url: "../Controlador/getAntena.php",
          type: "POST",
          datatype:"json",    
          data:  {opcion:opcion, idAntena:idAntena},    
          success: function() {
              tablaAntena.row(fila.parents('tr')).remove().draw();
           }
        }); 
    }
 });
     
});    