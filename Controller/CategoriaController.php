<?php
require_once '../Model/CategoriaModel.php';
require_once '../Model/ErrorModel.php';
switch ($_GET["op"]) {

    case 'ListarCategoria':
        try {
            session_start();
            $IdUsuario = isset($_SESSION["IdUsuario"]) ? ($_SESSION["IdUsuario"]) : "";
            $categoria = new Categoria();
            $categorias = $categoria->listarTodosDb();
            $data = array();

            if (is_array($categorias) || is_object($categorias)) {
                foreach ($categorias as $reg) {
                    $data[] = array(
                        "IdCategoria" => $reg->getIdCategoria(),
                        "Categoria" => $reg->getCategoria(),
                        "OpcionCategoria" => '<button class="btn btn-warning" id="modificarCategoria"><i class="ti-pencil-alt"></i></button> | ' .
                            '<button class="btn btn-danger" onclick="EliminarCategoria(\'' . $reg->getIdCategoria() . '\')"><i class="ti-trash"></i></button>'
                    );
                }


            } else {
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
    case 'AgregarCategoria':
        try {
            session_start();
            $IdUsuario = isset($_SESSION["IdUsuario"]) ? ($_SESSION["IdUsuario"]) : "";
            $Categoria = isset($_POST["Nombre_Categoria"]) ? trim($_POST["Nombre_Categoria"]) : "";

            $categoria = new Categoria();

            $categoria->setCategoria($Categoria);
            $encontrado = $categoria->verificarExistenciaDb();
            if ($encontrado == 0) {

                $categoria->guardarEnDb();

                if ($categoria->verificarExistenciaDb()) {
                    echo 1; //categoria registrado 
                    //  echo 4; //categoria registrado y envio de correo fallido
                    //}
                } else {
                    echo 3; //Fallo al realizar el registro
                }
            } else {
                echo 2; //el categoria ya existe
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
    case 'EditarCategoria':
        try {
            session_start();
            $IdUsuario = isset($_SESSION["IdUsuario"]) ? ($_SESSION["IdUsuario"]) : "";
            $IdCategoria = isset($_POST["id"]) ? trim($_POST["id"]) : "";
            $Categoria = isset($_POST["Nuevo_Nombre_Categoria"]) ? trim($_POST["Nuevo_Nombre_Categoria"]) : "";

            $categoria = new Categoria();

            $categoria->setIdCategoria($IdCategoria);
            $encontrado = $categoria->verificarExistenciaByIdDb();
            if ($encontrado == 1) {
                $categoria->llenarCampos($IdCategoria);

                $categoria->setCategoria($Categoria);
                $categoria->setIdCategoria($IdCategoria);
                $modificados = $categoria->actualizarCategoria();
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

    case 'EliminarCategoria':
        try {
            session_start();
            $IdUsuario = isset($_SESSION["IdUsuario"]) ? ($_SESSION["IdUsuario"]) : "";
            $categoria = new Categoria();
            $categoria->setIdCategoria(trim($_POST['IdCategoria']));
            $encontrado = $categoria->verificarExistenciaByIDDb();
            if ($encontrado == 1) {
                $categoria->EliminarCategoria();
                $encontrado = $categoria->verificarExistenciaByIDDb();
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