
$(document).ready(function () {
    $.ajax({
        url: '../Controller/RolController.php?op=ListarRol',
        dataType: 'json',
        success: function (data) {
            console.log(data);
            // Crear el contenido del dropdown
            var dropdownContent = [];
            data.forEach(function (rol) {
                dropdownContent.push({ id: rol.IdRol, text: rol.Rol });
            });
            // Inicializar el dropdown como un Select2
            $('#dropdown-roles').select2({
                data: dropdownContent,
                placeholder: 'Seleccionar Rol', // Placeholder del menú desplegable
                allowClear: true, // Permitir borrar la selección
                width: '100%', // Ancho del menú desplegable
                dropdownAutoWidth: true // Ajustar automáticamente el ancho del menú desplegable
            });
        },
        error: function (e) {
            console.log(e.responseText);
        }
    });
});
