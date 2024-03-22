<?php
require_once '../Model/MarcaModel.php';

switch ($_GET["op"]) {
    case 'ListarMarca':
        $marca = new Marca();
        $marcas = $marca->listarTodosDb();
        $data = array();

        if (is_array($marcas) || is_object($marcas)) {
            foreach ($marcas as $reg) {
            $data[] = array(
                "IdMarca" => $reg->getIdMarca(),
                "Marca" => $reg->getMarca(),
                "Opcion" => '<button class="btn btn-warning" id="modificarMarca">Modificar</button>  ' .
                    '<button class="btn btn-danger" onclick="Eliminar(\'' . $reg->getIdMarca() . '\')">Eliminar</button>'
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
    case 'AgregarMarca':
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

        break;
    case 'EditarMarca':
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
        break;
        
    case 'EliminarMarca':
        $marca = new Marca();
        $marca->setIdMarca(trim($_POST['IdMarca']));
        $encontrado = $marca->verificarExistenciaByIDDb();
        if ($encontrado == 1) {
            $rspta = $marca->EliminarMarca();
        } else {
            $rspta = "No encontrado";
        }

        echo $rspta;

}