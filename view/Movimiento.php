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
</head>

<body>
    <div class="row">
        <!-- Formulario de modificacion de xxx -->
        <div class="col-md-12" id="formulario_read">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Ver Más</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md 10">
                            <form name="modulo_read" id="movimiento_read" method="POST">
                                <input type="hidden" class="form-control" id="id" name="id">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="Descripcion">Descripción</label>
                                            <textarea name="Descripcion" class="form-control"
                                                id="Descripcion"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="Producto">Poducto</label>
                                            <input type="text" class="form-control" id="Producto" name="Producto"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="Fecha">Fecha</label>
                                            <input type="text" class="form-control" id="Fecha" name="Fecha" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="Accion">Acción</label>
                                            <input type="text" class="form-control" id="Accion" name="Accion" required>
                                        </div>
                                    </div>

                                </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">

                        <div class="form-group col-md-2">
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
    
    <!-- listado -->
    <div class="col-md-12">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Movimientos existentes</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="row mt-2">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <table id="tbllistado" class="table table-striped table-bordered table-hover">
                            <thead>
                                <th>ID</th>
                                <th>Descripción</th>
                                <th>Producto</th>
                                <th>Fecha</th>
                                <th>Acción</th>
                                <th>Opciones</th>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfooter>
                                <th>ID</th>
                                <th>Descripción</th>
                                <th>Producto</th>
                                <th>Fecha</th>
                                <th>Acción</th>
                                <th>Opciones</th>
                            </tfooter>
                        </table>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
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
    <script src="assets/js/Movimiento.js"></script>
</body>

</html>