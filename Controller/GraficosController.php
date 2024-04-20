<?php
require_once 'GraficosModel.php';

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

// Crear un array de colores para las barras
$backgroundColors = [
    'rgba(255, 99, 132, 0.2)',
    'rgba(255, 159, 64, 0.2)',
    'rgba(255, 205, 86, 0.2)',
    'rgba(75, 192, 192, 0.2)',
    'rgba(54, 162, 235, 0.2)',
    'rgba(153, 102, 255, 0.2)',
    'rgba(201, 203, 207, 0.2)'
];

$borderColors = [
    'rgb(255, 99, 132)',
    'rgb(255, 159, 64)',
    'rgb(255, 205, 86)',
    'rgb(75, 192, 192)',
    'rgb(54, 162, 235)',
    'rgb(153, 102, 255)',
    'rgb(201, 203, 207)'
];

// Crear el array de configuración para el gráfico
$config = [
    'type' => 'bar',
    'data' => [
        'labels' => $labels,
        'datasets' => [
            [
                'label' => 'Ventas por año',
                'data' => $data,
                'backgroundColor' => $backgroundColors,
                'borderColor' => $borderColors,
                'borderWidth' => 1
            ]
        ]
    ],
    'options' => [
        'scales' => [
            'y' => [
                'beginAtZero' => true
            ]
        ]
    ]
];

// Convertir el array de configuración a JSON para pasarlo al script del gráfico
$jsonConfig = json_encode($config);

// Pasar el JSON al script en la página
echo "<script>const config = $jsonConfig;</script>";
?>
