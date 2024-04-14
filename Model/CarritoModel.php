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
    private $Precio = null;
    private $Descripcion = null;
    private $Marca = null;
    private $Categoria = null;
    private $PrecioVenta = null;
    private $Imagen = null;
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

    public function VerCarritoDB()
    {
        $query = "Call VerCarrito(1)";
        $arr = array();
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
            self::desconectar();
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
                $producto->setPrecio($encontrado['Precio']);
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


    public function EliminarProducto()
    {
        $IdCarrito = $this->getIdCarrito();
        $query = "Call EliminarProducto(:id)";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":id", $IdCarrito, PDO::PARAM_INT);
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
        $query = "Call VerProducto(id)";
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
                $this->setXXL($encontrado['XXL']);
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

    public function EditarProducto()
    {
        $query = "Call EditarProducto(:id,:Id_Categoria,:Id_Marca,:Nueva_Imagen,:Nueva_Descripcion,:Nuevo_Precio_Venta,:Nuevo_Precio,:Nueva__XS,:Nueva__S,:Nueva__M,:Nueva__L,:Nueva__XL,:Nueva__XXL)";
        try {
            self::getConexion();
            $IdCarrito = $this->getIdCarrito();
            $IdProducto = $this->getIdProducto();
            $IdUsuario = $this->getIdUsuario();
            $Descripcion = strtoupper($this->getDescripcion());
            $Imagen = $this->getImagen();
            $PrecioVenta = $this->getPrecioVenta();
            $Precio = $this->getPrecio();
            $XS = $this->getXS();
            $S = $this->getS();
            $M = $this->getM();
            $L = $this->getL();
            $XL = $this->getXL();
            $XXL = $this->getXXL();
            $resultado = self::$cnx->prepare($query);

            $resultado->bindParam(":id", $IdCarrito, PDO::PARAM_INT);
            $resultado->bindParam(":Nueva__XS", $XS, PDO::PARAM_INT);
            $resultado->bindParam(":Nueva__S", $S, PDO::PARAM_INT);
            $resultado->bindParam(":Nueva__M", $M, PDO::PARAM_INT);
            $resultado->bindParam(":Nueva__L", $L, PDO::PARAM_INT);
            $resultado->bindParam(":Nueva__XL", $XL, PDO::PARAM_INT);
            $resultado->bindParam(":Nueva__XXL", $XXL, PDO::PARAM_INT);
            $resultado->bindParam(":Nueva_Descripcion", $Descripcion, PDO::PARAM_STR);
            $resultado->bindParam(":Nueva_Imagen", $Imagen, PDO::PARAM_STR);
            $resultado->bindParam(":Id_Categoria", $IdProducto, PDO::PARAM_INT);
            $resultado->bindParam(":Id_Marca", $IdUsuario, PDO::PARAM_INT);
            $resultado->bindParam(":Nuevo_Precio", $Precio, PDO::PARAM_INT);
            $resultado->bindParam(":Nuevo_Precio_Venta", $PrecioVenta, PDO::PARAM_INT);
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

    public function verificarExistenciaProductoByIdDb()
    {
        $query = "SELECT * FROM producto where IdCarrito=:id";
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