<?php
require_once '../config/Conexion.php';

class Etiqueta extends Conexion
{
    /*=============================================
    =            Atributos de la Clase            =
    =============================================*/
    protected static $cnx;
    private $IdEtiqueta = null;
    private $IdProducto = null;
    private $Marca = null;
    private $Categoria = null;
    private $PrecioCredito = null;
    private $PrecioVenta = null;
    private $XS = null;
    private $S = null;
    private $M = null;
    private $L = null;
    private $XL = null;
    private $XXL = null;
    private $Descripcion=null;
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
    public function getIdEtiqueta()
    {
        return $this->IdEtiqueta;
    }
    public function setIdEtiqueta($IdEtiqueta)
    {
        $this->IdEtiqueta = $IdEtiqueta;
    }

    public function getIdProducto()
    {
        return $this->IdProducto;
    }
    public function setIdProducto($IdProducto)
    {
        $this->IdProducto = $IdProducto;
    }

    
    public function getXS()
    {
        return $this->XS;
    }
    public function setXS($XS)
    {
        $this->XS = $XS;
    }
    public function getS()
    {
        return $this->S;
    }
    public function setS($S)
    {
        $this->S = $S;
    }
    public function getM()
    {
        return $this->M;
    }
    public function setM($M)
    {
        $this->M = $M;
    }
    public function getL()
    {
        return $this->L;
    }
    public function setL($L)
    {
        $this->L = $L;
    }
    public function getXL()
    {
        return $this->XL;
    }
    public function setXL($XL)
    {
        $this->XL = $XL;
    }
    public function getXXL()
    {
        return $this->XXL;
    }
    public function setXXL($XXL)
    {
        $this->XXL = $XXL;
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

    public function VerEtiquetasDB()
    {
        $query = "Call VerEtiquetas()";
        $arr = array();
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
            self::desconectar();
            foreach ($resultado->fetchAll() as $encontrado) {
                $producto = new Etiqueta();
                $producto->setIdEtiqueta($encontrado['IdEtiqueta']);
                $producto->setIdProducto($encontrado['IdProducto']);
                $producto->setXS($encontrado['XS']);
                $producto->setS($encontrado['S']);
                $producto->setM($encontrado['M']);
                $producto->setL($encontrado['L']);
                $producto->setXL($encontrado['XL']);
                $producto->setXXL($encontrado['XXL']);
                $producto->setPrecioVenta($encontrado['PrecioVenta']);
                $producto->setPrecioCredito($encontrado['PrecioCredito']);
                $producto->setDescripcion($encontrado['Descripcion']);
                $producto->setCategoria($encontrado['Categoria']);
                $producto->setMarca($encontrado['Marca']);
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
    public function CrearEtiquetaDB()
    {
        $query = "Call CrearEtiqueta(:Id_Producto,:XS,:S,:M,:L,:XL,:XXL)";
        try {
            self::getConexion();
            $IdProducto = $this->getIdProducto();
            $XS = $this->getXS();
            $S = $this->getS();
            $M = $this->getM();
            $L = $this->getL();
            $XL = $this->getXL();
            $XXL = $this->getXXL();

            $resultado = self::$cnx->prepare($query);

            $resultado->bindParam(":XS", $XS, PDO::PARAM_INT);
            $resultado->bindParam(":S", $S, PDO::PARAM_INT);
            $resultado->bindParam(":M", $M, PDO::PARAM_INT);
            $resultado->bindParam(":L", $L, PDO::PARAM_INT);
            $resultado->bindParam(":XL", $XL, PDO::PARAM_INT);
            $resultado->bindParam(":XXL", $XXL, PDO::PARAM_INT);
            $resultado->bindParam(":Id_Producto", $IdProducto, PDO::PARAM_INT);
            $resultado->execute();
            self::desconectar();
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            ;
            return json_encode($error);
        }
    }
    

    public function EliminarEtiqueta()
    {
        $IdEtiqueta = $this->getIdEtiqueta();
        $query = "Call EliminarEtiqueta(:id)";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":id", $IdEtiqueta, PDO::PARAM_INT);
            self::$cnx->beginTransaction();//desactiva el autocommit
            $resultado->execute();
            self::$cnx->commit();//realiza el commit y vuelve al modo autocommit
            self::desconectar();
            return $resultado->rowCount();
        } catch (PDOException $Exception) {
            self::$cnx->rollBack();
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }

    public function EliminarEtiquetas()
    {
        
        $query = "Call EliminarEtiquetas()";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            self::$cnx->beginTransaction();//desactiva el autocommit
            $resultado->execute();
            self::$cnx->commit();//realiza el commit y vuelve al modo autocommit
            self::desconectar();
            return $resultado->rowCount();
        } catch (PDOException $Exception) {
            self::$cnx->rollBack();
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }


    public function llenarCampos($id)
    {
        $query = "Call VerEtiqueta(id)";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":id", $id, PDO::PARAM_INT);
            $resultado->execute();
            self::desconectar();
            foreach ($resultado->fetchAll() as $encontrado) {
                $this->setIdEtiqueta($encontrado['IdEtiqueta']);
                $this->setIdProducto($encontrado['IdProducto']);
                $this->setMarca($encontrado['Marca']);
                $this->setDescripcion($encontrado['Descripcion']);
                $this->setCategoria($encontrado['Categoria']);
                $this->setPrecioVenta($encontrado['PrecioVenta']);
                $this->setPrecioCredito($encontrado['PrecioCredito']);
                $this->setXS($encontrado['XS']);
                $this->setS($encontrado['S']);
                $this->setM($encontrado['M']);
                $this->setL($encontrado['L']);
                $this->setXL($encontrado['XL']);
                $this->setXXL($encontrado['XXL']);
            }
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            ;
            return json_encode($error);
        }
    }

