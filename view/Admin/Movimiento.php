<?php include ("Component\Header.php") ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <!-- Formulario de creacion de xxx -->
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
                                onclick="cancelarFormMovimiento()">
                        </div>
                    </div>
                    </form>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>


        <!-- Formulario de modificacion de xxx -->

        <!-- listado -->
        <div class="row">
            <div class="col-12">
                <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Movimientos existentes</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body ">

                        <div class="row ">

                            <div class="col">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <button class="btn waves-effect waves-light  btn-success"
                                            id="agregarEtiqueta">Agregar</button>
                                    </div>
                                </div>
                                <table id="tblListadoMovimiento" class="table table-striped table-bordered table-hover">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- sample modal content -->







        <?php include ("Component\Footer.php") ?>