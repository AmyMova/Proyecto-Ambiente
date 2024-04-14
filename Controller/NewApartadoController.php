<?php
// Incluir el modelo de Apartado
require_once '../Model/NewApartadoModel.php';

// Verificar la operación solicitada
switch ($_GET["op"]) {
    case 'ListarTablaApartado':
        $apartadoModel = new NewApartadoModel();

        // Obtener todos los apartados
        $apartados = $apartadoModel->VerApartadosAdmin();

        // Verificar si se obtuvieron los apartados correctamente
        if ($apartados !== false) {
            $data = array();
            foreach ($apartados as $apartado) {
                $data[] = array(
                    "0" => $apartado->getIdApartado(),
                    "1" => $apartado->getValorTotal(),
                    "2" => $apartado->getProducto(),
                    "3" => $apartado->getCantidadTotal(),
                    "4" => $apartado->getPrecioTotal(),
                    "5" => $apartado->getDuracion(),
                    "6" => $apartado->getAporteUsuario(),
                    "7" => $apartado->getMetodoPago(),
                    "8" => $apartado->getNombreCliente(),
                    "9" => $apartado->getFechaApartado(),
                    "10" => $apartado->getCorreoCliente(),
                );
            }
            
            $resultados = array(
                "sEcho" => 1, // Información para datatables
                "iTotalRecords" => count($data), // Total de registros al datatable
                "iTotalDisplayRecords" => count($data), // Enviamos el total de registros a visualizar
                "aaData" => $data
            );
            echo json_encode($resultados);
        } else {
            // Error al obtener los apartados
            echo json_encode(array("error" => true, "message" => "Error al obtener los apartados."));
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
        $required_fields = ["valor_total", "Producto", "CantidadTotal", "PrecioTotal", "Duracion", "AporteUsuario", "MetodoPago", "NombreCliente", "FechaApartado", "CorreoCliente"];
        $missing_fields = [];
        foreach ($required_fields as $field) {
            if (!isset($_POST[$field]) || empty($_POST[$field])) {
                $missing_fields[] = $field;
            }
        }
        if (empty($missing_fields)) {
            // Obtener los datos del formulario
            $valor_total = $_POST["valor_total"];
            $Producto = $_POST["Producto"];
            $CantidadTotal = $_POST["CantidadTotal"];
            $PrecioTotal = $_POST["PrecioTotal"];
            $Duracion = $_POST["Duracion"];
            $AporteUsuario = $_POST["AporteUsuario"];
            $MetodoPago = $_POST["MetodoPago"];
            $NombreCliente = $_POST["NombreCliente"];
            $FechaApartado = $_POST["FechaApartado"];
            $CorreoCliente = $_POST["CorreoCliente"];

            // Crear una instancia del modelo de Apartado
            $apartadoModel = new NewApartadoModel();

            // Llamar al método para agregar un nuevo apartado
            $resultado = $apartadoModel->agregarApartado($valor_total, $Producto, $CantidadTotal, $PrecioTotal, $Duracion, $AporteUsuario, $MetodoPago, $NombreCliente, $FechaApartado, $CorreoCliente);

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
