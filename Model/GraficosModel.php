<?php
require_once '../config/Conexion.php';

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
?>
