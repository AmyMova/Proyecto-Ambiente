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
                "1" => $reg->getNombreCompleto(),
                "2" => $reg->getCorreoElectronico(),
                "3" => $reg->getFechaCumpleanos(),
                "4" => $reg->getRol(),
                "5" => $reg->getNumeroTelefono(),
                "6" => $reg->getNumeroCedula(),
                "7" => '<button class="btn btn-warning" id="modificarUsuario">Modificar</button> ' .
                    '<button class="btn btn-danger" onclick="Eliminar(\'' . $reg->getIdUsuario() . '\')">Eliminar</button> ' ,
                "8" => $reg->getIdRol(),
                "9" => $reg->getDiaCumpleanos(),
                "10" => $reg->getMesCumpleanos(),
                "11" => $reg->getAnoCumpleanos(),
                "12" => $reg->getApellidoUsuario(),
                "13" => $reg->getNombreUsuario(),
                "14" => $reg->getImagen()
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


        $newImageName = "";
        if (isset ($_FILES["Imagen_Usuario"]["name"])) {
            $imagenName = $_FILES["Imagen_Usuario"]["name"];
            $tmpName = $_FILES["Imagen_Usuario"]["tmp_name"];

            $validImageExtension = ['jpeg', 'jpg', 'png'];
            $imageExtension = explode('.', $imagenName);

            $name = $imageExtension[0];
            $imageExtension = strtolower(end($imageExtension));

            if (!in_array($imageExtension, $validImageExtension)) {

                $newImageName = "sinPerfil.png";

            } else {
                $newImageName = $name . "-" . uniqid() . '.' . $imageExtension;

            }

        }

        $usuario = new Usuario();

        $usuario->setNumeroCedula($NumeroCedula);
        $encontrado = $usuario->verificarExistenciaDb();
        if ($encontrado == 0) {
            $usuario->setApellidoUsuario($ApellidoUsuario);
            $usuario->setNombreUsuario($NombreUsuario);
            $usuario->setImagen($newImageName);
            $usuario->setCorreoElectronico($CorreoElectronico);
            $usuario->setIdRol($IdRol);
            $usuario->setContrasenna($Contrasenna);
            $usuario->setAnoCumpleanos($AnoCumpleanos);
            $usuario->setMesCumpleanos($MesCumpleanos);
            $usuario->setDiaCumpleanos($DiaCumpleanos);
            $usuario->setNumeroTelefono($NumeroTelefono);
            $usuario->guardarEnDb();
            move_uploaded_file($tmpName, '../view/assets/img/' . $newImageName);
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
        $Contrasenna = isset ($_POST["Nueva_Contrasena"]) ? trim($_POST["Nueva_Contrasena"]) : "";

        $newImageName = "";
        if (!empty($_FILES["Nueva_Imagen_Usuario"]["name"])) {
            $imagenName = $_FILES["Nueva_Imagen_Usuario"]["name"];
            $tmpName = $_FILES["Nueva_Imagen_Usuario"]["tmp_name"];
    
            // Validar el tipo de archivo y el tamaño de la imagen
            $validImageExtensions = ['jpeg', 'jpg', 'png'];
            $imageExtension = strtolower(pathinfo($imagenName, PATHINFO_EXTENSION));
    
            if (!in_array($imageExtension, $validImageExtensions) || $_FILES["Nueva_Imagen_Usuario"]["size"] > 5000000) { // 5MB límite de tamaño
                echo "Error: La imagen debe ser en formato JPEG, JPG o PNG y no debe exceder los 5MB de tamaño.";
                exit;
            }
    
            // Generar un nuevo nombre único para la imagen
            $newImageName = $imagenName . "-" . uniqid() . '.' . $imageExtension;
        }
        
        if (empty ($Contrasenna)) {
            $Contrasenna = "";
        }


        $usuario = new Usuario();

        $usuario->setIdUsuario($IdUsuario);
        $encontrado = $usuario->verificarExistenciaByIdDb();
        if ($encontrado == 1) {
            $usuario->llenarCampos($IdUsuario);
            $usuario->setNombreUsuario($NombreUsuario);
            $usuario->setApellidoUsuario($ApellidoUsuario);
            $usuario->setNumeroCedula($NumeroCedula);
            $usuario->setContrasenna($Contrasenna);
            $usuario->setCorreoElectronico(strtolower($CorreoElectronico));
            $usuario->setIdRol($IdRol);
            $usuario->setAnoCumpleanos($AnoCumpleanos);
            $usuario->setMesCumpleanos($MesCumpleanos);
            $usuario->setDiaCumpleanos($DiaCumpleanos);
            $usuario->setNumeroTelefono($NumeroTelefono);
            $usuario->setImagen($newImageName);
            $modificados = $usuario->EditarUsuario();

            if ($modificados > 0) {
                if (!empty($newImageName)) {
                if (!move_uploaded_file($tmpName, '../view/assets/img/' . $newImageName)) {
                    echo "Error al subir la imagen.";
                    exit;
                }
            }
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