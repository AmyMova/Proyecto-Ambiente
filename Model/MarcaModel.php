<?php
require_once '../config/Conexion.php';

class Marca extends Conexion
{
    /*=============================================
	=            Atributos de la Clase            =
	=============================================*/
        protected static $cnx;
		private $IdMarca=null;
		private $Marca=null;
	/*=====  End of Atributos de la Clase  ======*/

    /*=============================================
	=            Contructores de la Clase          =
	=============================================*/
        public function __construct(){}
    /*=====  End of Contructores de la Clase  ======*/

    /*=============================================
	=            Encapsuladores de la Clase       =
	=============================================*/
        public function getIdMarca()
        {
            return $this->IdMarca;
        }
        public function setIdMarca($IdMarca)
        {
            $this->IdMarca = $IdMarca;
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
        public static function getConexion(){
            self::$cnx = Conexion::conectar();
        }

        public static function desconectar(){
            self::$cnx = null;
        }

        public function listarTodosDb(){
            $query = "CALL VerMarcas()";
            $arr = array();
            try {
                self::getConexion();
                $resultado = self::$cnx->prepare($query);
                $resultado->execute();
                self::desconectar();
                foreach ($resultado->fetchAll() as $encontrado) {
                    $brand = new Marca();
                    $brand->setIdMarca($encontrado['IdMarca']);
                    $brand->setMarca($encontrado['Marca']);
                    $arr[] = $brand;
                }
                return $arr;
            } catch (PDOException $Exception) {
                self::desconectar();
                $error = "Error ".$Exception->getCode( ).": ".$Exception->getMessage( );;
                return json_encode($error);
            }
        }

        public function verificarExistenciaDb(){
            $query = "SELECT * FROM marca where marca.Marca=:Marca";
         try {
             self::getConexion();
                $resultado = self::$cnx->prepare($query);		
                $Marca= $this->getMarca();	
                $resultado->bindParam(":Marca",$Marca,PDO::PARAM_STR);
                $resultado->execute();
                self::desconectar();
                $encontrado = false;
                foreach ($resultado->fetchAll() as $reg) {
                    $encontrado = true;
                }
                return $encontrado;
               } catch (PDOException $Exception) {
                   self::desconectar();
                   $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
                 return $error;
               }
        }
        

        public function guardarEnDb(){
            $query = "Call CrearMarca(:Nombre_Marca)";
         try {
             self::getConexion();
             $Marca=$this->getMarca();
    
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":Nombre_Marca",$Marca,PDO::PARAM_STR);
                $resultado->execute();
                self::desconectar();
               } catch (PDOException $Exception) {
                   self::desconectar();
                   $error = "Error ".$Exception->getCode( ).": ".$Exception->getMessage( );;
                 return json_encode($error);
               }
        }

        public function EliminarMarca(){
        $IdMarca = $this->getIdMarca();
        $query = "Call EliminarMarca(:id)";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":id", $IdMarca, PDO::PARAM_INT);
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

        
        public function llenarCampos($IdMarca){
            $query = "Call VerMarca(:id)";
            try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);		 	
            $resultado->bindParam(":id",$IdMarca,PDO::PARAM_INT);
            $resultado->execute();
            self::desconectar();
            foreach ($resultado->fetchAll() as $encontrado) {
                $this->setIdMarca($encontrado['IdMarca']);
                $this->setMarca($encontrado['Marca']);
            }
            } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();;
            return json_encode($error);
            }
        }

        public function actualizarMarca(){
            $query = "Call EditarMarca(:id,:Nuevo_Nombre_Marca)";
            try {
                self::getConexion();
                $IdMarca=$this->getIdMarca();
                $Marca=$this->getMarca();
                $resultado = self::$cnx->prepare($query);
                $resultado->bindParam(":Nuevo_Nombre_Marca",$Marca,PDO::PARAM_STR);
                $resultado->bindParam(":id",$IdMarca,PDO::PARAM_INT);
                self::$cnx->beginTransaction();//desactiva el autocommit
                $resultado->execute();
                self::$cnx->commit();//realiza el commit y vuelve al modo autocommit
                self::desconectar();
                return $resultado->rowCount();
            } catch (PDOException $Exception) {
                self::$cnx->rollBack();
                self::desconectar();
                $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
                return $error;
            }
        }

        public function verificarExistenciaByIDDb(){
            $query = "SELECT * FROM marca where marca.IdMarca=:id";
         try {
             self::getConexion();
                $resultado = self::$cnx->prepare($query);		
                $IdMarca= $this->getIdMarca();	
                $resultado->bindParam(":id",$IdMarca,PDO::PARAM_INT);
                $resultado->execute();
                self::desconectar();
                $encontrado = false;
                foreach ($resultado->fetchAll() as $reg) {
                    $encontrado = true;
                }
                return $encontrado;
               } catch (PDOException $Exception) {
                   self::desconectar();
                   $error = "Error ".$Exception->getCode().": ".$Exception->getMessage();
                 return $error;
               }
        }

    /*=====  End of Metodos de la Clase  ======*/  
}
