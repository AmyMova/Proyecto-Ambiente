<?php include ("Component\Header.php") ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <!-- Formulario de creacion de xxx -->
        <div class="col-lg-12" id="formulario_agregar_etiqueta">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Agregar una Etiqueta</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form name="modulos_agregar_etiqueta" id="etiqueta_agregar" method="POST">
                                <input type="hidden" id="existeModulo" name="existeModulo">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="IdProducto">IdProducto</label>
                                            <input type="text" class="form-control" id="IdProducto" name="IdProducto"
                                                required>
                                        </div>
                                    </div>

                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="XS">XS</label>
                                            <input type="number" class="form-control" id="XS" name="XS" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="S">S</label>
                                            <input type="number" class="form-control" id="S" name="S" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="M">M</label>
                                            <input type="number" class="form-control" id="M" name="M" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="L">L</label>
                                            <input type="number" class="form-control" id="L" name="L" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="XL">XL</label>
                                            <input type="number" class="form-control" id="XL" name="XL" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label for="XXL">XXL</label>
                                            <input type="number" class="form-control" id="XXL" name="XXL" required>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="button-group ">
                                        <input type="submit" id="btnRegistar" class="btn btn-success" value="Registrar">

                                        <input type="reset" class="btn btn-warning " value="Borrar datos">

                                        <input type="button" id="btnCancelar" class="btn btn-secondary" value="Cancelar"
                                            onclick="cancelarFormEtiqueta()">

                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>


        <!-- Formulario de modificacion de xxx -->
        <<div id="formulario_editar_etiqueta">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Modificar una Etiqueta</h3>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col">
                            <form name="etiqueta_editar" id="etiqueta_editar" method="POST">
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


                                <div class="row">
                                    <div class="button-group">
                                        <input type="submit" class="btn btn-warning" value="Modificar">
                                        <input type="button" class="btn btn-secondary" value="Cancelar"
                                            onclick="cancelarFormEtiqueta()">
                                    </div>
                                </div>
                            </form>
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
                <h3 class="card-title">Etiquetas existentes</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body ">

                <div class="row ">

                    <div class="col">
                        <div class="row">
                            <div class="col">
                                <button class="btn waves-effect waves-light  btn-success"
                                    id="agregarEtiqueta">Agregar</button>
                                <a role="button" class="btn waves-effect waves-light  btn-info"
                                    href="ImprimirEtiqueta.php">Imprimir</a>
                                <button class="btn waves-effect waves-light  btn-danger" onclick="EliminarEtiquetas();">Limpiar
                                    Etiquetas</button>
                            </div>
                        </div>
                        <br>
                        <table id="tblListadoEtiqueta" class="table table-striped table-bordered table-hover">
                            <thead>
                                <th>ID</th>
                                <th>Descripción</th>
                                <th>Categoría</th>
                                <th>Marca</th>
                                <th>XS</th>
                                <th>S</th>
                                <th>M</th>
                                <th>L</th>
                                <th>XL</th>
                                <th>XXL</th>
                                <th>Precio V.</th>
                                <th>Precio C.</th>
                                <th>Opciones</th>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfooter>
                                <th>ID</th>
                                <th>Descripción</th>
                                <th>Categoría</th>
                                <th>Marca</th>
                                <th>XS</th>
                                <th>S</th>
                                <th>M</th>
                                <th>L</th>
                                <th>XL</th>
                                <th>XXL</th>
                                <th>Precio V.</th>
                                <th>Precio C.</th>
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







<?php include ("Component\Footer.php") ?>