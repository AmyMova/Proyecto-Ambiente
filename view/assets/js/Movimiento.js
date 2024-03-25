/*Funcion para limpieza de los formularios*/
function limpiarForms() {
    $("#modulo_read").trigger("reset");
  }
  function cancelarForm() {
    limpiarForms();
    
  }
  /*Funcion para cancelacion del uso de formulario de modificación*/
 
  
  /*Funcion para cargar el listado en el Datatable*/
  function ListarMovimientos() {
    tabla = $("#tbllistado").dataTable({
      aProcessing: true, //actiavmos el procesamiento de datatables
      aServerSide: true, //paginacion y filtrado del lado del serevr
      dom: "Bfrtip", //definimos los elementos del control de tabla
      buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdf"],
      ajax: {
        url: "../Controller/MovimientoController.php?op=ListarTablaMovimientos",
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
    ListarMovimientos();
  });
  /*Habilitacion de form de modificacion al presionar el boton en la tabla*/
  $("#tbllistado tbody").on(
    "click",
    'button[id="VerMás"]',
    function () {
      var data = $("#tbllistado").DataTable().row($(this).parents("tr")).data();
      limpiarForms();
      
      $("#id").val(data[0]);
      $("#Descripcion").val(data[1]);
      $("#Producto").val(data[2]);
      $("#Fecha").val(data[3]);
      $("#Accion").val(data[4]);
      return false;
    }
  );