/*Funcion para limpieza de los formularios*/
function limpiarFormsMovimiento() {
  $("#modulo_read").trigger("reset");
}
function cancelarFormMovimiento() {
  limpiarFormsMovimiento();

  $("#formulario_ver_movimiento").hide();

}
/*Funcion para cancelacion del uso de formulario de modificación*/


/*Funcion para cargar el listado en el Datatable*/
function ListarMovimientos() {
  tablaMovimientos = $("#tblListadoMovimiento").dataTable({
    aProcessing: true, //actiavmos el procesamiento de datatables
    aServerSide: true, //paginacion y filtrado del lado del serevr
    dom: "Bfrtip", //definimos los elementos del control de tabla
    buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdf"],
    ajax: {
      url: "./../../Controller/MovimientoController.php?op=ListarTablaMovimientos",
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
  $("#formulario_ver_movimiento").hide();
  ListarMovimientos();

});
/*Habilitacion de form de modificacion al presionar el boton en la tabla*/
$("#tblListadoMovimiento tbody").on(
  "click",
  'button[id="VerMás"]',
  function () {
    var data = $("#tblListadoMovimiento").DataTable().row($(this).parents("tr")).data();
    limpiarFormsMovimiento();
    $("#formulario_ver_movimiento").show();
    $("#id").val(data[0]);
    $("#Descripcion").val(data[1]);
    $("#Producto").val(data[2]);
    $("#Usuario").val(data[3]);
    $("#Fecha").val(data[4]);
    $("#Accion").val(data[5]);
    return false;
  }
);