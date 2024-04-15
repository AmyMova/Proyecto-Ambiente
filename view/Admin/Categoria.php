<?php include ("Component\Header.php") ?>
<div class="container-fluid">

    <div id="formulario_agregar_categoria">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Agregar una Categoria</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <form name="modulos_agregar_categoria" id="categoria_agregar" method="POST">
                            <input type="hidden" id="existeModulo" name="existeModulo">
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Nombre_Categoria">Categoría<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="Nombre_Categoria"
                                                name="Nombre_Categoria" minlength="8" maxlength="20" required>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col">
                                <div class="row button-group">
                                    <div class="col-2">
                                        <input type="submit" id="btnRegistar" class="btn btn-success btn-block"
                                            value="Registrar">
                                    </div>
                                    <div class="col-2">
                                        <input type="reset" class="btn btn-warning  btn-block" value="Borrar datos">

                                    </div>
                                    <div class="col-2">
                                        <input type="button" id="btnCancelar" class="btn btn-secondary btn-block"
                                            value="Cancelar" onclick="cancelarFormCategoria()">
                                    </div>

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
    <div id="formulario_editar_categoria">
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Modificar una Categoria</h3>
            </div>
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col">
                        <form name="modulos_editar_categoria" id="categoria_editar" method="POST">
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="id">ID</label>
                                            <input type="text" class="form-control" id="id" name="id" readonly>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Nuevo_Nombre_Categoria">Categoría<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="Nuevo_Nombre_Categoria"
                                                name="Nuevo_Nombre_Categoria" minlength="8" maxlength="20" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="row button-group">
                                    <div class="col-2">
                                        <input type="submit" class="btn btn-warning btn-block" value="Modificar">
                                    </div>
                                    <div class="col-2">
                                        <input type="button" class="btn btn-secondary btn-block" value="Cancelar"
                                            onclick="cancelarFormCategoria()">
                                    </div>
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
                <div class="col-2">
                    <button class="btn waves-effect waves-light btn-success btn-block" id="agregarCategoria">Agregar
                        Categoría</button>
                </div>
            </div>
        </div>
    </div><br>
    <div class="row row-cols-4 text-center" id="contenedor-tarjetas-Categoria"></div>
    
    <?php include ("Component\Footer.php") ?>
    <script src="./../assets/js/Categoria.js"></script>
    <script src="./../assets/js/Otros.js"></script>