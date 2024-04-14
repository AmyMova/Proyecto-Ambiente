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
  tabla = $("#tblListadoEtiqueta").dataTable({
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
    },
  });
}
function ListarProductosAgregar() {
  tabla2 = $("#tblListadoBuscarProductoA").dataTable({
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
    },
  });
}

function ListarProductosEditar() {
  tabla = $("#tblListadoBuscarProductoE").dataTable({
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
          toastr.success("Etiqueta registrado");
          $("#etiqueta_agregar")[0].reset();
          location.reload();
          break;

        case "2":
          toastr.error(
            "El etiqueta ya existe... Corrija e inténtelo nuevamente..."
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

$(document).ready(function() {
  // Evento clic para el botón #agregarEtiqueta
  $('#agregarEtiqueta').click(function() {
      limpiarFormsEtiqueta();
      $('#formulario_agregar_etiqueta').show();
      $("#formulario_editar_etiqueta").hide();
      return false; // Para evitar que el evento de clic se propague
  });
});

$(document).ready(function() {
  // Evento clic para el botón #agregarEtiqueta
  $('#BuscarProductoA').click(function() {
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

$(document).ready(function() {
  // Evento clic para el botón #agregarEtiqueta
  $('#BuscarProductoE').click(function() {
    
      return false; // Para evitar que el evento de clic se propague
  });
});

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
$("#formulario_editar_etiqueta").on("submit", function (event) {
  event.preventDefault();
  bootbox.confirm("¿Desea modificar los datos?", function (result) {
    if (result) {
      var formData = new FormData($("#etiqueta_editar")[0]);
      $.ajax({
        url: "./../../Controller/EtiquetaController.php?op=EditarEtiqueta",
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
              toastr.success("Etiqueta actualizado exitosamente");
              location.reload();
              limpiarFormsEtiqueta();
              $("#formulario_editar_etiqueta").hide();
              break;
            case "2":
              toastr.error("Error:Descripción no pertenece al etiqueta.");
              break;
          }
        },
      });
    }
  });
});
/*Elimina el etiqueta*/
function EliminarEtiqueta(IdEtiqueta) {
  bootbox.confirm('¿Esta seguro de eliminar el etiqueta?', function (result) {
    if (result) {
      $.post(
        './../../Controller/EtiquetaController.php?op=EliminarEtiqueta',
        { IdEtiqueta: IdEtiqueta },
        function (data, textStatus, xhr) {
          switch (data) {
            case '1':
              toastr.success('Etiqueta Eliminado');
              location.reload();
              break;

            case '0':
              toastr.error(
                'Error: El etiqueta no puede eliminarse. Consulte con el administrador...'
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

function EliminarEtiquetas() {
  bootbox.confirm('¿Esta seguro de eliminar todas las etiquetas?', function (result) {
    if (result) {
      $.post(
        './../../Controller/EtiquetaController.php?op=EliminarEtiquetas',
        function (data, textStatus, xhr) {
          switch (data) {
            case '1':
              toastr.success('Etiquetas Eliminadas');
              
              location.reload();
              break;

            case '0':
              toastr.error(
                'Error: Las etiquetas no pueden eliminarse. Consulte con el administrador...'
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