<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/toastr/toastr.css">
    <!-- Select2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
</head>

<body>
    <div class="row">
        <!-- Formulario de creacion de xxx -->
        <div class="col-md-12" id="formulario_add">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Agregar un Usuario</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md 10">
                            <form name="modulos_add" id="usuario_add" method="POST" enctype="multipart/form-data">
                                <input type="hidden" id="existeModulo" name="existeModulo">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nombre_Usuario">Nombre</label>
                                            <input type="text" class="form-control" id="nombre_Usuario"
                                                name="nombre_Usuario" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="Apellido_Usuario">Apellidos</label>
                                            <input type="text" class="form-control" id="Apellido_Usuario"
                                                name="Apellido_Usuario" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="Numero_Cedula">Cédula</label>
                                            <input type="text" class="form-control" id="Numero_Cedula"
                                                name="Numero_Cedula" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="Dia_Cumpleanos">Día Cumpleaños</label>
                                            <input type="number" class="form-control" id="Dia_Cumpleanos"
                                                name="Dia_Cumpleanos" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="Mes_Cumpleanos">Mes Cumpleaños</label>
                                            <input type="number" class="form-control" id="Mes_Cumpleanos"
                                                name="Mes_Cumpleanos" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="Ano_Cumpleanos">Año Cumpleaños</label>
                                            <input type="number" class="form-control" id="Ano_Cumpleanos"
                                                name="Ano_Cumpleanos" required>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label for="Id_Rol">Rol</label>
                                            <input type="number" class="form-control" id="Id_Rol" name="Id_Rol"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="Correo">Correo Electronico</label>
                                            <input type="text" class="form-control" id="Correo" name="Correo" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="Telefono">Teléfono</label>
                                            <input type="text" class="form-control" id="Telefono" name="Telefono"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="Contrasena">Contraseña</label>
                                            <input type="text" class="form-control" id="Contrasena" name="Contrasena"
                                                required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <input type="submit" id="btnRegistar" class="btn btn-success" value="Registrar">
                                        <input type="reset" class="btn btn-warning" value="Borrar datos">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- Formulario de modificacion de xxx -->
        <div class="col-md-12" id="formulario_update">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Modificar un Usuario</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md 10">
                            <form name="usuario_update" id="usuario_update" method="POST">
                                <input type="hidden" class="form-control" id="id" name="id">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="Nuevo_Nombre">Nombre</label>
                                            <input type="text" class="form-control" id="Nuevo_Nombre"
                                                name="Nuevo_Nombre" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="Nuevo_Apellido_Usuario">Apellidos</label>
                                            <input type="text" class="form-control" id="Nuevo_Apellido_Usuario"
                                                name="Nuevo_Apellido_Usuario" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="Nuevo_Numero_Cedula">Cédula</label>
                                            <input type="number" class="form-control" id="Nuevo_Numero_Cedula"
                                                name="Nuevo_Numero_Cedula" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="Nuevo_Dia_Cumpleanos">Día Cumpleaños</label>
                                            <input type="number" class="form-control" id="Nuevo_Dia_Cumpleanos"
                                                name="Nuevo_Dia_Cumpleanos" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="Nuevo_Mes_Cumpleanos">Mes Cumpleaños</label>
                                            <input type="number" class="form-control" id="Nuevo_Mes_Cumpleanos"
                                                name="Nuevo_Mes_Cumpleanos" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="Nuevo_Ano_Cumpleanos">Año Cumpleaños</label>
                                            <input type="number" class="form-control" id="Nuevo_Ano_Cumpleanos"
                                                name="Nuevo_Ano_Cumpleanos" required>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label for="Nuevo_Rol">Rol</label>
                                            <input type="number" class="form-control" id="Nuevo_Rol" name="Nuevo_Rol"
                                                required>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="Nuevo_Correo">Correo Electronico</label>
                                            <input type="text" class="form-control" id="Nuevo_Correo"
                                                name="Nuevo_Correo" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="Contrasena">Contraseña</label>
                                            <input type="text" class="form-control" id="Contrasena" name="Contrasena">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="Nuevo_Numero_Telefono">Telefono</label>
                                            <input type="text" class="form-control" id="Nuevo_Numero_Telefono"
                                                name="Nuevo_Numero_Telefono" required>
                                        </div>
                                    </div>


                                </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="submit" class="form-control btn btn-warning" value="Modificar">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="button" class="form-control btn btn-info" value="Cancelar"
                                    onclick="cancelarForm()">
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!--Formulario para cambio de contraseña-->
        <div class="col-md-12" id="formulario_contrasenna">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Modificar Contraseña</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md 10">
                            <form name="contrasena_update" id="contrasena_update" method="POST">
                                <input type="hidden" class="form-control" id="ID" name="ID">
                                <div class="row">

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="ID">ID</label>

                                            <input readonly class="form-control" id="ID" name="ID">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="CorreoElectronico">Correo Electronico</label>
                                            <input type="text" class="form-control" id="CorreoElectronico"
                                                name="CorreoElectronico" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="Contra">Contraseña</label>
                                            <input type="text" class="form-control" id="Contra" name="Contra">
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="submit" class="form-control btn btn-warning" value="Modificar">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="button" class="form-control btn btn-info" value="Cancelar"
                                    onclick="cancelarForm()">
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <!-- listado -->
    <div class="col-md-12">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Usuarios existentes</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="row mt-2">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <table id="tbllistado" class="table table-striped table-bordered table-hover">
                            <thead>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Correo</th>
                                <th>Fecha Cumpleaños</th>
                                <th>Rol</th>
                                <th>Telefono</th>
                                <th>Cédula</th>

                                <th>Opciones</th>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfooter>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Correo</th>
                                <th>Fecha Cumpleaños</th>
                                <th>Rol</th>
                                <th>Telefono</th>
                                <th>Cédula</th>

                                <th>Opciones</th>
                            </tfooter>
                        </table>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="plugins/DataTables/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/bootbox/bootbox.min.js"></script>
    <script src="plugins/toastr/toastr.js"></script>
    <script src="assets/js/Usuario.js"></script>

</body>

</html>