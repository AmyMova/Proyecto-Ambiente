<?php
require_once 'GraficoModel.php';

// Instancia del modelo
$modelo = new GraficoModel();

// Obtener los datos del gráfico
$datos = $modelo->obtenerDatosGrafico();

// Devolver los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($datos);
