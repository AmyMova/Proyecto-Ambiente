$(document).ready(function () {
    $.ajax({
        url: './../../Controller/RolController.php?op=ListarRol',
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
        var select = $('#Nuevo_Rol');

        // Limpiamos las opciones actuales
        select.empty();

        // Añadimos la opción predeterminada


        // Creamos una opción por cada objeto en el JSON recibido del servidor
        $.each(datos, function (i, dato) {
            select.append($('<option>', {
                value: dato.IdRol,
                text: dato.Rol
            }));
        });

        // Aplicamos la inicialización de Select2
        select.select2();
    }
});


$(document).ready(function () {
    $.ajax({
        url: './../../Controller/RolController.php?op=ListarRol',
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
        var select = $('#Id_Rol');

        // Limpiamos las opciones actuales
        select.empty();

        // Añadimos la opción predeterminada


        // Creamos una opción por cada objeto en el JSON recibido del servidor
        $.each(datos, function (i, dato) {
            select.append($('<option>', {
                value: dato.IdRol,
                text: dato.Rol
            }));
        });

        // Aplicamos la inicialización de Select2
        select.select2();
    }
});