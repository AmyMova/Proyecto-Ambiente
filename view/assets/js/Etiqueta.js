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
  function ListarTablaEtiqueta() {
    tabla = $("#tbllistado").dataTable({
      aProcessing: true, //actiavmos el procesamiento de datatables
      aServerSide: true, //paginacion y filtrado del lado del serevr
      dom: "Bfrtip", //definimos los elementos del control de tabla
      buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdf"],
      ajax: {
        url: "../Controller/EtiquetaController.php?op=ListarTablaEtiqueta",
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
    ListarTablaEtiqueta();
  });
  /*
  CRUD
  */
  $("#etiqueta_add").on("submit", function (event) {
    event.preventDefault();
    $("#btnRegistar").prop("disabled", true);
    var formData = new FormData($("#etiqueta_add")[0]);
    $.ajax({
      url: "../Controller/EtiquetaController.php?op=AgregarEtiqueta",
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function (datos) {
        switch (datos) {
          case "1":
            toastr.success("Etiqueta registrado");
            $("#etiqueta_add")[0].reset();
            tabla.api().ajax.reload();
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
  
  /*Habilitacion de form de modificacion al presionar el boton en la tabla*/
  $("#tbllistado tbody").on(
    "click",
    'button[id="modificarEtiqueta"]',
    function () {
      var data = $("#tbllistado").DataTable().row($(this).parents("tr")).data();
      limpiarForms();
      var imagen=data[12];
      var URLImagen="assets/img/"+imagen;
  
      $("#formulario_add").hide();
      $("#formulario_update").show();
      $("#id").val(data[0]);
      $("#Nuevo_XS").val(data[4]);
      $("#Nuevo_S").val(data[5]);
      $("#Nuevo_M").val(data[6]);
      $("#Nuevo_L").val(data[7]);
      $("#Nuevo_XL").val(data[8]);
      $("#Nuevo_XXL").val(data[9]);
      $("#Id_Producto").val(data[13])
      return false;
    }
  );
  
  /*Funcion para modificacion de datos de etiqueta*/
  /*Funcion para modificacion de datos de etiqueta*/
  $("#etiqueta_update").on("submit", function (event) {
    event.preventDefault();
    bootbox.confirm("¿Desea modificar los datos?", function (result) {
      if (result) {
        var formData = new FormData($("#etiqueta_update")[0]);
        $.ajax({
          url: "../Controller/EtiquetaController.php?op=EditarEtiqueta",
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
                tabla.api().ajax.reload();
                limpiarForms();
                $("#formulario_update").hide();
                $("#formulario_add").show();
                break;
              case "2":
                toastr.error("Error:Id no pertenece a la etiqueta.");
                break;
            }
          },
        });
      }
    });
  });
  function Eliminar(IdEtiqueta) {
    bootbox.confirm('¿Esta seguro de eliminar el etiqueta?', function (result) {
      if (result) {
        $.post(
          '../Controller/EtiquetaController.php?op=EliminarEtiqueta',
          { IdEtiqueta: IdEtiqueta },
          function (data, textStatus, xhr) {
            switch (data) {
              case '1':
                toastr.success('Etiqueta Eliminado');
                tabla.api().ajax.reload();
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
