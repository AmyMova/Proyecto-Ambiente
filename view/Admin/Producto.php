<?php include ("Component\Header.php") ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <!-- Formulario de creacion de xxx -->
        <div class="col-lg-12" id="formulario_agregar_producto">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Agregar un Producto</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <form name="modulos_agregar_producto" id="producto_agregar" method="POST" enctype="multipart/form-data">
                                <input type="hidden" id="existeModulo" name="existeModulo">
                                <div class="col-9 ">
                                    <div class="row row-cols-3">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="descripcionP">Descripción</label>
                                                <input type="text" class="form-control" id="descripcionP"
                                                    name="descripcionP" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="Precio_Venta">Precio Venta</label>
                                                <input type="text" class="form-control" id="Precio_Venta"
                                                    name="Precio_Venta" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="Precio_Credito">Precio Crédito</label>
                                                <input type="text" class="form-control" id="Precio_Credito"
                                                    name="Precio_Credito" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="row text-center">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="Cantidad_XS">XS</label>
                                                <input type="number" class="form-control" id="Cantidad_XS"
                                                    name="Cantidad_XS" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="Cantidad_S">S</label>
                                                <input type="number" class="form-control" id="Cantidad_S"
                                                    name="Cantidad_S" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="Cantidad_M">M</label>
                                                <input type="number" class="form-control" id="Cantidad_M"
                                                    name="Cantidad_M" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="Cantidad_L">L</label>
                                                <input type="number" class="form-control" id="Cantidad_L"
                                                    name="Cantidad_L" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="Cantidad_XL">XL</label>
                                                <input type="number" class="form-control" id="Cantidad_XL"
                                                    name="Cantidad_XL" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="Cantidad_XXL">XXL</label>
                                                <input type="number" class="form-control" id="Cantidad_XXL"
                                                    name="Cantidad_XXL" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="input-group">
                                                <label class="input-group" for="Id_Marca">Marca</label><br>
                                                <select class="select2 form-control custom-select" name="Id_Marca"
                                                    id="Id_Marca">
                                                    <option>Seleccionar</option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="input-group">
                                                <label class="input-group" for="Id_Categoria">Categoria</label><br>
                                                <select class="select2 form-control custom-select" name="Id_Categoria"
                                                    id="Id_Categoria">
                                                    <option>Seleccionar</option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="imagenP">Imagen</label>
                                                <input type="file" class="form-control" id="imagenP" name="imagenP">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="button-group ">
                                        <input type="submit" id="btnRegistar" class="btn btn-success" value="Registrar">

                                        <input type="reset" class="btn btn-warning " value="Borrar datos">

                                        <input type="button" id="btnCancelar" class="btn btn-secondary" value="Cancelar"
                                            onclick="cancelarFormProducto()">

                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="preview">
                                    <img src="" id="img" alt="Preview" width="280px" height="275px">
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>


        <!-- Formulario de modificacion de xxx -->
        <div class="col-lg-12" id="formulario_editar_producto">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Modificar un Producto</h3>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-9">
                            <form name="modulos_update" id="producto_update" method="POST"
                                enctype="multipart/form-data">
                                <input type="hidden" class="form-control" id="id" name="id">
                                <div class="col-9">
                                    <div class="row row-cols-3">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="Nueva_Descripcion">Descripción</label>
                                                <input type="text" class="form-control" id="Nueva_Descripcion"
                                                    name="Nueva_Descripcion" required>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-group">
                                                <label for="Nuevo_Precio_Venta">Precio Venta</label>
                                                <input type="number" class="form-control" id="Nuevo_Precio_Venta"
                                                    name="Nuevo_Precio_Venta" required>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-group">
                                                <label for="Nuevo_Precio_Credito">Precio Crédito</label>
                                                <input type="number" class="form-control" id="Nuevo_Precio_Credito"
                                                    name="Nuevo_Precio_Credito" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="row text-center">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="Nueva_Cant_XS">XS</label>
                                                <input type="number" class="form-control" id="Nueva_Cant_XS"
                                                    name="Nueva_Cant_XS" required>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-group">
                                                <label for="Nueva_Cant_S">S</label>
                                                <input type="number" class="form-control" id="Nueva_Cant_S"
                                                    name="Nueva_Cant_S" required>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-group">
                                                <label for="Nueva_Cant_M">M</label>
                                                <input type="number" class="form-control" id="Nueva_Cant_M"
                                                    name="Nueva_Cant_M" required>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-group">
                                                <label for="Nueva_Cant_L">L</label>
                                                <input type="number" class="form-control" id="Nueva_Cant_L"
                                                    name="Nueva_Cant_L" required>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-group">
                                                <label for="Nueva_Cant_XL">XL</label>
                                                <input type="number" class="form-control" id="Nueva_Cant_XL"
                                                    name="Nueva_Cant_XL" required>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-group">
                                                <label for="Nueva_Cant_XXL">XXL</label>
                                                <input type="number" class="form-control" id="Nueva_Cant_XXL"
                                                    name="Nueva_Cant_XXL" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-9">
                                    <div class="row">
                                        <div class="col">
                                            <div class="input-group">
                                                <label class="input-group" for="Nuevo_Id_Marca">Marca</label>
                                                <select name="Nuevo_Id_Marca" id="Nuevo_Id_Marca" class="form-control">
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="input-group">
                                                <label class="input-group" for="Nuevo_Id_Categoria">Categoria</label>
                                                <select name="Nuevo_Id_Categoria" id="Nuevo_Id_Categoria"
                                                    class="form-control">
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="Nueva_Imagen">Imagen</label>
                                                <input type="file" class="form-control" id="Nueva_Imagen"
                                                    name="Nueva_Imagen">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="button-group">
                                        <input type="submit" class="btn btn-warning" value="Modificar">
                                        <input type="button" class="btn btn-secondary" value="Cancelar"
                                            onclick="cancelarFormProducto()">
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="preview-edit">
                                    <img src="" id="img_edit" alt="Preview" width="280px" height="275px">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

    </div>
    <!-- listado -->
    <div class="row">
        <div class="col-12">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Productos existentes</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body ">

                    <div class="row ">

                        <div class="col">
                            <div class="row">
                                <div class="col-lg-2">
                                    <button class="btn waves-effect waves-light  btn-success"
                                        id="agregarProducto">Agregar</button>
                                </div>
                            </div>
                            <table id="tblListadoProducto" class="table table-striped table-bordered table-hover">
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
                                    <th>Precio</th>
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
                                    <th>Precio</th>
                                    <th>Opciones</th>
                                </tfooter>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- sample modal content -->



</div>
<script type="text/javascript">
    imagenP.onchange = evt => {
        const [file] = imagenP.files;
        if (file) {
            img.src = URL.createObjectURL(file);
        }
    }
</script>
<script type="text/javascript">
    Nueva_Imagen.onchange = evt => {
        const [file] = Nueva_Imagen.files;
        if (file) {
            img_edit.src = URL.createObjectURL(file);
        }
    }
</script>

<?php include ("Component\Footer.php") ?>