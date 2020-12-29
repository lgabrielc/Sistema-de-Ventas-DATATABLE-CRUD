$(document).ready(function() {
var idCliente, opcion;
opcion = 4;   
tablaCliente = $('#tablaCliente').DataTable({ 
    "ajax":{            
        "url": "../Controlador/getcliente.php", 
        "method": 'POST', //usamos el metodo POST
        "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
    },
    "columns":[
        {"data": "idCliente"},
        {"data": "nombre"},
        {"data": "apellido"},
        {"data": "DNI"},
        {"data": "direccion"},
        {"data": "correo"},
        {"data": "f_Inicio"},
        {"data": "tarifa"},
        {"data": "f_Vencimiento"},
        {"data": "f_Corte"},
        {"data": "condicionAntena"},
        {"data": "mac"},
        {"data": "ip"},
        {"data": "frecuencia"},
        {"data": "idEstado"},
        {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
    ],
});     
var fila; //captura la fila, para editar o eliminar
$('#formCliente').submit(function(e){    //submit para el Alta y Actualización                
    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    nombre = $.trim($('#nombre').val());    
    apellido = $.trim($('#apellido').val());
    DNI = $.trim($('#DNI').val());    
    correo = $.trim($('#correo').val());    
    f_Inicio = $.trim($('#f_Inicio').val());
    tarifa = $.trim($('#tarifa').val());
    f_Vencimiento = $.trim($('#f_Vencimiento').val());
    f_Corte = $.trim($('#f_Corte').val());
    condicionAntena = $.trim($('#condicionAntena').val());
    mac = $.trim($('#mac').val());
    ip = $.trim($('#ip').val());
    frecuencia = $.trim($('#frecuencia').val());
    anchoBanda = $.trim($('#anchoBanda').val());
    idEstado = $.trim($('#idEstado').val());                            
        $.ajax({
          url: "../Controlador/getcliente.php",
          type: "POST",
          datatype:"json",    
          data:  {idCliente:idCliente, nombre:nombre, apellido:apellido, DNI:DNI, 
            correo:correo, f_Inicio:f_Inicio, tarifa:tarifa, f_Vencimiento:f_Vencimiento,
             f_Corte:f_Corte , condicionAntena:condicionAntena, mac:mac, ip:ip,frecuencia:frecuencia,anchoBanda:anchoBanda 
             ,idEstado:idEstado ,opcion:opcion},    
          success: function(data) {
            tablaCliente.ajax.reload(null, false);
           }
        });			        
    $('#modalCRUD').modal('hide');											     			
});  
//para limpiar los campos antes de dar de Alta una Persona
$("#btnNuevo").click(function(){
    opcion = 1; //alta           
    idCliente=null;
    $("#formCliente").trigger("reset");
    $(".modal-header").css( "background-color", "#17a2b8");
    $(".modal-header").css( "color", "white" );
    $(".modal-title").text("Alta de Usuario");
    $('#modalCRUD').modal('show');	    
});
$(document).on("click", ".btnEditar", function(){	//Editar 	        
    opcion = 2;//editar
    fila = $(this).closest("tr");	        
    idCliente = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
    nombre = fila.find('td:eq(1)').text();
    apellido = fila.find('td:eq(2)').text();
    DNI = fila.find('td:eq(3)').text();
    direccion = fila.find('td:eq(4)').text();
    correo = fila.find('td:eq(5)').text();
    f_Inicio = fila.find('td:eq(6)').text();
    tarifa = fila.find('td:eq(7)').text();
    f_Vencimiento = fila.find('td:eq(8)').text();
    f_Corte = fila.find('td:eq(9)').text();
    condicionAntena = fila.find('td:eq(10)').text();
    mac = fila.find('td:eq(11)').text();
    ip = fila.find('td:eq(12)').text();
    frecuencia = fila.find('td:eq(13)').text();
    anchoBanda = fila.find('td:eq(14)').text();
    idEstado = fila.find('td:eq(15)').text();
    idAntena = fila.find('td:eq(16)').text();
    observacion = fila.find('td:eq(17)').text();
    marca = fila.find('td:eq(18)').text();
    F_Congelada = fila.find('td:eq(19)').text();
    saldo = fila.find('td:eq(20)').text();
    F_pago_Saldo = fila.find('td:eq(21)').text();
    $("#nombre").val(nombre);
    $("#apellido").val(apellido);
    $("#DNI").val(DNI);
    $("#direccion").val(direccion);
    $("#correo").val(correo);
    $("#f_Inicio").val(f_Inicio);
    $("#tarifa").val(tarifa);
    $("#f_Vencimiento").val(f_Vencimiento);
    $("#f_Corte").val(f_Corte);
    $("#condicionAntena").val(condicionAntena);
    $("#mac").val(mac);
    $("#ip").val(ip);
    $("#frecuencia").val(frecuencia);
    $("#anchoBanda").val(anchoBanda);
    $("#idEstado").val(idEstado);
    $("#idAntena").val(idAntena);
    $("#observacion").val(observacion);
    $("#marca").val(marca);
    $("#F_Congelada").val(F_Congelada);
    $("#saldo").val(saldo);
    $("#F_pago_Saldo").val(F_pago_Saldo);
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white" );
    $(".modal-title").text("Editar Usuario");		
    $('#modalCRUD').modal('show');	   
});

//Borrar
$(document).on("click", ".btnBorrar", function(){
    fila = $(this);           
    idCliente= parseInt($(this).closest('tr').find('td:eq(0)').text()) ;		
    opcion = 3; //eliminar        
    var respuesta = confirm("¿Está seguro de borrar el registro "+idCliente+"?");                
    if (respuesta) {            
        $.ajax({
          url: "../Controlador/getcliente.php",
          type: "POST",
          datatype:"json",    
          data:  {opcion:opcion, idCliente:idCliente},    
          success: function() {
              tablaCliente.row(fila.parents('tr')).remove().draw();
           }
        });	
    }
 });
     
});    