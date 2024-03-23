<?php

require_once '../Model/ApartadoModel.php';

class ApartadoController {
    public function calcularPorcentaje($duracion) {
        // Aquí calculamos el porcentaje mínimo a pagar según la duración seleccionada
        switch ($duracion) {
            case '3 meses':
                return 40;
            case '1 mes':
                return 20;
            case '1 semana':
                return 10;
            default:
                return 0;
        }
    }

    public function nuevoApartado($valorTotal, $duracion, $aporteUsuario, $metodoPago, $producto, $cantidadTotal, $precioTotal) {
        // Calcular el porcentaje mínimo a pagar
        $porcentajeMinimo = $this->calcularPorcentaje($duracion);
        
        // Calcular el valor mínimo a pagar
        $valorMinimo = ($valorTotal * $porcentajeMinimo) / 100;
    
        // Verificar si el aporte del usuario es suficiente
        if ($aporteUsuario >= $valorMinimo) {
            // Intentar crear el apartado en la base de datos
            $apartadoCreado = ApartadoModel::create($valorTotal, $duracion, $aporteUsuario, $metodoPago, $producto, $cantidadTotal, $precioTotal);
            
            if ($apartadoCreado) {
                echo "<script>Swal.fire('Pago realizado correctamente');</script>";
            } else {
                echo "<script>Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Hubo un problema al crear el apartado.'
                });</script>";
            }
        } else {
            echo "<script>Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'El aporte del usuario no es suficiente. Debe ser al menos $" . $valorMinimo . "'
            });</script>";
        }
        
    }
}
