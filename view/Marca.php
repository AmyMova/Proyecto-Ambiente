<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/toastr/toastr.css">
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>

<body>
    <div class="row">
        <!-- Formulario de creacion de xxx -->
        <div class="col-md-12" id="formulario_add">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Agregar un Marca</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md 10">
                            <form name="modulos_add" id="marca_add" method="POST" enctype="multipart/form-data">
                                <input type="hidden" id="existeModulo" name="existeModulo">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="Nombre_Marca">marca</label>
                                            <input type="text" class="form-control" id="Nombre_Marca"
                                                name="Nombre_Marca" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <input type="submit" id="btnRegistar" class="btn btn-success" value="Registrar">
                                        <input type="reset" class="btn btn-warning" value="Borrar datos">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- Formulario de modificacion de xxx -->
        <div class="col-md-12" id="formulario_update">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Modificar una Marca</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md 10">
                            <form name="marca_update" id="marca_update" method="POST">
                                
                                <div class="row">
                                <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="id">IdMarca</label>
                                            <input type="text" class="form-control" id="id"
                                                name="id" required>
                                        </div>
                                    </div>
                                <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="Nuevo_Nombre_Marca">Marca</label>
                                            <input type="text" class="form-control" id="Nuevo_Nombre_Marca"
                                                name="Nuevo_Nombre_Marca" required>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="submit" class="form-control btn btn-warning" value="Modificar">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="button" class="form-control btn btn-info" value="Cancelar"
                                    onclick="cancelarForm()">
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <div class="container text-center">
                <div id="contenedor-tarjetas"class="row">
                    <!-- Aquí se cargarán las tarjetas de productos -->
                
            </div>
        </div>
    </div>


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
    <script src="assets/js/Marca.js"></script>
</body>

</html>