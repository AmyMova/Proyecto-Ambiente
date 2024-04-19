function limpiarFormsMarca() {
    $("#modulos_agregar_marca").trigger("reset");
    $("#modulos_editar").trigger("reset");
}

/*Funcion para cancelacion del uso de formulario de modificación*/
function cancelarFormMarca() {
    limpiarFormsMarca();
    $("#formulario_agregar_marca").hide();
    $("#formulario_editar_marca").hide();
}

$(document).ready(function () {
    $.ajax({
        url: './../../Controller/MarcaController.php?op=ListarMarca',
        dataType: 'json',
        success: function (data) {
            // Iterar sobre los datos y crear tarjetas de marca
            data.forEach(function (marca) {
                var tarjetaHTML =
                    '<div class="col-sx-1 col-sm-4 col-md-4 col-lg-3 col-lx-2">' +
                    '<div class="tarjeta-marca">' +
                    '<div class="card" >' +
                    '<div class="card-body">' +
                    '<h3 class="card-title">' + marca.IdMarca + '</h3>' +
                    '<p class="card-text">' + marca.Marca + '</p>' + marca.OpcionMarca +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>';
                $('#contenedor-tarjetas-Marca').append(tarjetaHTML);
            })
        },
        error: function (e) {
            console.log(e.responseText);
        }
    });
});
$(function () {
    $("#formulario_agregar_marca").hide();
    $("#formulario_editar_marca").hide();
});

$(document).ready(function () {
    // Evento clic para el botón #agregarMarca
    $('#agregarMarca').click(function () {
        limpiarFormsMarca();
        $('#formulario_agregar_marca').show();
        $("#formulario_editar_marca").hide();
        return false; // Para evitar que el evento de clic se propague
    });
});

$("#marca_agregar").on("submit", function (event) {
    event.preventDefault();
    $("#btnRegistar").prop("disabled", true);
    var formData = new FormData($("#marca_agregar")[0]);
    $.ajax({
        url: "./../../Controller/MarcaController.php?op=AgregarMarca",
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
                        text: 'Marca registrada',
                        timer: 3000, // tiempo en milisegundos para que desaparezca el mensaje
                        showConfirmButton: false
                    }).then(() => {
                        $("#marca_agregar")[0].reset();
                        location.reload();
                    });
                    break;

                case "2":
                    Swal.fire({
                        icon: 'error',
                        title: '¡Error!',
                        text: 'La marca ya existe. Corrija e inténtelo nuevamente.'
                    });
                    break;

                case "3":
                    Swal.fire({
                        icon: 'error',
                        title: '¡Error!',
                        text: 'Hubo un error al tratar de ingresar los datos.'
                    });
                    break;
                default:
                    Swal.fire({
                        icon: 'error',
                        title: '¡Error!',
                        text: datos
                    });
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
    var Marca = card.find('.card-text').text();

    // Obtener otros datos necesarios según la estructura de tus tarjetas

    limpiarFormsMarca();
    $("#formulario_agregar_marca").hide();
    $("#formulario_editar_marca").show();
    $("#id").val(id);
    $("#Nuevo_Nombre_Marca").val(Marca);

    // Llenar otros campos del formulario según sea necesario

    return false;
});
/*Funcion para modificacion de datos de marca*/
$("#marca_editar").on("submit", function (event) {
    event.preventDefault();
    Swal.fire({
        title: '¿Desea modificar los datos?',
        text: "Esta acción modificará los datos de la marca",
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Sí',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            var formData = new FormData($("#marca_editar")[0]);
            $.ajax({
                url: "./../../Controller/MarcaController.php?op=EditarMarca",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (datos) {
                    switch (datos) {
                        case "0":
                            Swal.fire({
                                icon: 'error',
                                title: '¡Error!',
                                text: 'No se pudieron actualizar los datos'
                            });
                            break;
                        case "1":
                            Swal.fire({
                                icon: 'success',
                                title: '¡Éxito!',
                                text: 'Marca actualizada exitosamente'
                            }).then(() => {
                                location.reload();
                                limpiarFormsMarca();
                                $("#formulario_agregar_marca").hide();
                                $("#formulario_editar_marca").hide();
                            });
                            break;
                        case "2":
                            Swal.fire({
                                icon: 'error',
                                title: '¡Error!',
                                text: 'El ID no existe'
                            });
                            break;
                    }
                },
            });
        }
    });
});

function EliminarMarca(IdMarca, event) {
    event.preventDefault();
    Swal.fire({
        title: '¿Está seguro de eliminar la marca?',
        text: 'Esta acción eliminará permanentemente la marca',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.post('./../../Controller/MarcaController.php?op=EliminarMarca', { IdMarca: IdMarca },
                function (data, textStatus, xhr) {
                    switch (data) {
                        case '1':
                            Swal.fire({
                                icon: 'success',
                                title: '¡Éxito!',
                                text: 'Marca eliminada exitosamente'
                            }).then(() => {
                                location.reload();
                            });
                            break;
                        case '0':
                            Swal.fire({
                                icon: 'error',
                                title: '¡Error!',
                                text: 'La marca no puede eliminarse. Consulte con el administrador.'
                            });
                            break;
                        default:
                            Swal.fire({
                                icon: 'error',
                                title: '¡Error!',
                                text: data
                            });
                            break;
                    }
                }
            );
        }
    });
}