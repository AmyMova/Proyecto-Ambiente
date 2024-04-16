/*Funcion para limpieza de los formularios*/
function limpiarFormsProducto() {
  $("#modulos_agregar_producto").trigger("reset");
  $("#modulos_editar_producto").trigger("reset");
}

/*Funcion para cancelacion del uso de formulario de modificación*/
function cancelarFormProducto() {
  limpiarFormsProducto();
  $("#formulario_agregar_producto").hide();
  $("#formulario_editar_producto").hide();

}


/*Funcion para cargar el listado en el Datatable*/
function ListarProductos() {
  tablaProducto = $("#tblListadoProducto").dataTable({
    aProcessing: true, //actiavmos el procesamiento de datatables
    aServerSide: true, //paginacion y filtrado del lado del serevr
    dom: "Bfrtip", //definimos los elementos del control de tabla
    buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdf"],
    ajax: {
      url: "../../Controller/ProductoController.php?op=ListarTablaProducto",
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
  $("#formulario_editar_producto").hide();
  $("#formulario_agregar_producto").hide();
  ListarProductos();
});
/*
CRUD
*/
$("#producto_agregar").on("submit", function (event) {
  event.preventDefault();
  $("#btnRegistar").prop("disabled", true);
  var formData = new FormData($("#producto_agregar")[0]);
  $.ajax({
    url: "../../Controller/ProductoController.php?op=AgregarProducto",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (datos) {
      switch (datos) {
        case "1":
          toastr.success("Producto registrado");
          $("#producto_agregar")[0].reset();
          $("#formulario_agregar").hide();
          tablaProducto.api().ajax.reload();
          break;

        case "2":
          toastr.error(
            "El producto ya existe... Corrija e inténtelo nuevamente..."
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

$(document).ready(function () {
  // Evento clic para el botón #agregarProducto
  $('#agregarProducto').click(function () {
    limpiarFormsProducto();
    $("#formulario_editar_producto").hide();
    $('#formulario_agregar_producto').show();
    RellenarSelectAgregarCategoria();
    RellenarSelectAgregarMarca();
    return false; // Para evitar que el evento de clic se propague
  });
});

/*Habilitacion de form de modificacion al presionar el boton en la tabla*/
$("#tblListadoProducto tbody").on(
  "click",
  'button[id="modificarProducto"]',
  function () {
    var data = $("#tblListadoProducto").DataTable().row($(this).parents("tr")).data();
    limpiarFormsProducto();
    var imagen = data[13];
    var URLImagen = "../assets/img/" + imagen;

    $("#formulario_agregar_producto").hide();
    $("#formulario_editar_producto").show();
    $("#id").val(data[0]);
    $("#Nueva_Descripcion").val(data[1]);
    $("#Nuevo_Precio_Venta").val(data[10]);
    $("#Nuevo_Precio_Credito").val(data[12]);
    $("#Nueva_Cant_XS").val(data[4]);
    $("#Nueva_Cant_S").val(data[5]);
    $("#Nueva_Cant_M").val(data[6]);
    $("#Nueva_Cant_L").val(data[7]);
    $("#Nueva_Cant_XL").val(data[8]);
    $("#Nueva_Cant_XXL").val(data[9]);
    llenarSelectEditarMarca(data);
    llenarSelectEditarCategoria(data);
    $("#img_edit").attr("src", URLImagen);
    return false;
  }
);
/*Funcion para modificacion de datos de producto*/
$("#producto_editar").on("submit", function (event) {
  event.preventDefault();
  bootbox.confirm("¿Desea modificar los datos?", function (result) {
    if (result) {
      var formData = new FormData($("#producto_editar")[0]);
      $.ajax({
        url: "../../Controller/ProductoController.php?op=EditarProducto",
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
              tablaProducto.api().ajax.reload();
              limpiarFormsProducto();
              $("#formulario_editar_producto").hide();
              break;
            case "2":
              toastr.error("Error:Id no encontrado.");
              break;
          }
        },
      });
    }
  });
});
/*Elimina el producto*/
function EliminarProducto(IdProducto) {
  bootbox.confirm('¿Esta seguro de eliminar el producto?', function (result) {
    if (result) {
      $.post(
        '../../Controller/ProductoController.php?op=EliminarProducto',
        { IdProducto: IdProducto },
        function (data, textStatus, xhr) {
          switch (data) {
            case '1':
              toastr.success('Producto Eliminado');
              tablaProducto.api().ajax.reload();
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

function RellenarSelectAgregarCategoria() {
  $.ajax({
    url: '../../Controller/CategoriaController.php?op=ListarCategoria',
    dataType: 'json',
    success: function (response) {
      llenarSelect(response); // Llamamos a la función para llenar el select con los datos recibidos
    },
    error: function (xhr, status, error) {
      console.error('Error al obtener los datos:', error);
    }
  });

  // Función para rellenar el select con los datos recibidos del servidor
  function llenarSelect(datos) {
    var select = $('#Id_Categoria');

    // Limpiamos las opciones actuales
    select.empty();

    select.append($('<option>', {
      value: '0',
      text: 'Seleccionar'
    }));
    // Creamos una opción por cada objeto en el JSON recibido del servidor
    $.each(datos, function (i, dato) {
      select.append($('<option>', {
        value: dato.IdCategoria,
        text: dato.Categoria
      }));
    });

    // Aplicamos la inicialización de Select2
    select.select2();
  }
};

function RellenarSelectAgregarMarca() {
  $.ajax({
    url: '../../Controller/MarcaController.php?op=ListarMarca',
    dataType: 'json',
    success: function (response) {
      llenarSelect(response); // Llamamos a la función para llenar el select con los datos recibidos
    },
    error: function (xhr, status, error) {
      console.error('Error al obtener los datos:', error);
    }
  });

  // Función para rellenar el select con los datos recibidos del servidor
  function llenarSelect(datos) {
    var select = $('#Id_Marca');

    // Limpiamos las opciones actuales
    select.empty();

    select.append($('<option>', {
      value: '0',
      text: 'Seleccionar'
    }));
    // Creamos una opción por cada objeto en el JSON recibido del servidor
    $.each(datos, function (i, dato) {
      select.append($('<option>', {
        value: dato.IdMarca,
        text: dato.Marca
      }));
    });

    // Aplicamos la inicialización de Select2
    select.select2();
  }
};


function llenarSelectEditarMarca(data) {
  $.ajax({
    url: '../../Controller/MarcaController.php?op=ListarMarca',
    dataType: 'json',
    success: function (response) {
      llenarSelect(response); // Llamamos a la función para llenar el select con los datos recibidos
    },
    error: function (xhr, status, error) {
      console.error('Error al obtener los datos:', error);
    }
  });


  function llenarSelect(datos) {


    var select = $('#Nuevo_Id_Marca');
    var selected = data[15];

    // Limpiamos las opciones actuales
    select.empty();

    // Añadimos la opción predeterminada
    $.each(datos, function (i, dato) {
      var option = $('<option>', {
        value: dato.IdMarca,
        text: dato.Marca
      });
      if (dato.IdMarca == selected) {
        option.attr('selected', 'selected');
      }
      select.append(option);
    });
    // Aplicamos la inicialización de Select2
    select.select2();
  }
}


function llenarSelectEditarCategoria(data) {
  $.ajax({
    url: '../../Controller/CategoriaController.php?op=ListarCategoria',
    dataType: 'json',
    success: function (response) {
      llenarSelect(response); // Llamamos a la función para llenar el select con los datos recibidos
    },
    error: function (xhr, status, error) {
      console.error('Error al obtener los datos:', error);
    }
  });
  function llenarSelect(datos) {
    var select = $('#Nuevo_Id_Categoria');
    var selected = data[14];

    // Limpiamos las opciones actuales
    select.empty();

    // Añadimos la opción predeterminada
    $.each(datos, function (i, dato) {
      var option = $('<option>', {
        value: dato.IdCategoria,
        text: dato.Categoria
      });
      if (dato.IdCategoria == selected) {
        option.attr('selected', 'selected');
      }
      select.append(option);
    });
    // Aplicamos la inicialización de Select2
    select.select2();
  }
}