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
                "Categoria" => $reg->getNombreCategoria(),
                "Opcion" => '<button class="btn btn-warning" id="modificarCategoria">Modificar</button>  ' .
                    '<button class="btn btn-danger" onclick="Eliminar(\'' . $reg->getIdCategoria() . '\')">Eliminar</button>'
                );
            }


        } else {
            // Handle the case where $catalogos is not an array or object
            // For example, log an error message or return an empty array
            error_log("Catalog data is not an array or object.");
            $data = array();
        }

        echo json_encode($data);
        break;
    case 'AgregarCategoria':
        $NombreCategoria = isset($_POST["Nombre_Categoria"]) ? trim($_POST["Nombre_Categoria"]) : "";

        $categoria = new Categoria();

        $categoria->setNombreCategoria($NombreCategoria);
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
        $NombreCategoria = isset($_POST["Nuevo_Nombre_Categoria"]) ? trim($_POST["Nuevo_Nombre_Categoria"]) : "";
        
        $categoria = new Categoria();

        $categoria->setIdCategoria($IdCategoria);
        $encontrado = $categoria->verificarExistenciaByIdDb();
        if ($encontrado == 1) {
            $categoria->llenarCampos($IdCategoria);

            $categoria->setNombreCategoria($NombreCategoria);
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