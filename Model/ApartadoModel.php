<?php

require_once '../config/Conexion.php';


class ApartadoModel {
    public function agregarApartado($total, $duracion, $aporteUsuario, $metodoPago, $producto, $cantidadTotal, $precioTotal) {
        // Obtener la conexión a la base de datos
        $conexion = Conexion::conectar();
        
        // Preparar la consulta SQL para insertar el apartado
        $sql = "INSERT INTO apartado (Total, Duracion, AporteUsuario, MetodoPago, Producto, CantidadTotalProductos, PrecioTotalProductos) 
                VALUES (:total, :duracion, :aporteUsuario, :metodoPago, :producto, :cantidadTotal, :precioTotal)";
        
        // Preparar los valores para la consulta
        $values = array(
            ':total' => $total,
            ':duracion' => $duracion,
            ':aporteUsuario' => $aporteUsuario,
            ':metodoPago' => $metodoPago,
            ':producto' => $producto,
            ':cantidadTotal' => $cantidadTotal,
            ':precioTotal' => $precioTotal
        );

        // Ejecutar la consulta
        try {
            $stmt = $conexion->prepare($sql);
            $stmt->execute($values);
            return true;
        } catch (PDOException $e) {
            echo "Error al ejecutar la consulta: " . $e->getMessage();
            return false;
        }
    }

    public function obtenerApartados() {
        // Obtener la conexión a la base de datos
        $conexion = Conexion::conectar();

        // Preparar la consulta SQL para obtener los apartados
        $sql = "SELECT * FROM apartado";

        // Ejecutar la consulta
        try {
            $stmt = $conexion->query($sql);
            $apartados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $apartados;
        } catch (PDOException $e) {
            echo "Error al ejecutar la consulta: " . $e->getMessage();
            return false;
        }
    }
}