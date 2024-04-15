const contrasenna=document.getElementById("Contrasena");
const GenerarContrasena = (length) => {
    let result = "";
    const x = "a b c d e f g h i j k l m n o p q r s t u v w x y z 1 2 3 4 5 6 7 8 9 0 ° | ! # $ % & / ? ¿ ¡ - + * / , . _ ; :  ".split(" ");
    for (i = 0; i < length; i++) {
        const random = Math.floor(Math.random() * x.length);
        result += x[random];
    }
    return result;
};
async function fetchDataApi() {
    try {
        const Cedula = document.getElementById("Numero_Cedula").value;
        const response = await fetch(`https://apis.gometa.org/cedulas/${Cedula}`);
        if (!response.ok) {
            throw new Error("No se encontró esa cédula");
        }
        const data = await response.json();
        const nombreApi = data.results[0].firstname;
        const apellidoApi = data.results[0].lastname;
        console.log(data);
        const nombre = document.getElementById("Nombre_Usuario");
        const apellido = document.getElementById("Apellido_Usuario");
        nombre.value = nombreApi;
        apellido.value = apellidoApi;

    }
    catch (error) {
        console.error(error);
    }
};



/*Funcion para limpieza de los formularios*/
function limpiarFormsUsuario() {
    $("#modulos_agregar_usuario").trigger("reset");
    $("#modulos_editar_usuario").trigger("reset");
}

/*Funcion para cancelacion del uso de formulario de modificación*/
function cancelarFormUsuario() {
    limpiarFormsUsuario();
    $("#formulario_agregar_usuario").hide();
    $("#formulario_editar_usuario").hide();
}

/*Funcion para cargar el listado en el Datatable*/
function ListarUsuarios() {
    tablaUsuario = $("#tblListadoUsuario").dataTable({
        aProcessing: true, //actiavmos el procesamiento de datatables
        aServerSide: true, //paginacion y filtrado del lado del serevr
        dom: "Bfrtip", //definimos los elementos del control de tabla
        buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdf"],
        ajax: {
            url: "./../../Controller/UsuarioController.php?op=ListarTablaUsuario",
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
    $("#formulario_editar_usuario").hide();
    $("#formulario_agregar_usuario").hide();
    ListarUsuarios();
});
/*
CRUD
*/
$(document).ready(function () {
    // Evento clic para el botón #agregarUsuario
    $('#agregarUsuario').click(function () {
        limpiarFormsUsuario();
        $('#formulario_agregar_usuario').show();
        contrasenna.value=GenerarContrasena(8);
        $("#formulario_editar_usuario").hide();
        return false; // Para evitar que el evento de clic se propague
    });
});
$("#usuario_agregar").on("submit", function (event) {
    event.preventDefault();
    $("#btnRegistar").prop("disabled", true);
    var formData = new FormData($("#usuario_agregar")[0]);
    $.ajax({
        url: "./../../Controller/UsuarioController.php?op=AgregarUsuario",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (datos) {
            switch (datos) {
                case "1":
                    toastr.success("Usuario registrado");
                    $("#usuario_agregar")[0].reset();
                    $("#formulario_agregar_usuario").hide();
                    tablaUsuario.api().ajax.reload();

                case "2":
                    toastr.error(
                        "El usuario ya existe... Corrija e inténtelo nuevamente..."
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
$("#tblListadoUsuario tbody").on(
    "click",
    'button[id="modificarUsuario"]',
    function () {
        var data = $("#tblListadoUsuario").DataTable().row($(this).parents("tr")).data();
        limpiarFormsUsuario();
        var imagen = data[14];
        var URLImagen = "assets/img/" + imagen;
        $("#formulario_agregar_usuario").hide();
        $("#formulario_editar_usuario").show();
        $("#id").val(data[0]);
        $("#Nuevo_Nombre").val(data[13]);
        $("#Nuevo_Apellido_Usuario").val(data[12]);

        $("#Nuevo_Correo").val(data[8]);
        $("#Nuevo_Numero_Telefono").val(data[4]);
        $("#Nuevo_Numero_Cedula").val(data[5]);
        var Rol = data[7];
        var dia = data[9];
        var mes = data[10];
        var ano = data[11];
        $("#Nuevo_Rol").val(data[7]);
        $("#Nuevo_Dia_Cumpleanos").val(dia);
        $("#Nuevo_Mes_Cumpleanos").val(mes);
        $("#Nuevo_Ano_Cumpleanos").val(ano);
        $("#img_edit").attr("src", URLImagen);

        return false;
    }
);


/*Funcion para modificacion de la contraseña del usuario*/

/*Funcion para modificacion de datos de usuario*/
$("#usuario_editar").on("submit", function (event) {
    event.preventDefault();
    bootbox.confirm("¿Desea modificar los datos?", function (result) {
        if (result) {
            var formData = new FormData($("#usuario_editar")[0]);
            $.ajax({
                url: "./../../Controller/UsuarioController.php?op=EditarUsuario",
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
                            toastr.success("Usuario actualizado exitosamente");
                            tablaUsuario.api().ajax.reload();
                            limpiarFormsUsuario();
                            $("#formulario_editar_usuario").hide();
                            $("#formulario_agregar_usuario").show();
                            break;
                        case "2":
                            toastr.error("Error:Id no pertenece al usuario.");
                            break;
                    }
                },
            });
        }
    });
});
function Eliminar(IdUsuario) {
    bootbox.confirm('¿Esta seguro de eliminar el usuario?', function (result) {
        if (result) {
            $.post(
                './../../Controller/UsuarioController.php?op=EliminarUsuario',
                { IdUsuario: IdUsuario },
                function (data, textStatus, xhr) {
                    switch (data) {
                        case '1':
                            toastr.success('Usuario Eliminado');
                            tablaUsuario.api().ajax.reload();
                            break;

                        case '0':
                            toastr.error(
                                'Error: El usuario no puede eliminarse. Consulte con el administrador...'
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