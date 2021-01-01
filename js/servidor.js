$(document).ready(function() {
    var idServidor, opcion;
    opcion = 4;  
    tablaServidor = $('#tablaServidor').DataTable({ 
        "ajax":{            
            "url": "../Controlador/getservidor.php", 
            "method": 'POST', //usamos el metodo POST
            "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
        },
        "columns":[
            {"data": "idServidor"},
            {"data": "nombreServidor"},
            {"data": "ipEntrada"},
            {"data": "ipSalida"},
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
        ],
    });    
    var fila; //captura la fila, para editar o eliminar
//submit para el Alta y Actualización
$('#formServidor').submit(function(e){                    
    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    nombreServidor = $.trim($('#nombreServidor').val());    
    ipEntrada = $.trim($('#ipEntrada').val());
    ipSalida = $.trim($('#ipSalida').val());                               
        $.ajax({
          url: "../Controlador/getservidor.php",
          type: "POST",
          datatype:"json",    
          data:  {idServidor:idServidor, nombreServidor:nombreServidor, ipEntrada:ipEntrada, ipSalida:ipSalida, opcion:opcion},    
          success: function(data) {
            tablaServidor.ajax.reload(null, false);
           }
        });			        
    $('#modalCRUD').modal('hide');											     			
});

$("#btnNuevo").click(function(){
    opcion = 1; //alta           
    idServidor=null;
    $("#formServidor").trigger("reset");
    $(".modal-header").css( "background-color", "#17a2b8");
    $(".modal-header").css( "color", "white" );
    $(".modal-title").text("Agregar Servidor");
    $('#modalCRUD').modal('show');      
});

$(document).on("click", ".btnEditar", function(){   //Editar            
    opcion = 2;//editar
    fila = $(this).closest("tr");           
    idServidor = parseInt(fila.find('td:eq(0)').text()); //capturo el ID                 
    nombreServidor = fila.find('td:eq(1)').text();
    ipEntrada      = fila.find('td:eq(2)').text();
    ipSalida       = fila.find('td:eq(3)').text();

    $("#nombreServidor").val(nombreServidor);
    $("#ipEntrada").val(ipEntrada);
    $("#ipSalida").val(ipSalida);
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white" );
    $(".modal-title").text("Editar Servidor");       
    $('#modalCRUD').modal('show');     
});

$(document).on("click", ".btnBorrar", function(){
    fila = $(this);           
    idServidor= parseInt($(this).closest('tr').find('td:eq(0)').text()) ;        
    opcion = 3; //eliminar        
    var respuesta = confirm("¿Está seguro de borrar el registro "+idServidor+"?");                
    if (respuesta) {            
        $.ajax({
          url: "../Controlador/getservidor.php",
          type: "POST",
          datatype:"json",    
          data:  {opcion:opcion, idServidor:idServidor},    
          success: function() {
              tablaServidor.row(fila.parents('tr')).remove().draw();
           }
        }); 
    }
 });

});    