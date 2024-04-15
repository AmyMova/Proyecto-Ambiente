<?php session_start();
if ($_SESSION["IdRol"] != "1") {
    header("Location:../Autenticacion/Login.php");
}

?>

<!DOCTYPE html>
<html dir="ltr" lang="es">
<!--Conseguir la informacion del usuario para poner en la foto de perfil y el nombre del usuario-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/toastr/toastr.css">
    <!-- Favicon icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="../assets/libs/select2/dist/css/select2.min.css">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/LogoRosayAnilRedondo.PNG">
    <title>Rosa y Añil</title>
    <!-- Custom CSS -->
    <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="../assets/dist/css/style.min.css" rel="stylesheet">
    <!--CDN Select2-->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
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
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <a href="../Autenticacion/Index.php" class="logo">
                            <!-- Logo icon -->
                            <b class="logo-icon">
                                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                                <!-- Dark Logo icon -->
                                <img src="../assets/img/LogoRosayAnil.PNG" width="150px" height="50px" alt="homepage"
                                    class="dark-logo" />
                                <!-- Light Logo icon -->
                                <img src="../assets/img/LogoRosayAnil.PNG" width="150px" height="50px" alt="homepage"
                                    class="light-logo" />
                            </b>
                            <!--End Logo icon -->

                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti-more"></i>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <!-- <li class="nav-item d-none d-md-block">
                            <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                                <i class="mdi mdi-menu font-24"></i>
                            </a>
                        </li> -->
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item search-box">

                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- User profile  -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark pro-pic" href=""
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="../assets/img/<?php echo $_SESSION["Imagen"] ?>" alt="user"
                                    class="rounded-circle" width="40"><!--Encontrar la foto del usuario-->
                                <span class="m-l-5 font-medium d-none d-sm-inline-block">
                                    <?php echo $_SESSION["NombreUsuario"], " ", $_SESSION["ApellidoUsuario"] ?><!--Encontrar el nombre del usuario-->
                                    <i class="mdi mdi-chevron-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow">
                                    <span class="bg-primary"></span>
                                </span>
                                <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                                    <div class="">
                                        <img src="../assets/img/<?php echo $_SESSION["Imagen"] ?>" alt="user"
                                            class="rounded-circle" width="60" height="60">
                                    </div>
                                    <div class="m-l-10">
                                        <h4 class="m-b-0">
                                            <?php echo $_SESSION["NombreUsuario"], " ", $_SESSION["ApellidoUsuario"] ?>
                                        </h4><!--Encontrar el nombre del usuario-->
                                        <p class=" m-b-0">
                                            <?php echo $_SESSION["CorreoElectronico"] ?>
                                        </p><!--Encontrar el correo del usuario-->
                                    </div>
                                </div>
                                <a class="dropdown-item"
                                    href="../UsuarioPersonal.php?p=<?php echo $_SESSION["IdUsuario"]; ?>">
                                    <i class="ti-user m-r-5 m-l-5"></i> Mi Perfil</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../Autenticacion/Login.php">
                                    <i class="fa fa-power-off m-r-5 m-l-5"></i> Cerrar
                                    Sesión</a><!--Cerrar la sesion del usuario-->

                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile  -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span
                                class="hide-menu">Inevntario</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i class=" fas fa-boxes"></i><span
                                    class="hide-menu">Inventario </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="Producto.php"
                                        class="sidebar-link"><i class=" fas fa-box"></i><span class="hide-menu">
                                            Producto </span></a></li>
                                <li class="sidebar-item"><a href="Categoria.php" class="sidebar-link"><i
                                            class=" fas fa-box"></i><span class="hide-menu"> Categoría </span></a></li>
                                <li class="sidebar-item"><a href="Marca.php" class="sidebar-link"><i
                                            class=" fas fa-box"></i><span class="hide-menu"> Marca </span></a></li>
                                <li class="sidebar-item"><a href="Etiqueta.php" class="sidebar-link"><i
                                            class="fa-solid fa-ticket-simple"></i></i><span class="hide-menu"> Etiqueta
                                        </span></a></li>
                            </ul>
                        </li>
                        <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span
                                class="hide-menu">Reportes</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link two-column has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i
                                    class="fa-solid fa-chart-pie"></i><span class="hide-menu">Reportes </span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item"><a href="Grafica.php" class="sidebar-link"><i
                                            class="fa-solid fa-chart-line"></i><span class="hide-menu"> Gráficas
                                        </span></a></li>
                                <li class="sidebar-item"><a href="Movimiento.php" class="sidebar-link"><i
                                            class="mdi mdi-email-alert"></i><span class="hide-menu"> Movimientos
                                        </span></a></li>
                                <li class="sidebar-item"><a href="Reporte.php" class="sidebar-link"><i
                                            class="fa-solid fa-table"></i><span class="hide-menu"> Reportes </span></a>
                                </li>
                                <li class="sidebar-item"><a href="Error.php" class="sidebar-link"><i
                                            class="fa-solid fa-bug"></i><span class="hide-menu"> Errores </span></a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span
                                class="hide-menu">Ventas</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i
                                    class=" fas fa-clipboard-check"></i><span class="hide-menu">Ventas </span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item"><a href="Factura.php" class="sidebar-link"><i
                                            class="fa-solid fa-receipt"></i><span class="hide-menu"> Facturas</span></a>
                                </li>
                                <li class="sidebar-item"><a href="Apartado.php" class="sidebar-link"><i
                                            class="fa-solid fa-bookmark"></i><span class="hide-menu">
                                            Apartados</span></a></li>
                                <li class="sidebar-item"><a href="Devolucion.php" class="sidebar-link"><i
                                            class="fa-solid fa-share"></i><span class="hide-menu">
                                            Devoluciones</span></a></li>
                            </ul>
                        </li>
                        <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span
                                class="hide-menu">Facturación</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i
                                    class="fa-solid fa-cart-shopping"></i><span class="hide-menu">Ventas </span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item"><a href="Carrito.php" class="sidebar-link"><i
                                            class="fa-solid fa-cart-plus"></i><span class="hide-menu"> Crear
                                            Factura</span></a></li>
                            </ul>
                        </li>
                        <li class="nav-small-cap"><i class="mdi mdi-dots-horizontal"></i> <span
                                class="hide-menu">Usuarios</span></li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i class="fa-solid fa-users"></i><span
                                    class="hide-menu">Usuarios </span></a>
                            <ul aria-expanded="false" class="collapse first-level">
                                <li class="sidebar-item"><a href="Usuario.php" class="sidebar-link"><i
                                            class="fa-solid fa-user"></i><span class="hide-menu"> Editar Usuario
                                        </span></a></li>
                            </ul>
                        </li>

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">