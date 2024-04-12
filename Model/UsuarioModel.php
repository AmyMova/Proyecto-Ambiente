<?php
require_once '../config/Conexion.php';

class Usuario extends Conexion
{
    /*=============================================
    =            Atributos de la Clase            =
    =============================================*/
    protected static $cnx;
    private $IdUsuario = null;
    private $NombreUsuario = null;
    private $ApellidoUsuario = null;
    private $NumeroCedula = null;
    private $NumeroTelefono = null;
    private $CorreoEletronico = null;
    private $Contrasenna = null;
    private $DiaCumpleanos = null;
    private $MesCumpleanos = null;
    private $AnoCumpleanos = null;
    private $IdRol = null;
    private $Rol = null;
    private $FechaCumpleanos = null;
    private $Imagen = null;
    private $NombreCompleto = null;
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

    public function getIdUsuario()
    {
        return $this->IdUsuario;
    }
    public function setIdUsuario($IdUsuario)
    {
        $this->IdUsuario = $IdUsuario;
    }

    public function getCorreoElectronico()
    {
        return $this->CorreoEletronico;
    }
    public function setCorreoElectronico($CorreoEletronico)
    {
        $this->CorreoEletronico = $CorreoEletronico;
    }

    public function getNombreUsuario()
    {
        return $this->NombreUsuario;
    }
    public function setNombreUsuario($NombreUsuario)
    {
        $this->NombreUsuario = $NombreUsuario;
    }


    public function getApellidoUsuario()
    {
        return $this->ApellidoUsuario;
    }
    public function setApellidoUsuario($ApellidoUsuario)
    {
        $this->ApellidoUsuario = $ApellidoUsuario;
    }


    public function getNumeroCedula()
    {
        return $this->NumeroCedula;
    }
    public function setNumeroCedula($NumeroCedula)
    {
        $this->NumeroCedula = $NumeroCedula;
    }

    public function getNumeroTelefono()
    {
        return $this->NumeroTelefono;
    }
    public function setNumeroTelefono($NumeroTelefono)
    {
        $this->NumeroTelefono = $NumeroTelefono;
    }

    public function getContrasenna()
    {
        return $this->Contrasenna;
    }
    public function setContrasenna($Contrasenna)
    {
        $this->Contrasenna = $Contrasenna;
    }

    public function getFechaCumpleanos()
    {
        return $this->FechaCumpleanos;
    }
    public function setFechaCumpleanos($FechaCumpleanos)
    {
        $this->FechaCumpleanos = $FechaCumpleanos;
    }
    public function getDiaCumpleanos()
    {
        return $this->DiaCumpleanos;
    }
    public function setDiaCumpleanos($DiaCumpleanos)
    {
        $this->DiaCumpleanos = $DiaCumpleanos;
    }
    public function getMesCumpleanos()
    {
        return $this->MesCumpleanos;
    }
    public function setMesCumpleanos($MesCumpleanos)
    {
        $this->MesCumpleanos = $MesCumpleanos;
    }
    public function getAnoCumpleanos()
    {
        return $this->AnoCumpleanos;
    }
    public function setAnoCumpleanos($AnoCumpleanos)
    {
        $this->AnoCumpleanos = $AnoCumpleanos;
    }
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

