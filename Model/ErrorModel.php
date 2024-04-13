<?php
require_once '../config/Conexion.php';

class Errores extends Conexion
{
    /*=============================================
    =            Atributos de la Clase            =
    =============================================*/
    protected static $cnx;
    private $IdError = null;
    private $IdUsuario = null;
    private $Usuario = null;
    private $Descripcion = null;
    private $Fecha = null;
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
    public function getIdError()
    {
        return $this->IdError;
    }
    public function setIdError($IdError)
    {
        $this->IdError = $IdError;
    }

    public function getIdUsuario()
    {
        return $this->IdUsuario;
    }
    public function setIdUsuario($IdUsuario)
    {
        $this->IdUsuario = $IdUsuario;
    }
    public function getUsuario()
    {
        return $this->Usuario;
    }
    public function setUsuario($Usuario)
    {
        $this->Usuario = $Usuario;
    }
    public function getFecha()
    {
        return $this->Fecha;
    }
    public function setFecha($Fecha)
    {
        $this->Fecha = $Fecha;
    }
    
    public function getDescripcion()
    {
        return $this->Descripcion;
    }
    public function setDescripcion($Descripcion)
    {
        $this->Descripcion = $Descripcion;
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

    public function VerErroresDB()
    {
        $query = "SELECT IdError,e.IdUsuario,concat(u.NombreUsuario,' ',u.ApellidoUsuario) as Usuario, e.Descripcion, e.Fecha FROM Error e INNER JOIN usuario u ON  e.IdUsuario=u.IdUsuario";
        $arr = array();
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
            self::desconectar();
            foreach ($resultado->fetchAll() as $encontrado) {
                $error = new Errores();
                $error->setIdError($encontrado['IdError']);
                $error->setIdUsuario($encontrado['IdUsuario']);
                $error->setUsuario($encontrado['Usuario']);
                $error->setDescripcion($encontrado['Descripcion']);
                $error->setFecha($encontrado['Fecha']);
                $arr[] = $error;
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
        $query = "SELECT IdError,e.IdUsuario,concat(u.NombreUsuario,' ',u.ApellidoUsuario) as Usuario, e.Descripcion, e.Fecha FROM Error e INNER JOIN usuario u ON  e.IdUsuario=u.IdUsuario WHERE :id=e.IdError";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":id", $id, PDO::PARAM_INT);
            $resultado->execute();
            self::desconectar();
            foreach ($resultado->fetchAll() as $encontrado) {
                $this->setIdError($encontrado['IdError']);
                $this->setIdUsuario($encontrado['IdUsuario']);
                $this->setUsuario($encontrado['Usuario']);
                $this->setDescripcion($encontrado['Descripcion']);
                $this->setFecha($encontrado['Fecha']);
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
        $query = "SELECT * FROM error where IdError=:id";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $IdError = $this->getIdError();

            $resultado->bindParam(":id", $IdError, PDO::PARAM_INT);
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
    public function CrearErrorDB()
    {
        $query = "INSERT INTO `error`(`IdUsuario`,`Descripcion`,`Fecha`) VALUES(:IdUsuario,:Descripcion,now()) ";
        try {
            self::getConexion();
            $IdUsuario = $this->getIdUsuario();
            $Descripcion = $this->getDescripcion();

            $resultado = self::$cnx->prepare($query);

            $resultado->bindParam(":IdUsuario", $IdUsuario, PDO::PARAM_INT);
            $resultado->bindParam(":Descripcion", $Descripcion, PDO::PARAM_INT);
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