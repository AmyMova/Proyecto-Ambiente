<?php include ("Component\Header.php") ?>
<div class="container-fluid">

    <div id="formulario_agregar_marca">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Agregar un Marca</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <form name="modulos_agregar" id="marca_agregar" method="POST" >
                            <input type="hidden" id="existeModulo" name="existeModulo">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="Nombre_Marca">Marca</label>
                                        <input type="text" class="form-control" id="Nombre_Marca"
                                            name="Nombre_Marca" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="button-group ">
                                    <input type="submit" id="btnRegistar" class="btn btn-success" value="Registrar">

                                    <input type="reset" class="btn btn-warning " value="Borrar datos">

                                    <input type="button" id="btnCancelar" class="btn btn-secondary" value="Cancelar"
                                        onclick="cancelarFormMarca()">

                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>



    <!-- Formulario de modificacion de xxx -->
    <div id="formulario_editar_marca">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Modificar una Marca</h3>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col">
                        <form name="modulos_editar" id="marca_editar" method="POST">

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="id">IdMarca</label>
                                        <input type="text" class="form-control" id="id" name="id" readonly>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="Nuevo_Nombre_Marca">Marca</label>
                                        <input type="text" class="form-control" id="Nuevo_Nombre_Marca"
                                            name="Nuevo_Nombre_Marca" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="button-group">
                                    <input type="submit" class="btn btn-warning" value="Modificar">
                                    <input type="button" class="btn btn-secondary" value="Cancelar"
                                        onclick="cancelarFormMarca()">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>








    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col">
                    <button class="btn waves-effect waves-light  btn-success" id="agregarMarca">Agregar
                        Marca</button>
                </div>
            </div>
        </div>
    </div><br>
    <div class="row row-cols-4 text-center" id="contenedor-tarjetas-Marca"></div>

    <?php include ("Component\Footer.php") ?>