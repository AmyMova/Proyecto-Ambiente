<?php include ("Component\Header.php"); ?><!-- Aqui se llama el encabezado de la pagina -->
<div class="container-fluid"><!-- Aqui se agrega el contenedor fluido para que la pagina sea responsive -->

    <div class="col-xs-2 col-sm-12 col-md-12 col-lg-12" id="formulario_editar_devolucion">
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
                        <form name="modulos_editar_devolucion" id="devolucion_editar" method="POST"
                            enctype="multipart/form-data">
                            <input type="hidden" class="form-control" id="id" name="id">

                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group">
                                            <label class="input-group" for="Numero_Factura">N° Factura<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="Numero_Factura"
                                                name="Numero_Factura" minlength="10" maxlength="50"
                                                onkeyup="EliminarNumeros();" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="input-group">
                                            <label class="input-group" for="IdProducto">ID Producto<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="IdProducto" name="IdProducto"
                                                required><!-- Esta función elimina las letras que se encuentran en el campo -->

                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="input-group" for="Descripcion">Descripción</label>
                                            <input type="text" class="form-control" id="Descripcion" name="Descripcion"
                                                minlength="10" maxlength="50" onkeyup="EliminarNumeros();"
                                                readonly><!-- Esta función elimina los números que se encuentran en el campo -->
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="input-group" for="Precio_Unitario">Precio Unitario</label>
                                            <input type="text" class="form-control" id="Precio_Unitario"
                                                name="Precio_Unitario" minlength="10" maxlength="50"
                                                onkeyup="EliminarNumeros();"
                                                readonly><!-- Esta función elimina los números que se encuentran en el campo -->
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-group" for="Nueva_Cant_XS">Tamaño XS</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="Nueva_Cant_XS"
                                                    name="Nueva_Cant_XS" required min=0
                                                    max=999><!-- se agrego un minimo y maximo -->
                                                <input type="number" class="form-control" id="Nueva_Cant_XS_DB"
                                                    name="Nueva_Cant_XS_DB" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-group" for="Nueva_Cant_S">Tamaño S</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="Nueva_Cant_S"
                                                    name="Nueva_Cant_S" required min=0
                                                    max=999><!-- se agrego un minimo y maximo -->
                                                <input type="number" class="form-control" id="Nueva_Cant_S_DB"
                                                    name="Nueva_Cant_S_DB" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-group" for="Nueva_Cant_M">Tamaño M</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="Nueva_Cant_M"
                                                    name="Nueva_Cant_M" required min=0
                                                    max=999><!-- se agrego un minimo y maximo -->
                                                <input type="number" class="form-control" id="Nueva_Cant_M_DB"
                                                    name="Nueva_Cant_M_DB" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-group" for="Nueva_Cant_L">Tamaño L</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="Nueva_Cant_L"
                                                    name="Nueva_Cant_L" required min=0
                                                    max=999><!-- se agrego un minimo y maximo -->
                                                <input type="number" class="form-control" id="Nueva_Cant_L_DB"
                                                    name="Nueva_Cant_L_DB" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-group" for="Nueva_Cant_XL">Tamaño XL</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="Nueva_Cant_XL"
                                                    name="Nueva_Cant_XL" required min=0
                                                    max=999><!-- se agrego un minimo y maximo -->
                                                <input type="number" class="form-control" id="Nueva_Cant_XL_DB"
                                                    name="Nueva_Cant_XL_DB" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-group" for="Nueva_Cant_XXL">Tamaño XXL</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="Nueva_Cant_XXL"
                                                    name="Nueva_Cant_XXL" required min=0
                                                    max=999><!-- se agrego un minimo y maximo -->
                                                <input type="number" class="form-control" id="Nueva_Cant_XXL_DB"
                                                    name="Nueva_Cant_XXL_DB" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group">
                                            <label class="input-group" for="Motivo">Motivo<span
                                                    class="text-danger">*</span></label>
                                            <textarea type="text" class="form-control" id="Motivo" name="Motivo"
                                                required rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="col-lg-12">
                                <div class="row button-group"><!-- Grupo de botones con diferentes funciones  -->
                                    <div class="col-2">
                                    <input type="submit" id="btnRegistar" class="btn btn-success btn-block"
                                            value="Crear"><!-- se cancelan los cambios que se iban a hacer y oculta el formulario -->
                                    </div>
                                    <div class="col-2">
                                        <input type="button" class="btn btn-secondary btn-block" value="Cancelar"
                                            onclick="cancelarFormCrearDevolucion()"><!-- se cancelan los cambios que se iban a hacer y oculta el formulario -->
                                    </div>
                                </div>

                            </div>


                        </form>
                    </div>

                </div>
            </div><!-- Aqui termina el cuerpo de la tarjeta del formulario de devoluciones -->
        </div>
    </div>



    <!-- Desde aqui se llama el footer -->
    <?php include ("Component\Footer.php") ?>