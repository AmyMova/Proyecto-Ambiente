<?php 

include_once 'Componentes.php'; 
include_once '../controller/ProductoController.php';

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/stylesCat.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="container-fluid">


        <div class="col py-3">
            <table id="tUsuarios" class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>Productos</th>
                    </tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Categoria</th>
                    <th>Tipo</th>
                    <th>XS</th>
                    <th>S</th>
                    <th>M</th>
                    <th>L</th>
                    <th>XL</th>
                    <th>XXL</th>
                    <th>Precio Venta</th>
                    <th>Precio Credito</th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                    <?php
              VerProductosController();
            ?>
                </tbody>
            </table>
            <!--<a class="btn btn-dark btn-lg" id="nuevorproducto" href="NuevoProducto.php">Ingresar Producto</a>-->

            <button type="button" class="btn btn-dark btn-lg" data-bs-toggle="modal"
                data-bs-target="#Nuevo_Producto">Ingresar Producto</button>


        </div>
    </div>
    <?php include 'NuevoProductoModal.php'?>

    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/script_Producto.js"></script>

</body>

</html>
<!--Modal nuevo producto-->
<div class="modal fade" id="Nuevo_Producto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar nuevo Producto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="../controller/ProductoController.php" method="post"enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-4">
                            <label for="Descripcion" class="col-form-label">Descripcion del
                                Producto</label>
                            <input type="text" class="form-control" id="txtDescripcion">
                        </div>
                        <div class="col-4">
                            <label for="Categoria" class="col-form-label">Categoría</label>
                            <select id="txtCategoria" name="txtCategoria" class="form-control" required>

                                <?php
                                        VerCategoriasController($producto["txtCategoria"]);
                                        ?>

                            </select>
                        </div>
                        <div class="col-4">
                            <label for="Tipo" class="col-form-label">Tipo</label>
                            <select id="txtTipo" name="txtTipo" class="form-control" required>
                                <?php
                                        VerTiposController($producto["id_categoria"]);
                                        ?>


                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="PrecioVenta" class="col-form-label">Precio Venta</label>
                            <input type="number" class="form-control" id="txtPrecioVenta">
                        </div>
                        <div class="col">
                            <label for="PrecioCredito" class="col-form-label">Precio Crédito</label>
                            <input type="number" class="form-control" id="txtPrecioCredito">
                        </div>
                        <div class="row row-cols-3">
                            <div class="col">
                                <label for="CantidadXS" class="col-form-label">Cantidad XS</label>
                                <input type="number" class="form-control" id="txtCantidadXS">
                            </div>
                            <div class="col">
                                <label for="CantidadS" class="col-form-label">Cantidad S</label>
                                <input type="number" class="form-control" id="txtCantidadS">
                            </div>
                            <div class="col">
                                <label for="CantidadM" class="col-form-label">Cantidad M</label>
                                <input type="number" class="form-control" id="txtCantidadM">
                            </div>
                            <div class="col">
                                <label for="CantidadL" class="col-form-label">Cantidad L</label>
                                <input type="number" class="form-control" id="txtCantidadL">
                            </div>
                            <div class="col">
                                <label for="CantidadXL" class="col-form-label">Cantidad XL</label>
                                <input type="number" class="form-control" id="txtCantidadXL">
                            </div>
                            <div class="col">
                                <label for="CantidadXXL" class="col-form-label">Cantidad XXL</label>
                                <input type="number" class="form-control" id="txtCantidadXXL">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="Imagen" class="col-form-label">Imagen</label>
                                <div class="input-group">
                                    <input type="file" class="form-control" id="inputImage"
                                        aria-describedby="inputImage" aria-label="Upload">
                                </div>
                            </div>
                        </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <input type="submit" class="botones" id="btnRegistrarProducto"
                                            name="btnRegistrarProducto" value="Guardar">

            </div>
        </div>

    </div>
</div>
</div>