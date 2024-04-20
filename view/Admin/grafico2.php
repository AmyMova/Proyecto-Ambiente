<?php
require_once __DIR__ . '/../../config/Conexion.php';


class Graficos extends Conexion
{
    public function VerFacturasAdminR()
    {
        $query = "CALL VerFacturasAdminR()";
        try {
            $conexion = Conexion::conectar();
            $resultado = $conexion->query($query);
            $conexion = null; // Cerrar la conexión

            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $Exception) {
            return "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
        }
    }
}

$graficos = new Graficos();
$datosVentas = $graficos->VerFacturasAdminR();

// Convertir los datos a un formato adecuado para el gráfico
$ventasDiarias = [];
foreach ($datosVentas as $venta) {
    $anio = $venta['Anio'];
    $totalVentas = $venta['TotalVentas'];
    $ventasDiarias[$anio] = $totalVentas;
}

// Crear el array de etiquetas (años) y datos (total de ventas)
$labels = array_keys($ventasDiarias);
$data = array_values($ventasDiarias);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Reporte de Ventas anuales</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="container">
        <canvas id="ventasChart"></canvas>
    </div>

    <script>
        // Configuración del gráfico de línea
        const labels = <?php echo json_encode($labels); ?>;
        const data = {
            labels: labels,
            datasets: [{
                label: 'Ventas por año',
                data: <?php echo json_encode($data); ?>,
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        };

        const ctx = document.getElementById('ventasChart').getContext('2d');
        const config = {
            type: 'line',
            data: data,
        };
        new Chart(ctx, config);
    </script>
</body>

</html>
