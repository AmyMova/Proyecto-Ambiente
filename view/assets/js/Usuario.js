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
function ListarUsuarios() {
    tabla = $("#tbllistado").dataTable({
        aProcessing: true, //actiavmos el procesamiento de datatables
        aServerSide: true, //paginacion y filtrado del lado del serevr
        dom: "Bfrtip", //definimos los elementos del control de tabla
        buttons: ["copyHtml5", "excelHtml5", "csvHtml5", "pdf"],
        ajax: {
            url: "../Controller/UsuarioController.php?op=ListarTablaUsuario",
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
    $("#formulario_contrasenna").hide();
    ListarUsuarios();
});
/*
CRUD
*/
$("#usuario_add").on("submit", function (event) {
    event.preventDefault();
    $("#btnRegistar").prop("disabled", true);
    var formData = new FormData($("#usuario_add")[0]);
    $.ajax({
        url: "../Controller/UsuarioController.php?op=AgregarUsuario",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (datos) {
            switch (datos) {
                case "1":
                    toastr.success("Usuario registrado");
                    $("#usuario_add")[0].reset();
                    tabla.api().ajax.reload();
                    break;

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
$("#tbllistado tbody").on(
    "click",
    'button[id="modificarUsuario"]',
    function () {
        var data = $("#tbllistado").DataTable().row($(this).parents("tr")).data();
        limpiarForms();

        $("#formulario_add").hide();
        $("#formulario_contrasenna").hide();
        $("#formulario_update").show();
        $("#id").val(data[0]);
        $("#Nuevo_Nombre").val(data[1]);
        $("#Nuevo_Apellido_Usuario").val(data[2]);
        
        $("#Nuevo_Correo").val(data[3]);
        $("#Nuevo_Numero_Telefono").val(data[6]);
        $("#Nuevo_Numero_Cedula").val(data[7]);
        var Rol = data[9];
        var dia = data[10];
        var mes = data[11];
        var ano = data[12];
        $("#Nuevo_Rol").val(Rol);
        $("#Nuevo_Dia_Cumpleanos").val(dia);
        $("#Nuevo_Mes_Cumpleanos").val(mes);
        $("#Nuevo_Ano_Cumpleanos").val(ano);

        return false;
    }
);

$("#tbllistado tbody").on(
    "click",
    'button[id="modificarContrasena"]',
    function () {
        var data = $("#tbllistado").DataTable().row($(this).parents("tr")).data();
        limpiarForms();

        $("#formulario_add").hide();
        $("#formulario_update").hide();
        $("#formulario_contrasenna").show();
        $("#ID").val(data[0]);
        $("#CorreoElectronico").val(data[3]);
        
        return false;
    }
);

/*Funcion para modificacion de la contraseña del usuario*/
$("#contrasena_update").on("submit", function (event) {
    event.preventDefault();
    bootbox.confirm("¿Desea modificar la contraseña?", function (result) {
        if (result) {
            var formData = new FormData($("#contrasena_update")[0]);
            $.ajax({
                url: "../Controller/UsuarioController.php?op=CContrasena",
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
                            toastr.success("Contraseña actualizado exitosamente");
                            tabla.api().ajax.reload();
                            limpiarForms();
                            $("#formulario_update").hide();
                            $("#formulario_contrasenna").hide();
                            $("#formulario_add").show();
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
/*Funcion para modificacion de datos de usuario*/
$("#usuario_update").on("submit", function (event) {
    event.preventDefault();
    bootbox.confirm("¿Desea modificar los datos?", function (result) {
        if (result) {
            var formData = new FormData($("#usuario_update")[0]);
            $.ajax({
                url: "../Controller/UsuarioController.php?op=EditarUsuario",
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
                            tabla.api().ajax.reload();
                            limpiarForms();
                            $("#formulario_update").hide();
                            $("#formulario_add").show();
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
                '../Controller/UsuarioController.php?op=EliminarUsuario',
                { IdUsuario: IdUsuario },
                function (data, textStatus, xhr) {
                    switch (data) {
                        case '1':
                            toastr.success('Usuario Eliminado');
                            tabla.api().ajax.reload();
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