/*Funcion para limpieza de los formularios*/
function limpiarForms() {
    $("#modulos_add").trigger("reset");
    $("#modulos_update").trigger("reset");
}

/*Funcion para cancelacion del uso de formulario de modificación*/
function cancelarForm() {
    limpiarForms();
    $("#formulario_add").show();
    $("#formulario_update").hide();
}

$(document).ready(function () {
    $.ajax({
        url: '../Controller/MarcaController.php?op=ListarMarca',
        dataType: 'json',
        success: function (data) {
            console.log(data);
            // Iterar sobre los datos y crear tarjetas de categoría
            data.forEach(function (marca) {
                var tarjetaHTML =
                    '<div class="col-3">' +
                    '<div class="tarjeta-marca">' +
                    '<div class="card my-3" >' +
                    '<div class="card-body">' +
                    '<h5 class="card-title">' + marca.IdMarca + '</h5>' +
                    '<p class="card-text">' + marca.Marca + '</p>' +marca.Opcion +
                    '</div>' +
                    
                    '</div>' +
                    '</div>' +
                    '</div>';
                $('#contenedor-tarjetas').append(tarjetaHTML);
            })
        },
        error: function (e) {
            console.log(e.responseText);
        }
    });
});


$("#marca_add").on("submit", function (event) {
    event.preventDefault();
    $("#btnRegistar").prop("disabled", true);
    var formData = new FormData($("#marca_add")[0]);
    $.ajax({
        url: "../Controller/MarcaController.php?op=AgregarMarca",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (datos) {
            switch (datos) {
                case "1":
                    toastr.success("Marca registrada");
                    $("#marca_add")[0].reset();
                    location.reload();
                    break;

                case "2":
                    toastr.error(
                        "La marca ya existe... Corrija e inténtelo nuevamente..."
                    );
                    break;

                case "3":
                    toastr.error("Hubo un error al tratar de ingresar los datos.");
                    break;
                default:
                    toastr.error(datos);
                    break;
            }
            $("#btnRegistar").removeAttr("disabled");
        },
    });
});

/*Habilitacion de form de modificacion al presionar el boton en la tabla*/
$(document).on("click", 'button[id="modificarMarca"]', function () {
    var card = $(this).closest('.card');
   // var id = card.data('id').text();
    var id = card.find('.card-title').text();
    var marca = card.find('.card-text').text();

    // Obtener otros datos necesarios según la estructura de tus tarjetas

    limpiarForms();
    $("#formulario_add").hide();
    $("#formulario_update").show();
    $("#id").val(id);
    $("#Nuevo_Nombre_Marca").val(marca);

    // Llenar otros campos del formulario según sea necesario

    return false;
});
/*Funcion para modificacion de datos de producto*/
/*Funcion para modificacion de datos de producto*/
$("#marca_update").on("submit", function (event) {
    event.preventDefault();
    bootbox.confirm("¿Desea modificar los datos?", function (result) {
        if (result) {
            var formData = new FormData($("#marca_update")[0]);
            $.ajax({
                url: "../Controller/MarcaController.php?op=EditarMarca",
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
                            toastr.success("Marca actualizada exitosamente");
                            location.reload();
                            limpiarForms();
                            $("#formulario_update").hide();
                            $("#formulario_add").show();
                            break;
                        case "2":
                            toastr.error("Error:Id no existe.");
                            break;
                    }
                },
            });
        }
    });
});
function Eliminar(IdMarca) {
    bootbox.confirm('¿Esta seguro de eliminar la marca?', function (result) {
        if (result) {
            $.post(
                '../Controller/MarcaController.php?op=EliminarMarca',
                { IdMarca: IdMarca },
                function (data, textStatus, xhr) {
                    switch (data) {
                        case '1':
                            toastr.success('Marca Eliminada');
                            location.reload();
                            break;

                        case '0':
                            toastr.error(
                                'Error: La marca no puede eliminarse. Consulte con el administrador...'
                            );
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