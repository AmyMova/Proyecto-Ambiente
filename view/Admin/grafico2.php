<?php
require_once __DIR__ . '/../../config/Conexion.php';

class Graficos extends Conexion
{
    public function VerFacturasPorSemana()
    {
        $query = "CALL VerFacturasPorSemana()";
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
$datosVentas = $graficos->VerFacturasPorSemana();

// Preparar los datos para el gráfico
$ventasPorSemana = [];
foreach ($datosVentas as $venta) {
    $anio = $venta['Anio'];
    $semana = $venta['Semana'];
    $totalVentas = $venta['TotalVentas'];
    $ventasPorSemana[$anio][$semana] = $totalVentas;
}

// Crear el array de etiquetas (semanas) y datos (total de ventas por semana)
$labels = [];
$data = [];

foreach ($ventasPorSemana as $anio => $semanas) {
    foreach ($semanas as $semana => $totalVentas) {
        $labels[] = "Semana $semana, $anio";
        $data[] = $totalVentas;
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Reporte de Ventas semanales</title>
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
                label: 'Ventas por semana',
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