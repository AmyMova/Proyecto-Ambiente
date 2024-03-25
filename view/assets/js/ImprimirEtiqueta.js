  
  /*Funcion para cargar el listado en el Datatable*/
  function ListarTablaEtiqueta() {
    tabla = $("#tbllistado").dataTable({
      aProcessing: true, //actiavmos el procesamiento de datatables
      aServerSide: true, //paginacion y filtrado del lado del serevr
      dom: "Bfrtip", //definimos los elementos del control de tabla
      buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdf","print"],
      ajax: {
        url: "../Controller/EtiquetaController.php?op=ListarTablaEtiqueta",
        type: "get",
        dataType: "json",
        error: function (e) {
          console.log(e.responseText);
        },
        bDestroy: true,
        iDisplayLength: 4,
      },
    });
  }
  /*
  Funcion Principal
  */
  $(function () {
    
    ListarTablaEtiqueta();
  });