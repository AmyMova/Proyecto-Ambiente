<?php
require_once '../Model/UsuarioModel.php';

switch ($_GET["op"]) {
    case 'ListarTablaUsuario':
        $usuario = new Usuario();
        $usuarios = $usuario->listarTodosDb();
        $data = array();
        foreach ($usuarios as $reg) {
            $data[] = array(
                "0" => $reg->getIdUsuario(),
                "1" => $reg->getNombreUsuario(),
                "6" => $reg->getNumeroTelefono(),
                "3" => $reg->getCorreoElectronico(),
                "4" => $reg->getFechaCumpleanos(),
                "5" => $reg->getNombreRol(),
                "2" => $reg->getApellidoUsuario(),
                "7" => $reg->getNumeroCedula(),
                "8" => '<button class="btn btn-warning" id="modificarUsuario">Modificar</button> ' .
                    '<button class="btn btn-danger" onclick="Eliminar(\'' . $reg->getIdUsuario() . '\')">Eliminar</button>'.
                    '<button class="btn btn-warning" id="modificarContrasena">Modificar Contrasena</button> ' ,
                "9" => $reg->getIdRol(),
                "10" => $reg->getDiaCumpleanos(),
                "11" => $reg->getMesCumpleanos(),
                "12" => $reg->getAnoCumpleanos()
            );
        }
        $resultados = array(
            "sEcho" => 1, ##informacion para datatables
            "iTotalRecords" => count($data), ## total de registros al datatable
            "iTotalDisplayRecords" => count($data), ## enviamos el total de registros a visualizar
            "aaData" => $data
        );
        echo json_encode($resultados);
        break;
    case 'AgregarUsuario':
        $NombreUsuario = isset ($_POST["nombre_Usuario"]) ? trim($_POST["nombre_Usuario"]) : "";
        $ApellidoUsuario = isset ($_POST["Apellido_Usuario"]) ? trim($_POST["Apellido_Usuario"]) : "";
        $NumeroCedula = isset ($_POST["Numero_Cedula"]) ? trim($_POST["Numero_Cedula"]) : "";
        $CorreoElectronico = isset ($_POST["Correo"]) ? trim($_POST["Correo"]) : "";
        $IdRol = isset ($_POST["Id_Rol"]) ? trim($_POST["Id_Rol"]) : "";
        $AnoCumpleanos = isset ($_POST["Ano_Cumpleanos"]) ? trim($_POST["Ano_Cumpleanos"]) : "";
        $MesCumpleanos = isset ($_POST["Mes_Cumpleanos"]) ? trim($_POST["Mes_Cumpleanos"]) : "";
        $DiaCumpleanos = isset ($_POST["Dia_Cumpleanos"]) ? trim($_POST["Dia_Cumpleanos"]) : "";
        $NumeroTelefono = isset ($_POST["Telefono"]) ? trim($_POST["Telefono"]) : "";
        $Contrasenna = isset ($_POST["Contrasena"]) ? trim($_POST["Contrasena"]) : "";
        $usuario = new Usuario();

        $usuario->setNumeroCedula($NumeroCedula);
        $encontrado = $usuario->verificarExistenciaDb();
        if ($encontrado == 0) {
            $usuario->setApellidoUsuario($ApellidoUsuario);
            $usuario->setNombreUsuario($NombreUsuario);
            $usuario->setCorreoElectronico($CorreoElectronico);
            $usuario->setIdRol($IdRol);
            $usuario->setContrasenna($Contrasenna);
            $usuario->setAnoCumpleanos($AnoCumpleanos);
            $usuario->setMesCumpleanos($MesCumpleanos);
            $usuario->setDiaCumpleanos($DiaCumpleanos);
            $usuario->setNumeroTelefono($NumeroTelefono);
            $usuario->guardarEnDb();

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

        break;
    case 'EditarUsuario':
        $IdUsuario = isset ($_POST["id"]) ? trim($_POST["id"]) : "";
        $NombreUsuario = isset ($_POST["Nuevo_Nombre"]) ? trim($_POST["Nuevo_Nombre"]) : "";
        $ApellidoUsuario = isset ($_POST["Nuevo_Apellido_Usuario"]) ? trim($_POST["Nuevo_Apellido_Usuario"]) : "";
        $NumeroCedula = isset ($_POST["Nuevo_Numero_Cedula"]) ? trim($_POST["Nuevo_Numero_Cedula"]) : "";
        $CorreoElectronico = isset ($_POST["Nuevo_Correo"]) ? trim($_POST["Nuevo_Correo"]) : "";
        $IdRol = isset ($_POST["Nuevo_Rol"]) ? trim($_POST["Nuevo_Rol"]) : "";
        $AnoCumpleanos = isset ($_POST["Nuevo_Ano_Cumpleanos"]) ? trim($_POST["Nuevo_Ano_Cumpleanos"]) : "";
        $MesCumpleanos = isset ($_POST["Nuevo_Mes_Cumpleanos"]) ? trim($_POST["Nuevo_Mes_Cumpleanos"]) : "";
        $DiaCumpleanos = isset ($_POST["Nuevo_Dia_Cumpleanos"]) ? trim($_POST["Nuevo_Dia_Cumpleanos"]) : "";
        $NumeroTelefono = isset ($_POST["Nuevo_Numero_Telefono"]) ? trim($_POST["Nuevo_Numero_Telefono"]) : "";


        $usuario = new Usuario();


        $usuario->setIdUsuario($IdUsuario);
        $encontrado = $usuario->verificarExistenciaByIdDb();
        if ($encontrado == 1) {
            $usuario->llenarCampos($IdUsuario);
            $usuario->setNombreUsuario($NombreUsuario);
            $usuario->setApellidoUsuario($ApellidoUsuario);
            $usuario->setNumeroCedula($NumeroCedula);
            $usuario->setCorreoElectronico($CorreoElectronico);
            $usuario->setIdRol($IdRol);
            $usuario->setAnoCumpleanos($AnoCumpleanos);
            $usuario->setMesCumpleanos($MesCumpleanos);
            $usuario->setDiaCumpleanos($DiaCumpleanos);
            $usuario->setNumeroTelefono($NumeroTelefono);
            $usuario->setIdUsuario($IdUsuario);
            $modificados = $usuario->EditarUsuario();
            if ($modificados > 0) {
                echo 1;
            } else {
                echo 0;
            }
        } else {
            echo 2;
        }
        break;
        case 'CContrasena':
            $IdUsuario = isset($_POST["ID"]) ? trim($_POST["ID"]) : "";
            $CorreoElectronico = isset($_POST["CorreoElectronico"]) ? trim($_POST["CorreoElectronico"]) : "";
            $Contrasenna = isset($_POST["Contra"]) ? trim($_POST["Contra"]) : "";
        
            $usuario = new Usuario();
        
            $usuario->setIdUsuario($IdUsuario);
            $encontrado = $usuario->verificarExistenciaByIdDb();
            if ($encontrado == 1) {
                $usuario->llenarCampos($IdUsuario);
                echo "Datos obtenidos de la base de datos: " . json_encode($usuario); // Agregar este echo
                $usuario->setCorreoElectronico($CorreoElectronico);
                $usuario->setContrasenna($Contrasenna);
        
                $usuario->setIdUsuario($IdUsuario);
                $modificados = $usuario->EditarContrasenaUsuario();
                if ($modificados > 0) {
                    echo 1;
                } else {
                    echo 0;
                }
            } else {
                echo 2;
            }
            break;
        

    case 'EliminarUsuario':
        $usuario = new Usuario();
        $usuario->setIdUsuario(trim($_POST['IdUsuario']));
        $encontrado = $usuario->verificarExistenciaByIdDb();
        if ($encontrado == 1) {
            $rspta = $usuario->EliminarUsuario();
        } else {
            $rspta = "No encontrado";
        }

        echo $rspta;

}