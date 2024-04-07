<?php session_start();?> 

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Datos Personales</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/toastr/toastr.css">
    <!-- Favicon icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/LogoRosayAnilRedondo.PNG">
    <title>Rosa y Añil</title>
    <!-- Custom CSS -->
    <link href="assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="assets/dist/css/style.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <div class="row justify-content-center">
        <!-- Formulario de creacion de xxx -->
        <div class="col-lg-12" id="formulario_agregar_usuario">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Agregar un Usuario</h3>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-lg">
                            <form name="usuario_editar" id="usuario_editar" method="GET" enctype="multipart/form-data">
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
                                        <div class="col">
                                            <label class="input-group" for="Nuevo_Rol">Rol<span
                                                    class="text-danger">*</span></label>
                                            <select name="Nuevo_Rol" id="Nuevo_Rol" class="form-control">
                                            </select>
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
                <!-- /.card-body -->
            </div>
        </div>
</body>
</html>