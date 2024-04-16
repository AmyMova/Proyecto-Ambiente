<?php
require_once '../config/Conexion.php';

class Factura extends Conexion
{
    /*=============================================
    =            Atributos de la Clase            =
    =============================================*/
    protected static $cnx;
    private $IdUsuario = null;
    private $IdProducto = null;
    private $Vendedor = null;
    private $IdFactura = null;
    private $CantXS = null;
    private $CantS = null;
    private $CantM = null;
    private $CantL = null;
    private $CantXL = null;
    private $CantXXL = null;
    private $PrecioUnitario = null;
    private $PrecioTotal = null;
    private $IdDetalle = null;
    private $NombreCompleto = null;
    private $Descripcion = null;
    private $Fecha = null;


    private $PrecioTotalProducto = null;
    private $CorreoElectronico = null;
    private $NumeroTelefono = null;
    private $IVA = null;
    private $Subtotal = null;
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
    public function getIdProducto()
    {
        return $this->IdProducto;
    }
    public function setIdProducto($IdProducto)
    {
        $this->IdProducto = $IdProducto;
    }

    public function getIdUsuario()
    {
        return $this->IdUsuario;
    }
    public function setIdUsuario($IdUsuario)
    {
        $this->IdUsuario = $IdUsuario;
    }

    public function getVendedor()
    {
        return $this->Vendedor;
    }
    public function setVendedor($Vendedor)
    {
        $this->Vendedor = $Vendedor;
    }

    public function getIdFactura()
    {
        return $this->IdFactura;
    }
    public function setIdFactura($IdFactura)
    {
        $this->IdFactura = $IdFactura;
    }
    public function getCantXS()
    {
        return $this->CantXS;
    }
    public function setCantXS($CantXS)
    {
        $this->CantXS = $CantXS;
    }
    public function getCantS()
    {
        return $this->CantS;
    }
    public function setCantS($CantS)
    {
        $this->CantS = $CantS;
    }
    public function getCantM()
    {
        return $this->CantM;
    }
    public function setCantM($CantM)
    {
        $this->CantM = $CantM;
    }
    public function getCantL()
    {
        return $this->CantL;
    }
    public function setCantL($CantL)
    {
        $this->CantL = $CantL;
    }
    public function getCantXL()
    {
        return $this->CantXL;
    }
    public function setCantXL($CantXL)
    {
        $this->CantXL = $CantXL;
    }
    public function getCantXXL()
    {
        return $this->CantXXL;
    }
    public function setCantXXL($CantXXL)
    {
        $this->CantXXL = $CantXXL;
    }
    public function getPrecioUnitario()
    {
        return $this->PrecioUnitario;
    }
    public function setPrecioUnitario($PrecioUnitario)
    {
        $this->PrecioUnitario = $PrecioUnitario;
    }
    public function getPrecioTotal()
    {
        return $this->PrecioTotal;
    }
    public function setPrecioTotal($PrecioTotal)
    {
        $this->PrecioTotal = $PrecioTotal;
    }
    public function getIdDetalle()
    {
        return $this->IdDetalle;
    }
    public function setIdDetalle($IdDetalle)
    {
        $this->IdDetalle = $IdDetalle;
    }
    public function getNombreCompleto()
    {
        return $this->NombreCompleto;
    }
    public function setNombreCompleto($NombreCompleto)
    {
        $this->NombreCompleto = $NombreCompleto;
    }
    public function getDescripcion()
    {
        return $this->Descripcion;
    }
    public function setDescripcion($Descripcion)
    {
        $this->Descripcion = $Descripcion;
    }
    public function getFecha()
    {
        return $this->Fecha;
    }
    public function setFecha($Fecha)
    {
        $this->Fecha = $Fecha;
    }

    public function getSubtotal()
    {
        return $this->Subtotal;
    }
    public function setSubtotal($Subtotal)
    {
        $this->Subtotal = $Subtotal;
    }
    public function getIVA()
    {
        return $this->IVA;
    }
    public function setIVA($IVA)
    {
        $this->IVA = $IVA;
    }
    public function getPrecioTotalProducto()
    {
        return $this->PrecioTotalProducto;
    }
    public function setPrecioTotalProducto($PrecioTotalProducto)
    {
        $this->PrecioTotalProducto = $PrecioTotalProducto;
    }
    public function getNumeroTelefono()
    {
        return $this->NumeroTelefono;
    }
    public function setNumeroTelefono($NumeroTelefono)
    {
        $this->NumeroTelefono = $NumeroTelefono;
    }
    public function getCorreoElectronico()
    {
        return $this->CorreoElectronico;
    }
    public function setCorreoElectronico($CorreoElectronico)
    {
        $this->CorreoElectronico = $CorreoElectronico;
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

    public function VerFacturasAdmin()
    {
        $query = "Call VerFacturasAdmin()";
        $arr = array();
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
            self::desconectar();
            foreach ($resultado->fetchAll() as $encontrado) {
                $factura = new Factura();
                $factura->setVendedor($encontrado['Vendedor']);
                $factura->setIdFactura($encontrado['IdFactura']);
                $factura->setPrecioTotal($encontrado['PrecioTotal']);
                $factura->setFecha($encontrado['Fecha']);
                $factura->setNombreCompleto($encontrado['NombreCompleto']);
                $arr[] = $factura;
            }
            return $arr;
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            ;
            return json_encode($error);
        }
    }
    public function VerFacturasCliente($id)
    {
        $query = "Call VerFacturasCliente(:id)";
        $arr = array();
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":id", $id, PDO::PARAM_INT);
            $resultado->execute();
            self::desconectar();
            foreach ($resultado->fetchAll() as $encontrado) {
                $factura = new Factura();
                $factura->setVendedor($encontrado['Vendedor']);
                $factura->setIdFactura($encontrado['IdFactura']);
                $factura->setPrecioTotal($encontrado['PrecioTotal']);
                $factura->setFecha($encontrado['Fecha']);
                $factura->setNombreCompleto($encontrado['NombreCompleto']);
                $arr[] = $factura;
            }
            return $arr;
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            ;
            return json_encode($error);
        }
    }
    public function VerFacturasVendedor($vendedor)
    {
        $query = "Call VerFacturasVendedor(:vendedor)";
        $arr = array();
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":vendedor", $vendedor, PDO::PARAM_STR);
            $resultado->execute();
            self::desconectar();
            foreach ($resultado->fetchAll() as $encontrado) {
                $factura = new Factura();
                $factura->setVendedor($encontrado['Vendedor']);
                $factura->setIdFactura($encontrado['IdFactura']);
                $factura->setPrecioTotal($encontrado['PrecioTotal']);
                $factura->setFecha($encontrado['Fecha']);
                $factura->setNombreCompleto($encontrado['NombreCompleto']);
                $arr[] = $factura;
            }
            return $arr;
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            ;
            return json_encode($error);
        }
    }

    
}