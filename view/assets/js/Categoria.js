/*Funcion para limpieza de los formularios*/
function limpiarFormsCategoria() {
    $("#modulos_agregar_categoria").trigger("reset");
    $("#modulos_editar_categoria").trigger("reset");
}

/*Funcion para cancelacion del uso de formulario de modificación*/
function cancelarFormCategoria() {
    limpiarFormsCategoria();
    $("#formulario_agregar_categoria").hide();
    $("#formulario_editar_categoria").hide();
}
/* Aqui se crean las tarjetas para que estas se muestren en la página de categorias*/
$(document).ready(function () {
    $.ajax({
        url: './../../Controller/CategoriaController.php?op=ListarCategoria',
        dataType: 'json',
        success: function (data) {
            // Iterar sobre los datos y crear tarjetas de categoría
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


 /*En esta parte se rellena el select del crear producto*/

/*Eto es para poder mostrar el formulario de agregar*/
$(document).ready(function() {
    // Evento clic para el botón #agregarCategoria
    $('#agregarCategoria').click(function() {
        limpiarFormsCategoria();
        $('#formulario_agregar_categoria').show();
        $("#formulario_editar_categoria").hide();
        return false; // Para evitar que el evento de clic se propague
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
                    toastr.success("Categoria registrado");
                    $("#categoria_agregar")[0].reset();
                    location.reload();
                    break;

                case "2":
                    toastr.error(
                        "La Categoria ya existe... Corrija e inténtelo nuevamente..."
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
/*Funcion para modificacion de datos de categoria*/
$("#categoria_editar").on("submit", function (event) {
    event.preventDefault();
    bootbox.confirm("¿Desea modificar los datos?", function (result) {
        if (result) {
            var formData = new FormData($("#categoria_editar")[0]);
            $.ajax({
                url: "./../../Controller/CategoriaController.php?op=EditarCategoria",
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
                            toastr.success("Categoría actualizada exitosamente");
                            location.reload();
                            limpiarFormsCategoria();
                            $("#formulario_agregar_categoria").hide();
                            $("#formulario_editar_categoria").hide();
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
/*Función para eliminar una categoria*/
function EliminarCategoria(IdCategoria) {
    bootbox.confirm('¿Esta seguro de eliminar la categoria?', function (result) {
        if (result) {
            $.post('./../../Controller/CategoriaController.php?op=EliminarCategoria',
                { IdCategoria: IdCategoria },
                function (data, textStatus, xhr) {
                    switch (data) {
                        case '1':
                            toastr.success('Categoria Eliminada');
                            location.reload();
                            break;

                        case '0':
                            toastr.error(
                                'Error: La categoria no puede eliminarse. Consulte con el administrador...'
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