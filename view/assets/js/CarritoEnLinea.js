function ListarCarritoEnLinea() {
    tablaCarritoEnLinea = $("#tblListadoCarritoEnLinea").dataTable({
        aProcessing: true, //actiavmos el procesamiento de datatables
        aServerSide: true, //paginacion y filtrado del lado del serevr
        dom: "Bfrtip", //definimos los elementos del control de tabla
        buttons: [],

        ajax: {
            url: "./../../Controller/CarritoController.php?op=ListarTablaCarritoEnLinea",
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

$(function () {
    ListarCarritoEnLinea();
});

$(document).ready(function () {
    $.ajax({
        url: './../../Controller/CarritoController.php?op=ListarPrecioTotalCompra',
        dataType: 'json',
        success: function (data) {
            data.forEach(function (carrito) {
                // Iterar sobre los datos y crear tarjetas de categoría
                if(carrito.Precio==null){
                    var tarjetaHTML = '<div class="card">' +
                    '<div class="card-body">' +
                    '<h5 class="card-title">Resumen de Compra</h5>' +
                    '<hr>' +
                    '<small>Precio Total</small>' +
                    '<h2>₡ 0.0 </h2>' +
                    '<hr>' +
                    '<button class="btn btn-success">Comprar</button>  ' +
                    '<input type="button" class="btn btn-secondary" value="Limpiar Carrito"'+
                    'onclick="LimpiarCarrito(event);" id="btnLimpiarCarrito">' +
                    '</div>' +
                    '</div>' +
                    '<div class="card">' +
                    '<div class="card-body">' +
                    '<h5 class="card-title">¿Tienes alguna pregunta?</h5>' +
                    '<hr>' +
                    '<h4><i class="ti-mobile"></i> 2252-7036</h4> <small>Por favor contactanos si tienes alguna pregunta. ' +
                    'Responderemos apenas podamos!</small>' +
                    ' </div>' +
                    ' </div>';
                }else{

                
                var tarjetaHTML = '<div class="card">' +
                    '<div class="card-body">' +
                    '<h5 class="card-title">Resumen de Compra</h5>' +
                    '<hr>' +
                    '<small>Precio Total</small>' +
                    '<h2>₡ ' + carrito.Precio + '</h2>' +
                    '<hr>' +
                    '<button class="btn btn-success">Comprar</button>  ' +
                    '<input type="button" class="btn btn-secondary" value="Limpiar Carrito"'+
                    'onclick="LimpiarCarrito(event);" id="btnLimpiarCarrito">' +
                    '</div>' +
                    '</div>' +
                    '<div class="card">' +
                    '<div class="card-body">' +
                    '<h5 class="card-title">¿Tienes alguna pregunta?</h5>' +
                    '<hr>' +
                    '<h4><i class="ti-mobile"></i> 2252-7036</h4> <small>Por favor contactanos si tienes alguna pregunta. ' +
                    'Responderemos apenas podamos!</small>' +
                    ' </div>' +
                    ' </div>';}
                $('#contenedor-tarjeta-PrecioFinal').append(tarjetaHTML);

                
                var tarjetaHTML2='<h5 class="m-b-0 text-white">Tu carrito ('+carrito.Cantidad+' productos)</h5>';
                $('#cantidadproductos').append(tarjetaHTML2);
            })
        },
        error: function (e) {
            console.log(e.responseText);
        }
    });
});

function EliminarProductoCarritoEnLinea(IdCarrito, event) {
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

$("#carritoEnLinea_agregar").on("submit", function (event) {
    event.preventDefault();
    $("#btnRegistar").prop("disabled", true);
    var formData = new FormData($("#carritoEnLinea_agregar")[0]);
    $.ajax({
        url: "./../../Controller/CarritoController.php?op=AgregarCarrito",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (datos) {
            switch (datos) {
                case "1":
                    Swal.fire({
                        icon: 'success',
                        title: '¡Éxito!',
                        text: 'Producto registrado',
                    }).then(() => {
                        $("#carritoEnLinea_agregar")[0].reset();
                        $('#Comprar').modal('hide');
                    });
                    break;

                case "2":
                    Swal.fire({
                        icon: 'error',
                        title: '¡Error!',
                        text: 'El producto ya existe. Corrija e inténtelo nuevamente.',
                    });
                    break;

                case "3":
                    Swal.fire({
                        icon: 'error',
                        title: '¡Error!',
                        text: 'Hubo un error al tratar de ingresar los datos.',
                    });
                    break;

                case "4":
                    Swal.fire({
                        icon: 'error',
                        title: '¡Error!',
                        text: 'Datos incompletos.',
                    });
                    break;

                default:
                    Swal.fire({
                        icon: 'error',
                        title: '¡Error!',
                        text: datos,
                    });
                    break;
            }
            $("#btnRegistar").removeAttr("disabled");
        },
    });
});

