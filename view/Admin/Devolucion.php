<?php include ("Component\Header.php"); ?><!-- Aqui se llama el encabezado de la pagina -->
<div class="container-fluid"><!-- Aqui se agrega el contenedor fluido para que la pagina sea responsive -->

    <div class="row justify-content-center">
        <!-- Formulario de creacion de devoluciones -->
        <div class="col-xs-2 col-sm-12 col-md-12 col-lg-12" id="formulario_agregar_devolucion">
            <div class="card card-dark">
                <!-- Encabezado del formulario para crear devoluciones -->
                <div class="card-header">
                    <h3 class="card-title">Crear Devolución</h3>
                </div>
                <!-- Encabezado del formulario para crear devoluciones -->

                <div class="card-body"><!-- Aqui empieza la tarjeta que contiene el formulario de crear devoluciones -->
                    <form name="modulos_agregar_devolucion" id="devolucion_agregar" method="POST"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label class="input-group" for="Nueva_Descripcion">Número Factura<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="Nueva_Descripcion"
                                        name="Nueva_Descripcion" minlength="10" maxlength="50"
                                        onkeyup="EliminarLetras();" onblur="BuscarFactura();"
                                        required><!-- Se tiene que buscar el numero de facctura  -->
                                </div>
                                <div class="form-group">
                                    <div class="mb-3">
                                        <label for="ProductosFactura" class="form-label">Productos de la factura</label>
                                        <textarea class="form-control" name="ProductosFactura" id="ProductosFactura"
                                            rows="6" readonly></textarea><!--ya que se tiene el numero de factura se visualiza la tabla de detalle factura en donde se rellena este textarea
                                    </div>

                                </div>
                            </div>
                            <div class="col-1">
                                <div class="division" style="height: 100%; border-left: 1px solid #ccc;"></div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="input-group" for="Nueva_Descripcion">Número de productos a
                                        devolver<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="Nueva_Descripcion"
                                        name="Nueva_Descripcion" minlength="10" maxlength="50"
                                        onkeyup="EliminarNumeros();"
                                        required><!-- Esta función elimina los números que se encuentran en el campo -->
                                </div>
                                div.contenedor
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div><!-- Aqui termina la tarjeta que contiene el formulario de crear devoluciones -->
    </div>


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
                                                for="Nuevo_Id_Marca">Marca</label><!-- se hace un select con todas las marcas que existen en la bd y se selecciona el valor que tiene el devolucion -->
                                            <select name="Nuevo_Id_Marca" id="Nuevo_Id_Marca"
                                                class="form-control select-marcas-editar">
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="input-group">
                                            <label class="input-group" class="input-group"
                                                for="Nuevo_Id_Categoria">Categoría</label><!-- se hace un select con todas las categorias que existen en la bd y se selecciona el valor que tiene el devolucion -->
                                            <select name="Nuevo_Id_Categoria" id="Nuevo_Id_Categoria"
                                                class="select2 form-control custom-select">
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
                            <div class="row"><!-- Grupo de botones con diferentes funciones  -->
                                <div class="button-group">
                                    <input type="submit" class="btn btn-warning"
                                        value="Modificar"><!-- se guardan los cambios -->
                                    <input type="button" class="btn btn-secondary" value="Cancelar"
                                        onclick="cancelarFormDevolucion()"><!-- se cancelan los cambios que se iban a hacer y oculta el formulario -->
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
            </div><!-- Aqui termina el cuerpo de la tarjeta del formulario de devoluciones -->
        </div>
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
            </div><!-- Cuerpo de la tabla devoluciones -->

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