    public function getImagen()
    {
        return $this->Imagen;
    }
    public function setImagen($Imagen)
    {
        $this->Imagen = $Imagen;
    }
    public function getNombreCompleto()
    {
        return $this->NombreCompleto;
    }
    public function setNombreCompleto($NombreCompleto)
    {
        $this->NombreCompleto = $NombreCompleto;
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
        $query = "Call VerUsuarios()";
        $arr = array();
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->execute();
            self::desconectar();
            foreach ($resultado->fetchAll() as $encontrado) {
                $user = new Usuario();
                $user->setIdUsuario($encontrado['IdUsuario']);
                $user->setCorreoElectronico($encontrado['CorreoElectronico']);
                $user->setNombreUsuario($encontrado['NombreUsuario']);
                $user->setNombreCompleto($encontrado['NombreCompleto']);
                $user->setIdRol($encontrado['IdRol']);
                $user->setNumeroTelefono($encontrado['NumeroTelefono']);
                $user->setApellidoUsuario($encontrado['ApellidoUsuario']);
                $user->setNumeroCedula($encontrado['NumeroCedula']);
                $user->setFechaCumpleanos($encontrado['FechaCumpleanos']);
                $user->setDiaCumpleanos($encontrado['DiaCumpleanos']);
                $user->setMesCumpleanos($encontrado['MesCumpleanos']);
                $user->setAnoCumpleanos($encontrado['AnoCumpleanos']);
                $user->setImagen($encontrado['Imagen']);
                $user->setRol($encontrado['Rol']);
                $arr[] = $user;
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
        $query = "SELECT * FROM usuario where NumeroCedula=:NumeroCedula";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $NumeroCedula = $this->getNumeroCedula();
            $resultado->bindParam(":NumeroCedula", $NumeroCedula, PDO::PARAM_STR);
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
        $query = "SELECT * FROM usuario where usuario.IdUsuario=:id";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $IdUsuario = $this->getIdUsuario();
            $resultado->bindParam(":id", $IdUsuario, PDO::PARAM_INT);
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
        $query =
            "Call CrearUsuario(:Nombre_Usuario,:Apellido_Usuario,:Numero_Cedula,:Numero_Telefono,:Correo_Electronico,:Contrasena,:Imagen_Usuario,:Id_Rol,:Dia_Cumpleanos,:Mes_Cumpleanos,:Ano_Cumpleanos)";
        try {
            self::getConexion();
            $NombreUsuario = ucwords(strtolower($this->getNombreUsuario()));
            $ApellidoUsuario = ucwords(strtolower($this->getApellidoUsuario()));
            $NumeroCedula = $this->getNumeroCedula();
            $NumeroTelefono = $this->getNumeroTelefono();
            $CorreoElectronico = strtolower($this->getCorreoElectronico());
            $Contrasenna = $this->getContrasenna();
            $DiaCumpleanos = $this->getDiaCumpleanos();
            $MesCumpleanos = $this->getMesCumpleanos();
            $AnoCumpleanos = $this->getAnoCumpleanos();
            $IdRol = $this->getIdRol();
            $Imagen = $this->getImagen();
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":Imagen_Usuario", $Imagen, PDO::PARAM_STR);
            $resultado->bindParam(":Nombre_Usuario", $NombreUsuario, PDO::PARAM_STR);
            $resultado->bindParam(":Apellido_Usuario", $ApellidoUsuario, PDO::PARAM_STR);
            $resultado->bindParam(":Numero_Cedula", $NumeroCedula, PDO::PARAM_STR);
            $resultado->bindParam(":Numero_Telefono", $NumeroTelefono, PDO::PARAM_STR);
            $resultado->bindParam(":Correo_Electronico", $CorreoElectronico, PDO::PARAM_STR);
            $resultado->bindParam(":Contrasena", $Contrasenna, PDO::PARAM_STR);
            $resultado->bindParam(":Dia_Cumpleanos", $DiaCumpleanos, PDO::PARAM_INT);
            $resultado->bindParam(":Mes_Cumpleanos", $MesCumpleanos, PDO::PARAM_INT);
            $resultado->bindParam(":Ano_Cumpleanos", $AnoCumpleanos, PDO::PARAM_INT);
            $resultado->bindParam(":Id_Rol", $IdRol, PDO::PARAM_INT);
            $resultado->execute();
            self::desconectar();
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            ;
            return json_encode($error);
        }
    }

