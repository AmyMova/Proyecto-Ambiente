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

/*Funcion para cargar el listado en el Datatable*/
function ListarProductos() {
  tabla = $("#tbllistado").dataTable({
    aProcessing: true, //actiavmos el procesamiento de datatables
    aServerSide: true, //paginacion y filtrado del lado del serevr
    dom: "Bfrtip", //definimos los elementos del control de tabla
    buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdf"],
    ajax: {
      url: "../Controller/ProductoController.php?op=ListarTablaProducto",
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
/*
Funcion Principal
*/
$(function () {
  $("#formulario_update").hide();
  ListarProductos();
});
/*
CRUD
*/
$("#producto_add").on("submit", function (event) {
  event.preventDefault();
  $("#btnRegistar").prop("disabled", true);
  var formData = new FormData($("#producto_add")[0]);
  $.ajax({
    url: "../Controller/ProductoController.php?op=AgregarProducto",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (datos) {
      switch (datos) {
        case "1":
          toastr.success("Producto registrado");
          $("#producto_add")[0].reset();
          tabla.api().ajax.reload();
          break;

        case "2":
          toastr.error(
            "El correo ya existe... Corrija e inténtelo nuevamente..."
          );
          break;

        case "3":
          toastr.error("Hubo un error al tratar de ingresar los datos.");
          break;
        /*
        case '4':
          toastr.success('producto registrado exitosamente.');
          $('#producto_add')[0].reset();
          tabla.api().ajax.reload();
          toastr.error('Error al enviar el correo.');
          break;*/

        default:
          toastr.error(datos);
          break;
      }
      $("#btnRegistar").removeAttr("disabled");
    },
  });
});

/*Habilitacion de form de modificacion al presionar el boton en la tabla*/
$("#tbllistado tbody").on(
  "click",
  'button[id="modificarProducto"]',
  function () {
    var data = $("#tbllistado").DataTable().row($(this).parents("tr")).data();
    limpiarForms();
    $("#formulario_add").hide();
    $("#formulario_update").show();
    $("#id").val(data[0]);
    $("#Nueva_Descripcion").val(data[1]);
    $("#Nuevo_Precio_Venta").val(data[10]);
    $("#Nuevo_Precio_Credito").val(data[11]);
    $("#Nueva_Cant_XS").val(data[4]);
    $("#Nueva_Cant_S").val(data[5]);
    $("#Nueva_Cant_M").val(data[6]);
    $("#Nueva_Cant_L").val(data[7]);
    $("#Nueva_Cant_XL").val(data[8]);
    $("#Nueva_Cant_XXL").val(data[9]);
    $("#Nuevo_Id_Marca").val(data[3]);
    $("#Nuevo_Id_Categoria").val(data[2]);
    $("#Nueva_Imagen").val(data[12]);
    return false;
  }
);

/*Funcion para modificacion de datos de producto*/
/*Funcion para modificacion de datos de producto*/
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
          //alert(datos);
          switch (datos) {
            case "0":
              toastr.error("Error: No se pudieron actualizar los datos");
              break;
            case "1":
              toastr.success("Producto actualizado exitosamente");
              tabla.api().ajax.reload();
              limpiarForms();
              $("#formulario_update").hide();
              $("#formulario_add").show();
              break;
            case "2":
              toastr.error("Error:Descripción no pertenece al producto.");
              break;
          }
        },
      });
    }
  });
});
function Eliminar(IdProducto) {
  bootbox.confirm('¿Esta seguro de eliminar el producto?', function (result) {
    if (result) {
      $.post(
        '../Controller/ProductoController.php?op=EliminarProducto',
        { IdProducto: IdProducto },
        function (data, textStatus, xhr) {
          switch (data) {
            case '1':
              toastr.success('Producto Eliminado');
              tabla.api().ajax.reload();
              break;

            case '0':
              toastr.error(
                'Error: El producto no puede eliminarse. Consulte con el administrador...'
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