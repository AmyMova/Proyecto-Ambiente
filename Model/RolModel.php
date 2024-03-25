<?php
require_once '../config/Conexion.php';

class Rol extends Conexion
{
    /*=============================================
	=            Atributos de la Clase            =
	=============================================*/
        protected static $cnx;
		private $IdRol=null;
		private $Rol=null;
	/*=====  End of Atributos de la Clase  ======*/

    /*=============================================
	=            Contructores de la Clase          =
	=============================================*/
        public function __construct(){}
    /*=====  End of Contructores de la Clase  ======*/

    /*=============================================
	=            Encapsuladores de la Clase       =
	=============================================*/
        public function getIdRol()
        {
            return $this->IdRol;
        }
        public function setIdRol($IdRol)
        {
            $this->IdRol = $IdRol;
        }
        public function getRol()
        {
            return $this->Rol;
        }
        public function setRol($Rol)
        {
            $this->Rol = $Rol;
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
            $query = "CALL VerRoles()";
            $arr = array();
            try {
                self::getConexion();
                $resultado = self::$cnx->prepare($query);
                $resultado->execute();
                self::desconectar();
                foreach ($resultado->fetchAll() as $encontrado) {
                    $brand = new Rol();
                    $brand->setIdRol($encontrado['IdRol']);
                    $brand->setRol($encontrado['Rol']);
                    $arr[] = $brand;
                }
                return $arr;
            } catch (PDOException $Exception) {
                self::desconectar();
                $error = "Error ".$Exception->getCode( ).": ".$Exception->getMessage( );;
                return json_encode($error);
            }
        }

    /*=====  End of Metodos de la Clase  ======*/  
}
