<?php
require_once '../Model/FacturaModel.php';
require_once '../Model/ErrorModel.php';
switch ($_GET["op"]) {
    case 'ListarTablaFacturaAdmin':
        try {//lista todos los productos de la bd
            session_start();
            $IdUsuario = isset($_SESSION["IdUsuario"]) ? ($_SESSION["IdUsuario"]) : "";
            $factura = new Factura();
            $facturas = $factura->VerFacturasAdmin();
            $data = array();
            foreach ($facturas as $reg) {
                $data[] = array(
                    "0" => $reg->getIdFactura(),
                    "1" => $reg->getNombreCompleto(),
                    "2" => $reg->getVendedor(),
                    "3" => $reg->getFecha(),
                    "4" => $reg->getPrecioTotal(),
                    "5" => '<button class="btn waves-effect waves-light  btn-warning" id="VerDetalleFactura">Ver Más</button>'

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
    case 'ListarTablaFacturaVendedor':
        try {//lista todos los productos de la bd
            session_start();
            $IdUsuario = isset($_SESSION["IdUsuario"]) ? ($_SESSION["IdUsuario"]) : "";
            $vendedor = isset($_SESSION["NombreUsuario"]) ? ($_SESSION["NombreUsuario"]) : "";
            $factura = new Factura();
            $factura->setVendedor($vendedor);
            $facturas = $factura->VerFacturasVendedor($vendedor);
            $data = array();
            foreach ($facturas as $reg) {
                $data[] = array(
                    "0" => $reg->getIdFactura(),
                    "1" => $reg->getNombreCompleto(),
                    "2" => $reg->getVendedor(),
                    "3" => $reg->getFecha(),
                    "4" => $reg->getPrecioTotal(),
                    "5" => '<button class="btn waves-effect waves-light  btn-warning" id="VerFactura">Ver Más</button>'
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
    case 'ListarTablaFacturaCliente':
        try {//lista todos los productos de la bd
            session_start();
            $id = isset($_SESSION["IdUsuario"]) ? ($_SESSION["IdUsuario"]) : "";
            $factura = new Factura();
            $factura->setIdUsuario($id);
            $facturas = $factura->VerFacturasCliente($id);
            $data = array();
            foreach ($facturas as $reg) {
                $data[] = array(
                    "0" => $reg->getIdFactura(),
                    "1" => $reg->getNombreCompleto(),
                    "2" => $reg->getVendedor(),
                    "3" => $reg->getFecha(),
                    "4" => $reg->getPrecioTotal(),
                    "5" => '<button class="btn waves-effect waves-light  btn-warning" id="VerFactura">Ver Más</button>'
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
    

}