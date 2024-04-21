<?php

require_once __DIR__ . '/../../config/Conexion.php';

class GraficosModel extends Conexion
{
    public function obtenerVentasAnuales()
    {
        $query = "CALL VerFacturasAdminR()";
        try {
            $conexion = Conexion::conectar();
            $resultado = $conexion->query($query);
            $conexion = null; // Cerrar la conexión

            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $Exception) {
            return false; // O maneja el error de alguna otra manera
        }
    }

    public function obtenerVentasSemanales()
    {
        $query = "CALL VerFacturasPorSemana()";
        try {
            $conexion = Conexion::conectar();
            $resultado = $conexion->query($query);
            $conexion = null; // Cerrar la conexión

            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $Exception) {
            return false; // O maneja el error de alguna otra manera
        }
    }

    public function obtenerTop5Compradores()
    {
        $query = "CALL Top5Compradores()";
        try {
            $conexion = Conexion::conectar();
            $resultado = $conexion->query($query);
            $conexion = null; // Cerrar la conexión

            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $Exception) {
            return false; // O maneja el error de alguna otra manera
        }
    }

    public function obtenerTop5Marcas()
    {
        $query = "CALL MostrarTop5MarcasMasVendidas()";
        try {
            $conexion = Conexion::conectar();
            $resultado = $conexion->query($query);
            $conexion = null; // Cerrar la conexión

            return $resultado->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $Exception) {
            return false; // O maneja el error de alguna otra manera
        }
    }
}
