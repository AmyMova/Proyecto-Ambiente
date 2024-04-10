<?php
require_once '../Model/UsuarioModel.php';

switch ($_GET["op"]) {
    case 'IniciarSesion':
        session_start();
        $correo_electronico = isset($_POST["correo_electronico"]) ? trim($_POST["correo_electronico"]) : "";
        $contrasenna = isset($_POST["contrasenna"]) ? trim($_POST["contrasenna"]) : "";

        //Verificacion de imagen en el campo nuevaImagen

        $usuario = new Usuario();

        $usuario->setCorreoElectronico($correo_electronico);
        $usuario->setcontrasenna($contrasenna);
        $encontrado = $usuario->Login();
        if ($encontrado !== false) {
            // Si se encontraron resultados, establecer variables de sesión
            $_SESSION["IdUsuario"] = $encontrado["IdUsuario"];
            $_SESSION["IdRol"] = $encontrado["IdRol"];
            $_SESSION["CorreoElectronico"] = $encontrado["CorreoElectronico"];
            $_SESSION["NombreUsuario"] = $encontrado["NombreUsuario"];
            $_SESSION["ApellidoUsuario"] = $encontrado["ApellidoUsuario"];
            $_SESSION["Imagen"] = $encontrado["Imagen"];
            echo 1;
        } else {
            echo 2;
        }
        break;

    case 'Registrar':
        $Nombre_Usuario = isset($_POST["Nombre_Usuario"]) ? trim($_POST["Nombre_Usuario"]) : "";
        $Apellido_Usuario = isset($_POST["Apellido_Usuario"]) ? trim($_POST["Apellido_Usuario"]) : "";
        $Numero_Cedula = isset($_POST["Numero_Cedula"]) ? trim($_POST["Numero_Cedula"]) : "";
        $Numero_Telefono = isset($_POST["Numero_Telefono"]) ? trim($_POST["Numero_Telefono"]) : "";
        $Dia_Cumpleanos = isset($_POST["Dia_Cumpleanos"]) ? trim($_POST["Dia_Cumpleanos"]) : "";
        $Mes_Cumpleanos = isset($_POST["Mes_Cumpleanos"]) ? trim($_POST["Mes_Cumpleanos"]) : "";
        $Ano_Cumpleanos = isset($_POST["Ano_Cumpleanos"]) ? trim($_POST["Ano_Cumpleanos"]) : "";
        $Correo_Electronico = isset($_POST["Correo_Electronico"]) ? trim($_POST["Correo_Electronico"]) : "";
        $Contrasenna = isset($_POST["Contrasenna"]) ? trim($_POST["Contrasenna"]) : "";
        $Confirmar_Contrasenna = isset($_POST["Confirmar_Contrasenna"]) ? trim($_POST["Confirmar_Contrasenna"]) : "";

        if ($Confirmar_Contrasenna == $Contrasenna) {
            $Imagen = "imagenPredeterminada-65f0e2911dded.jpg";
            $usuario = new Usuario();

            $usuario->setNumeroCedula($Numero_Cedula);
            $encontrado = $usuario->verificarExistenciaDb();
            if ($encontrado == 0) {
                $usuario->setNumeroCedula($Numero_Cedula);
                $usuario->setNombreUsuario($Nombre_Usuario);
                $usuario->setApellidoUsuario($Apellido_Usuario);
                $usuario->setNumeroTelefono($Numero_Telefono);
                $usuario->setDiaCumpleanos($Dia_Cumpleanos);
                $usuario->setMesCumpleanos($Mes_Cumpleanos);
                $usuario->setAnoCumpleanos($Ano_Cumpleanos);
                $usuario->setCorreoElectronico($Correo_Electronico);
                $usuario->setContrasenna($Contrasenna);
                $usuario->setImagen($Imagen);
                $usuario->Registrar();
                if ($usuario->verificarExistenciaDb()) {
                    echo 1; //usuario registrado 
                    //  echo 4; //usuario registrado y envio de correo fallido
                    //}
                } else {
                    echo 3; //Fallo al realizar el registro
                }
            } else {
                echo 2; //el usuario ya existe
            }
        } else {
            echo 4; //Las contraseñas no son las mismas
        }



        break;

}