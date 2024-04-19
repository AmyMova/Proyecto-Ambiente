<?php
require_once '../Model/MarcaModel.php';
require_once '../Model/ErrorModel.php';
switch ($_GET["op"]) {
    case 'ListarMarca':
        try {
            session_start();
            $IdUsuario = isset($_SESSION["IdUsuario"]) ? ($_SESSION["IdUsuario"]) : "";
            $marca = new Marca();
            $marcas = $marca->listarTodosDb();
            $data = array();

            if (is_array($marcas) || is_object($marcas)) {
                foreach ($marcas as $reg) {
                    $data[] = array(
                        "IdMarca" => $reg->getIdMarca(),
                        "Marca" => $reg->getMarca(),
                        "OpcionMarca" => '<button class="btn btn-warning" id="modificarMarca"><i class="ti-pencil-alt"></i></button> | ' .
                            '<button class="btn btn-danger" onclick="EliminarMarca(\'' . $reg->getIdMarca() . '\',event)"><i class="ti-trash"></i></button>'
                    );
                }


            } else {
                // Handle the case where $catalogos is not an array or object
                // For example, log an error message or return an empty array
                error_log("Catalog data is not an array or object.");
                $data = array();
            }

            echo json_encode($data);
        } catch (Exception $e) {
            //Captura cualquier excepcion y muestra un mensaje 
            echo "Error inesperado. Por favor, intente nuevamente más tarde.";
            $error = new Errores();
            $error->setIdUsuario($IdUsuario);
            $error->setDescripcion($e->getMessage());
            $error->CrearErrorDB();
        }
        break;
    case 'AgregarMarca':
        try {
            session_start();
            $IdUsuario = isset($_SESSION["IdUsuario"]) ? ($_SESSION["IdUsuario"]) : "";
            $Marca = isset($_POST["Nombre_Marca"]) ? trim($_POST["Nombre_Marca"]) : "";

            $marca = new Marca();

            $marca->setMarca($Marca);
            $encontrado = $marca->verificarExistenciaDb();
            if ($encontrado == 0) {

                $marca->guardarEnDb();

                if ($marca->verificarExistenciaDb()) {
                    echo 1; //marca registrado 
                    //  echo 4; //marca registrado y envio de correo fallido
                    //}
                } else {
                    echo 3; //Fallo al realizar el registro
                }
            } else {
                echo 2; //el marca ya existe
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
    case 'EditarMarca':
        try {
            session_start();
            $IdUsuario = isset($_SESSION["IdUsuario"]) ? ($_SESSION["IdUsuario"]) : "";
            $IdMarca = isset($_POST["id"]) ? trim($_POST["id"]) : "";
            $Marca = isset($_POST["Nuevo_Nombre_Marca"]) ? trim($_POST["Nuevo_Nombre_Marca"]) : "";

            $marca = new Marca();

            $marca->setIdMarca($IdMarca);
            $encontrado = $marca->verificarExistenciaByIdDb();
            if ($encontrado == 1) {
                $marca->llenarCampos($IdMarca);

                $marca->setMarca($Marca);
                $marca->setIdMarca($IdMarca);
                $modificados = $marca->actualizarMarca();
                if ($modificados > 0) {
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

    case 'EliminarMarca':
        try {
            session_start();
            $IdUsuario = isset($_SESSION["IdUsuario"]) ? ($_SESSION["IdUsuario"]) : "";
            $marca = new Marca();
            $marca->setIdMarca(trim($_POST['IdMarca']));
            $encontrado = $marca->verificarExistenciaByIDDb();
            if ($encontrado == 1) {
                $marca->EliminarMarca();
                $eliminado = $marca->verificarExistenciaByIDDb();
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