<?php
require_once __DIR__ . '/../../config/Conexion.php';

class Graficos extends Conexion
{
    public function Top5Compradores()
    {
        $query = "CALL Top5Compradores()";
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
$datosClientes = $graficos->Top5Compradores();

// Preparar los datos para el gráfico
$labels = [];
$data = [];

foreach ($datosClientes as $cliente) {
    $labels[] = "Cliente " . $cliente['IdUsuario'];
    $data[] = $cliente['TotalGastado'];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Top 5 Mejores Clientes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="container">
        <canvas id="clientesChart"></canvas>
    </div>

    <script>
        // Configuración del gráfico de barras
        const labels = <?php echo json_encode($labels); ?>;
        const data = {
            labels: labels,
            datasets: [{
                label: 'Total Gastado',
                data: <?php echo json_encode($data); ?>,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        };

        const ctx = document.getElementById('clientesChart').getContext('2d');
        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        new Chart(ctx, config);
    </script>
</body>

</html>
