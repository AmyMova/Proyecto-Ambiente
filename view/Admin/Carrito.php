<?php include ("Component\Header.php"); ?><!-- Aqui se llama el encabezado de la pagina -->
<div class="container-fluid"><!-- Aqui se agrega el contenedor fluido para que la pagina sea responsive -->

    <div class="row justify-content-center">
        <!-- Formulario de creacion de carritos -->
        <div class="col-xs-2 col-sm-12 col-md-12 col-lg-12" id="formulario_agregar_carritoInterno">
            <div class="card card-dark">
                <!-- Encabezado del formulario para crear carritos -->
                <div class="card-header">
                    <h3 class="card-title">Agregar a Carrito</h3>
                </div>
                <!-- Encabezado del formulario para crear carritos -->

                <div class="card-body"><!-- Aqui empieza la tarjeta que contiene el formulario de crear carritos -->
                    <div class="row">
                        <div class="col-xs-2 col-sm-12 col-md-12 col-lg-8">
                            <form name="modulos_agregar_carritoInterno" id="carritoInterno_agregar" method="POST"
                                enctype="multipart/form-data">
                                <!-- se agrega el enctype para que el formulario acepte imagenes -->
                                <input type="hidden" id="existeModulo" name="existeModulo">
                                <div class="col ">
                                    <div class="row row-cols-3">
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="input-group" for="Id_Producto">ID Producto<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="Id_Producto" readonly
                                                    data-validation-required-message="Este campo es necesario"
                                                    name="Id_Producto" required><!-- Esta función elimina los números que se encuentran en el campo -->
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="input-group" for="descripcionP">Descripción<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="descripcionP" readonly
                                                        name="descripcionP" required>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-info" type="button" data-toggle="modal"
                                                            data-target="#BuscarProductoAgregarC"><i
                                                                class="fas fa-search"></i></button>
                                                    </div>
                                                </div>

                                                <!-- Esta función elimina los números que se encuentran en el campo -->
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="input-group">
                                                <label class="input-group" for="Precio_Venta">Precio Venta<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">₡</span>
                                                </div>
                                                <input type="text" class="form-control" id="Precio_Venta"
                                                    name="Precio_Venta"
                                                    readonly required><!-- Esta función elimina las letras que se encuentran en el campo -->
                                                <div class="input-group-append">
                                                    <span class="input-group-text">,00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col ">
                                    <div class="row ">
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="form-group" for="Cantidad_XS">Tamaño XS</label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" id="Cantidad_XS"
                                                        name="Cantidad_XS" value="0"
                                                        min=0 required><!-- se agrego un valor predeterminado y tambien un minimo y maximo -->
                                                    <input type="number" class="form-control" id="Cantidad_XS_DB"
                                                        name="Cantidad_XS_BD"
                                                        readonly data-toggle="tooltip" data-placement="top" title="Cantidad Disponible"><!--Este input es para conocer la cantidad actual del producto-->
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="form-group" for="Cantidad_S">Tamaño S</label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" id="Cantidad_S"
                                                        name="Cantidad_S" value="0" min=0
                                                        max=999><!-- se agrego un valor predeterminado y tambien un minimo y maximo -->
                                                    <input type="number" class="form-control" id="Cantidad_S_DB"
                                                        name="Cantidad_S_DB" readonly data-toggle="tooltip" data-placement="top" title="Cantidad Disponible">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="form-group" for="Cantidad_M">Tamaño M</label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" id="Cantidad_M"
                                                        name="Cantidad_M" value="0" min=0
                                                        max=999><!-- se agrego un valor predeterminado y tambien un minimo y maximo -->
                                                    <input type="number" class="form-control" id="Cantidad_M_DB"
                                                        name="Cantidad_M_DB" readonly data-toggle="tooltip" data-placement="top" title="Cantidad Disponible">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row ">
                                        <div class="col ">
                                            <div class="form-group">
                                                <label class="form-group " for="Cantidad_L">Tamaño L</label>
                                                <div class="input-group">

                                                    <input type="number" class="form-control" id="Cantidad_L"
                                                        name="Cantidad_L" value="0" min=0
                                                        max=999><!-- se agrego un valor predeterminado y tambien un minimo y maximo -->
                                                    <input type="number" class="form-control" id="Cantidad_L_DB"
                                                        name="Cantidad_L_DB" readonly data-toggle="tooltip" data-placement="top" title="Cantidad Disponible">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="form-group" for="Cantidad_XL">Tamaño XL</label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" id="Cantidad_XL"
                                                        name="Cantidad_XL" value="0" min=0
                                                        max=999><!-- se agrego un valor predeterminado y tambien un minimo y maximo -->
                                                    <input type="number" class="form-control" id="Cantidad_XL_DB"
                                                        name="Cantidad_XL_DB" readonly data-toggle="tooltip" data-placement="top" title="Cantidad Disponible">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">

                                            <div class="form-group">
                                                <label class="form-group" for="Cantidad_XXL">Tamaño XXL</label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control" id="Cantidad_XXL"
                                                        name="Cantidad_XXL" value="0" min=0
                                                        max=999><!-- se agrego un valor predeterminado y tambien un minimo y maximo -->
                                                    <input type="number" class="form-control" id="Cantidad_XXL_DB"
                                                        name="Cantidad_XXL_DB" readonly data-toggle="tooltip" data-placement="top" title="Cantidad Disponible">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row button-group">
                                        <!-- grupo de botones con diferentes funciones -->
                                        <div class="col-lg-2">
                                            <input type="submit" id="btnRegistar" class="btn btn-success btn-block"
                                                value="Agregar"><!-- registra lo que tiene el formulario -->

                                        </div>
                                        <div class="col-lg-2">
                                            <input type="reset" class="btn btn-warning btn-block"
                                                value="Borrar datos"><!-- Borra los datos del formulario -->

                                        </div>
                                        <div class="col-lg-2">
                                            <input type="button" id="btnCancelar" class="btn btn-secondary btn-block"
                                                value="Cancelar"
                                                onclick="cancelarFormCarrito()"><!-- Cancela y oculta el formulario -->
                                        </div>

                                    </div>
                                </div>

                            </form>

                        </div>
                        <div class="col">
                            <div class="division" style="height: 100%; border-left: 1px solid #ccc;"></div>
                        </div>
                        <div class="col-3"><!-- Aqui es donde se visualiza la imagen a guardar -->
                            <div class="card">
                                <div class="preview">
                                    <img src="" id="img" alt="Preview" width="280px" height="275px">
                                </div>
                            </div>
                        </div>

                    </div>

                </div><!-- Aqui termina la tarjeta que contiene el formulario de crear carritos -->
            </div>
        </div><!-- Aqui termina el Formulario de creacion de carritos -->


        <!-- Formulario de modificacion de carritos -->
        <div class="col-xs-2 col-sm-12 col-md-12 col-lg-12" id="formulario_editar_carritoInterno">
            <div class="card card-dark">
                <!-- Encabezado de la tarjeta del formulario de carritos -->
                <div class="card-header">
                    <h3 class="card-title">Modificar Producto Carrito</h3>
                </div>
                <!-- Encabezado de la tarjeta del formulario de carritos -->
                <!-- Aqui empieza el cuerpo de la tarjeta del formulario de carritos -->
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-xs-2 col-sm-12 col-md-12 col-lg-8">
                            <form name="modulos_editar_carritoInterno" id="carritoInterno_editar" method="POST"
                                enctype="multipart/form-data">
                                <input type="hidden" class="form-control" id="id" name="id">

                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="input-group" for="Nuevo_Id_Producto">ID Producto<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="Nuevo_Id_Producto"
                                                    name="Nuevo_Id_Producto" minlength="10" maxlength="50"
                                                    onkeyup="EliminarLetras();"
                                                    required><!-- Esta función elimina los números que se encuentran en el campo -->
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-group">
                                                <label class="input-group" for="Nueva_Descripcion">Descripción<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="Nueva_Descripcion"
                                                        name="Nueva_Descripcion" minlength="10" maxlength="50"
                                                        onkeyup="EliminarNumeros();" required>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-info" type="button" data-toggle="modal"
                                                            data-target="#BuscarProductoEditar"><i
                                                                class="fas fa-search"></i></button>
                                                    </div>
                                                    <!-- Esta función elimina los números que se encuentran en el campo -->
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="input-group">
                                                <label class="input-group" for="Nuevo_Precio_Venta">Precio Venta<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">₡</span>
                                                </div>
                                                <input type="text" class="form-control" id="Nuevo_Precio_Venta"
                                                    name="Nuevo_Precio_Venta" onkeyup="EliminarLetras();"
                                                    readonly><!-- Esta función elimina las letras que se encuentran en el campo -->
                                                <div class="input-group-append">
                                                    <span class="input-group-text">,00</span>
                                                </div>
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
                                                        name="Nueva_Cant_XS_DB" readonly data-toggle="tooltip" data-placement="top" title="Cantidad Disponible">
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
                                                        name="Nueva_Cant_S_DB" readonly data-toggle="tooltip" data-placement="top" title="Cantidad Disponible">
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
                                                        name="Nueva_Cant_M_DB" readonly data-toggle="tooltip" data-placement="top" title="Cantidad Disponible">
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
                                                        name="Nueva_Cant_L_DB" readonly data-toggle="tooltip" data-placement="top" title="Cantidad Disponible">
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
                                                        name="Nueva_Cant_XL_DB" readonly data-toggle="tooltip" data-placement="top" title="Cantidad Disponible">
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
                                                        name="Nueva_Cant_XXL_DB" readonly data-toggle="tooltip" data-placement="top" title="Cantidad Disponible">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row button-group"><!-- Grupo de botones con diferentes funciones  -->
                                        <div class="col-lg-2">
                                            <input type="submit" class="btn btn-warning btn-block"
                                                value="Modificar"><!-- se guardan los cambios -->
                                        </div>
                                        <div class="col-lg-2">
                                            <input type="button" class="btn btn-secondary btn-block" value="Cancelar"
                                                onclick="cancelarFormCarritoInterno()"><!-- se cancelan los cambios que se iban a hacer y oculta el formulario -->
                                        </div>
                                    </div>
                                </div>


                            </form>
                        </div>
                        <div class="col">
                            <div class="division" style="height: 100%; border-left: 1px solid #ccc;"></div>
                        </div>
                        <div class="col-lg-3">
                            <!-- Aqui se visualiza ya sea la imagen que ya esta guardada en la bd o la nueva imagen que se va a guardar -->
                            <div class="card">
                                <div class="preview-edit">
                                    <img src="" id="img_edit" alt="Preview" width="280px" height="275px">
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- Aqui termina el cuerpo de la tarjeta del formulario de carritos -->
            </div>
        </div>
    </div>




    <!-- listado de carritos -->
    <div class="row">
        <div class="col-12">
            <div class="card card-dark">
                <!--Encabezado y titulo de la tabla carritos-->
                <div class="card-header">
                    <h3 class="card-title">Carrito</h3>
                </div>
                <!-- Encabezado y titulo de la tabla carritos -->
                <!-- Cuerpo de la tabla carritos -->
                <div class="card-body ">
                    <div class="row ">
                        <div class="col">
                            <table id="tblListadoCarritoInterno" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <th>ID</th>
                                    <th>Producto</th>
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
                                    <th>Producto</th>
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
                    <div class="col-12">
                        <div class="row button-group justify-content-end">
                            <div class="col-2">
                                <input type="button" class="btn btn-secondary btn-block" value="Limpiar CarritoInterno"
                                    onclick="cancelarFormCarrito()">
                            </div>
                            <div class="col-2">
                                <input type="button" class="btn btn-info btn-block" value="Apartar"
                                    onclick="cancelarFormCarrito()">
                            </div>
                            <div class="col-2">
                                <input type="button" class="btn btn-success btn-block" value="Facturar"
                                    onclick="cancelarFormCarrito()">
                            </div>
                        </div>
                    </div>
                </div><!-- Cuerpo de la tabla carritos -->

            </div>
        </div>
    </div>
    <!--Aqui empieza el modal-->
    <!-- sample modal content -->
    <div id="BuscarProductoAgregarC" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true" ondblclick="ListarProductosAgregarC();">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Buscar Producto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <table id="tblListadoBuscarProductoAC" class="table table-striped table-bordered table-hover">
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
                    <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>



    <div id="BuscarProductoEditar" class="modal fade modal-lg" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true" onclick="ListarProductosEditarC();">>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Buscar Producto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <table id="tblListadoBuscarProductoE" class="table table-striped table-bordered table-hover">
                        <thead>
                            <th>Producto</th>
                            <th>Opción</th>
                        </thead>
                        <tbody>
                        </tbody>

                    </table>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!-- /.modal -->


    <!-- Desde aqui se llama el footer -->
    <?php include ("Component\Footer.php") ?>