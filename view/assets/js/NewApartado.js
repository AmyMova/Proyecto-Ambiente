/*Función para limpieza de los formularios*/
function limpiarForms() {
    // Aquí puedes agregar la lógica para limpiar los formularios de tu nuevo módulo "NewApartado"
  }
  
  /*Función para cancelar el uso de formulario de modificación*/
  function cancelarForm() {
    limpiarForms();
    // Aquí puedes agregar la lógica para cancelar el formulario de modificación de tu nuevo módulo "NewApartado"
  }
  
  /*Función para cargar el listado en el Datatable*/
  function ListarApartados() {
    // Aquí puedes agregar la lógica para listar los apartados utilizando DataTables
  }
  
  /*
  Función Principal
  */
  $(function () {
    // Aquí puedes llamar a las funciones necesarias al cargar la página
  });
  
  /*
  CRUD
  */
  
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
          // Aquí puedes recargar la tabla de apartados
          ListarApartados();
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
    // Aquí puedes agregar la lógica para habilitar el formulario de modificación y cargar los datos del apartado seleccionado
  });
  
  // Función para modificar datos de un apartado
  $("#apartado_update").on("submit", function (event) {
    event.preventDefault();
    // Aquí puedes agregar la lógica para modificar los datos de un apartado
  });
  
  // Función para eliminar un apartado
  function EliminarApartado(IdApartado) {
    // Aquí puedes agregar la lógica para confirmar y eliminar un apartado
  }
  