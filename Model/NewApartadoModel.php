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
    private $NombreCliente = null;
    private $FechaApartado = null;
    private $CorreoCliente = null;
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

    public function getNombreCliente()
    {
        return $this->NombreCliente;
    }
    public function setNombreCliente($NombreCliente)
    {
        $this->NombreCliente = $NombreCliente;
    }

    public function getFechaApartado()
    {
        return $this->FechaApartado;
    }
    public function setFechaApartado($FechaApartado)
    {
        $this->FechaApartado = $FechaApartado;
    }

    public function getCorreoCliente()
    {
        return $this->CorreoCliente;
    }
    public function setCorreoCliente($CorreoCliente)
    {
        $this->CorreoCliente = $CorreoCliente;
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

    public function agregarApartado($valor_total, $Producto, $CantidadTotal, $PrecioTotal, $Duracion, $AporteUsuario, $MetodoPago, $NombreCliente, $FechaApartado, $CorreoCliente)
    {
        $query = "CALL CrearApartado(:ValorTotal, :Producto, :CantidadTotal, :PrecioTotal, :Duracion, :AporteUsuario, :MetodoPago, :NombreCliente, :FechaApartado, :CorreoCliente)";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":ValorTotal", $valor_total, PDO::PARAM_STR);
            $resultado->bindParam(":Producto", $Producto, PDO::PARAM_STR);
            $resultado->bindParam(":CantidadTotal", $CantidadTotal, PDO::PARAM_STR);
            $resultado->bindParam(":PrecioTotal", $PrecioTotal, PDO::PARAM_STR);
            $resultado->bindParam(":Duracion", $Duracion, PDO::PARAM_STR);
            $resultado->bindParam(":AporteUsuario", $AporteUsuario, PDO::PARAM_STR);
            $resultado->bindParam(":MetodoPago", $MetodoPago, PDO::PARAM_STR);
            $resultado->bindParam(":NombreCliente", $NombreCliente, PDO::PARAM_STR);
            $resultado->bindParam(":FechaApartado", $FechaApartado, PDO::PARAM_STR);
            $resultado->bindParam(":CorreoCliente", $CorreoCliente, PDO::PARAM_STR);
            $resultado->execute();
            self::desconectar();
            return true;
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }

    public function VerApartado($id = null)
    {
        $query = "CALL VerApartado(:id)";
        $arr = array();
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            // Si se proporciona un ID, se pasa como parámetro, de lo contrario, se pasa null
            if ($id !== null) {
                $resultado->bindParam(":id", $id, PDO::PARAM_INT);
            } else {
                // Si no se proporciona un ID, se asigna un valor null al parámetro
                $id = null;
                $resultado->bindParam(":id", $id, PDO::PARAM_NULL);
            }
            $resultado->execute();
            self::desconectar();
            foreach ($resultado->fetchAll() as $encontrado) {
                $apartado = new NewApartadoModel(); 
                $apartado->setIdApartado($encontrado['IdApartado']);
                $apartado->setValorTotal($encontrado['ValorTotal']);
                $apartado->setProducto($encontrado['Producto']);
                $apartado->setCantidadTotal($encontrado['CantidadTotal']);
                $apartado->setPrecioTotal($encontrado['PrecioTotal']);
                $apartado->setDuracion($encontrado['Duracion']);
                $apartado->setAporteUsuario($encontrado['AporteUsuario']);
                $apartado->setMetodoPago($encontrado['MetodoPago']);
                $apartado->setNombreCliente($encontrado['NombreCliente']);
                $apartado->setFechaApartado($encontrado['FechaApartado']);
                $apartado->setCorreoCliente($encontrado['CorreoCliente']);
                $arr[] = $apartado;
            }
            return $arr;
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return json_encode($error);
        }
    }
    
    
    
    
    /*=====  End of Metodos de la Clase  ======*/
}
?>
