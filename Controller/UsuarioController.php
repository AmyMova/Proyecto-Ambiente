<?php
require_once '../Model/UsuarioModel.php';
require ('../view/assets/libs/phpMailer/PHPMailer.php');
require ('../view/assets/libs/phpMailer/Exception.php');
require ('../view/assets/libs/phpMailer/SMTP.php');
require_once '../Model/ErrorModel.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

switch ($_GET["op"]) {
    case 'ListarTablaUsuario':
        try {//lista todos los productos de la bd
            session_start();
            $IdUsuario = isset($_SESSION["IdUsuario"]) ? ($_SESSION["IdUsuario"]) : "";
            $usuario = new Usuario();
            $usuarios = $usuario->listarTodosDb();
            $data = array();
            foreach ($usuarios as $reg) {
                $data[] = array(
                    "0" => $reg->getIdUsuario(),
                    "1" => $reg->getNombreCompleto(),
                    "2" => $reg->getFechaCumpleanos(),
                    "3" => $reg->getRol(),
                    "4" => $reg->getNumeroTelefono(),
                    "5" => $reg->getNumeroCedula(),
                    "6" => '<button class="btn btn-warning" id="modificarUsuario"><i class="ti-pencil-alt"></i></button> | ' .
                        '<button class="btn btn-danger" onclick="Eliminar(\'' . $reg->getIdUsuario() . '\')"><i class="ti-trash"></i></button> ',
                    "7" => $reg->getIdRol(),
                    "8" => $reg->getCorreoElectronico(),
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
        } catch (Exception $e) {
            //Captura cualquier excepcion y muestra un mensaje 
            echo "Error inesperado. Por favor, intente nuevamente más tarde.";
            $error = new Errores();
            $error->setIdUsuario($IdUsuario);
            $error->setDescripcion($e->getMessage());
            $error->CrearErrorDB();
        }
        break;
    case 'AgregarUsuario':
        try {//lista todos los productos de la bd
            session_start();
            $IdUsuario = isset($_SESSION["IdUsuario"]) ? ($_SESSION["IdUsuario"]) : "";
            $NombreUsuario = isset($_POST["Nombre_Usuario"]) ? trim($_POST["Nombre_Usuario"]) : "";
            $ApellidoUsuario = isset($_POST["Apellido_Usuario"]) ? trim($_POST["Apellido_Usuario"]) : "";
            $NumeroCedula = isset($_POST["Numero_Cedula"]) ? trim($_POST["Numero_Cedula"]) : "";
            $CorreoElectronico = isset($_POST["Correo"]) ? trim($_POST["Correo"]) : "";
            $IdRol = isset($_POST["Id_Rol"]) ? trim($_POST["Id_Rol"]) : "";
            $AnoCumpleanos = isset($_POST["Ano_Cumpleanos"]) ? trim($_POST["Ano_Cumpleanos"]) : "";
            $MesCumpleanos = isset($_POST["Mes_Cumpleanos"]) ? trim($_POST["Mes_Cumpleanos"]) : "";
            $DiaCumpleanos = isset($_POST["Dia_Cumpleanos"]) ? trim($_POST["Dia_Cumpleanos"]) : "";
            $NumeroTelefono = isset($_POST["Telefono"]) ? trim($_POST["Telefono"]) : "";
            $Contrasenna = isset($_POST["Contrasena"]) ? trim($_POST["Contrasena"]) : "";


            $newImageName = "";
            if (isset($_FILES["Imagen_Usuario"]["name"])) {
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

                $subject = "Contraseña Temporal";
                $msg = "Hola " . $NombreUsuario . " Esta es tu contraseña: " . $Contrasenna . "\n !Recomendamos que cambies tu contraseña!";
                $receiver = $CorreoElectronico;
                $mailer = new PHPMailer();
                $mailer->isSMTP();
                $mailer->Host = "smtp.office365.com";
                $mailer->Port = 587;
                $mailer->SMTPSecure = "tls";
                $mailer->SMTPAuth = true;
                $mailer->Username = "Rosa.Anil@outlook.com";
                $mailer->Password = "RosayAnil2024";
                $mailer->setFrom("Rosa.Anil@outlook.com", "Administración");
                $mailer->addAddress($receiver, $NombreUsuario);
                $mailer->Subject = $subject;
                $mailer->msgHTML($msg);
                if (!$mailer->send()) {
                    echo $mailer->ErrorInfo;
                }
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

        } catch (Exception $e) {
            //Captura cualquier excepcion y muestra un mensaje 
            echo "Error inesperado. Por favor, intente nuevamente más tarde.";
            $error = new Errores();
            $error->setIdUsuario($IdUsuario);
            $error->setDescripcion($e->getMessage());
            $error->CrearErrorDB();
        }
        break;
    case 'EditarUsuario':
        try {//lista todos los productos de la bd
            session_start();
            $IdUsuario = isset($_SESSION["IdUsuario"]) ? ($_SESSION["IdUsuario"]) : "";
            $IdUsuario = isset($_POST["id"]) ? trim($_POST["id"]) : "";
            $NombreUsuario = isset($_POST["Nuevo_Nombre"]) ? trim($_POST["Nuevo_Nombre"]) : "";
            $ApellidoUsuario = isset($_POST["Nuevo_Apellido_Usuario"]) ? trim($_POST["Nuevo_Apellido_Usuario"]) : "";
            $NumeroCedula = isset($_POST["Nuevo_Numero_Cedula"]) ? trim($_POST["Nuevo_Numero_Cedula"]) : "";
            $CorreoElectronico = isset($_POST["Nuevo_Correo"]) ? trim($_POST["Nuevo_Correo"]) : "";
            $IdRol = isset($_POST["Nuevo_Rol"]) ? trim($_POST["Nuevo_Rol"]) : "";
            $AnoCumpleanos = isset($_POST["Nuevo_Ano_Cumpleanos"]) ? trim($_POST["Nuevo_Ano_Cumpleanos"]) : "";
            $MesCumpleanos = isset($_POST["Nuevo_Mes_Cumpleanos"]) ? trim($_POST["Nuevo_Mes_Cumpleanos"]) : "";
            $DiaCumpleanos = isset($_POST["Nuevo_Dia_Cumpleanos"]) ? trim($_POST["Nuevo_Dia_Cumpleanos"]) : "";
            $NumeroTelefono = isset($_POST["Nuevo_Numero_Telefono"]) ? trim($_POST["Nuevo_Numero_Telefono"]) : "";
            $Contrasenna = isset($_POST["Nueva_Contrasena"]) ? trim($_POST["Nueva_Contrasena"]) : "";

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

            if (empty($Contrasenna)) {
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
        } catch (Exception $e) {
            //Captura cualquier excepcion y muestra un mensaje 
            echo "Error inesperado. Por favor, intente nuevamente más tarde.";
            $error = new Errores();
            $error->setIdUsuario($IdUsuario);
            $error->setDescripcion($e->getMessage());
            $error->CrearErrorDB();
        }
        break;

    case 'EliminarUsuario':
        try {//lista todos los productos de la bd
            session_start();
            $IdUsuario = isset($_SESSION["IdUsuario"]) ? ($_SESSION["IdUsuario"]) : "";
            $usuario = new Usuario();
            $usuario->setIdUsuario(trim($_POST['IdUsuario']));
            $encontrado = $usuario->verificarExistenciaByIdDb();
            if ($encontrado == 1) {
                $rspta = $usuario->EliminarUsuario();
                $eliminado = $usuario->verificarExistenciaByIdDb();
                if ($eliminado == 0) {
                    echo 1;//Se elimino el producto
                } else {
                    echo 3;//No se pudo eliminar
                }
            } else {
                echo 2;//No se encontro el producto
            }

        } catch (Exception $e) {
            //Captura cualquier excepcion y muestra un mensaje 
            echo "Error inesperado. Por favor, intente nuevamente más tarde.";
            $error = new Errores();
            $error->setIdUsuario($IdUsuario);
            $error->setDescripcion($e->getMessage());
            $error->CrearErrorDB();
        }
        break;

}