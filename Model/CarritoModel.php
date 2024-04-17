<?php
require_once '../config/Conexion.php';

class Carrito extends Conexion
{
    /*=============================================
    =            Atributos de la Clase            =
    =============================================*/
    protected static $cnx;
    private $IdCarrito = null;
    private $IdProducto = null;
    private $IdUsuario = null;
    private $XS = null;
    private $S = null;
    private $M = null;
    private $L = null;
    private $XL = null;
    private $XXL = null;

    private $DB_XS = null;
    private $DB_S = null;
    private $DB_M = null;
    private $DB_L = null;
    private $DB_XL = null;
    private $DB_XXL = null;
    private $Precio = null;
    private $Descripcion = null;
    private $PrecioVenta = null;
    private $Imagen = null;
    private $Cantidad = null;
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
    public function getIdCarrito()
    {
        return $this->IdCarrito;
    }
    public function setIdCarrito($IdCarrito)
    {
        $this->IdCarrito = $IdCarrito;
    }

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


    //cantidades para de la db

    public function getDB_XS()
    {
        return $this->DB_XS;
    }
    public function setDB_XS($DB_XS)
    {
        $this->DB_XS = $DB_XS;
    }
    public function getDB_S()
    {
        return $this->DB_S;
    }
    public function setDB_S($DB_S)
    {
        $this->DB_S = $DB_S;
    }
    public function getDB_M()
    {
        return $this->DB_M;
    }
    public function setDB_M($DB_M)
    {
        $this->DB_M = $DB_M;
    }
    public function getDB_L()
    {
        return $this->DB_L;
    }
    public function setDB_L($DB_L)
    {
        $this->DB_L = $DB_L;
    }
    public function getDB_XL()
    {
        return $this->DB_XL;
    }
    public function setDB_XL($DB_XL)
    {
        $this->DB_XL = $DB_XL;
    }
    public function getDB_XXL()
    {
        return $this->XXL;
    }
    public function setDB_XXL($DB_XXL)
    {
        $this->DB_XXL = $DB_XXL;
    }

    public function getPrecio()
    {
        return $this->Precio;
    }
    public function setPrecio($Precio)
    {
        $this->Precio = $Precio;
    }