    public function Registrar()
    {
        $query =
            "Call RegistrarUsuario(:Nombre_Usuario,:Apellido_Usuario,:Cedula,:Telefono,:Correo_Electronico,:Contrasena,:Imagen_Usuario,:Dia_Cumpleanos,:Mes_Cumpleanos,:Ano_Cumpleanos)";
        try {
            self::getConexion();
            $NombreUsuario = ucwords(strtolower($this->getNombreUsuario()));
            $ApellidoUsuario = ucwords(strtolower($this->getApellidoUsuario()));
            $NumeroCedula = $this->getNumeroCedula();
            $NumeroTelefono = $this->getNumeroTelefono();
            $CorreoElectronico = strtolower($this->getCorreoElectronico());
            $Contrasenna = $this->getContrasenna();
            $DiaCumpleanos = $this->getDiaCumpleanos();
            $MesCumpleanos = $this->getMesCumpleanos();
            $AnoCumpleanos = $this->getAnoCumpleanos();
            $Imagen = $this->getImagen();
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":Imagen_Usuario", $Imagen, PDO::PARAM_STR);
            $resultado->bindParam(":Nombre_Usuario", $NombreUsuario, PDO::PARAM_STR);
            $resultado->bindParam(":Apellido_Usuario", $ApellidoUsuario, PDO::PARAM_STR);
            $resultado->bindParam(":Cedula", $NumeroCedula, PDO::PARAM_STR);
            $resultado->bindParam(":Telefono", $NumeroTelefono, PDO::PARAM_STR);
            $resultado->bindParam(":Correo_Electronico", $CorreoElectronico, PDO::PARAM_STR);
            $resultado->bindParam(":Contrasena", $Contrasenna, PDO::PARAM_STR);
            $resultado->bindParam(":Dia_Cumpleanos", $DiaCumpleanos, PDO::PARAM_INT);
            $resultado->bindParam(":Mes_Cumpleanos", $MesCumpleanos, PDO::PARAM_INT);
            $resultado->bindParam(":Ano_Cumpleanos", $AnoCumpleanos, PDO::PARAM_INT);
            $resultado->execute();
            self::desconectar();
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            ;
            return json_encode($error);
        }
    }




    public function llenarCampos($IdUsuario)
    {
        $query = "Call VerUsuario(:id)";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":id", $IdUsuario, PDO::PARAM_INT);
            $resultado->execute();
            self::desconectar();
            foreach ($resultado->fetchAll() as $encontrado) {
                $this->setIdUsuario($encontrado['IdUsuario']);
                $this->setNombreUsuario($encontrado['NombreUsuario']);
                $this->setApellidoUsuario($encontrado['ApellidoUsuario']);
                $this->setNumeroCedula($encontrado['NumeroCedula']);
                $this->setNumeroTelefono($encontrado['NumeroTelefono']);
                $this->setCorreoElectronico($encontrado['CorreoElectronico']);
                $this->setDiaCumpleanos($encontrado['DiaCumpleanos']);
                $this->setMesCumpleanos($encontrado['MesCumpleanos']);
                $this->setAnoCumpleanos($encontrado['AnoCumpleanos']);
                $this->setIdRol($encontrado['IdRol']);
            }
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            ;
            return json_encode($error);
        }
    }

    public function Login()
    {
        $query = "CALL VerificarUsuario(:Correo_Electronico,:Contrasenna)";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $Correo_Electronico = strtolower($this->getCorreoElectronico());
            $Contrasenna = $this->getContrasenna();
            $resultado->bindParam(":Correo_Electronico", $Correo_Electronico, PDO::PARAM_STR);
            $resultado->bindParam(":Contrasenna", $Contrasenna, PDO::PARAM_STR);
            $resultado->execute();

            $numFilas = $resultado->rowCount();
            if ($numFilas > 0) {
                return $resultado->fetch(PDO::FETCH_ASSOC);
            } else {
                return false;
            }
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }

    public function Forgot()
    {
        $query = "SELECT * FROM usuario u  WHERE u.CorreoElectronico=:Correo_Electronico";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $Correo_Electronico = strtolower($this->getCorreoElectronico());
            $resultado->bindParam(":Correo_Electronico", $Correo_Electronico, PDO::PARAM_STR);
            $resultado->execute();

            $numFilas = $resultado->rowCount();
            if ($numFilas > 0) {
                return $resultado->fetch(PDO::FETCH_ASSOC);
            } else {
                return false;
            }
        } catch (PDOException $Exception) {
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }


    public function EditarUsuario()
    {
        $query =
            "Call EditarUsuario(:id,:Nombre_Usuario,:Apellido_Usuario,:Numero_Cedula,
            :Numero_Telefono,:Correo_Electronico,:Contrasena,:Imagen_Usuario,:Id_Rol,:Dia_Cumpleanos,:Mes_Cumpleanos,:Ano_Cumpleanos)";
        try {
            self::getConexion();
            $IdUsuario = $this->getIdUsuario();
            $NombreUsuario = ucwords(strtolower($this->getNombreUsuario()));
            $ApellidoUsuario = ucwords(strtolower($this->getApellidoUsuario()));
            $NumeroCedula = $this->getNumeroCedula();
            $NumeroTelefono = $this->getNumeroTelefono();
            $CorreoElectronico = strtolower($this->getCorreoElectronico());
            $DiaCumpleanos = $this->getDiaCumpleanos();
            $MesCumpleanos = $this->getMesCumpleanos();
            $AnoCumpleanos = $this->getAnoCumpleanos();
            $IdRol = $this->getIdRol();
            $Imagen = $this->getImagen();
            $Contrasenna = $this->getContrasenna();

            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":id", $IdUsuario, PDO::PARAM_INT);
            $resultado->bindParam(":Nombre_Usuario", $NombreUsuario, PDO::PARAM_STR);
            $resultado->bindParam(":Apellido_Usuario", $ApellidoUsuario, PDO::PARAM_STR);
            $resultado->bindParam(":Numero_Cedula", $NumeroCedula, PDO::PARAM_STR);
            $resultado->bindParam(":Numero_Telefono", $NumeroTelefono, PDO::PARAM_STR);
            $resultado->bindParam(":Correo_Electronico", $CorreoElectronico, PDO::PARAM_STR);
            $resultado->bindParam(":Dia_Cumpleanos", $DiaCumpleanos, PDO::PARAM_INT);
            $resultado->bindParam(":Mes_Cumpleanos", $MesCumpleanos, PDO::PARAM_INT);
            $resultado->bindParam(":Ano_Cumpleanos", $AnoCumpleanos, PDO::PARAM_INT);
            $resultado->bindParam(":Id_Rol", $IdRol, PDO::PARAM_INT);
            $resultado->bindParam(":Imagen_Usuario", $Imagen, PDO::PARAM_STR);
            $resultado->bindParam(":Contrasena", $Contrasenna, PDO::PARAM_STR);

            self::$cnx->beginTransaction(); // desactiva el autocommit
            $resultado->execute();
            self::$cnx->commit(); // realiza el commit y vuelve al modo autocommit
            self::desconectar();
            return $resultado->rowCount();
        } catch (PDOException $Exception) {
            self::$cnx->rollBack();
            self::desconectar();
            $error = "Error " . $Exception->getCode() . ": " . $Exception->getMessage();
            return $error;
        }
    }

    public function EliminarUsuario()
    {
        $IdUsuario = $this->getIdUsuario();
        $query = "Call EliminarUsuario(:id)";
        try {
            self::getConexion();
            $resultado = self::$cnx->prepare($query);
            $resultado->bindParam(":id", $IdUsuario, PDO::PARAM_INT);
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