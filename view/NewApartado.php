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
    <link rel="stylesheet" href="../view/assets/css/Apartado.css">

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
                                    <!-- Campos para capturar los datos del apartado -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="IdUsuario">IdUsuario</label>
                                            <input type="text" class="form-control" id="IdUsuario" 
                                            name="IdUsuario" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="Vendedor">Vendedor</label>
                                            <input type="text" class="form-control" id="Vendedor" 
                                            name="Vendedor" required>
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
                                            <label for="FechaCreacion">FechaCreacion</label>
                                            <input type="text" class="form-control" id="FechaCreacion" 
                                            name="FechaCreacion" required>
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
                                            <label for="FechaPago1">FechaPago1</label>
                                            <input type="text" class="form-control" id="FechaPago1" 
                                            name="FechaPago1" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="FechaPago2">FechaPago2</label>
                                            <input type="text" class="form-control" id="FechaPago2" 
                                            name="FechaPago2" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="FechaPago3">FechaPago3</label>
                                            <input type="text" class="form-control" id="FechaPago3" 
                                            name="FechaPago3" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="Notificacion1">Notificacion1</label>
                                            <input type="text" class="form-control" id="Notificacion1" 
                                            name="Notificacion1" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="Notificacion2">Notificacion2</label>
                                            <input type="text" class="form-control" id="Notificacion2" 
                                            name="Notificacion2" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="Notificacion3">Notificacion3</label>
                                            <input type="text" class="form-control" id="Notificacion3" 
                                            name="Notificacion3" required>
                                        </div>
                                    </div>

                                <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="Pago1">Pago1</label>
                                            <input type="text" class="form-control" id="Pago1" 
                                            name="Pago1" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="Pago2">Pago2</label>
                                            <input type="text" class="form-control" id="Pago2" 
                                            name="Pago2" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="Pago3">Pago3</label>
                                            <input type="text" class="form-control" id="Pago3" 
                                            name="Pago3" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="SaldoPendiente">SaldoPendiente</label>
                                            <input type="text" class="form-control" id="SaldoPendiente" 
                                            name="SaldoPendiente" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="SaldoCancelado">SaldoCancelado</label>
                                            <input type="text" class="form-control" id="SaldoCancelado" 
                                            name="SaldoCancelado" required>
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
    </div>
    <!-- Scripts -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/DataTables/datatables.min.js"></script>

<script src="plugins/bootbox/bootbox.min.js"></script>
<script src="plugins/toastr/toastr.js"></script>
<!-- Tu script personalizado -->
<script src="assets/js/NewApartado.js"></script>

</body>

</html>
