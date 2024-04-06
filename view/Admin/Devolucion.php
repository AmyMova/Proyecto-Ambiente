<?php include ("Component\Header.php"); ?><!-- Aqui se llama el encabezado de la pagina -->
<div class="container-fluid"><!-- Aqui se agrega el contenedor fluido para que la pagina sea responsive -->




    <!-- Formulario de modificacion de devoluciones -->
    <div class="col-xs-2 col-sm-12 col-md-12 col-lg-12" id="formulario_editar_devolucion">
        <div class="card card-dark">
            <!-- Encabezado de la tarjeta del formulario de devoluciones -->
            <div class="card-header">
                <h3 class="card-title">Ver Devolución</h3>
            </div>
            <!-- Encabezado de la tarjeta del formulario de devoluciones -->
            <!-- Aqui empieza el cuerpo de la tarjeta del formulario de devoluciones -->
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-xs-2 col-sm-12 col-md-12 col-lg-9">
                        <form name="modulos_editar_devolucion" id="devolucion_editar" method="POST"
                            enctype="multipart/form-data">
                            <input type="hidden" class="form-control" id="id" name="id">

                            <div class="col">
                                <div class="row row-cols-3">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="input-group" for="Nueva_Descripcion">Descripción<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="Nueva_Descripcion"
                                                name="Nueva_Descripcion" minlength="10" maxlength="50"
                                                onkeyup="EliminarNumeros();"
                                                required><!-- Esta función elimina los números que se encuentran en el campo -->
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="input-group">
                                            <label class="input-group" for="Nuevo_Precio_Venta">Precio Venta<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="Nuevo_Precio_Venta"
                                                name="Nuevo_Precio_Venta" onkeyup="EliminarLetras();"
                                                required><!-- Esta función elimina las letras que se encuentran en el campo -->
                                            <div class="input-group-append">
                                                <span class="input-group-text">₡</span>
                                                <span class="input-group-text">,00</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="input-group">
                                            <label class="input-group" for="Nuevo_Precio_Credito">Precio
                                                Venta<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="Nuevo_Precio_Credito"
                                                name="Nuevo_Precio_Credito" onkeyup="EliminarLetras();"
                                                required><!-- Esta función elimina las letras que se encuentran en el campo -->
                                            <div class="input-group-append">
                                                <span class="input-group-text">₡</span>
                                                <span class="input-group-text">,00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            

                            <div class="row"><!-- Grupo de botones con diferentes funciones  -->
                                <div class="button-group">
                                    <input type="button" class="btn btn-secondary" value="Cancelar"
                                        onclick="cancelarFormDevolucion()"><!-- se cancelan los cambios que se iban a hacer y oculta el formulario -->
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
                            <div class="row">
                                <div class="col-lg-2">
                                    <button class="btn waves-effect waves-light  btn-success"
                                        id="agregarDevolucion">Devolución</button>
                                </div>
                            </div>
                            <br>
                            <table id="tblListadoDevolucion" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <th>ID</th>
                                    <th>Producto</th>
                                    <th>Motivo</th>
                                    <th>Opción</th>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfooter>
                                    <th>ID</th>
                                    <th>Producto</th>
                                    <th>Motivo</th>
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