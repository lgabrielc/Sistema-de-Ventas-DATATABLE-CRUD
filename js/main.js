$(document).ready(function() {
var idusuario, opcion;
opcion = 4;   
tablaUsuarios = $('#tablaUsuarios').DataTable({ 
    "ajax":{            
        "url": "../Controlador/getusuario.php", 
        "method": 'POST', //usamos el metodo POST
        "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
        "dataSrc":""
    },
    "columns":[
        {"data": "idusuario"},
        {"data": "usuario"},
        {"data": "password"},
        {"data": "dni"},
        {"data": "nombre"},
        {"data": "apepat"},
        {"data": "apemat"},
        {"data": "telefono"},
        {"data": "correo"},
        {"data": "estado"},
        {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"}
    ],
});     
var fila; //captura la fila, para editar o eliminar
//submit para el Alta y Actualización
$('#formUsuarios').submit(function(e){                    
    e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
    usuario = $.trim($('#usuario').val());    
    password = $.trim($('#password').val());
    dni = $.trim($('#dni').val());    
    nombre = $.trim($('#nombre').val());    
    apepat = $.trim($('#apepat').val());
    apemat = $.trim($('#apemat').val());
    telefono = $.trim($('#telefono').val());
    correo = $.trim($('#correo').val());
    estado = $.trim($('#estado').val());                            
        $.ajax({
          url: "../Controlador/getusuario.php",
          type: "POST",
          datatype:"json",    
          data:  {idusuario:idusuario, usuario:usuario, password:password, dni:dni, nombre:nombre, apepat:apepat,apemat:apemat,telefono:telefono,correo:correo ,estado:estado ,opcion:opcion},    
          success: function(data) {
            tablaUsuarios.ajax.reload(null, false);
           }
        });			        
    $('#modalCRUD').modal('hide');											     			
});
        
 

//para limpiar los campos antes de dar de Alta una Persona
$("#btnNuevo").click(function(){
    opcion = 1; //alta           
    idusuario=null;
    $("#formUsuarios").trigger("reset");
    $(".modal-header").css( "background-color", "#17a2b8");
    $(".modal-header").css( "color", "white" );
    $(".modal-title").text("Alta de Usuario");
    $('#modalCRUD').modal('show');	    
});

//Editar        
$(document).on("click", ".btnEditar", function(){		        
    opcion = 2;//editar
    fila = $(this).closest("tr");	        
    idusuario = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
    usuario = fila.find('td:eq(1)').text();
    password = fila.find('td:eq(2)').text();
    dni = fila.find('td:eq(3)').text();
    nombre = fila.find('td:eq(4)').text();
    apepat = fila.find('td:eq(5)').text();
    apemat = fila.find('td:eq(6)').text();
    telefono = fila.find('td:eq(7)').text();
    correo = fila.find('td:eq(8)').text();
    estado = fila.find('td:eq(9)').text();
    $("#usuario").val(usuario);
    $("#password").val(password);
    $("#dni").val(dni);
    $("#nombre").val(nombre);
    $("#apepat").val(apepat);
    $("#apemat").val(apemat);
    $("#telefono").val(telefono);
    $("#correo").val(correo);
    $("#estado").val(estado);
    $(".modal-header").css("background-color", "#007bff");
    $(".modal-header").css("color", "white" );
    $(".modal-title").text("Editar Usuario");		
    $('#modalCRUD').modal('show');	   
});

//Borrar
$(document).on("click", ".btnBorrar", function(){
    fila = $(this);           
    idusuario= parseInt($(this).closest('tr').find('td:eq(0)').text()) ;		
    opcion = 3; //eliminar        
    var respuesta = confirm("¿Está seguro de borrar el registro "+idusuario+"?");                
    if (respuesta) {            
        $.ajax({
          url: "../Controlador/getusuario.php",
          type: "POST",
          datatype:"json",    
          data:  {opcion:opcion, idusuario:idusuario},    
          success: function() {
              tablaUsuarios.row(fila.parents('tr')).remove().draw();
           }
        });	
    }
 });
     
});    