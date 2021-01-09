$(document).ready(function () {
    var idAntena, opcion;
    opcion = 4;
    tablaAntena = $('#tablaPago').DataTable({
        "ajax": {
            "url": "../Controlador/getpago.php",
            "method": 'POST', //usamos el metodo POST
            "data": { opcion: opcion }, //enviamos opcion 4 para que haga un SELECT
            "dataSrc": ""
        },
        "columns": [
            { "data": "idCliente" },
            { "data": "nombre" },
            { "data": "apellido" },
            { "data": "f_Vencimiento" },
            { "data": "f_Corte" },
            { "data": "descripcion" },
            { "data": "tarifa" },
            { "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button></div>" }
        ],
    });
    var fila; //captura la fila, para editar o eliminar
    //submit para el Alta y Actualización
    $('#formAntena').submit(function (e) {
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
            datatype: "json",
            data: { idAntena: idAntena, nombreAntena: nombreAntena, ip: ip, mac: mac, frecuencia: frecuencia, canal: canal, idServidor: idServidor, idTorre: idTorre, idTipo: idTipo, opcion: opcion },
            success: function (data) {
                tablaAntena.ajax.reload(null, false);
            }
        });
        $('#modalCRUD').modal('hide');
    });


    //para limpiar los campos antes de dar de Alta una Persona
    $("#btnNuevo").click(function () {
        opcion = 1; //alta           
        idAntena = null;
        $("#formAntena").trigger("reset");
        $(".modal-header").css("background-color", "#17a2b8");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Agregar Antena");
        $('#modalCRUD').modal('show');
    });
    $(document).on("click", ".btnEditar", function () {   //Editar            
        opcion = 2;//editar
        fila = $(this).closest("tr");
        idCliente = parseInt(fila.find('td:eq(0)').text()); //capturo el ID                 
        nombreCliente = fila.find('td:eq(1)').text() + " " + fila.find('td:eq(2)').text();
        F_pago = fila.find('td:eq(3)').text();
        F_corte = fila.find('td:eq(4)').text();
        estado = fila.find('td:eq(5)').text();
        let date = new Date(fila.find('td:eq(3)').text())
        date.setDate(date.getDate() + 31);
        let day = date.getDate()
        let month = date.getMonth() + 1
        let year = date.getFullYear()
        proximo_pago = `${year}-0${month}-${day}`;
        let date2 = new Date(fila.find('td:eq(4)').text())
        date2.setDate(date2.getDate() + 31);
        day = date2.getDate()
        month = date2.getMonth() + 1
        year = date2.getFullYear()
        proximo_corte = `${year}-0${month}-${day}`


        mensualidad = fila.find('td:eq(6)').text();
        periodo_pago = fila.find('td:eq(3)').text() + " al " + fila.find('td:eq(4)').text();

        $("#nombreCliente").val(nombreCliente);
        $("#F_Pago").val(F_pago);
        $("#F_corte").val(F_corte);
        $("#proximo_corte").val(proximo_corte);
        $("#estado").val(estado);
        $("#mensualidad").val(mensualidad);
        $("#periodo_pago").val(periodo_pago);
        $("#proximo_pago").val(proximo_pago);
        $("#total").val(mensualidad);
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Agregar Pago");
        $('#modalCRUD').modal('show');
    });

    //Borrar
    $(document).on("click", ".btnBorrar", function () {
        fila = $(this);
        idAntena = parseInt($(this).closest('tr').find('td:eq(0)').text());
        opcion = 3; //eliminar        
        var respuesta = confirm("¿Está seguro de borrar el registro " + idAntena + "?");
        if (respuesta) {
            $.ajax({
                url: "../Controlador/getAntena.php",
                type: "POST",
                datatype: "json",
                data: { opcion: opcion, idAntena: idAntena },
                success: function () {
                    tablaAntena.row(fila.parents('tr')).remove().draw();
                }
            });
        }
    });



});    