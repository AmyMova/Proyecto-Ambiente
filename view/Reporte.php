<?php
// Incluir el modelo ApartadoModel.php
require_once '../Model/ApartadoModel.php';

// Obtener los datos de la base de datos utilizando el modelo
$apartadoModel = new ApartadoModel();
$apartados = $apartadoModel->obtenerApartados(); // Esta función debe ser implementada en ApartadoModel.php

// Mostrar los datos en el reporte
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Apartados</title>
</head>
<body>
    <h1>Reporte de Apartados</h1>

    <!-- Aquí puedes diseñar cómo deseas mostrar los datos en el reporte -->
    <table>
        <tr>
            <th>ID Apartado</th>
            <th>ID Usuario</th>
            <th>Producto</th>
            <th>Cantidad Total de Productos</th>
            <th>Precio Total de Productos</th>
            <!-- Agregar más encabezados según sea necesario -->
        </tr>
        <?php foreach ($apartados as $apartado): ?>
        <tr>
            <td><?php echo $apartado['IdApartado']; ?></td>
            <td><?php echo $apartado['IdUsuario']; ?></td>
            <td><?php echo $apartado['Producto']; ?></td>
            <td><?php echo $apartado['CantidadTotalProductos']; ?></td>
            <td><?php echo $apartado['PrecioTotalProductos']; ?></td>
            <!-- Agregar más columnas según sea necesario -->
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
