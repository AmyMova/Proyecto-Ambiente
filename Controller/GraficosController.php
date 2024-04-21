<?php

require_once '../Model/GraficosModel.php';


class GraficosController
{
    public function generarDatosGraficos()
    {
        $model = new GraficosModel();

        $datosVentasAnuales = $model->obtenerVentasAnuales();
        // Procesar los datos de ventas anuales...

        $datosVentasSemanales = $model->obtenerVentasSemanales();
        // Procesar los datos de ventas semanales...

        $datosClientes = $model->obtenerTop5Compradores();
        // Procesar los datos de top 5 de compradores...

        $datosMarcas = $model->obtenerTop5Marcas();
        // Procesar los datos de top 5 de marcas...

        // Devolver los datos procesados
        return [
            'ventasAnuales' => $datosVentasAnuales,
            'ventasSemanales' => $datosVentasSemanales,
            'top5Compradores' => $datosClientes,
            'top5Marcas' => $datosMarcas,
        ];
    }
}
