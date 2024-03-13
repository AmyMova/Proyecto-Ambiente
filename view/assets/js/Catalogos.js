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
        url: '../Controller/CatalogoController.php?op=ListarTarjetaProducto',
        dataType: 'json',
        success: function (data) {
            console.log(data);
            // Iterar sobre los datos y crear tarjetas de producto
            data.forEach(function (producto) {
                var tarjetaHTML =
                    '<div class="col-3">' +
                    '<div class="tarjeta-producto">' +
                    '<div class="card my-3" >' +
                    '<img src="assets/img/' + producto.Imagen +'" class="card-img-top imagen" />' +
                    '<div class="card-body">' +
                    '<div hidden class="XS">' + producto.CantXS + '</div>' +
                    '<div hidden class="S">' + producto.CantS + '</div>' +
                    '<div hidden class="M">' + producto.CantM + '</div>' +
                    '<div hidden class="L">' + producto.CantL + '</div>' +
                    '<div hidden class="XL">' + producto.CantXL + '</div>' +
                    '<div hidden class="XXL">' + producto.CantXXL + '</div>' +
                    '<div hidden class="Marca">' + producto.Marca + '</div>' +
                    '<div hidden class="NombreCategoria">' + producto.Categoria + '</div>' +
                    '<div hidden class="imagen">' + producto.Imagen + '</div>' +
                    '<h6 class="card-title">' + producto.Descripcion + '</h6>' +
                    '<p class="card-text preciov">₡' + producto.PrecioV + '</p>' +
                    producto.Opcion +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</br>';
                $('#contenedor-tarjetas').append(tarjetaHTML);
            })
        },
        error: function (e) {
            console.log(e.responseText);

        }
    });
});
// Manejar clic en el botón "Modificar Producto" en una tarjeta
$(document).on("click", 'button[id="VerInformacion"]', function () {
    var card = $(this).closest('.card');
    var id = card.data('id');
    var descripcion = card.find('.card-title').text();
    var precioVenta = card.find('.preciov').text();
    var cantXS = card.find('.XS').text();
    var cantS = card.find('.S').text();
    var cantM = card.find('.M').text();
    var cantL = card.find('.L').text();
    var cantXL = card.find('.XL').text();
    var cantXXL = card.find('.XXL').text();
    var NombreCategoria = card.find('.NombreCategoria').text();
    var Marca = card.find('.Marca').text();
    var imagen = card.find('.imagen').text();

    var PrecioVenta = parseInt((precioVenta.replace("₡", " ")).trim());
   var URLImagen="assets/img/"+imagen;

    // Obtener otros datos necesarios según la estructura de tus tarjetas

    limpiarForms();
    $("#formulario_add").hide();
    $("#formulario_update").show();
    $("#id").val(id);
    $("#Nueva_Descripcion").val(descripcion);
    $("#Nuevo_Precio_Venta").val(PrecioVenta);
    $("#Nueva_Cant_XS").val(cantXS);
    $("#Nueva_Cant_S").val(cantS);
    $("#Nueva_Cant_M").val(cantM);
    $("#Nueva_Cant_L").val(cantL);
    $("#Nueva_Cant_XL").val(cantXL);
    $("#Nueva_Cant_XXL").val(cantXXL);
    $("#Nueva_Categoria").val(NombreCategoria);
    $("#Nueva_Marca").val(Marca);
    $("#img").attr("src", URLImagen);

    // Llenar otros campos del formulario según sea necesario

    return false;
});

// Manejar envío del formulario de actualización de producto
$("#producto_update").on("submit", function (event) {
    event.preventDefault();
    bootbox.confirm("¿Desea modificar los datos?", function (result) {
        if (result) {
            var formData = new FormData($("#producto_update")[0]);
            $.ajax({
                url: "../Controller/ProductoController.php?op=EditarProducto",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (datos) {
                    switch (datos) {
                        case "0":
                            toastr.error("Error: No se pudieron actualizar los datos");
                            break;
                        case "1":
                            toastr.success("Producto actualizado exitosamente");
                            // Actualizar tarjetas o hacer cualquier otra acción necesaria
                            limpiarForms();
                            $("#formulario_update").hide();
                            $("#formulario_add").show();
                            break;
                        case "2":
                            toastr.error("Error: Descripción no pertenece al producto.");
                            break;
                    }
                },
            });
        }
    });
});
