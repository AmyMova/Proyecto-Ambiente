<?php
require_once '../Model/CategoriaModel.php';

switch ($_GET["op"]) {
    case 'ListarCategoria':
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
        break;
    case 'AgregarCategoria':
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

        break;
    case 'EditarCategoria':
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
        break;

    case 'EliminarCategoria':
        $categoria = new Categoria();
        $categoria->setIdCategoria(trim($_POST['IdCategoria']));
        $encontrado = $categoria->verificarExistenciaByIDDb();
        if ($encontrado == 1) {
            $rspta = $categoria->EliminarCategoria();
        } else {
            $rspta = "No encontrado";
        }

        echo $rspta;

}