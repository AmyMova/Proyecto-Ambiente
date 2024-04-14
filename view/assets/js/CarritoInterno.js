/*Funcion para limpieza de los formularios*/
function limpiarFormsCarritoInterno() {
    $("#modulos_agregar_carritoInterno").trigger("reset");
    $("#modulos_editar_carritoInterno").trigger("reset");
}

/*Funcion para cancelacion del uso de formulario de modificación*/
function cancelarFormCarritoInterno() {
    limpiarFormsCarritoInterno();
    $("#formulario_agregar_carritoInterno").hide();
    $("#formulario_editar_carritoInterno").hide();

}
function ListarCarritoInternos() {
    tabla = $("#tblListadoCarritoInterno").dataTable({
        aProcessing: true, //actiavmos el procesamiento de datatables
        aServerSide: true, //paginacion y filtrado del lado del serevr
        dom: "Bfrtip", //definimos los elementos del control de tabla
        buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdf"],

        ajax: {
            url: "./../../Controller/CarritoController.php?op=ListarTablaCarrito",
            type: "get",
            dataType: "json",
            error: function (e) {
                console.log(e.responseText);
            },
            bDestroy: true,
            iDisplayLength: 5,
        },
    });
}

$(function () {
    $("#formulario_editar_carritoInterno").hide();
    $("#formulario_agregar_carritoInterno").show();
    ListarCarritoInternos();

});

$("#carritoInterno_agregar").on("submit", function (event) {
    event.preventDefault();
    $("#btnRegistar").prop("disabled", true);
    var formData = new FormData($("#carritoInterno_agregar")[0]);
    $.ajax({
        url: "./../../Controller/CarritoController.php?op=AgregarCarrito",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (datos) {
            switch (datos) {
                case "1":
                    toastr.success("Producto registrado");
                    $("#carritoInterno_agregar")[0].reset();
                    location.reload();
                    break;

                case "2":
                    toastr.error(
                        "El producto ya existe... Corrija e inténtelo nuevamente..."
                    );
                    break;

                case "3":
                    toastr.error("Hubo un error al tratar de ingresar los datos.");
                    break;
                case "4":
                    toastr.error("Revise la cantidades del producto!");
                    break;
                case "5":
                    toastr.error("Datos incompletos");
                    break;
                default:
                    toastr.error(datos);
                    break;
            }
            $("#btnRegistar").removeAttr("disabled");
        },
    });
});

function ListarProductosAgregarC() {
    tabla = $("#tblListadoBuscarProductoAC").dataTable({
        aProcessing: true, //actiavmos el procesamiento de datatables
        aServerSide: true, //paginacion y filtrado del lado del serevr
        dom: "Bfrtip", //definimos los elementos del control de tabla
        buttons: [],
        ajax: {
            url: "./../../Controller/CarritoController.php?op=BuscarProductoAgregarC",
            type: "get",
            dataType: "json",
            error: function (e) {
                console.log(e.responseText);
            },
            bDestroy: true,
            iDisplayLength: 5,
        },
    });
}

$("#tblListadoBuscarProductoAC tbody").on(
    "click",
    'button[id="SeleccionarAC"]',
    function () {
        var data = $("#tblListadoBuscarProductoAC").DataTable().row($(this).parents("tr")).data();
        $("#Id_Producto").val(data[0]);
        $("#descripcionP").val(data[1]);
        $("#Precio_Venta").val(data[3]);

        $("#Cantidad_XS_DB").val(data[4]);
        $("#Cantidad_S_DB").val(data[5]);
        $("#Cantidad_M_DB").val(data[6]);
        $("#Cantidad_L_DB").val(data[7]);
        $("#Cantidad_XL_DB").val(data[8]);
        $("#Cantidad_XXL_DB").val(data[9]);


        $('#BuscarProductoAgregarC').modal('hide');

        return false;
    }
);



