/*Funcion para limpieza de los formularios*/
function limpiarFormsCarritoInterno() {
    $("#modulos_agregar_carritoInterno").trigger("reset");
    $("#modulos_editar_carritoInterno").trigger("reset");
}

/*Funcion para cancelacion del uso de formulario de modificación*/
function cancelarFormCarritoInterno() {
    limpiarFormsCarritoInterno();
    $("#formulario_agregar_carritoInterno").show();
    $("#formulario_editar_carritoInterno").hide();

}

//Funcion para listar todos los productos que estan en el carrito del administrador o vendedor 
function ListarCarritoInternos() {
    tablaCarritoInterno = $("#tblListadoCarritoInterno").dataTable({
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
            iDisplayLength: 5
        },
        language: {
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
//Funcion principal en donde se llama por primera y unica vez todas las tablas para que no haya error alguno
$(function () {
    $("#formulario_editar_carritoInterno").hide();
    $("#formulario_agregar_carritoInterno").show();
    ListarCarritoInternos();
    ListarProductosAgregarC();
    ListarProductosEditarC();
    ListarUsuario();

});
//Funcion para agregar productos en el carrito de administrador o de vendedor
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
                    tablaCarritoInterno.api().ajax.reload();
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

//Funcion para listar la tabla de productos para mostrarlos en el modal de agregar
function ListarProductosAgregarC() {
    tablaAProductosCarrito = $("#tblListadoBuscarProductoAC").dataTable({
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
        }, lengthMenu: [[5], [5]],
        language: {
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
//Rellena los campos seleccionados con la informacion de la tabla para agregar al carrito
$("#tblListadoBuscarProductoAC tbody").on(
    "click",
    'button[id="SeleccionarAC"]',
    function () {
        var data = $("#tblListadoBuscarProductoAC").DataTable().row($(this).parents("tr")).data();
        var imagen = data[10];
        var URLImagen = "../assets/img/" + imagen;
        $("#img").attr("src", URLImagen);


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
//Funcion para visualizar y seleccionar los datos del producto a la hora de editar
function ListarProductosEditarC() {
    tablaEProductosCarrito = $("#tblListadoBuscarProductoEC").dataTable({
        aProcessing: true, //actiavmos el procesamiento de datatables
        aServerSide: true, //paginacion y filtrado del lado del serevr
        dom: "Bfrtip", //definimos los elementos del control de tabla
        buttons: [],
        ajax: {
            url: "./../../Controller/CarritoController.php?op=BuscarProductoEditarC",
            type: "get",
            dataType: "json",
            error: function (e) {
                console.log(e.responseText);
            },
            bDestroy: true,
            iDisplayLength: 5,
        }, lengthMenu: [[5], [5]],
        language: {
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
//Rellena los campos seleccionados con la informacion de la tabla para editar algun producto del carrito
$("#tblListadoBuscarProductoEC tbody").on(
    "click",
    'button[id="SeleccionarEC"]',
    function () {
        var data = $("#tblListadoBuscarProductoEC").DataTable().row($(this).parents("tr")).data();
        var imagen = data[10];
        var URLImagen = "../assets/img/" + imagen;
        $("#img_edit").attr("src", URLImagen);
        $("#Nuevo_Id_Producto").val(data[0]);
        $("#Nueva_Descripcion").val(data[1]);
        $("#Nuevo_Precio_Venta").val(data[3]);

        $("#Nueva_Cant_XS_DB").val(data[4]);
        $("#Nueva_Cant_S_DB").val(data[5]);
        $("#Nueva_Cant_M_DB").val(data[6]);
        $("#Nueva_Cant_L_DB").val(data[7]);
        $("#Nueva_Cant_XL_DB").val(data[8]);
        $("#Nueva_Cant_XXL_DB").val(data[9]);

        $("#Nueva_Cant_XS").val(0);
        $("#Nueva_Cant_S").val(0);
        $("#Nueva_Cant_M").val(0);
        $("#Nueva_Cant_L").val(0);
        $("#Nueva_Cant_XL").val(0);
        $("#Nueva_Cant_XXL").val(0);



        $('#BuscarProductoEditarC').modal('hide');

        return false;
    }
);

//Funcion para visualizar y seleccionar los datos del usuario para hacer la factura
function ListarUsuario() {
    tablaUsuarioVenta = $("#tblListadoBuscarUsuario").dataTable({
        aProcessing: true, //actiavmos el procesamiento de datatables
        aServerSide: true, //paginacion y filtrado del lado del serevr
        dom: "Bfrtip", //definimos los elementos del control de tabla
        buttons: [],
        ajax: {
            url: "./../../Controller/CarritoController.php?op=BuscarUsuario",
            type: "get",
            dataType: "json",
            error: function (e) {
                console.log(e.responseText);
            },
            bDestroy: true,
            iDisplayLength: 5,
        },
        lengthMenu: [[5], [5]],
        language: {
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
//Rellena los campos seleccionados con la informacion de la tabla para editar algun producto del carrito
$("#tblListadoBuscarUsuario tbody").on(
    "click",
    'button[id="SeleccionarU"]',
    function () {
        var data = $("#tblListadoBuscarUsuario").DataTable().row($(this).parents("tr")).data();

        $("#NombreUsuario").val(data[1]);
        $("#idUsuario").val(data[0]);
        $('#BuscarUsuario').modal('hide');

        return false;
    }
);


//Eliminar los datos de un producto en el carrito
function EliminarProductoCarrito(IdCarrito, event) {
    event.preventDefault();
    bootbox.confirm('¿Está seguro de eliminar el producto?', function (result) {
        if (result) {
            $.post(
                '../../Controller/CarritoController.php?op=EliminarProductoCarrito',
                { IdCarrito: IdCarrito },
                function (data, textStatus, xhr) {
                    switch (data) {
                        case '1':
                            toastr.success('Producto Eliminado');
                            location.reload();
                            break;
                        case '2':
                            toastr.error('Producto no encontrado');
                            break;
                        case '3':
                            toastr.error('Error al tratar de eliminar el producto. Por favor, consulte con el administrador');
                            break;
                        default:
                            toastr.error(data);
                            break;
                    }
                }
            );
        }
    });
}



//Elimina todo los productos que tengan el idUsuario correcto
function LimpiarCarrito(event) {
    event.preventDefault();
    bootbox.confirm('¿Está seguro de eliminar el producto?', function (result) {
        if (result) {
            $.post(
                '../../Controller/CarritoController.php?op=EliminarProductosCarrito',
                function (data, textStatus, xhr) {
                    switch (data) {
                        case '1':
                            toastr.success('Productos Eliminados');
                            location.reload();
                            break;
                        case '2':
                            toastr.error('Productos no encontrados');
                            break;
                        case '3':
                            toastr.error('Error al tratar de eliminar el producto. Por favor, consulte con el administrador');
                            break;
                        default:
                            toastr.error(data);
                            break;
                    }
                }
            );
        }
    });
}


/*Habilitacion de form de modificacion al presionar el boton en la tabla*/
$("#tblListadoCarritoInterno tbody").on(
    "click",
    'button[id="modificarProductoCarrito"]',
    function () {
        var data = $("#tblListadoCarritoInterno").DataTable().row($(this).parents("tr")).data();
        limpiarFormsCarritoInterno();
        var imagen = data[11];
        var URLImagen = "../assets/img/" + imagen;
        var precioventa = data[10];
        $("#formulario_agregar_carritoInterno").hide();
        $("#formulario_editar_carritoInterno").show();
        $("#id").val(data[0]);

        $("#Nuevo_Id_Producto").val(data[12]);
        $("#Nueva_Descripcion").val(data[1]);
        $("#Nuevo_Precio_Venta").val(precioventa);

        $("#Nueva_Cant_XS").val(data[2]);
        $("#Nueva_Cant_S").val(data[3]);
        $("#Nueva_Cant_M").val(data[4]);
        $("#Nueva_Cant_L").val(data[5]);
        $("#Nueva_Cant_XL").val(data[6]);
        $("#Nueva_Cant_XXL").val(data[7]);

        $("#Nueva_Cant_XS_DB").val(data[13]);
        $("#Nueva_Cant_S_DB").val(data[14]);
        $("#Nueva_Cant_M_DB").val(data[15]);
        $("#Nueva_Cant_L_DB").val(data[16]);
        $("#Nueva_Cant_XL_DB").val(data[17]);
        $("#Nueva_Cant_XXL_DB").val(data[18]);
        $("#img_edit").attr("src", URLImagen);
        return false;
    }
);
/*Funcion para modificacion de datos de producto*/
$("#carritoInterno_editar").on("submit", function (event) {
    event.preventDefault();
    bootbox.confirm("¿Desea modificar los datos?", function (result) {
        if (result) {
            var formData = new FormData($("#carritoInterno_editar")[0]);
            $.ajax({
                url: "../../Controller/CarritoController.php?op=EditarProductoCarrito",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (datos) {
                    //alert(datos);
                    switch (datos) {
                        case "0":
                            toastr.error("Error: No se pudieron actualizar los datos");
                            break;
                        case "1":
                            toastr.success("Producto actualizado exitosamente");
                            tablaCarritoInterno.api().ajax.reload();
                            limpiarFormsCarritoInterno();
                            $("#formulario_editar_carritoInterno").hide();
                            $("#formulario_agregar_carritoInterno").show();
                            break;
                        case "2":
                            toastr.error("Error:Id no encontrado.");
                            break;
                    }
                },
            });
        }
    });
});
