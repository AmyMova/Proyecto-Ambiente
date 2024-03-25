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
        <!-- Formulario de creacion de xxx -->
        <div class="col-md-12" id="formulario_add">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Agregar una Etiqueta</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md 10">
                            <form name="modulos_add" id="etiqueta_add" method="POST">
                                <input type="hidden" id="existeModulo" name="existeModulo">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="IdProducto">IdProducto</label>
                                            <input type="text" class="form-control" id="IdProducto" name="IdProducto"
                                                required>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="XS">XS</label>
                                            <input type="number" class="form-control" id="XS" name="XS" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="S">S</label>
                                            <input type="number" class="form-control" id="S" name="S" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="M">M</label>
                                            <input type="number" class="form-control" id="M" name="M" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="L">L</label>
                                            <input type="number" class="form-control" id="L" name="L" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="XL">XL</label>
                                            <input type="number" class="form-control" id="XL" name="XL" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="XXL">XXL</label>
                                            <input type="number" class="form-control" id="XXL" name="XXL" required>
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
                    <h3 class="card-title">Modificar una Etiqueta</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md 10">
                            <form name="etiqueta_update" id="etiqueta_update" method="POST">
                                <input type="hidden" class="form-control" id="id" name="id">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="Id_Producto">IdProducto</label>
                                            <input type="text" class="form-control" id="Id_Producto" name="Id_Producto"
                                                required>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="Nuevo_XS">XS</label>
                                            <input type="number" class="form-control" id="Nuevo_XS" name="Nuevo_XS"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="Nuevo_S">S</label>
                                            <input type="number" class="form-control" id="Nuevo_S" name="Nuevo_S"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="Nuevo_M">M</label>
                                            <input type="number" class="form-control" id="Nuevo_M" name="Nuevo_M"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="Nuevo_L">L</label>
                                            <input type="number" class="form-control" id="Nuevo_L" name="Nuevo_L"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="Nuevo_XL">XL</label>
                                            <input type="number" class="form-control" id="Nuevo_XL" name="Nuevo_XL"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="Nuevo_XXL">XXL</label>
                                            <input type="number" class="form-control" id="Nuevo_XXL" name="Nuevo_XXL"
                                                required>
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
    <!-- listado -->

    <div class="col-md-12">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Etiquetas existentes</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="row mt-2">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="row">
                            <div class="form-group col-md-2">
                                <input type="button" class="form-control btn btn-info" value="Imprimir Etiquetas"
                                    onclick="Imprimir()">
                            </div>
                        </div>
                        <table id="tbllistado" class="table table-striped table-bordered table-hover">
                            <thead>
                                <th>ID</th>
                                <th>Descripción</th>
                                <th>Categoria</th>
                                <th>Marca</th>
                                <th>XS</th>
                                <th>S</th>
                                <th>M</th>
                                <th>L</th>
                                <th>XL</th>
                                <th>XXL</th>
                                <th>Precio Venta</th>
                                <th>Precio Crédito</th>
                                <th>Opciones</th>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfooter>
                                <th>ID</th>
                                <th>Descripción</th>
                                <th>Categoria</th>
                                <th>Marca</th>
                                <th>XS</th>
                                <th>S</th>
                                <th>M</th>
                                <th>L</th>
                                <th>XL</th>
                                <th>XXL</th>
                                <th>Precio Venta</th>
                                <th>Precio Crédito</th>
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
    <script src="assets/js/Etiqueta.js"></script>

</html>