<?php
require_once '../Model/NewApartadoModel.php';

switch ($_GET["op"]) {
    case 'AgregarApartado':
        // Verificar si se han enviado todos los datos necesarios y que no están vacíos
        if (
            isset($_POST["valor_total"]) && isset($_POST["Producto"]) && isset($_POST["CantidadTotal"]) &&
            isset($_POST["PrecioTotal"]) && isset($_POST["Duracion"]) && isset($_POST["AporteUsuario"]) &&
            isset($_POST["MetodoPago"]) && !empty($_POST["valor_total"]) && !empty($_POST["Producto"]) &&
            !empty($_POST["CantidadTotal"]) && !empty($_POST["PrecioTotal"]) && !empty($_POST["Duracion"]) &&
            !empty($_POST["AporteUsuario"]) && !empty($_POST["MetodoPago"])
        ) {
            // Obtener los datos del formulario
            $valor_total = $_POST["valor_total"];
            $Producto = $_POST["Producto"];
            $CantidadTotal = $_POST["CantidadTotal"];
            $PrecioTotal = $_POST["PrecioTotal"];
            $Duracion = $_POST["Duracion"];
            $AporteUsuario = $_POST["AporteUsuario"];
            $MetodoPago = $_POST["MetodoPago"];

            // Crear una instancia del modelo de Apartado
            $apartadoModel = new NewApartadoModel();

            // Llamar al método para agregar un nuevo apartado
            $resultado = $apartadoModel->agregarApartado($valor_total, $Producto, $CantidadTotal, $PrecioTotal, $Duracion, $AporteUsuario, $MetodoPago);

            if ($resultado) {
                // El apartado se agregó correctamente
                echo json_encode(array("success" => true, "message" => "El apartado se agregó correctamente."));
            } else {
                // Hubo un error al agregar el apartado
                echo json_encode(array("success" => false, "message" => "Hubo un error al agregar el apartado."));
            }
        } else {
            // No se enviaron todos los datos necesarios o algunos están vacíos
            echo json_encode(array("success" => false, "message" => "No se enviaron todos los datos necesarios para agregar el apartado o algunos están vacíos."));
        }
        break;
}

?>
