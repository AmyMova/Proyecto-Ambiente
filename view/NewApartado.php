<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apartados</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/toastr/toastr.css">
</head>

<body>
    <div class="row">
        <!-- Formulario de creación de apartados -->
        <div class="col-md-12" id="formulario_add">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Agregar un Nuevo Apartado</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <form name="form-apartado" id="form-apartado" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <!-- Aquí colocar los campos para capturar los datos del apartado -->
                                    <!-- Por ejemplo: -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="valor_total">Valor Total</label>
                                            <input type="text" class="form-control" id="valor_total" 
                                            name="valor_total" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="Producto">Producto</label>
                                            <input type="text" class="form-control" id="Producto" 
                                            name="Producto" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="CantidadTotal">CantidadTotal</label>
                                            <input type="text" class="form-control" id="CantidadTotal" 
                                            name="CantidadTotal" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="PrecioTotal">PrecioTotal</label>
                                            <input type="text" class="form-control" id="PrecioTotal" 
                                            name="PrecioTotal" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="Duracion">Duracion</label>
                                            <input type="text" class="form-control" id="Duracion" name="Duracion" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="AporteUsuario">AporteUsuario</label>
                                            <input type="text" class="form-control" id="AporteUsuario" name="AporteUsuario" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="MetodoPago">MetodoPago</label>
                                            <input type="text" class="form-control" id="MetodoPago" name="MetodoPago" required>
                                        </div>
                                    </div>
                             
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <input type="submit" id="btn-pagar" class="btn btn-success" value="Guardar Apartado">
                                        <input type="reset" class="btn btn-warning" value="Limpiar">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tabla de listado de apartados -->
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
                                    <th>ID</th>
                                    <th>Valor Total</th>
                                    <th>Producto</th>
                                    <th>Cantidad Total</th>
                                    <th>Precio Total</th>
                                    <th>Duración</th>
                                    <th>Aporte Usuario</th>
                                    <th>Método de Pago</th>
                                    <!-- Añadir más columnas según sea necesario -->
                                </thead>
                                <tbody>
                                    <!-- Filas de la tabla -->
                                </tbody>
                                <!-- Pie de la tabla -->
                                <tfooter>
                                    <!-- Encabezados de la tabla -->
                                    <th>ID</th>
                                    <th>Valor Total</th>
                                    <th>Producto</th>
                                    <th>Cantidad Total</th>
                                    <th>Precio Total</th>
                                    <th>Duración</th>
                                    <th>Aporte Usuario</th>
                                    <th>Método de Pago</th>
                                    <!-- Añadir más columnas según sea necesario -->
                                </tfooter>
                            </table>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Scripts -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="plugins/DataTables/datatables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/bootbox/bootbox.min.js"></script>
<script src="plugins/toastr/toastr.js"></script>
<!-- Tu script personalizado -->
<script src="assets/js/NewApartado.js"></script>

</body>

</html>
