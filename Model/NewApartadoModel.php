<?php
require_once '../config/Conexion.php';

class NewApartadoModel extends Conexion
{
    /*=============================================
    =            Atributos de la Clase            =
    =============================================*/
    protected static $cnx;
    private $valor_total = null;
    private $Producto = null;
    private $CantidadTotal = null;
    private $PrecioTotal = null;
    private $Duracion = null;
    private $AporteUsuario = null;
    private $MetodoPago = null;
    /*=====  End of Atributos de la Clase  ======*/

    /*=============================================
    =            Contructores de la Clase          =
    =============================================*/
    public function __construct()
    {
    }
    /*=====  End of Contructores de la Clase  ======*/

    /*=============================================
    =            Encapsuladores de la Clase       =
    =============================================*/
    public function getValorTotal()
    {
        return $this->valor_total;
    }
    public function setValorTotal($valor_total)
    {
        $this->valor_total = $valor_total;
    }

    public function getProducto()
    {
        return $this->Producto;
    }
    public function setProducto($Producto)
    {
        $this->Producto = $Producto;
    }

    public function getCantidadTotal()
    {
        return $this->CantidadTotal;
    }
    public function setCantidadTotal($CantidadTotal)
    {
        $this->CantidadTotal = $CantidadTotal;
    }

    public function getPrecioTotal()
    {
        return $this->PrecioTotal;
    }
    public function setPrecioTotal($PrecioTotal)
    {
        $this->PrecioTotal = $PrecioTotal;
    }

    public function getDuracion()
    {
        return $this->Duracion;
    }
    public function setDuracion($Duracion)
    {
        $this->Duracion = $Duracion;
    }

    public function getAporteUsuario()
    {
        return $this->AporteUsuario;
    }
    public function setAporteUsuario($AporteUsuario)
    {
        $this->AporteUsuario = $AporteUsuario;
    }

    public function getMetodoPago()
    {
        return $this->MetodoPago;
    }
    public function setMetodoPago($MetodoPago)
    {
        $this->MetodoPago = $MetodoPago;
    }
    /*=====  End of Encapsuladores de la Clase  ======*/

    /*=============================================
    =            Metodos de la Clase              =
    =============================================*/
    public static function getConexion()
    {
        self::$cnx = Conexion::conectar();
    }

    public static function desconectar()
    {
        self::$cnx = null;
    }

    public function agregarApartado($valor_total, $Producto, $CantidadTotal, $PrecioTotal, $Duracion, $AporteUsuario, $MetodoPago)
    {
        $query = "CALL CrearApartado(:p_ValorTotal, :Producto, :CantidadTotal, :PrecioTotal, :Duracion, :AporteUsuario, :MetodoPago)";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":p_ValorTotal", $valor_total, PDO::PARAM_STR);
            $resultado->bindParam(":Producto", $Producto, PDO::PARAM_STR);
            $resultado->bindParam(":CantidadTotal", $CantidadTotal, PDO::PARAM_STR);
            $resultado->bindParam(":PrecioTotal", $PrecioTotal, PDO::PARAM_STR);
            $resultado->bindParam(":Duracion", $Duracion, PDO::PARAM_STR);
            $resultado->bindParam(":AporteUsuario", $AporteUsuario, PDO::PARAM_STR);
            $resultado->bindParam(":MetodoPago", $MetodoPago, PDO::PARAM_STR);
            $resultado->execute();
            self::desconectar();
            return true;
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }
    /*=====  End of Metodos de la Clase  ======*/
}
?>
