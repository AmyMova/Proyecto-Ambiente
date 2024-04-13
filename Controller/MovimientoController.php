<?php
require_once '../Model/MovimientoModel.php';

switch ($_GET["op"]) {
    case 'ListarTablaMovimientos':
        $movimiento = new Movimiento();
        $movimientos = $movimiento->VerMovimientosDB();
        $data = array();
        foreach ($movimientos as $reg) {
            $data[] = array(
                "0" => $reg->getIdMovimiento(),
                "1" => $reg->getDescripcion(),
                "2" => $reg->getProducto(),
                "3" => $reg->getUsuario(),
                "4" => $reg->getFecha(),
                "5" => $reg->getAccion(),
                "6" => '<button class="btn btn-info" id="VerMás">Ver Más</button> ' ,
                "7" => $reg->getIdProducto()
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
    
    case 'VerMovimiento':
        $IdMovimiento = isset ($_POST["id"]) ? trim($_POST["id"]) : "";
        $Descripcion = isset ($_POST["Descripcion"]) ? trim($_POST["Descripcion"]) : "";
        $Usuario = isset ($_POST["Usuario"]) ? trim($_POST["Usuario"]) : "";
        $Accion = isset ($_POST["Accion"]) ? trim($_POST["Accion"]) : "";
        $Producto = isset ($_POST["Producto"]) ? trim($_POST["Producto"]) : "";
        $Fecha = isset ($_POST["Fecha"]) ? trim($_POST["Fecha"]) : "";
        
        

        $movimiento = new Movimiento();

        $movimiento->setIdMovimiento($IdMovimiento);
        $encontrado = $movimiento->verificarExistenciaByIDDb();
        if ($encontrado == 1) {
            $movimiento->llenarCampos($IdMovimiento);

            $movimiento->setDescripcion($Descripcion);
            $movimiento->setUsuario($Usuario);
            $movimiento->setAccion($Accion);
            $movimiento->setProducto($Producto);
            $movimiento->setFecha($Fecha);
            
        } else {
            echo 2;
        }
        break;
    

}