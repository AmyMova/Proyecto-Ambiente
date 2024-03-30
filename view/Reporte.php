<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Agrega los estilos necesarios para la tabla -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css">
</head>

<body>

    <!-- Navbar vertical -->
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link active" href="#">Apartado</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
    </ul>

    <!-- Aquí agregamos la tabla de listado de apartados -->
    <div class="col-md-12">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Listado de Apartados</h3>
            </div>
            <div class="card-body p-0">
                <div class="row mt-2">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <table id="tbllistado" class="table table-striped table-bordered table-hover">
                            <thead>
                                <!-- Encabezados de la tabla -->
                                <th>IdApartado</th>
                                <th>ValorTotal</th>
                                <th>Producto</th>
                                <th>CantidadTotal</th>
                                <th>PrecioTotal</th>
                                <th>Duracion</th>
                                <th>AporteUsuario</th>
                                <th>MetodoPago</th>
                                <th>NombreCliente</th>
                                <th>FechaApartado</th>
                                <th>CorreoCliente</th>
                                <!-- Añadir más columnas según sea necesario -->
                            </thead>
                            <tbody>
                                <!-- Filas de la tabla -->
                            </tbody>

                        </table>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="plugins/DataTables/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/bootbox/bootbox.min.js"></script>
    <script src="plugins/toastr/toastr.js"></script>
    <!-- Tu script personalizado -->
    <script src="assets/js/NewApartado.js"></script>
    <script>
        // Llamar a la función para listar los apartados cuando la página se cargue
        $(document).ready(function() {
            ListarApartados();
        });
    </script>
</body>

</html>
