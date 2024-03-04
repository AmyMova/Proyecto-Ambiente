<?php 

include_once '../Controller/ProductoController.php';
$IdProducto = $_GET["q"];
$producto = CargarProductoController($IdProducto)
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
    <form action="" method="POST">

        <div class="container-fluid">

            <div class="row">

                <div class="modal-content animate">
                    <div class="container">
                        <br />
                        <div class="row">
                            <div class="col-sm-6">

                                <div class="col-sm-6">
                                    <label>
                                        <h2>Id</h2>
                                    </label>
                                    <input type="text" id="txtid_producto" name="txtid_producto" readonly="readonly"
                                        required Value="<?php echo $producto["IdProducto"] ?>" style="color:gray">
                                </div>
                                <label>
                                    <h2>Categoria</h2>
                                </label>
                                <select id="txtid_categoria" name="txtid_categoria" class="form-control" required>

                                    <?php
                        ConsultarCategoriasController($producto["id_categoria"]);
                        ?>

                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label>
                                    <h2>Tipo</h2>
                                </label>
                                <select id="txtid_tipo" name="txtid_tipo" class="form-control" required>

                                    <?php
                        ConsultarMarcasController($producto["IdMarca"]);
                        ?>

                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label>
                                    <h2>Descripción</h2>
                                </label>
                                <input type="text" id="txtdescripcion" name="txtdescripcion" required Value="<?php echo $producto["Descripcion"] ?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <label>
                                    <h2>Precio Venta</h2>
                                </label>
                                <input type="text" id="txtprecioventa" name="txtprecioventa" required Value="<?php echo $producto["PrecioVenta"] ?>">
                            </div>
                            <div class="col-sm-6">
                                <label>
                                    <h2>Precio Crédito</h2>
                                </label>
                                <input type="text" id="txtpreciocredito" name="txtpreciocredito" required Value="<?php echo $producto["PrecioCredito"] ?>">
                            </div>

                            <div class="col-sm-6">
                                <label>
                                    <h2>XS</h2>
                                </label>
                                <input type="text" id="txtxs" name="txtxs" required Value="<?php echo $producto["CantXS"] ?>">
                            </div>
                            <div class="col-sm-6">
                                <label>
                                    <h2>S</h2>
                                </label>
                                <input type="text" id="txts" name="txts" required Value="<?php echo $producto["CantS"] ?>">
                            </div>
                            <div class="col-sm-6">
                                <label>
                                    <h2>M</h2>
                                </label>
                                <input type="text" id="txtm" name="txtm" required Value="<?php echo $producto["CantM"] ?>">
                            </div>
                            <div class="col-sm-6">
                                <label>
                                    <h2>L</h2>
                                </label>
                                <input type="text" id="txtl" name="txtl" required Value="<?php echo $producto["CantL"] ?>">
                            </div>
                            <div class="col-sm-6">
                                <label>
                                    <h2>XL</h2>
                                </label>
                                <input type="text" id="txtxl" name="txtxl" required Value="<?php echo $producto["CantXL"] ?>">
                            </div>
                            <div class="col-sm-6">
                                <label>
                                    <h2>XXL</h2>
                                </label>
                                <input type="text" id="txtxxl" name="txtxxl" required Value="<?php echo $producto["CantXXL"] ?>">
                            </div>
                            <div class="col-sm-6">
                                <label>
                                    <h2>Imagen</h2>
                                </label>
                                <input type="text" id="txtimagen" name="txtimagen" required Value="<?php echo $producto["Imagen"] ?>">
                            </div>

                            <div class="col-sm-6">
                                <br />
                                <input type="submit" class="botones" id="btnActualizarProducto"
                                    name="btnActualizarProducto" value="Actualizar">
                            </div>
                        </div>
                        <br />
                    </div>

                </div>

            </div>



        </div>



        </div>
        </div>

        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>