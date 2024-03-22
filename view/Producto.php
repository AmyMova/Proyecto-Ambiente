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
                    <h3 class="card-title">Agregar un Producto</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md 10">
                            <form name="modulos_add" id="producto_add" method="POST" enctype="multipart/form-data">
                                <input type="hidden" id="existeModulo" name="existeModulo">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="descripcionP">Descripción</label>
                                            <input type="text" class="form-control" id="descripcionP"
                                                name="descripcionP" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="Precio_Venta">Precio Venta</label>
                                            <input type="text" class="form-control" id="Precio_Venta"
                                                name="Precio_Venta" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="Precio_Credito">Precio Crédito</label>
                                            <input type="text" class="form-control" id="Precio_Credito"
                                                name="Precio_Credito" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="Cantidad_XS">XS</label>
                                            <input type="number" class="form-control" id="Cantidad_XS"
                                                name="Cantidad_XS" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="Cantidad_S">S</label>
                                            <input type="number" class="form-control" id="Cantidad_S" name="Cantidad_S"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="Cantidad_M">M</label>
                                            <input type="number" class="form-control" id="Cantidad_M" name="Cantidad_M"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="Cantidad_L">L</label>
                                            <input type="number" class="form-control" id="Cantidad_L" name="Cantidad_L"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="Cantidad_XL">XL</label>
                                            <input type="number" class="form-control" id="Cantidad_XL"
                                                name="Cantidad_XL" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="Cantidad_XXL">XXL</label>
                                            <input type="number" class="form-control" id="Cantidad_XXL"
                                                name="Cantidad_XXL" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="Id_Marca">Marca</label>
                                            <select name="Id_Marca" id="Id_Marca" class="form-control">
                                                <option value="1" selected>Cuero</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="Id_Categoria">Categoria</label>
                                            <select name="Id_Categoria" id="Id_Categoria" class="form-control">
                                                <option value="1" selected>Sweater</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="imagenP">Imagen</label>
                                            <input type="file" class="form-control" id="imagenP" name="imagenP">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="preview">
                                            <img src="" id="img" alt="Preview" style="width: 50px;height:50px;">
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
                    <h3 class="card-title">Modificar un Producto</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md 10">
                            <form name="producto_update" id="producto_update" method="POST">
                                <input type="hidden" class="form-control" id="id" name="id">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="Nueva_Descripcion">Descripción</label>
                                            <input type="text" class="form-control" id="Nueva_Descripcion"
                                                name="Nueva_Descripcion" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="Nuevo_Precio_Venta">Precio Venta</label>
                                            <input type="number" class="form-control" id="Nuevo_Precio_Venta"
                                                name="Nuevo_Precio_Venta" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="Nuevo_Precio_Credito">Precio Crédito</label>
                                            <input type="number" class="form-control" id="Nuevo_Precio_Credito"
                                                name="Nuevo_Precio_Credito" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="Nueva_Cant_XS">XS</label>
                                            <input type="number" class="form-control" id="Nueva_Cant_XS"
                                                name="Nueva_Cant_XS" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="Nueva_Cant_S">S</label>
                                            <input type="number" class="form-control" id="Nueva_Cant_S"
                                                name="Nueva_Cant_S" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="Nueva_Cant_M">M</label>
                                            <input type="number" class="form-control" id="Nueva_Cant_M"
                                                name="Nueva_Cant_M" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="Nueva_Cant_L">L</label>
                                            <input type="number" class="form-control" id="Nueva_Cant_L"
                                                name="Nueva_Cant_L" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="Nueva_Cant_XL">XL</label>
                                            <input type="number" class="form-control" id="Nueva_Cant_XL"
                                                name="Nueva_Cant_XL" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="Nueva_Cant_XXL">XXL</label>
                                            <input type="number" class="form-control" id="Nueva_Cant_XXL"
                                                name="Nueva_Cant_XXL" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="Nuevo_Id_Marca">Marca</label>
                                            <select name="Nuevo_Id_Marca" id="Nuevo_Id_Marca" class="form-control">
                                                <option value="1" selected>Cuero</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="Nuevo_Id_Categoria">Categoria</label>
                                            <select name="Nuevo_Id_Categoria" id="Nuevo_Id_Categoria"
                                                class="form-control">
                                                <option value="1" selected>Sweater</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="imagenP">Imagen</label>
                                            <input type="file" class="form-control" id="imagenP" name="imagenP">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="preview">
                                            <img src="" id="img" alt="Preview" style="width: 50px;height:50px;">
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
                <h3 class="card-title">Productos existentes</h3>
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
                                <th>Imagen</th>
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
                                <th>Imagen</th>
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
    <script src="assets/js/Producto.js"></script>
    <script type="text/javascript">
        imagenP.onchange=evt=>{
            const[file]=imagenP.files;
            if(file){
                img.src=URL.createObjectURL(file);
            }
        }
        </script>
</body>

</html>