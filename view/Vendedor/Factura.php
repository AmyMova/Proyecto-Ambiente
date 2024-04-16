<?php include ("Component\Header.php") ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <!-- Formulario de modificacion de xxx -->
        <div id="formulario_ver_Factura">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Información de Factura</h3>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col">
                            <form name="modulos_ver_factura" id="factura_ver" method="POST">
                                <input type="hidden" class="form-control" id="id" name="id">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="Id_Producto">ID</label>
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
                                            onclick="cancelarForm()">
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
                    <h3 class="card-title">Facturas existentes</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body ">
                    <div class="row ">
                        <div class="col">
                            <table id="tblListadoFacturaVendedor" class="table table-striped table-bordered table-hover">
                                <thead>
                                <th>ID</th>
                                    <th>Usuario</th>
                                    <th>Vendedor</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                    <th>Opciones</th>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfooter>
                                    <th>ID</th>
                                    <th>Usuario</th>
                                    <th>Vendedor</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                    <th>Opciones</th>
                                </tfooter>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include ("Component\Footer.php") ?>

    <script src="./../assets/js/Factura.js"></script>