/*Función para limpieza de los formularios*/
function limpiarFormsCategoria() {
    $("#modulos_agregar_categoria").trigger("reset");
    $("#modulos_editar_categoria").trigger("reset");
}

/*Funcion para cancelación del uso de formulario de modificación*/
function cancelarFormCategoria() {
    limpiarFormsCategoria();
    $("#formulario_agregar_categoria").hide();
    $("#formulario_editar_categoria").hide();
}
/* Aqui se crean las tarjetas para que estas se muestren en la página de categorías*/
$(document).ready(function () {
    $.ajax({
        url: './../../Controller/CategoriaController.php?op=ListarCategoria',
        dataType: 'json',
        success: function (data) {
            data.forEach(function (categoria) {
                var tarjetaHTML =
                    '<div class="col-sx-1 col-sm-4 col-md-4 col-lg-3 col-lx-2">' +
                    '<div class="tarjeta-categoria">' +
                    '<div class="card" >' +
                    '<div class="card-body">' +
                    '<h3 class="card-title">' + categoria.IdCategoria + '</h3>' +
                    '<p class="card-text">' + categoria.Categoria + '</p>' + categoria.OpcionCategoria +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>';
                $('#contenedor-tarjetas-Categoria').append(tarjetaHTML);
            })
        },
        error: function (e) {
            console.log(e.responseText);
        }
    });
});



/*Aqui se ocultan los formularios de crear y modificar*/
$(function () {
    $("#formulario_agregar_categoria").hide();
    $("#formulario_editar_categoria").hide();
});


/*Eto es para poder mostrar el formulario de agregar*/
$(document).ready(function () {
    $('#agregarCategoria').click(function () {
        limpiarFormsCategoria();
        $('#formulario_agregar_categoria').show();
        $("#formulario_editar_categoria").hide();
        return false; 
    });
});

/*Función para crear una categoria nueva*/
$("#categoria_agregar").on("submit", function (event) {
    event.preventDefault();
    $("#btnRegistar").prop("disabled", true);
    var formData = new FormData($("#categoria_agregar")[0]);
    $.ajax({
        url: "./../../Controller/CategoriaController.php?op=AgregarCategoria",
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
                        text: 'Categoría registrada',
                        timer: 3000, // tiempo en milisegundos para que desaparezca el mensaje
                        showConfirmButton: false
                    }).then(() => {
                        $("#categoria_agregar")[0].reset();
                        location.reload();
                    });
                    break;

                case "2":
                    Swal.fire({
                        icon: 'error',
                        title: '¡Error!',
                        text: 'La categoría ya existe. Corrija e inténtelo nuevamente.'
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

/*Habilitación de form de modificacion al presionar el botón en la tabla*/
$(document).on("click", 'button[id="modificarCategoria"]', function () {
    var card = $(this).closest('.card');
    // var id = card.data('id').text();
    var id = card.find('.card-title').text();
    var Categoria = card.find('.card-text').text();

    // Obtener otros datos necesarios según la estructura de las tarjetas

    limpiarFormsCategoria();
    $("#formulario_agregar_categoria").hide();
    $("#formulario_editar_categoria").show();
    $("#id").val(id);
    $("#Nuevo_Nombre_Categoria").val(Categoria);

    // Llenar otros campos del formulario según sea necesario

    return false;
});
/*Funcion para la  modificación de datos de la categoría*/
$("#categoria_editar").on("submit", function (event) {
    event.preventDefault();
    Swal.fire({
        title: '¿Desea modificar los datos?',
        text: "Esta acción modificará los datos de la categoría",
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Sí',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            var formData = new FormData($("#categoria_editar")[0]);
            $.ajax({
                url: "./../../Controller/CategoriaController.php?op=EditarCategoria",
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
                                text: 'Categoría actualizada exitosamente'
                            }).then(() => {
                                location.reload();
                                limpiarFormsCategoria();
                                $("#formulario_agregar_categoria").hide();
                                $("#formulario_editar_categoria").hide();
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

/*Función para eliminar una categoria*/
function EliminarCategoria(IdCategoria, event) {
    event.preventDefault();
    Swal.fire({
        title: '¿Está seguro de eliminar la categoría?',
        text: 'Esta acción eliminará permanentemente la categoría',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.post('./../../Controller/CategoriaController.php?op=EliminarCategoria', { IdCategoria: IdCategoria },
                function (data, textStatus, xhr) {
                    switch (data) {
                        case '1':
                            Swal.fire({
                                icon: 'success',
                                title: '¡Éxito!',
                                text: 'Categoría eliminada exitosamente'
                            }).then(() => {
                                location.reload();
                            });
                            break;
                        case '0':
                            Swal.fire({
                                icon: 'error',
                                title: '¡Error!',
                                text: 'La categoría no puede eliminarse. Consulte con el administrador.'
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
