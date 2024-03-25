<?php
require_once '../config/Conexion.php';

class Categoria extends Conexion
{
    /*=============================================
    =            Atributos de la Clase            =
    =============================================*/
    protected static $cnx;
    private $IdCategoria = null;
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
    public function getIdCategoria()
    {
        return $this->IdCategoria;
    }
    public function setIdCategoria($IdCategoria)
    {
        $this->IdCategoria = $IdCategoria;
    }


    public function getCategoria()
    {
        return $this->Categoria;
    }
    public function setCategoria($Categoria)
    {
        $this->Categoria = $Categoria;
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

    public function listarTodosDb()
    {
        $query = "Call VerCategorias()";
        $arr = array();
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
            self::desconectar();
            foreach ($resultado->fetchAll() as $encontrado) {
                $category = new Categoria();
                $category->setIdCategoria($encontrado['IdCategoria']);
                $category->setCategoria($encontrado['Categoria']);
                $arr[] = $category;
            }
            return $arr;
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            ;
            return json_encode($error);
        }
    }

    public function verificarExistenciaDb()
    {
        $query = "SELECT * FROM categoria where Categoria=:Categoria";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $Categoria = $this->getCategoria();
            $resultado->bindParam(":Categoria", $Categoria, PDO::PARAM_STR);
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
    public function verificarExistenciaByIdDb()
    {
        $query = "SELECT * FROM categoria where IdCategoria=:id";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $IdCategoria = $this->getIdCategoria();
            $resultado->bindParam(":id", $IdCategoria, PDO::PARAM_INT);
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

    public function guardarEnDb()
    {
        $query = "Call CrearCategoria(:Nombre_Categoria)";
        try {
            self::getConexion();
            $Categoria = $this->getCategoria();

            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":Nombre_Categoria", $Categoria, PDO::PARAM_STR);
            $resultado->execute();
            self::desconectar();
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            ;
            return json_encode($error);
        }
    }

    public function llenarCampos($IdCategoria)
    {
        $query = "CALL VerCategoria(:id)";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":id", $IdCategoria, PDO::PARAM_INT);
            $resultado->execute();
            self::desconectar();
            foreach ($resultado->fetchAll() as $encontrado) {
                $this->setIdCategoria($encontrado['IdCategoria']);
                $this->setCategoria($encontrado['Categoria']);
            }
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            ;
            return json_encode($error);
        }
    }

    public function actualizarCategoria()
    {
        $query = "Call EditarCategoria(:id,:Nuevo_Nombre_Categoria)";
        try {
            self::getConexion();
            $IdCategoria = $this->getIdCategoria();
            $Categoria = $this->getCategoria();
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":Nuevo_Nombre_Categoria", $Categoria, PDO::PARAM_STR);
            $resultado->bindParam(":id", $IdCategoria, PDO::PARAM_INT);
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

    public function EliminarCategoria()
    {
        $IdCategoria = $this->getIdCategoria();
        $query = "Call EliminarCategoria(:id)";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":id", $IdCategoria, PDO::PARAM_INT);
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
    /*=====  End of Metodos de la Clase  ======*/
}
