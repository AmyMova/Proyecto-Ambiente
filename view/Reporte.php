<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/toastr/toastr.css">
    <link rel="stylesheet" href="../view/assets/css/Apartado.css">
</head>

<body>

    <?php include 'grafico.php'; ?>


    <!-- Scripts -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/DataTables/datatables.min.js"></script>

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