    public function getPrecioVenta()
    {
        return $this->PrecioVenta;
    }
    public function setPrecioVenta($PrecioVenta)
    {
        $this->PrecioVenta = $PrecioVenta;
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

    public function getCantidad()
    {
        return $this->Cantidad;
    }
    public function setCantidad($Cantidad)
    {
        $this->Cantidad = $Cantidad;
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

    public function VerCarritoDB($id)
{
    $query = "Call VerCarrito(:id)";
    try {
        self::getConexion();
        $resultado = self::$cnx->prepare($query);
        $resultado->bindParam(":id", $id, PDO::PARAM_INT);
        $resultado->execute();
        self::desconectar();
        
        $arr = array();
        
        foreach ($resultado->fetchAll() as $encontrado) {
            $producto = new Carrito();
            $producto->setIdCarrito($encontrado['IdCarrito']);
            $producto->setIdProducto($encontrado['IdProducto']);
            $producto->setIdUsuario($encontrado['IdUsuario']);
            $producto->setXS($encontrado['XS']);
            $producto->setS($encontrado['S']);
            $producto->setM($encontrado['M']);
            $producto->setL($encontrado['L']);
            $producto->setXL($encontrado['XL']);
            $producto->setXXL($encontrado['XXL']);
            $producto->setPrecioVenta($encontrado['PrecioVenta']);
            $producto->setPrecio($encontrado['Precio']);
            $producto->setDescripcion($encontrado['Descripcion']);
            $producto->setImagen($encontrado['Imagen']);
            $producto->setDB_XS($encontrado['CantXS']);
            $producto->setDB_S($encontrado['CantS']);
            $producto->setDB_M($encontrado['CantM']);
            $producto->setDB_L($encontrado['CantL']);
            $producto->setDB_XL($encontrado['CantXL']);
            $producto->setDB_XXL($encontrado['CantXXL']);
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

public function ListarTotalCompra($id)
{
    $query = "SELECT IdUsuario,SUM(precio) AS Precio,Count(*) as Cantidad FROM carrito WHERE IdUsuario=:id; ";
    try {
        self::getConexion();
        $resultado = self::$cnx->prepare($query);
        $resultado->bindParam(":id", $id, PDO::PARAM_INT);
        $resultado->execute();
        self::desconectar();
        
        $arr = array();
        
        foreach ($resultado->fetchAll() as $encontrado) {
            $producto = new Carrito();
            $producto->setIdUsuario($encontrado['IdUsuario']);
            $producto->setPrecio($encontrado['Precio']);
            $producto->setCantidad($encontrado['Cantidad']);
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

    public function AgregarProductoCarrito()
    {
        $query = "Call AgregarACarrito(:Id_Producto,:Id_Usuario,:Cant_XS,:Cant_S,:Cant_M,:Cant_L,:Cant_XL,:Cant_XXL)";
        try {
            self::getConexion();
            $IdProducto = $this->getIdProducto();
            $IdUsuario = $this->getIdUsuario();
            $XS = $this->getXS();
            $S = $this->getS();
            $M = $this->getM();
            $L = $this->getL();
            $XL = $this->getXL();
            $XXL = $this->getXXL();

            $resultado = self::$cnx->prepare($query);

            $resultado->bindParam(":Cant_XS", $XS, PDO::PARAM_INT);
            $resultado->bindParam(":Cant_S", $S, PDO::PARAM_INT);
            $resultado->bindParam(":Cant_M", $M, PDO::PARAM_INT);
            $resultado->bindParam(":Cant_L", $L, PDO::PARAM_INT);
            $resultado->bindParam(":Cant_XL", $XL, PDO::PARAM_INT);
            $resultado->bindParam(":Cant_XXL", $XXL, PDO::PARAM_INT);
            $resultado->bindParam(":Id_Producto", $IdProducto, PDO::PARAM_INT);
            $resultado->bindParam(":Id_Usuario", $IdUsuario, PDO::PARAM_INT);
            $resultado->execute();
            self::desconectar();
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            ;
            return json_encode($error);
        }
    }


    public function EliminarProductoCarrito()
    {
        $query = "Call EliminarDeCarrito(:id);";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $IdCarrito = $this->getIdCarrito();

            $resultado->bindParam(":id", $IdCarrito, PDO::PARAM_INT);
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

    public function EliminarProductosCarrito()
    {
        $query = "Call EliminarCarrito(:id);";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $IdIdUsuario = $this->getIdUsuario();

            $resultado->bindParam(":id", $IdIdUsuario, PDO::PARAM_INT);
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


    public function llenarCampos($id)
    {
        $query = "Call VerProducto(:id)";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":id", $id, PDO::PARAM_INT);
            $resultado->execute();
            self::desconectar();
            foreach ($resultado->fetchAll() as $encontrado) {
                $this->setIdCarrito($encontrado['IdCarrito']);
                $this->setIdProducto($encontrado['IdProducto']);
                $this->setIdUsuario($encontrado['IdUsuario']);
                $this->setDescripcion($encontrado['Descripcion']);
                $this->setImagen($encontrado['Imagen']);
                $this->setPrecio($encontrado['Precio']);
                $this->setPrecioVenta($encontrado['PrecioVenta']);
                $this->setXS($encontrado['XS']);
                $this->setS($encontrado['S']);
                $this->setM($encontrado['M']);
                $this->setL($encontrado['L']);
                $this->setXL($encontrado['XL']);
                $this->setDB_XXL($encontrado['CantXXL']);
                $this->setDB_XS($encontrado['CantXS']);
                $this->setDB_S($encontrado['CantS']);
                $this->setDB_M($encontrado['CantM']);
                $this->setDB_L($encontrado['CantL']);
                $this->setDB_XL($encontrado['CantXL']);
                $this->setDB_XXL($encontrado['CantXXL']);
            }
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            ;
            return json_encode($error);
        }
    }

    public function EditarProductoCarrito()
    {
        $query = "Call EditarCarrito(:id,:Id_Producto,:Nueva_Cant_XS,:Nueva_Cant_S,:Nueva_Cant_M,:Nueva_Cant_L,:Nueva_Cant_XL,:Nueva_Cant_XXL)";
        try {
            self::getConexion();
            $IdCarrito = $this->getIdCarrito();
            $IdProducto = $this->getIdProducto();
            $XS = $this->getXS();
            $S = $this->getS();
            $M = $this->getM();
            $L = $this->getL();
            $XL = $this->getXL();
            $XXL = $this->getXXL();
            $resultado = self::$cnx->prepare($query);

            $resultado->bindParam(":id", $IdCarrito, PDO::PARAM_INT);
            $resultado->bindParam(":Nueva_Cant_XS", $XS, PDO::PARAM_INT);
            $resultado->bindParam(":Nueva_Cant_S", $S, PDO::PARAM_INT);
            $resultado->bindParam(":Nueva_Cant_M", $M, PDO::PARAM_INT);
            $resultado->bindParam(":Nueva_Cant_L", $L, PDO::PARAM_INT);
            $resultado->bindParam(":Nueva_Cant_XL", $XL, PDO::PARAM_INT);
            $resultado->bindParam(":Nueva_Cant_XXL", $XXL, PDO::PARAM_INT);
            $resultado->bindParam(":Id_Producto", $IdProducto, PDO::PARAM_INT);
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

    public function verificarExistenciaProductoCarritoDb()
    {
        $query = "SELECT COUNT(*) FROM carrito WHERE IdProducto=:idP and :id=IdUsuario";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $IdProducto = $this->getIdProducto();
            $IdUsuario = $this->getIdUsuario();

            $resultado->bindParam(":idP", $IdProducto, PDO::PARAM_INT);
            $resultado->bindParam(":id", $IdUsuario, PDO::PARAM_INT);
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

    public function verificarProductosDB()
    {
        $query = "SELECT COUNT(*) FROM carrito WHERE :id=IdUsuario";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $IdUsuario = $this->getIdUsuario();

            $resultado->bindParam(":id", $IdUsuario, PDO::PARAM_INT);
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

    public function verificarExistenciaByIdDb()
    {
        $query = "SELECT * FROM carrito where IdCarrito=:id";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $IdCarrito = $this->getIdCarrito();

            $resultado->bindParam(":id", $IdCarrito, PDO::PARAM_INT);
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