    public function EditarEtiqueta()
    {
        $query = "Call EditarEtiqueta(:id,:Id_Producto,:Nuevo_XS,:Nuevo_S,:Nuevo_M,:Nuevo_L,:Nuevo_XL,:Nuevo_XXL)";
        try {
            self::getConexion();
            $IdEtiqueta = $this->getIdEtiqueta();
            $IdProducto = $this->getIdProducto();
            $XS = $this->getXS();
            $S = $this->getS();
            $M = $this->getM();

            $L = $this->getL();
            $XL = $this->getXL();
            $XXL = $this->getXXL();
            $resultado = self::$cnx->prepare($query);


            $resultado->bindParam(":Nuevo_XS", $XS, PDO::PARAM_INT);
            $resultado->bindParam(":Nuevo_S", $S, PDO::PARAM_INT);
            $resultado->bindParam(":Nuevo_M", $M, PDO::PARAM_INT);

            $resultado->bindParam(":Nuevo_L", $L, PDO::PARAM_INT);
            $resultado->bindParam(":Nuevo_XL", $XL, PDO::PARAM_INT);
            $resultado->bindParam(":Nuevo_XXL", $XXL, PDO::PARAM_INT);
            $resultado->bindParam(":Id_Producto", $IdProducto, PDO::PARAM_INT);

            $resultado->bindParam(":id", $IdEtiqueta, PDO::PARAM_INT);
            self::$cnx->beginTransaction();//desactiva el autocommit
            $resultado->execute();
            self::$cnx->commit();//realiza el commit y vuelve al modo autocommit
            self::desconectar();
            return $resultado->rowCount();
        } catch (PDOException $Exception) {
            self::$cnx->rollBack();
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }

    public function verificarExistenciaEtiquetaDb()
{
    $query = "SELECT COUNT(*) FROM etiqueta WHERE :id=IdProducto";
    try {
        self::getConexion();
        $resultado = self::$cnx->prepare($query);
        $IdProducto = $this->getIdProducto();

        $resultado->bindParam(":id", $IdProducto, PDO::PARAM_INT);
        $resultado->execute();
        $count = $resultado->fetchColumn();
        self::desconectar();
        
        // Si count es mayor que 0, significa que el producto existe
        return $count > 0;
    } catch (PDOException $Exception) {
        self::desconectar();
        $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
        return $error;
    }
}

public function verificarCantidadDB()
{
    $query = "SELECT COUNT(*) FROM etiqueta";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
            $count = $resultado->fetchColumn();
            self::desconectar();

            // Si count es mayor que 0, significa que el producto existe
            return $count > 0;
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
}

    public function verificarExistenciaEtiquetaByIDDb()
    {
        $query = "SELECT * FROM etiqueta where IdEtiqueta=:id";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $IdEtiqueta = $this->getIdEtiqueta();

            $resultado->bindParam(":id", $IdEtiqueta, PDO::PARAM_INT);
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
/*=====  End of Metodos de la Clase  ======*/

?>