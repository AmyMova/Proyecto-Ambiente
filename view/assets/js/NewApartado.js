/*Función para limpieza de los formularios*/
function limpiarForms() {
 }

/*Función para cancelar el uso de formulario de modificación*/
function cancelarForm() {
  limpiarForms();
 }

/*Función para cargar el listado en el Datatable*/
function ListarApartados() {
  tabla = $("#tbllistado").dataTable({
    processing: true, // Activamos el procesamiento de datatables
    serverSide: true, // Paginación y filtrado del lado del servidor
    dom: "Bfrtip", // Definimos los elementos del control de tabla
    buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdf"],
    ajax: {
      url: "../Controller/NewApartadoController.php?op=ListarTablaApartado",
      type: "GET",
      dataType: "json",
      error: function (e) {
        console.log(e.responseText);
      },
    },
    destroy: true, // Destruir la tabla antes de crearla de nuevo
    pageLength: 5, // Número de filas a mostrar por página
  });
}


/*
Función Principal
*/
$(function () {

  ListarApartados();
});



// Función para agregar un nuevo apartado
$("#form-apartado").on("submit", function (event) {
  event.preventDefault();
  var formData = new FormData($(this)[0]);
  $.ajax({
      url: "../Controller/NewApartadoController.php?op=AgregarApartado",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
          var data = JSON.parse(response);
          if (data.success) {
              toastr.success(data.message);
              $('#tbllistado').DataTable().ajax.reload();
              // Aquí puedes limpiar el formulario después de agregar el apartado
              limpiarForms();
          } else {
              toastr.error(data.message);
          }
      },
      error: function (xhr, status, error) {
          toastr.error("Error al agregar el apartado. Por favor, inténtelo de nuevo.");
      }
  });
});

// Función para habilitar el formulario de modificación al presionar un botón en la tabla
$("#tblApartados tbody").on("click", 'button[id="modificarApartado"]', function () {
});

// Función para modificar datos de un apartado
$("#apartado_update").on("submit", function (event) {
  event.preventDefault();
});

// Función para eliminar un apartado
function EliminarApartado(IdApartado) {
}
