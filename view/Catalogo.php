<?php 
include_once 'Componentes.php'; 
include_once '../Controller/CatalogoController.php';
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
<div class="row gy-4 justify-content-center">
<?php VerCatalogoController()?>
</div>

</body>