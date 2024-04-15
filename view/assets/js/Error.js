/*Funcion para limpieza de los formularios*/
function limpiarFormsError() {
    $("#modulos_ver_error").trigger("reset");
  }
  function cancelarFormError() {
    limpiarFormsError();
  $("#formulario_ver_error").hide();
    
  }
  /*Funcion para cancelacion del uso de formulario de modificación*/
 
  
  /*Funcion para cargar el listado en el Datatable*/
  function ListarErrores() {
    tablaErrores = $("#tblListadoError").dataTable({
      aProcessing: true, //actiavmos el procesamiento de datatables
      aServerSide: true, //paginacion y filtrado del lado del serevr
      dom: "Bfrtip", //definimos los elementos del control de tabla
      buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdf"],
      ajax: {
        url: "./../../Controller/ErrorController.php?op=ListarTablaError",
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
    $("#formulario_ver_error").hide();
    ListarErrores();
    
  });
  /*Habilitacion de form de modificacion al presionar el boton en la tabla*/
  $("#tblListadoError tbody").on(
    "click",
    'button[id="VerMasError"]',
    function () {
      var data = $("#tblListadoError").DataTable().row($(this).parents("tr")).data();
      limpiarFormsError();
      $("#formulario_ver_error").show();
      $("#id").val(data[0]);
      $("#Descripcion").val(data[1]);
      $("#Usuario").val(data[2]);
      $("#Fecha").val(data[3]);
      return false;
    }
  );