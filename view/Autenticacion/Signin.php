<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/LogoRosayAnilRedondo.PNG">
    <title>Registrar</title>
    <!-- Custom CSS -->
    <link href="../assets/dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../plugins/toastr/toastr.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center"
            style="background:url(../assets/img/acuarela1.png) no-repeat center center;">
            <div class="auth-box">
                <div>
                    <div class="logo">
                        <span class="db"><img src="../assets/img/LogoRosayAnil.PNG" height="150px" alt="logo" /></span>
                        <h5 class="font-medium m-b-20">Registrate</h5>
                    </div>
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
                            <form class="form-horizontal " id="SignInForm" method="POST">
                                <!--Cambiar datos a como estan en la tabla de usuarios-->
                                <div class="form-group row ">
                                    <div class="col-12 ">
                                        <div class="input-group">
                                            <input class="form-control form-control" type="text" readonly
                                                placeholder="Nombres" id="Nombre_Usuario" name="Nombre_Usuario">&nbsp;
                                            <input class="form-control form-control" type="text" readonly
                                                placeholder="Apellidos" id="Apellido_Usuario" name="Apellido_Usuario">
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 ">
                                        <input class="form-control form-control" type="text" required
                                            placeholder="Cédula" id="Numero_Cedula" name="Numero_Cedula"
                                            onkeyup="EliminarLetras();" maxlength=9 minlength=9 onblur="fetchDataApi()">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 ">
                                        <input class="form-control form-control" type="text" required
                                            placeholder="Télefono" id="Numero_Telefono" name="Numero_Telefono"
                                            onkeyup="EliminarLetras();" maxlength=8 minlength=8>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 ">
                                        <label for="FechaCumpleaños" class="form-control">Fecha de Cumpleaños</label>
                                        <div class="input-group">
                                            <input class="form-control form-control" type="number" required
                                                placeholder="Día" id="Dia_Cumpleanos" name="Dia_Cumpleanos" max=31 min=1
                                                value=1>&nbsp;
                                            <input class="form-control form-control" type="number" required
                                                placeholder="Mes" id="Mes_Cumpleanos" name="Mes_Cumpleanos" max=12 min=1
                                                value=1>&nbsp;
                                            <input class="form-control form-control" type="number" required
                                                placeholder="Año" id="Ano_Cumpleanos" name="Ano_Cumpleanos" max=2006
                                                min=1920 value=1920>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 ">
                                        <input class="form-control form-control" type="text" required=" "
                                            placeholder="Correo Electrónico" id="Correo_Electronico"
                                            name="Correo_Electronico">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 ">
                                        <input class="form-control form-control" type="text" required=" "
                                            placeholder="Contraseña" id="Contrasenna" name="Contrasenna">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12 ">
                                        <input class="form-control form-control" type="text" required=" "
                                            placeholder="Confirmar Contraseña" id="Confirmar_Contrasenna"
                                            name="Confirmar_Contrasenna">
                                    </div>
                                </div>
                                <div class="form-group text-center ">
                                    <div class="col-xs-12 p-b-20 ">
                                        <button class="btn btn-block btn-info " id="btnSignin"
                                            type="submit ">Registrarse</button>
                                    </div>
                                </div>
                                <div class="form-group m-b-0 m-t-10 ">
                                    <div class="col-sm-12 text-center ">
                                        ¿Ya tienes una cuenta? <a href="Login.php" class="text-info m-l-5 "><b>Inicia
                                                Sesión</b></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="../assets/libs/jquery/dist/jquery.min.js "></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js "></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $('[data-toggle="tooltip "]').tooltip();
        $(".preloader ").fadeOut();
    </script>
    <script src="../assets/js/Autenticacion.js"></script>
    <script>
        function EliminarLetras() {/*Elimina las letras en los campos que se pongan*/

            var inputNC = document.getElementById("Numero_Cedula");
            var inputNT = document.getElementById("Numero_Telefono");
            inputNC.value = inputNC.value.replace(/\D/g, "");
            inputNT.value = inputNT.value.replace(/\D/g, "");

        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="./../plugins/bootbox/bootbox.min.js"></script>
    <script src="./../plugins/toastr/toastr.js"></script>
</body>

</html>