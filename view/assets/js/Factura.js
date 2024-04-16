function ListarFacturaAdmin() {
    tablaCarritoInternoAdmin = $("#tblListadoFacturaAdmin").dataTable({
        aProcessing: true, //actiavmos el procesamiento de datatables
        aServerSide: true, //paginacion y filtrado del lado del serevr
        dom: "Bfrtip", //definimos los elementos del control de tabla
        buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdf"],

        ajax: {
            url: "./../../Controller/FacturaController.php?op=ListarTablaFacturaAdmin",
            type: "get",
            dataType: "json",
            error: function (e) {
                console.log(e.responseText);
            },
            bDestroy: true,
            iDisplayLength: 5,
        }, language: {
            "emptyTable": "No hay datos disponibles en la tabla",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "infoEmpty": "Mostrando 0 a 0 de 0 registros",
            "search": "Buscar:",
            "zeroRecords": "No se encontraron registros coincidentes",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        },
    });
}

function ListarFacturaVendedor() {
    tablaCarritoInternoVendedor = $("#tblListadoFacturaVendedor").dataTable({
        aProcessing: true, //actiavmos el procesamiento de datatables
        aServerSide: true, //paginacion y filtrado del lado del serevr
        dom: "Bfrtip", //definimos los elementos del control de tabla
        buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdf"],

        ajax: {
            url: "./../../Controller/FacturaController.php?op=ListarTablaFacturaVendedor",
            type: "get",
            dataType: "json",
            error: function (e) {
                console.log(e.responseText);
            },
            bDestroy: true,
            iDisplayLength: 5,
        }, language: {
            "emptyTable": "No hay datos disponibles en la tabla",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "infoEmpty": "Mostrando 0 a 0 de 0 registros",
            "search": "Buscar:",
            "zeroRecords": "No se encontraron registros coincidentes",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        },
    });
}

function ListarFacturaCliente() {
    tablaCarritoCliente = $("#tblListadoFacturaCliente").dataTable({
        aProcessing: true, //actiavmos el procesamiento de datatables
        aServerSide: true, //paginacion y filtrado del lado del serevr
        dom: "Bfrtip", //definimos los elementos del control de tabla
        buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdf"],

        ajax: {
            url: "./../../Controller/FacturaController.php?op=ListarTablaFacturaCliente",
            type: "get",
            dataType: "json",
            error: function (e) {
                console.log(e.responseText);
            },
            bDestroy: true,
            iDisplayLength: 5,
        }, language: {
            "emptyTable": "No hay datos disponibles en la tabla",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "infoEmpty": "Mostrando 0 a 0 de 0 registros",
            "search": "Buscar:",
            "zeroRecords": "No se encontraron registros coincidentes",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        },
    });
}

$(function () {
    $("#formulario_ver_Factura").hide();
    ListarFacturaAdmin();
    ListarFacturaVendedor();
    ListarFacturaCliente();

});

