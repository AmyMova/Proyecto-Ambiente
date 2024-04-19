async function fetchDataApi() {
    try {
        const Cedula = document.getElementById("Numero_Cedula").value;
        if (Cedula != "") {
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
    }
    catch (error) {
        console.error(error);
    }
};
$("#login_form").on("submit", function (event) {
    event.preventDefault();
    $("#btnLogIn").prop("disabled", true);
    var formData = new FormData($("#login_form")[0]);
    $.ajax({
        url: "./../../Controller/AutentificacionController.php?op=IniciarSesion",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (datos) {
            switch (datos) {
                case "1":
                    Swal.fire({
                        icon: 'success',
                        title: '¡Inicio de sesión exitoso!',
                        text: 'Bienvenido de vuelta',
                    }).then(() => {
                        location.href = "Index.php";
                    });
                    break;

                case "2":
                    Swal.fire({
                        icon: 'error',
                        title: '¡Error!',
                        text: 'Contraseña o correo equivocado',
                    });
                    break;

                case "3":
                    Swal.fire({
                        icon: 'error',
                        title: '¡Error!',
                        text: 'Hubo un error al tratar de ingresar los datos.',
                    });
                    break;
                    
                default:
                    Swal.fire({
                        icon: 'error',
                        title: '¡Error!',
                        text: datos,
                    });
                    break;
            }
            $("#btnLogIn").removeAttr("disabled");
        },
    });
});


$("#SignInForm").on("submit", function (event) {
    event.preventDefault();
    $("#btnSignin").prop("disabled", true);
    var formData = new FormData($("#SignInForm")[0]);
    $.ajax({
        url: "./../../Controller/AutentificacionController.php?op=Registrar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (datos) {
            switch (datos) {
                case "1":
                    Swal.fire({
                        icon: 'success',
                        title: '¡Éxito!',
                        text: 'Usuario registrado exitosamente',
                    }).then(() => {
                        location.href = "Login.php";
                    });
                    break;

                case "2":
                    Swal.fire({
                        icon: 'error',
                        title: '¡Error!',
                        text: 'El usuario ya existe. Corrija e inténtelo nuevamente.',
                    });
                    break;

                case "3":
                    Swal.fire({
                        icon: 'error',
                        title: '¡Error!',
                        text: 'Hubo un error al tratar de ingresar los datos.',
                    });
                    break;
                    
                case "4":
                    Swal.fire({
                        icon: 'error',
                        title: '¡Error!',
                        text: 'Las contraseñas tienen que ser las mismas.',
                    });
                    break;
                    
                default:
                    Swal.fire({
                        icon: 'error',
                        title: '¡Error!',
                        text: datos,
                    });
                    break;
            }
            $("#btnSignin").removeAttr("disabled");
        },
    });
});


$("#forgotform").on("submit", function (event) {
    event.preventDefault();
    $("#btnforgot").prop("disabled", true);
    var formData = new FormData($("#forgotform")[0]);
    $.ajax({
        url: "./../../Controller/AutentificacionController.php?op=Forgot",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (datos) {
            switch (datos) {
                case "1":
                    Swal.fire({
                        icon: 'success',
                        title: '¡Éxito!',
                        text: 'Se ha enviado un correo para restablecer la contraseña',
                    }).then(() => {
                        location.href = "Login.php";
                    });
                    break;

                case "2":
                    Swal.fire({
                        icon: 'error',
                        title: '¡Error!',
                        text: 'No existe ese correo',
                    });
                    break;

                case "3":
                    Swal.fire({
                        icon: 'error',
                        title: '¡Error!',
                        text: 'Hubo un error al tratar de buscar los datos',
                    });
                    break;
                    
                default:
                    Swal.fire({
                        icon: 'error',
                        title: '¡Error!',
                        text: datos,
                    });
                    break;
            }
            $("#btnforgot").removeAttr("disabled");
        },
    });
});
