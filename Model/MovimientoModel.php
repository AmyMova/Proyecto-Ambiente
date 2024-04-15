<?php
require_once '../config/Conexion.php';

class Movimiento extends Conexion
{
    /*=============================================
    =            Atributos de la Clase            =
    =============================================*/
    protected static $cnx;
    private $IdProducto = null;
    private $IdUsuario = null;
    private $IdMovimiento = null;
    private $Descripcion = null;
    private $Usuario = null;
    private $Fecha = null;
    private $Accion = null;
    private $Producto = null;
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

    public function getIdMovimiento()
    {
        return $this->IdMovimiento;
    }
    public function setIdMovimiento($IdMovimiento)
    {
        $this->IdMovimiento = $IdMovimiento;
    }

    public function getProducto()
    {
        return $this->Producto;
    }
    public function setProducto($Producto)
    {
        $this->Producto = $Producto;
    }
    public function getFecha()
    {
        return $this->Fecha;
    }
    public function setFecha($Fecha)
    {
        $this->Fecha = $Fecha;
    }
    public function getAccion()
    {
        return $this->Accion;
    }
    public function setAccion($Accion)
    {
        $this->Accion = $Accion;
    }
    
    public function getDescripcion()
    {
        return $this->Descripcion;
    }
    public function setDescripcion($Descripcion)
    {
        $this->Descripcion = $Descripcion;
    }
    public function getUsuario()
    {
        return $this->Usuario;
    }
    public function setUsuario($Usuario)
    {
        $this->Usuario = $Usuario;
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

    public function VerMovimientosDB()
    {
        $query = "Call VerMovimientos()";
        $arr = array();
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
            self::desconectar();
            foreach ($resultado->fetchAll() as $encontrado) {
                $movimiento = new Movimiento();
                $movimiento->setIdProducto($encontrado['IdProducto']);
                $movimiento->setIdMovimiento($encontrado['IdMovimiento']);
                $movimiento->setProducto($encontrado['Producto']);
                $movimiento->setUsuario($encontrado['Usuario']);
                $movimiento->setDescripcion($encontrado['Descripcion']);
                $movimiento->setFecha($encontrado['Fecha']);
                $movimiento->setAccion($encontrado['Accion']);
                $arr[] = $movimiento;
            }
            return $arr;
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            ;
            return json_encode($error);
        }
    }
    

    public function llenarCampos($id)
    {
        $query = "Call VerMovimiento(id)";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":id", $id, PDO::PARAM_INT);
            $resultado->execute();
            self::desconectar();
            foreach ($resultado->fetchAll() as $encontrado) {
                $this->setIdProducto($encontrado['IdProducto']);
                $this->setIdMovimiento($encontrado['IdMovimiento']);
                $this->setProducto($encontrado['Producto']);
                $this->setUsuario($encontrado['Usuario']);
                $this->setDescripcion($encontrado['Descripcion']);
                $this->setFecha($encontrado['Fecha']);
                $this->setAccion($encontrado['Accion']);
            }
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            ;
            return json_encode($error);
        }
    }

    public function verificarExistenciaByIDDb()
    {
        $query = "SELECT * FROM movimiento where IdMovimiento=:id";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $IdMovimiento = $this->getIdMovimiento();

            $resultado->bindParam(":id", $IdMovimiento, PDO::PARAM_INT);
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
    public function CrearMovimientoDB()
    {
        $query = "Call CrearMovimiento(:Id_Usuario,:Id_Producto,:DescripcionM,:AccionM) ";
        try {
            self::getConexion();
            $IdUsuario = $this->getIdUsuario();
            $IdProducto = $this->getIdProducto();
            $Descripcion = $this->getDescripcion();
            $Accion = $this->getAccion();

            $resultado = self::$cnx->prepare($query);

            $resultado->bindParam(":IdUsuario", $IdUsuario, PDO::PARAM_INT);
            $resultado->bindParam(":DescripcionM", $Descripcion, PDO::PARAM_STR);
            $resultado->bindParam(":AccionM", $Accion, PDO::PARAM_STR);
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
}
/*=====  End of Metodos de la Clase  ======*/

?>