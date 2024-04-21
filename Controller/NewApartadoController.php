<?php
// Incluir el modelo de Apartado
require_once '../Model/NewApartadoModel.php';

// Verificar la operación solicitada
switch ($_GET["op"]) {
    case 'ListarTablaApartado':
        try {
            // Recupera la sesión y el ID de usuario (si lo necesitas)
            session_start();
            $IdUsuario = isset($_SESSION["IdUsuario"]) ? $_SESSION["IdUsuario"] : "";
            
            // Instancia del modelo NewApartadoModel
            $apartado = new NewApartadoModel();
            
            // Obtener todos los apartados de la base de datos
            $apartados = $apartado->VerApartadosAdmin();
            
            // Inicializa el arreglo que contendrá los datos de la tabla
            $data = array();
            
            // Procesa cada apartado y agrega sus datos al arreglo
            foreach ($apartados as $reg) {
                $data[] = array(
                    "0" => $reg->getIdApartado(),
                    "1" => $reg->getIdUsuario(),
                    "2" => $reg->getVendedor(),
                    "3" => $reg->getProducto(),
                    "4" => $reg->getFechaCreacion(),
                    "5" => $reg->getPrecioTotal(),
                    "6" => $reg->getFechaPago1(),
                    "7" => $reg->getSaldoPendiente(),
                    "8" => $reg->getSaldoCancelado(),
                    // Puedes añadir acciones de edición y eliminación si lo deseas:
                    "9" => '<button class="btn btn-warning" onclick="VER MÁS(' . $reg->getIdApartado() . ')">VER MÁS</button>  '
                );
            }
            
            // Prepara la respuesta para DataTables
            $resultados = array(
                "sEcho" => 1, // Información para DataTables
                "iTotalRecords" => count($data), // Total de registros
                "iTotalDisplayRecords" => count($data), // Total de registros a mostrar
                "aaData" => $data // Datos en sí
            );
            
            // Envía la respuesta como JSON
            echo json_encode($resultados);
        } catch (Exception $e) {
            // Captura cualquier excepción y muestra un mensaje
            echo "Error inesperado. Por favor, intente nuevamente más tarde.";
            $error = new Errores();
            $error->setIdUsuario($IdUsuario);
            $error->setDescripcion($e->getMessage());
            $error->CrearErrorDB();
        }
        break;
    
    

    case 'EliminarApartado':
        // Obtener el ID del apartado a eliminar
        $idApartado = isset($_POST["idApartado"]) ? $_POST["idApartado"] : "";
        if (!empty($idApartado)) {
            $apartadoModel = new NewApartadoModel();
            // Llamar al método para eliminar el apartado
            $resultado = $apartadoModel->eliminarApartado($idApartado);
            if ($resultado) {
                echo json_encode(array("success" => true, "message" => "Apartado eliminado correctamente."));
            } else {
                echo json_encode(array("success" => false, "message" => "Hubo un error al eliminar el apartado."));
            }
        } else {
            echo json_encode(array("success" => false, "message" => "ID de apartado no válido."));
        }
        break;

        case 'AgregarApartado':
            // Verificar si se enviaron todos los datos necesarios y que no están vacíos
            $required_fields = ["IdUsuario", "Vendedor", "Producto", "FechaCreacion", "PrecioTotal", "FechaPago1", "FechaPago2", "FechaPago3", "Notificacion1", "Notificacion2", "Notificacion3", "Pago1", "Pago2", "Pago3", "SaldoPendiente", "SaldoCancelado"];
            $missing_fields = [];
            foreach ($required_fields as $field) {
                if (!isset($_POST[$field]) || empty($_POST[$field])) {
                    $missing_fields[] = $field;
                }
            }
            if (empty($missing_fields)) {
                // Obtener los datos del formulario
                $IdUsuario = $_POST["IdUsuario"];
                $Vendedor = $_POST["Vendedor"];
                $Producto = $_POST["Producto"];
                $FechaCreacion = $_POST["FechaCreacion"];
                $PrecioTotal = $_POST["PrecioTotal"];
                $FechaPago1 = $_POST["FechaPago1"];
                $FechaPago2 = $_POST["FechaPago2"];
                $FechaPago3 = $_POST["FechaPago3"];
                $Notificacion1 = $_POST["Notificacion1"];
                $Notificacion2 = $_POST["Notificacion2"];
                $Notificacion3 = $_POST["Notificacion3"];
                $Pago1 = $_POST["Pago1"];
                $Pago2 = $_POST["Pago2"];
                $Pago3 = $_POST["Pago3"];
                $SaldoPendiente = $_POST["SaldoPendiente"];
                $SaldoCancelado = $_POST["SaldoCancelado"];
        
                // Crear una instancia del modelo de Apartado
                $apartadoModel = new NewApartadoModel();
        
                // Llamar al método para agregar un nuevo apartado
                $resultado = $apartadoModel->agregarApartado($IdUsuario, $Vendedor, $Producto, $FechaCreacion, $PrecioTotal, $FechaPago1, $FechaPago2, $FechaPago3, $Notificacion1, $Notificacion2, $Notificacion3, $Pago1, $Pago2, $Pago3, $SaldoPendiente, $SaldoCancelado);
        
                if ($resultado === true) {
                    // El apartado se agregó correctamente
                    echo json_encode(array("success" => true, "message" => "El apartado se agregó correctamente."));
                } else {
                    // Hubo un error al agregar el apartado
                    echo json_encode(array("success" => false, "message" => $resultado)); // Enviar el mensaje de error devuelto por el modelo
                }
            } else {
                // No se enviaron todos los datos necesarios o algunos están vacíos
                echo json_encode(array("success" => false, "message" => "Faltan campos obligatorios: " . implode(", ", $missing_fields)));
            }
            break;

        case 'DatosParaGrafico':
            $apartadoModel = new NewApartadoModel();
            $datos = $apartadoModel->obtenerDatosParaGrafico();
            
            if ($datos !== false) {
                echo json_encode($datos);
            } else {
                echo json_encode(array("error" => true, "message" => "Error al obtener los datos para el gráfico."));
            }
            break;
            

            case 'VentasDiarias':
                $apartadoModel = new NewApartadoModel();
                $datos = $apartadoModel->obtenerVentasDiarias();
            
                if ($datos !== false) {
                    echo json_encode($datos);
                } else {
                    echo json_encode(array("error" => true, "message" => "Error al obtener los datos de ventas diarias."));
                }
                break;
            
}
?>
