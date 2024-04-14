<?php
require_once '../config/Conexion.php';

class GraficoModel extends Conexion
{
    protected static $cnx;

    public function __construct()
    {
        // Inicializar la conexión
    }

    // Método para obtener los datos para el gráfico
    public function obtenerDatosGrafico()
    {
        $query = "SELECT NombreCliente, SUM(PrecioTotal) AS TotalCompras
                  FROM Apartados
                  GROUP BY NombreCliente";
        $datos = [];
        
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
            
            // Obtener los datos de la consulta y almacenarlos en un array
            while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
                $datos[] = [
                    'nombre' => $row['NombreCliente'],
                    'compras' => (float)$row['TotalCompras']
                ];
            }
            
            self::desconectar();
            return $datos;
        } catch (PDOException $e) {
            self::desconectar();
            // Manejar el error y devolver un mensaje de error
            return ['error' => "Error al obtener datos: " . $e->getMessage()];
        }
    }

    // Método para establecer la conexión
    public static function getConexion()
    {
        self::$cnx = Conexion::conectar();
    }

    // Método para desconectar
    public static function desconectar()
    {
        self::$cnx = null;
    }
}
