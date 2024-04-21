<?php
require_once __DIR__ . '/../../config/Conexion.php';

class GraficosVentasAnuales extends Conexion
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

$graficosVentasAnuales = new GraficosVentasAnuales();
$datosVentasAnuales = $graficosVentasAnuales->VerFacturasAdminR();

// Convertir los datos a un formato adecuado para el gráfico de ventas anuales
$ventasDiarias = [];
foreach ($datosVentasAnuales as $venta) {
    $anio = $venta['Anio'];
    $totalVentas = $venta['TotalVentas'];
    $ventasDiarias[$anio] = $totalVentas;
}

// Crear el array de etiquetas (años) y datos (total de ventas)
$labelsAnuales = array_keys($ventasDiarias);
$dataAnuales = array_values($ventasDiarias);

// Obtener los datos para el gráfico de ventas semanales
class GraficosVentasSemanales extends Conexion
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

$graficosVentasSemanales = new GraficosVentasSemanales();
$datosVentasSemanales = $graficosVentasSemanales->VerFacturasPorSemana();

// Preparar los datos para el gráfico de ventas semanales
$ventasPorSemana = [];
foreach ($datosVentasSemanales as $venta) {
    $anio = $venta['Anio'];
    $semana = $venta['Semana'];
    $totalVentas = $venta['TotalVentas'];
    $ventasPorSemana[$anio][$semana] = $totalVentas;
}

// Crear el array de etiquetas (semanas) y datos (total de ventas por semana)
$labelsSemanales = [];
$dataSemanales = [];

foreach ($ventasPorSemana as $anio => $semanas) {
    foreach ($semanas as $semana => $totalVentas) {
        $labelsSemanales[] = "Semana $semana, $anio";
        $dataSemanales[] = $totalVentas;
    }
}

// Obtener los datos para el gráfico de top 5 de compradores
class GraficosTop5Compradores extends Conexion
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

$graficosTop5Compradores = new GraficosTop5Compradores();
$datosClientes = $graficosTop5Compradores->Top5Compradores();

// Preparar los datos para el gráfico de top 5 de compradores
$labelsCompradores = [];
$dataCompradores = [];

foreach ($datosClientes as $cliente) {
    $labelsCompradores[] = "Cliente " . $cliente['IdUsuario'];
    $dataCompradores[] = $cliente['TotalGastado'];
}

// Obtener los datos para el gráfico de top 5 de marcas más vendidas
class GraficosTop5Marcas extends Conexion
{
    public function Top5MarcasMasVendidas()
    {
        $query = "CALL MostrarTop5MarcasMasVendidas()"; // Llama al procedimiento almacenado
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

$graficosTop5Marcas = new GraficosTop5Marcas();
$datosMarcas = $graficosTop5Marcas->Top5MarcasMasVendidas();

// Preparar los datos para el gráfico de top 5 de marcas más vendidas
$labelsMarcas = [];
$dataMarcas = [];

foreach ($datosMarcas as $marca) {
    $labelsMarcas[] = $marca['Marca'];
    $dataMarcas[] = $marca['TotalProductosVendidos'];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Reporte de Ventas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .container {
            width: 48%; /* Ajusta el ancho según tus necesidades */
            margin-bottom: 20px; /* Espacio entre los contenedores */
        }
    </style>
</head>

<body>
    <div class="container">
        <canvas id="ventasChartAnuales"></canvas>
    </div>

    <div class="container">
        <canvas id="ventasChartSemanales"></canvas>
    </div>

    <div class="container">
        <canvas id="clientesChart"></canvas>
    </div>

    <div class="container">
        <canvas id="marcasChart"></canvas>
    </div>

    <script>
        // Configuración del gráfico de ventas anuales
        const labelsAnuales = <?php echo json_encode($labelsAnuales); ?>;
        const dataAnuales = {
            labels: labelsAnuales,
            datasets: [{
                label: 'Ventas por año',
                data: <?php echo json_encode($dataAnuales); ?>,
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        };

        const ctxAnuales = document.getElementById('ventasChartAnuales').getContext('2d');
        const configAnuales = {
            type: 'line',
            data: dataAnuales,
        };
        new Chart(ctxAnuales, configAnuales);

        // Configuración del gráfico de ventas semanales
        const labelsSemanales = <?php echo json_encode($labelsSemanales); ?>;
        const dataSemanales = {
            labels: labelsSemanales,
            datasets: [{
                label: 'Ventas por semana',
                data: <?php echo json_encode($dataSemanales); ?>,
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        };

        const ctxSemanales = document.getElementById('ventasChartSemanales').getContext('2d');
        const configSemanales = {
            type: 'line',
            data: dataSemanales,
        };
        new Chart(ctxSemanales, configSemanales);

        // Configuración del gráfico de top 5 de compradores
        const labelsCompradores = <?php echo json_encode($labelsCompradores); ?>;
        const dataCompradores = {
            labels: labelsCompradores,
            datasets: [{
                label: 'Top 5 clientes',
                data: <?php echo json_encode($dataCompradores); ?>,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        };

        const ctxCompradores = document.getElementById('clientesChart').getContext('2d');
        const configCompradores = {
            type: 'bar',
            data: dataCompradores,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        new Chart(ctxCompradores, configCompradores);

        // Configuración del gráfico de top 5 de marcas más vendidas
        const labelsMarcas = <?php echo json_encode($labelsMarcas); ?>;
        const dataMarcas = {
            labels: labelsMarcas,
            datasets: [{
                label: 'Top 5 marcas',
                data: <?php echo json_encode($dataMarcas); ?>,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        };

        const ctxMarcas = document.getElementById('marcasChart').getContext('2d');
        const configMarcas = {
            type: 'bar',
            data: dataMarcas,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        new Chart(ctxMarcas, configMarcas);
    </script>
</body>

</html>
