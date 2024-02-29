<?php 

include_once 'Componentes.php'; 
include_once '.../controller/ProductoController.php';
$id = $_GET["q"];
$producto = VerProductoController($id);
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

    <?php MostrarMenu(); ?>
        <div class="container-fluid">

                <div class="row">

                    <div class="modal-content animate">
                        <div class="container">
                            <br />

                            <div class="row">
                                <div class="col-sm-6">
                                        <label><h2>Id</h2></label>
                                        <input type="text" id="txtid_producto" name="txtid_producto"
                                        readonly="readonly" required Value="<?php echo $producto["IdProducto"] ?>"
                                        style="color:gray">
                                </div>
                            </div>    
                            <div class="row">
                                <div class="col-sm-6">
                                    <label><h2>Descripcion</h2></label>
                                    <input type="text" id="txtdescripcion" name="txtdescripcion" required
                                    Value="<?php echo $producto["Descripcion"] ?>">
                                </div>
                                
                                <div class="col-sm-6">
                                    <label><h2>Precio Venta</h2></label>
                                    <input type="text" id="txtPrecioVenta" name="txtPrecioVenta" required
                                    Value="<?php echo $producto["PrecioVenta"] ?>">
                                </div>
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