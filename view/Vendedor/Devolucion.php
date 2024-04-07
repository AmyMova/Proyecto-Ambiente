<?php include ("Component\Header.php"); ?><!-- Aqui se llama el encabezado de la pagina -->
<div class="container-fluid"><!-- Aqui se agrega el contenedor fluido para que la pagina sea responsive -->




    <!-- Formulario de modificacion de devoluciones -->
    <div class="col-xs-2 col-sm-12 col-md-12 col-lg-12" id="formulario_ver_devolucion">
        <div class="card card-dark">
            <!-- Encabezado de la tarjeta del formulario de devoluciones -->
            <div class="card-header">
                <h3 class="card-title">Ver Devolución</h3>
            </div>
            <!-- Encabezado de la tarjeta del formulario de devoluciones -->
            <!-- Aqui empieza el cuerpo de la tarjeta del formulario de devoluciones -->
            <div class="card-body">
                <div class="row ">
                    <div class="col-xs-2 col-sm-12 col-md-12 col-lg-12">
                        <form name="modulos_ver_devolucion" id="devolucion_ver" method="POST"
                            enctype="multipart/form-data">
                            <input type="hidden" class="form-control" id="id" name="id">

                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group">
                                            <label class="input-group" for="Motivo">Motivo</label>
                                            <textarea type="text" class="form-control" id="Motivo" name="Motivo"
                                                readonly rows="3"></textarea>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label class="input-group" for="Producto">Producto</label>
                                            <input type="text" class="form-control" id="Producto" name="Producto"
                                                minlength="10" maxlength="50" onkeyup="EliminarNumeros();"
                                                readonly><!-- Esta función elimina los números que se encuentran en el campo -->
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="input-group">
                                            <label class="input-group" for="Cantidad">Cantidad</label>
                                            <input type="text" class="form-control" id="Cantidad" name="Cantidad"
                                                readonly><!-- Esta función elimina las letras que se encuentran en el campo -->

                                        </div>
                                    </div>
                                </div>
                                <br>
                            </div>

                            <div class="col-lg-12">
                                <div class="row button-group"><!-- Grupo de botones con diferentes funciones  -->
                                    <div class="col-2">
                                        <input type="button" class="btn btn-secondary btn-block" value="Cancelar"
                                            onclick="cancelarFormDevolucion()"><!-- se cancelan los cambios que se iban a hacer y oculta el formulario -->
                                    </div>
                                </div>
                            </div>


                        </form>
                    </div>

                </div>
            </div><!-- Aqui termina el cuerpo de la tarjeta del formulario de devoluciones -->
        </div>
    </div>





    <!-- listado de devoluciones -->
    <div class="row">
        <div class="col-12">
            <div class="card card-dark">
                <!--Encabezado y titulo de la tabla devoluciones-->
                <div class="card-header">
                    <h3 class="card-title">Devoluciones</h3>

                </div>
                <!-- Encabezado y titulo de la tabla devoluciones -->
                <!-- Cuerpo de la tabla devoluciones -->
                <div class="card-body ">

                    <div class="row ">

                        <div class="col">
                            <table id="tblListadoDevolucion" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <th>ID</th>
                                    <th>Producto</th>
                                    <th>Motivo</th>
                                    <th>Cantidad</th>
                                    <th>Opción</th>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfooter>
                                    <th>ID</th>
                                    <th>Producto</th>
                                    <th>Motivo</th>
                                    <th>Cantidad</th>
                                    <th>Opción</th>
                                </tfooter>
                            </table>
                        </div>


                    </div>
                </div><!-- Cuerpo de la tabla devoluciones -->

            </div>
        </div>
    </div>




    <!-- Desde aqui se llama el footer -->
    <?php include ("Component\Footer.php") ?>