<?php
require_once '../Model/RolModel.php';

switch ($_GET["op"]) {
    case 'ListarRol':
        $rol = new Rol();
        $rols = $rol->listarTodosDb();
        $data = array();

        if (is_array($rols) || is_object($rols)) {
            foreach ($rols as $reg) {
            $data[] = array(
                "IdRol" => $reg->getIdRol(),
                "Rol" => $reg->getRol(),
                "Opcion" => '<button class="btn btn-warning" id="modificarRol">Modificar</button>  ' .
                    '<button class="btn btn-danger" onclick="Eliminar(\'' . $reg->getIdRol() . '\')">Eliminar</button>'
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
}