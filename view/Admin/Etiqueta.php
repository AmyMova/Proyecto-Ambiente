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
                    <div class="col">
                        <div class="row">
                            <div class="col-lg-12">
                                <form name="modulos_agregar_etiqueta" id="etiqueta_agregar" method="POST">
                                    <input type="hidden" id="existeModulo" name="existeModulo">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="IdProducto">IdProducto</label>
                                                <input type="text" class="form-control" id="IdProducto"
                                                    name="IdProducto" readonly>

                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="Descripcion">Descripción<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="Descripcion"
                                                        name="Descripcion" readonly>
                                                    <button class="btn btn-info" type="button" data-toggle="modal"
                                                        data-target="#BuscarProductoA"><i
                                                            class="fas fa-search"></i></button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="XS">XS</label>
                                                <input type="number" class="form-control" id="XS" name="XS" value="0"
                                                    required min=0 max=999>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="S">S</label>
                                                <input type="number" class="form-control" id="S" name="S" value="0"
                                                    required min=0 max=999>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="M">M</label>
                                                <input type="number" class="form-control" id="M" name="M" value="0"
                                                    required min=0 max=999>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="L">L</label>
                                                <input type="number" class="form-control" id="L" name="L" value="0"
                                                    required min=0 max=999>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="XL">XL</label>
                                                <input type="number" class="form-control" id="XL" name="XL" value="0"
                                                    required min=0 max=999>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="XXL">XXL</label>
                                                <input type="number" class="form-control" id="XXL" name="XXL" value="0"
                                                    required min=0 max=999>
                                            </div>
                                        </div>

                                    </div>
                            </div>

                            <div class="col">
                                <div class="row button-group">
                                    <div class="col-2"><input type="submit" id="btnRegistar"
                                            class="btn btn-success btn-block" value="Registrar"></div>
                                    <div class="col-2"><input type="reset" class="btn btn-warning  btn-block"
                                            value="Borrar datos"></div>
                                    <div class="col-2"><input type="button" id="btnCancelar"
                                            class="btn btn-secondary btn-block" value="Cancelar"
                                            onclick="cancelarFormEtiqueta()"></div>
                                </div>
                            </div>
                            </form>

                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>

    <!-- Formulario de modificacion de xxx -->
    <div id="formulario_editar_etiqueta">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Modificar una Etiqueta</h3>
            </div>
            <div class="card-body">
                <div class="row ">
                    <div class="col-lg-12">
                        <form name="etiqueta_editar" id="etiqueta_editar" method="POST">
                            <input type="hidden" class="form-control" id="id" name="id">
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Id_Producto">IdProducto</label>
                                            <input type="text" class="form-control" id="Id_Producto" name="Id_Producto"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Descripcion_Producto">Producto</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="Descripcion_Producto"
                                                    name="Descripcion_Producto" readonly>
                                                <button class="btn btn-info" type="button" data-toggle="modal"
                                                    data-target="#BuscarProductoE"><i
                                                        class="fas fa-search"></i></button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="Nuevo_XS">XS</label>
                                            <input type="number" class="form-control" id="Nuevo_XS" name="Nuevo_XS"
                                                required min=0 max=999>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="Nuevo_S">S</label>
                                            <input type="number" class="form-control" id="Nuevo_S" name="Nuevo_S"
                                                required min=0 max=999>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="Nuevo_M">M</label>
                                            <input type="number" class="form-control" id="Nuevo_M" name="Nuevo_M"
                                                required min=0 max=999>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="Nuevo_L">L</label>
                                            <input type="number" class="form-control" id="Nuevo_L" name="Nuevo_L"
                                                required min=0 max=999>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="Nuevo_XL">XL</label>
                                            <input type="number" class="form-control" id="Nuevo_XL" name="Nuevo_XL"
                                                required min=0 max=999>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="Nuevo_XXL">XXL</label>
                                            <input type="number" class="form-control" id="Nuevo_XXL" name="Nuevo_XXL"
                                                required min=0 max=999>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="row button-group">
                                    <div class="col-2"><input type="submit" class="btn btn-warning btn-block"
                                            value="Modificar"></div>
                                    <div class="col-2"><input type="button" class="btn btn-secondary btn-block"
                                            value="Cancelar" onclick="cancelarFormEtiqueta()"></div>
                                </div>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->


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
                            <div class="row button-group">
                                <div class="col-2">
                                    <button class="btn waves-effect waves-light btn-success btn-block"
                                        id="agregarEtiqueta">Agregar</button>
                                </div>
                                <div class="col-2"><a role="button"
                                        class="btn waves-effect waves-light btn-info btn-block"
                                        href="ImprimirEtiqueta.php">Imprimir</a>
                                </div>
                                <div class="col-2"><button class="btn waves-effect waves-light btn-danger btn-block"
                                        onclick="EliminarEtiquetas();">Limpiar
                                        Etiquetas</button>
                                </div>
                            </div>
                            <br>
                            <table id="tblListadoEtiqueta" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <th>ID</th>
                                    <th>Descripción</th>
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
    <!--Modal buscar producto -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true" style="display: none;" id="BuscarProductoA">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Buscar Producto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">

                    <table id="tblListadoBuscarProductoA" class="table table-striped table-bordered table-hover" style="width:100%;">
                        <thead>
                            <th>ID</th>
                            <th>Producto</th>
                            <th>Opción</th>
                        </thead>
                        <tbody>
                        </tbody>

                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect text-left"
                        data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--Modal para editar el producto-->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true" style="display: none;" id="BuscarProductoE" onclick="  ListarProductosEditar();">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Buscar Producto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <table id="tblListadoBuscarProductoE" class="table table-striped table-bordered table-hover">
                        <thead>
                            <th>ID</th>
                            <th>Producto</th>
                            <th>Opción</th>
                        </thead>
                        <tbody>
                        </tbody>

                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect text-left"
                        data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>







    <?php include ("Component\Footer.php") ?>