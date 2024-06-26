<?php include ("Component\Header.php") ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <!-- Formulario de creacion de xxx -->
        <div class="col-lg-12" id="formulario_agregar_usuario">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Agregar un Usuario</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg">
                            <form name="modulos_agregar_usuario" id="usuario_agregar" method="POST"
                                enctype="multipart/form-data">
                                <input type="hidden" id="existeModulo" name="existeModulo">
                                <div class="col ">
                                    <div class="row row-cols-3">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="Nombre_Usuario">Nombre</label>
                                                <input type="text" class="form-control" id="Nombre_Usuario"
                                                    name="Nombre_Usuario" readonly>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="Apellido_Usuario">Apellidos</label>
                                                <input type="text" class="form-control" id="Apellido_Usuario"
                                                    name="Apellido_Usuario" readonly>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="Numero_Cedula">Cédula<span
                                                        class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="Numero_Cedula"
                                                    name="Numero_Cedula" maxlength='9' onblur="fetchDataApi()" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="row ">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="Dia_Cumpleanos">Día Cumpleaños<span
                                                        class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="Dia_Cumpleanos"
                                                    name="Dia_Cumpleanos" value="1" max="31" min="1"
                                                    data-validation-max-message="No existe ese día"
                                                    data-validation-min-message="No existe ese día" required>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-group">
                                                <label for="Mes_Cumpleanos">Mes Cumpleaños<span
                                                        class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="Mes_Cumpleanos"
                                                    name="Mes_Cumpleanos" value="1" max="12" min="1"
                                                    data-validation-max-message="No existe ese mes"
                                                    data-validation-min-message="No existe ese mes" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="Ano_Cumpleanos">Año Cumpleaños<span
                                                        class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="Ano_Cumpleanos"
                                                    name="Ano_Cumpleanos" value="2004" max="2004" min="1920"required>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="row ">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="Telefono">Teléfono<span class="text-danger">*</span></label>
                                                <input type="text" maxlength='8' class="form-control" id="Telefono"
                                                    name="Telefono" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="Correo">Correo Electronico<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="Correo" name="Correo"
                                                    required>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-group">
                                                <label for="Contrasena">Contraseña</label>
                                                <input type="text" class="form-control" id="Contrasena"
                                                    name="Contrasena" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="Imagen_Usuario">Imagen</label>
                                                <input type="file" class="form-control" id="Imagen_Usuario"
                                                    name="Imagen_Usuario">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="row button-group">
                                        <div class="col-2">
                                            <input type="submit" id="btnRegistar" class="btn btn-success btn-block" value="Registrar">
                                        </div>
                                        <div class="col-2"><input type="reset" class="btn btn-warning  btn-block" value="Borrar datos"></div>
                                        <div class="col-2"><input type="button" id="btnCancelar" class="btn btn-secondary btn-block" value="Cancelar"
                                            onclick="cancelarFormUsuario()"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="button-group ">
                                        

                                        

                                        

                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="preview">
                                    <img src="" id="img_crear_usuario" alt="Preview" width="280px" height="340px">
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.card-body -->
            </div>
        </div>


        <!-- Formulario de modificacion de xxx -->
        <div class="col-lg-12" id="formulario_editar_usuario">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Modificar un Usuario</h3>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-lg">
                            <form name="usuario_editar" id="usuario_editar" method="POST" enctype="multipart/form-data">
                                <input type="hidden" class="form-control" id="id" name="id">
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="Nuevo_Nombre">Nombre</label>
                                                <input type="text" class="form-control" id="Nuevo_Nombre"
                                                    name="Nuevo_Nombre" readonly>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="Nuevo_Apellido_Usuario">Apellidos</label>
                                                <input type="text" class="form-control" id="Nuevo_Apellido_Usuario"
                                                    name="Nuevo_Apellido_Usuario" readonly>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="Nuevo_Numero_Cedula">Cédula<span
                                                        class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="Nuevo_Numero_Cedula"
                                                    name="Nuevo_Numero_Cedula" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="Nuevo_Dia_Cumpleanos">Día Cumpleaños<span
                                                        class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="Nuevo_Dia_Cumpleanos"
                                                    name="Nuevo_Dia_Cumpleanos" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="Nuevo_Mes_Cumpleanos">Mes Cumpleaños<span
                                                        class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="Nuevo_Mes_Cumpleanos"
                                                    name="Nuevo_Mes_Cumpleanos" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="Nuevo_Ano_Cumpleanos">Año Cumpleaños<span
                                                        class="text-danger">*</span></label>
                                                <input type="number" class="form-control" id="Nuevo_Ano_Cumpleanos"
                                                    name="Nuevo_Ano_Cumpleanos" required>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="Nuevo_Numero_Telefono">Teléfono<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="Nuevo_Numero_Telefono"
                                                    name="Nuevo_Numero_Telefono" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="Nuevo_Correo">Correo Electronico<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="Nuevo_Correo"
                                                    name="Nuevo_Correo" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="Nueva_Imagen_Usuario">Imagen</label>
                                                <input type="file" class="form-control" id="Nueva_Imagen_Usuario"
                                                    name="Nueva_Imagen_Usuario">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row button-group">
                                        <div class="col-2"><input type="submit" class="btn btn-warning btn-block"
                                                value="Modificar"></div>
                                        <div class="col-2"><input type="button" class="btn btn-secondary btn-block"
                                                value="Cancelar" onclick="cancelarFormUsuario()"></div>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="col-lg-3">
                            <div class="preview">
                                <img src="" id="img_edit" alt="Preview" width="280px" height="340px">
                            </div>
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
                    <h3 class="card-title">Usuarios existentes</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body ">

                    <div class="row ">

                        <div class="col">
                            <div class="row">
                                <div class="col-lg-2">
                                    <button class="btn waves-effect waves-light btn-block btn-success"
                                        id="agregarUsuario">Agregar</button>
                                </div>
                            </div>
                            <br>
                            <table id="tblListadoUsuario" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Fecha Cumpleaños</th>
                                    <th>Rol</th>
                                    <th>Teléfono</th>
                                    <th>Cédula</th>
                                    <th>Opciones</th>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfooter>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Fecha Cumpleaños</th>
                                    <th>Rol</th>
                                    <th>Teléfono</th>
                                    <th>Cédula</th>
                                    <th>Opciones</th>
                                </tfooter>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        Imagen_Usuario.onchange = evt => {
            const [file] = Imagen_Usuario.files;
            if (file) {
                img_crear_usuario.src = URL.createObjectURL(file);
            }
        }
    </script>
    <script type="text/javascript">
        Nueva_Imagen_Usuario.onchange = evt => {
            const [file] = Nueva_Imagen_Usuario.files;
            if (file) {
                img_edit_usuario.src = URL.createObjectURL(file);
            }
        }
    </script>



    <?php include ("Component\Footer.php") ?>