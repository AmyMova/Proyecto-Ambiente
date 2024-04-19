/*Funcion para limpieza de los formularios*/
function limpiarFormsEtiqueta() {
  $("#modulos_agregar_etiqueta").trigger("reset");
  $("#modulos_editar_etiqueta").trigger("reset");
}

/*Funcion para cancelacion del uso de formulario de modificación*/
function cancelarFormEtiqueta() {
  limpiarFormsEtiqueta();
  $("#formulario_agregar_etiqueta").hide();
  $("#formulario_editar_etiqueta").hide();

}


/*Funcion para cargar el listado en el Datatable*/
function ListarEtiquetas() {
  tablaEtiqueta = $("#tblListadoEtiqueta").dataTable({
    aProcessing: true, //actiavmos el procesamiento de datatables
    aServerSide: true, //paginacion y filtrado del lado del serevr
    dom: "Bfrtip", //definimos los elementos del control de tabla
    buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdf"],
    ajax: {
      url: "./../../Controller/EtiquetaController.php?op=ListarTablaEtiqueta",
      type: "get",
      dataType: "json",
      error: function (e) {
        console.log(e.responseText);
      },
      bDestroy: true,
      iDisplayLength: 5,
    }, language: {
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
/*Funcion para cargar el listado de productos para agregar */
function ListarProductosAgregar() {
  tablaProductosAgregar = $("#tblListadoBuscarProductoA").dataTable({
    aProcessing: true, //actiavmos el procesamiento de datatables
    aServerSide: true, //paginacion y filtrado del lado del serevr
    dom: "Bfrtip", //definimos los elementos del control de tabla
    buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdf"],
    ajax: {
      url: "./../../Controller/EtiquetaController.php?op=BuscarProductoAgregar",
      type: "get",
      dataType: "json",
      error: function (e) {
        console.log(e.responseText);
      },
      bDestroy: true,
      iDisplayLength: 5,
    }, language: {
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
/*Funcion para cargar el listado de productos para editar */
function ListarProductosEditar() {
  tablaProductosEditar = $("#tblListadoBuscarProductoE").dataTable({
    aProcessing: true, //actiavmos el procesamiento de datatables
    aServerSide: true, //paginacion y filtrado del lado del serevr
    dom: "Bfrtip", //definimos los elementos del control de tabla
    buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdf"],
    ajax: {
      url: "./../../Controller/EtiquetaController.php?op=BuscarProductoEditar",
      type: "get",
      dataType: "json",
      error: function (e) {
        console.log(e.responseText);
      },
      bDestroy: true,
      iDisplayLength: 5,
    }, language: {
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
/*
Funcion Principal
*/
$(function () {
  $("#formulario_editar_etiqueta").hide();
  $("#formulario_agregar_etiqueta").hide();
  ListarEtiquetas();
  ListarProductosAgregar();
  ListarProductosEditar();

});
/*
CRUD
*/
$("#etiqueta_agregar").on("submit", function (event) {
  event.preventDefault();
  $("#btnRegistar").prop("disabled", true);
  var formData = new FormData($("#etiqueta_agregar")[0]);
  $.ajax({
      url: "./../../Controller/EtiquetaController.php?op=AgregarEtiqueta",
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
                      text: 'Producto agregado',
                  }).then(() => {
                      $("#etiqueta_agregar")[0].reset();
                      tablaEtiqueta.api().ajax.reload();
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

$(document).ready(function () {
  // Evento clic para el botón #agregarEtiqueta
  $('#agregarEtiqueta').click(function () {
    limpiarFormsEtiqueta();
    $('#formulario_agregar_etiqueta').show();
    $("#formulario_editar_etiqueta").hide();
    return false; // Para evitar que el evento de clic se propague
  });
});


$("#tblListadoBuscarProductoA tbody").on(
  "click",
  'button[id="SeleccionarA"]',
  function () {
    var data = $("#tblListadoBuscarProductoA").DataTable().row($(this).parents("tr")).data();
    $("#IdProducto").val(data[0]);
    $("#Descripcion").val(data[1]);
    $('#BuscarProductoA').modal('hide');
    return false;
  }
);
$("#tblListadoBuscarProductoE tbody").on(
  "click",
  'button[id="SeleccionarE"]',
  function () {
    var data = $("#tblListadoBuscarProductoE").DataTable().row($(this).parents("tr")).data();
    $("#Id_Producto").val(data[0]);
    $("#Descripcion_Producto").val(data[1]);
    $('#BuscarProductoE').modal('hide');
    return false;
  }
);

/*Habilitacion de form de modificacion al presionar el boton en la tabla*/
$("#tblListadoEtiqueta tbody").on(
  "click",
  'button[id="modificarEtiqueta"]',
  function () {
    var data = $("#tblListadoEtiqueta").DataTable().row($(this).parents("tr")).data();
    limpiarFormsEtiqueta();

    $("#formulario_agregar_etiqueta").hide();
    $("#formulario_editar_etiqueta").show();
    $("#id").val(data[0]);
    $("#Nuevo_XS").val(data[2]);
    $("#Nuevo_S").val(data[3]);
    $("#Nuevo_M").val(data[4]);
    $("#Nuevo_L").val(data[5]);
    $("#Nuevo_XL").val(data[6]);
    $("#Nuevo_XXL").val(data[7]);
    $("#Id_Producto").val(data[11])
    $("#Descripcion_Producto").val(data[1])
    return false;
  }
);
/*Funcion para modificacion de datos de etiqueta*/
$("#etiqueta_editar").on("submit", function (event) {
  event.preventDefault();
  Swal.fire({
      title: '¿Desea modificar los datos?',
      text: "Esta acción modificará los datos de la etiqueta",
      icon: 'question',
      showCancelButton: true,
      confirmButtonText: 'Sí',
      cancelButtonText: 'Cancelar'
  }).then((result) => {
      if (result.isConfirmed) {
          var formData = new FormData($("#etiqueta_editar")[0]);
          $.ajax({
              url: "./../../Controller/EtiquetaController.php?op=EditarEtiqueta",
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
                              text: 'Etiqueta actualizada exitosamente'
                          }).then(() => {
                              tablaEtiqueta.api().ajax.reload();
                              limpiarFormsEtiqueta();
                              $("#formulario_agregar_etiqueta").hide();
                              $("#formulario_editar_etiqueta").hide();
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
/*Elimina el etiqueta*/
function EliminarEtiqueta(IdEtiqueta, event) {
  event.preventDefault();
  Swal.fire({
      title: '¿Está seguro de eliminar la etiqueta?',
      text: 'Esta acción eliminará permanentemente la etiqueta',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sí, eliminar',
      cancelButtonText: 'Cancelar'
  }).then((result) => {
      if (result.isConfirmed) {
          $.post('./../../Controller/EtiquetaController.php?op=EliminarEtiqueta', { IdEtiqueta: IdEtiqueta },
              function (data, textStatus, xhr) {
                  switch (data) {
                      case '1':
                          Swal.fire({
                              icon: 'success',
                              title: '¡Éxito!',
                              text: 'Etiqueta eliminada exitosamente'
                          }).then(() => {
                              location.reload();
                          });
                          break;
                      case '0':
                          Swal.fire({
                              icon: 'error',
                              title: '¡Error!',
                              text: 'La etiqueta no puede eliminarse. Consulte con el administrador.'
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

function EliminarEtiquetas(event) {
  event.preventDefault();
  Swal.fire({
      title: '¿Está seguro de eliminar todas las etiquetas?',
      text: 'Esta acción eliminará todos los productos',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Sí, eliminar',
      cancelButtonText: 'Cancelar'
  }).then((result) => {
      if (result.isConfirmed) {
          $.post(
              '../../Controller/EtiquetaController.php?op=EliminarEtiquetas',
              function (data, textStatus, xhr) {
                  switch (data) {
                      case '1':
                          Swal.fire({
                              icon: 'success',
                              title: '¡Éxito!',
                              text: 'Productos Eliminados exitosamente',
                          }).then(() => {
                              location.reload();
                          });
                          break;
                      case '2':
                          Swal.fire({
                              icon: 'error',
                              title: 'Error!',
                              text: 'Productos no encontrados',
                          });
                          break;
                      case '3':
                          Swal.fire({
                              icon: 'error',
                              title: 'Error!',
                              text: 'Error al tratar de eliminar los producto. Por favor, consulte con el administrador',
                          });
                          break;
                      default:
                          Swal.fire({
                              icon: 'error',
                              title: 'Error!',
                              text: data,
                          });
                          break;
                  }
              }
          );
      }
  })
}