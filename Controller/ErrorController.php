<?php
require_once '../Model/ErrorModel.php';

switch ($_GET["op"]) {
    case 'ListarTablaError':
        $error = new Errores();
        $errores = $error->VerErroresDB();
        $data = array();
        foreach ($errores as $reg) {
            $data[] = array(
                "0" => $reg->getIdError(),
                "1" => $reg->getDescripcion(),
                "2" => $reg->getUsuario(),
                "3" => $reg->getFecha(),
                "4" => '<button class=" btn waves-effect waves-light btn-info" id="VerMasError">Ver Más</i></button>' ,
                "5" => $reg->getIdUsuario()
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
    
    case 'EditarError':
        $IdError = isset($_POST["id"]) ? trim($_POST["id"]) : "";
        $Descripcion = isset($_POST["Nueva_Descripcion"]) ? trim($_POST["Nueva_Descripcion"]) : "";
        $Usuario = isset($_POST["Usuario"]) ? trim($_POST["Usuario"]) : "";
        $Fecha = isset($_POST["Fecha"]) ? trim($_POST["Fecha"]) : "";

        //Verificacion de imagen en el campo nuevaImagen
        
        $error = new Errores();
        $error->setIdError($IdError);
        $encontrado = $error->verificarExistenciaByIDDb();
        if ($encontrado == 1) {
            $error->llenarCampos($IdError);
            $error->setDescripcion($Descripcion);
            $error->setUsuario($Usuario);
            $error->setFecha($Fecha);
            $error->setIdError($IdError);
            
        } else {
            echo 2;
        }
        break;
}
