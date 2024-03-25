<?php
require_once '../config/Conexion.php';

class Catalogo extends Conexion
{
    /*=============================================
    =            Atributos de la Clase            =
    =============================================*/
    protected static $cnx;
    private $IdProducto = null;
    private $IdCategoria = null;
    private $IdMarca = null;
    private $CantXS = null;
    private $CantS = null;
    private $CantM = null;
    private $CantL = null;
    private $CantXL = null;
    private $CantXXL = null;
    private $PrecioVenta = null;
    private $PrecioCredito = null;
    private $Descripcion = null;
    private $Imagen = null;
    private $Marca = null;
    private $Categoria = null;
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

    public function getIdCategoria()
    {
        return $this->IdCategoria;
    }
    public function setIdCategoria($IdCategoria)
    {
        $this->IdCategoria = $IdCategoria;
    }

    public function getIdMarca()
    {
        return $this->IdMarca;
    }
    public function setIdMarca($IdMarca)
    {
        $this->IdMarca = $IdMarca;
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
    public function getPrecioVenta()
    {
        return $this->PrecioVenta;
    }
    public function setPrecioVenta($PrecioVenta)
    {
        $this->PrecioVenta = $PrecioVenta;
    }
    public function getPrecioCredito()
    {
        return $this->PrecioCredito;
    }
    public function setPrecioCredito($PrecioCredito)
    {
        $this->PrecioCredito = $PrecioCredito;
    }
    public function getDescripcion()
    {
        return $this->Descripcion;
    }
    public function setDescripcion($Descripcion)
    {
        $this->Descripcion = $Descripcion;
    }
    public function getImagen()
    {
        return $this->Imagen;
    }
    public function setImagen($Imagen)
    {
        $this->Imagen = $Imagen;
    }
    public function getCategoria()
    {
        return $this->Categoria;
    }
    public function setCategoria($Categoria)
    {
        $this->Categoria = $Categoria;
    }
    public function getMarca()
    {
        return $this->Marca;
    }
    public function setMarca($Marca)
    {
        $this->Marca = $Marca;
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

    public function VerCatalogosDB()
    {
        $query = "Call VerCatalogo()";
        $arr = array();
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
            self::desconectar();
            foreach ($resultado->fetchAll() as $encontrado) {
                $producto = new Catalogo();
                $producto->setIdProducto($encontrado['IdProducto']);
                $producto->setCantXS($encontrado['CantXS']);
                $producto->setCantS($encontrado['CantS']);
                $producto->setCantM($encontrado['CantM']);
                $producto->setCantL($encontrado['CantL']);
                $producto->setCantXL($encontrado['CantXL']);
                $producto->setCantXXL($encontrado['CantXXL']);
                $producto->setPrecioVenta($encontrado['PrecioVenta']);
                $producto->setPrecioCredito($encontrado['PrecioCredito']);
                $producto->setDescripcion($encontrado['Descripcion']);
                $producto->setCategoria($encontrado['Categoria']);
                $producto->setMarca($encontrado['Marca']);
                $producto->setImagen($encontrado['Imagen']);
                $arr[] = $producto;
            }
            return $arr;
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            ;
            return json_encode($error);
        }
    }
    public function llenarCamposCatalogo($id)
    {
        $query = "Call VerProducto(id)";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":id", $id, PDO::PARAM_INT);
            $resultado->execute();
            self::desconectar();
            foreach ($resultado->fetchAll() as $encontrado) {
                $this->setIdProducto($encontrado['IdProducto']);
                $this->setIdCategoria($encontrado['IdCategoria']);
                $this->setIdMarca($encontrado['IdMarca']);
                $this->setDescripcion($encontrado['Descripcion']);
                $this->setImagen($encontrado['Imagen']);
                $this->setPrecioVenta($encontrado['PrecioVenta']);
                $this->setPrecioCredito($encontrado['PrecioCredito']);
                $this->setCantXS($encontrado['CantXS']);
                $this->setCantS($encontrado['CantS']);
                $this->setCantM($encontrado['CantM']);
                $this->setCantL($encontrado['CantL']);
                $this->setCantXL($encontrado['CantXL']);
                $this->setCantXXL($encontrado['CantXXL']);
                $this->setMarca($encontrado['Marca']);
                $this->setCategoria($encontrado['Categoria']);
            }
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            ;
            return json_encode($error);
        }
    }
    public function verificarExistenciaProductoByIDDb()
    {
        $query = "SELECT * FROM producto where IdProducto=:id";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $IdProducto = $this->getIdProducto();

            $resultado->bindParam(":id", $IdProducto, PDO::PARAM_INT);
            $resultado->execute();
            self::desconectar();
            $encontrado = false;
            foreach ($resultado->fetchAll() as $reg) {
                $encontrado = true;
            }
            return $encontrado;
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }
}