<?php include ("Component\Header.php") ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <!-- Formulario de modificacion de xxx -->
        <div class="col-12" id="formulario_ver_error">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Ver datos Error</h3>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <form name="modulos_ver_error" id="error_see" method="POST">
                                <input type="hidden" class="form-control" id="id" name="id">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Descripcion">Descripción</label>
                                            <textarea type="text" class="form-control" id="Descripcion"
                                                name="Descripcion" readonly rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Usuario">Usuario</label>
                                            <input type="text" class="form-control" id="Usuario" name="Usuario"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Fecha">Fecha</label>
                                            <input type="text" class="form-control" id="Fecha" name="Fecha" readonly>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="button-group">
                                        <input type="button" class="btn btn-secondary" value="Cerrar"
                                            onclick="cancelarFormError()">
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
                    <h3 class="card-title">Errores existentes</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body ">
                    <div class="row ">
                        <div class="col">
                            <table id="tblListadoError" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <th>ID</th>
                                    <th>Descripción</th>
                                    <th>Usuario</th>
                                    <th>Fecha</th>
                                    <th>Opciones</th>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfooter>
                                    <th>ID</th>
                                    <th>Descripción</th>
                                    <th>Usuario</th>
                                    <th>Fecha</th>
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
    <script src="./../assets/js/Error.js"></script>