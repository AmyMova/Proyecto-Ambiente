<?php include ("Component\Header.php"); ?><!-- Aqui se llama el encabezado de la pagina -->
<div class="container-fluid"><!-- Aqui se agrega el contenedor fluido para que la pagina sea responsive -->

    <div class="row justify-content-center">
        <!-- Formulario de creacion de productos -->
        <div class="col-xs-2 col-sm-12 col-md-12 col-lg-12" id="formulario_agregar_producto">
            <div class="card card-dark">
                <!-- Encabezado del formulario para crear productos -->
                <div class="card-header">
                <?php echo $_SESSION["IdUsuario"];?>
                    <h3 class="card-title">Agregar un Producto</h3>
                </div>
                <!-- Encabezado del formulario para crear productos -->

                <div class="card-body"><!-- Aqui empieza la tarjeta que contiene el formulario de crear productos -->
                    <div class="row">
                        <div class="col-xs-2 col-sm-12 col-md-12 col-lg-9">
                            <form name="modulos_agregar_producto" id="producto_agregar" method="POST"
                                enctype="multipart/form-data">
                                <!-- se agrega el enctype para que el formulario acepte imagenes -->
                                <input type="hidden" id="existeModulo" name="existeModulo">
                                <div class="col ">
                                    <div class="row row-cols-3">
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="input-group" for="descripcionP">Descripción<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="descripcionP" required
                                                    data-validation-required-message="Este campo es necesario"
                                                    name="descripcionP" minlength="10" maxlength="50"
                                                    onkeyup="EliminarNumeros();"><!-- Esta función elimina los números que se encuentran en el campo -->
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
                                                    name="Precio_Venta" onkeyup="EliminarLetras();"
                                                    required><!-- Esta función elimina las letras que se encuentran en el campo -->
                                                <div class="input-group-append">
                                                    <span class="input-group-text">,00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="input-group">
                                                <label class="input-group" for="Precio_Credito">Precio Crédito<span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">₡</span>
                                                </div>
                                                <input type="text" class="form-control" id="Precio_Credito"
                                                    name="Precio_Credito" onkeyup="EliminarLetras();"
                                                    required><!-- Esta función elimina las letras que se encuentran en el campo -->
                                                <div class="input-group-append">
                                                    <span class="input-group-text">,00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="row text-center">
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="input-group" for="Cantidad_XS">XS</label>
                                                <input type="number" class="form-control" id="Cantidad_XS"
                                                    name="Cantidad_XS" value="0" min=0
                                                    max=999><!-- se agrego un valor predeterminado y tambien un minimo y maximo -->
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="input-group" for="Cantidad_S">S</label>
                                                <input type="number" class="form-control" id="Cantidad_S"
                                                    name="Cantidad_S" value="0" min=0
                                                    max=999><!-- se agrego un valor predeterminado y tambien un minimo y maximo -->
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="input-group" for="Cantidad_M">M</label>
                                                <input type="number" class="form-control" id="Cantidad_M"
                                                    name="Cantidad_M" value="0" min=0
                                                    max=999><!-- se agrego un valor predeterminado y tambien un minimo y maximo -->
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="input-group" for="Cantidad_L">L</label>
                                                <input type="number" class="form-control" id="Cantidad_L"
                                                    name="Cantidad_L" value="0" min=0
                                                    max=999><!-- se agrego un valor predeterminado y tambien un minimo y maximo -->
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="input-group" for="Cantidad_XL">XL</label>
                                                <input type="number" class="form-control" id="Cantidad_XL"
                                                    name="Cantidad_XL" value="0" min=0
                                                    max=999><!-- se agrego un valor predeterminado y tambien un minimo y maximo -->
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="input-group" for="Cantidad_XXL">XXL</label>
                                                <input type="number" class="form-control" id="Cantidad_XXL"
                                                    name="Cantidad_XXL" value="0" min=0
                                                    max=999><!-- se agrego un valor predeterminado y tambien un minimo y maximo -->
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <div class="input-group">
                                                <label class="input-group" class="input-group"
                                                    for="Id_Marca">Marca</label><br>
                                                <select class="form-control" name="Id_Marca" id="Id_Marca">
                                                    <selected>Seleccionar Marca</selected>
                                                    <!-- se hizo un select en el cual se puede buscar información dicha informacion se pasa por medio de un json -->
                                                </select>

                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="input-group">
                                                <label class="input-group" class="input-group"
                                                    for="Id_Categoria">Categoría</label><br>
                                                <select class="form-control" name="Id_Categoria" id="Id_Categoria">
                                                    <selected>Seleccionar Categoría</selected>
                                                    <!-- se hizo un select en el cual se puede buscar información dicha informacion se pasa por medio de un json -->
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="input-group"
                                                    for="imagenP">Imagen</label><!-- Aqui es donde se agrega la imagen  -->
                                                <input accept="image/png,image/jpeg,image/jpg" type="file"
                                                    class="form-control" id="imagenP"
                                                    name="imagenP"><!-- este input solo acepta imagenes de tipo: jpg,png y jpeg -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row button-group">
                                        <div class="col-2">
                                            <input type="submit" id="btnRegistar" class="btn btn-success btn-block"
                                                value="Registrar"><!-- registra lo que tiene el formulario -->
                                        </div>
                                        <div class="col-2">
                                            <input type="reset" class="btn btn-warning  btn-block"
                                                value="Borrar datos"><!-- Borra los datos del formulario -->
                                        </div>
                                        <div class="col-2">
                                            <input type="button" id="btnCancelar" class="btn btn-secondary btn-block"
                                                value="Cancelar"
                                                onclick="cancelarFormProducto()"><!-- Cancela y oculta el formulario -->
                                        </div>
                                    </div>
                                </div>

                            </form>

                        </div>
                        <div class="col"><!-- Aqui es donde se visualiza la imagen a guardar -->
                            <div class="card">
                                <div class="preview">
                                    <img src="" id="img" alt="Preview" width="280px" height="275px">
                                </div>
                            </div>
                        </div>

                    </div>

                </div><!-- Aqui termina la tarjeta que contiene el formulario de crear productos -->
            </div>
        </div><!-- Aqui termina el Formulario de creacion de productos -->


        <!-- Formulario de modificacion de productos -->
        <div class="col-xs-2 col-sm-12 col-md-12 col-lg-12" id="formulario_editar_producto">
            <div class="card card-dark">
                <!-- Encabezado de la tarjeta del formulario de productos -->
                <div class="card-header">
                    <h3 class="card-title">Modificar un Producto</h3>
                </div>
                <!-- Encabezado de la tarjeta del formulario de productos -->
                <!-- Aqui empieza el cuerpo de la tarjeta del formulario de productos -->
                <div class="card-body">
                    <div class="row ">
                        <div class="col-xs-2 col-sm-12 col-md-12 col-lg-9">
                            <form name="modulos_editar_producto" id="producto_editar" method="POST"
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
                                                <div class="input-group-append">
                                                    <span class="input-group-text">₡</span>
                                                </div>
                                                <input type="text" class="form-control" id="Nuevo_Precio_Venta"
                                                    name="Nuevo_Precio_Venta" onkeyup="EliminarLetras();"
                                                    required><!-- Esta función elimina las letras que se encuentran en el campo -->
                                                <div class="input-group-append">
                                                    <span class="input-group-text">,00</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="input-group">
                                                <label class="input-group" for="Nuevo_Precio_Credito">Precio
                                                    Venta<span class="text-danger">*</span></label>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">₡</span>
                                                </div>
                                                <input type="text" class="form-control" id="Nuevo_Precio_Credito"
                                                    name="Nuevo_Precio_Credito" onkeyup="EliminarLetras();"
                                                    required><!-- Esta función elimina las letras que se encuentran en el campo -->
                                                <div class="input-group-append">
                                                    <span class="input-group-text">,00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row text-center">
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="input-group" for="Nueva_Cant_XS">XS</label>
                                                <input type="number" class="form-control" id="Nueva_Cant_XS"
                                                    name="Nueva_Cant_XS" required min=0
                                                    max=999><!-- se agrego un minimo y maximo -->
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-group">
                                                <label class="input-group" for="Nueva_Cant_S">S</label>
                                                <input type="number" class="form-control" id="Nueva_Cant_S"
                                                    name="Nueva_Cant_S" required min=0
                                                    max=999><!-- se agrego un minimo y maximo -->
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-group">
                                                <label class="input-group" for="Nueva_Cant_M">M</label>
                                                <input type="number" class="form-control" id="Nueva_Cant_M"
                                                    name="Nueva_Cant_M" required min=0
                                                    max=999><!-- se agrego un minimo y maximo -->
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-group">
                                                <label class="input-group" for="Nueva_Cant_L">L</label>
                                                <input type="number" class="form-control" id="Nueva_Cant_L"
                                                    name="Nueva_Cant_L" required min=0
                                                    max=999><!-- se agrego un minimo y maximo -->
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-group">
                                                <label class="input-group" for="Nueva_Cant_XL">XL</label>
                                                <input type="number" class="form-control" id="Nueva_Cant_XL"
                                                    name="Nueva_Cant_XL" required min=0
                                                    max=999><!-- se agrego un minimo y maximo -->
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-group">
                                                <label class="input-group" for="Nueva_Cant_XXL">XXL</label>
                                                <input type="number" class="form-control" id="Nueva_Cant_XXL"
                                                    name="Nueva_Cant_XXL" required min=0
                                                    max=999><!-- se agrego un minimo y maximo -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <div class="input-group">
                                                <label class="input-group" class="input-group"
                                                    for="Nuevo_Id_Marca">Marca</label><!-- se hace un select con todas las marcas que existen en la bd y se selecciona el valor que tiene el producto -->
                                                <select name="Nuevo_Id_Marca" id="Nuevo_Id_Marca" class="form-control ">
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="input-group">
                                                <label class="input-group" class="input-group"
                                                    for="Nuevo_Id_Categoria">Categoría</label><!-- se hace un select con todas las categorias que existen en la bd y se selecciona el valor que tiene el producto -->
                                                <select name="Nuevo_Id_Categoria" id="Nuevo_Id_Categoria"
                                                    class="form-control">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="input-group"
                                                    for="Nueva_Imagen">Imagen</label><!-- Aqui se aceptan las imagenes -->
                                                <input accept="image/png,image/jpeg,image/jpg" type="file"
                                                    class="form-control" id="Nueva_Imagen"
                                                    name="Nueva_Imagen"><!-- solo puede aceptar imagenes de tipo png,jpg y jpeg -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row button-group"><!-- Grupo de botones con diferentes funciones  -->
                                        <div class="col-2">
                                            <input type="submit" class="btn btn-warning btn-block" value="Modificar">
                                        </div>
                                        <!-- se guardan los cambios -->
                                        <div class="col-2">
                                            <input type="button" class="btn btn-secondary btn-block" value="Cancelar"
                                                onclick="cancelarFormProducto()"><!-- se cancelan los cambios que se iban a hacer y oculta el formulario -->
                                        </div>

                                    </div>
                                </div>



                            </form>
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
                </div><!-- Aqui termina el cuerpo de la tarjeta del formulario de productos -->
            </div>
        </div>
    </div>




    <!-- listado de productos -->
    <div class="row">
        <div class="col-12">
            <div class="card card-dark">
                <!--Encabezado y titulo de la tabla productos-->
                <div class="card-header">
                    <h3 class="card-title">Productos existentes</h3>

                </div>
                <!-- Encabezado y titulo de la tabla productos -->
                <!-- Cuerpo de la tabla productos -->
                <div class="card-body ">

                    <div class="row ">

                        <div class="col">
                            <div class="row">
                                <div class="col-lg-2">
                                    <button class="btn waves-effect waves-light btn-block btn-success"
                                        id="agregarProducto">Agregar</button>
                                </div>
                            </div>
                            <br>
                            <table id="tblListadoProducto" class="table table-striped table-bordered table-hover">
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
                                    <th>Precio</th>
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
                                    <th>Precio</th>
                                    <th>Opciones</th>
                                </tfooter>
                            </table>
                        </div>
                    </div>
                </div><!-- Cuerpo de la tabla productos -->

            </div>
        </div>
    </div>



    <!-- Estos scripts cambian el preview de la imagen tanto para editar como al agregar  -->
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

    <!-- Desde aqui se llama el footer -->
    <?php include ("Component\Footer.php") ?>