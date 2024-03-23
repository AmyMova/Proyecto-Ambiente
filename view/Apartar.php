<?php
require_once '../Controller/ApartadoController.php';

// Verificar si se recibió el total del carrito como parámetro en la URL
$total = isset($_GET['total']) ? $_GET['total'] : '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Apartado</title>
    <!-- Incluir SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        // Función para calcular el aporte del usuario
        function calcularAporte() {
            var valorTotal = parseFloat(document.getElementById("valor_total").value);
            var duracion = document.getElementById("duracion").value;
            var porcentaje;

            switch (duracion) {
                case "3 meses":
                    porcentaje = 40;
                    break;
                case "1 mes":
                    porcentaje = 20;
                    break;
                case "1 semana":
                    porcentaje = 10;
                    break;
                default:
                    porcentaje = 0;
                    break;
            }

            var aporteMinimo = (valorTotal * porcentaje) / 100;
            document.getElementById("aporte_usuario").value = aporteMinimo.toFixed(2);
        }

        // Función para verificar el pago
        function pagar() {
            var aporteUsuario = parseFloat(document.getElementById("aporte_usuario").value);
            var valorMinimo = parseFloat(document.getElementById("valor_minimo").value);

            if (aporteUsuario >= valorMinimo) {
                // Pago realizado correctamente
                Swal.fire("Pago realizado correctamente");
            } else {
                // Cantidad incorrecta
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Cantidad incorrecta"
                });
            }
        }

        // Función para enviar el formulario
        function submitForm() {
            // Verificar el pago
            pagar();
            // Enviar el formulario
            var form = document.querySelector('form');
            form.submit();
        }
    </script>
</head>
<body>
    <h1>Crear Apartado</h1>
    
    <form action="" method="post">
        <label for="valor_total">Valor Total:</label>
        <!-- Mostrar el valor total del carrito recibido como parámetro -->
        <input type="text" id="valor_total" name="valor_total" placeholder="Ingrese el valor total" value="<?php echo $total; ?>" required><br><br>

        <!-- Agregar campo para seleccionar el producto -->
        <label for="producto">Producto:</label>
        <select id="producto" name="producto">
            <option value="Producto 1">Variedad de productos</option>
            <option value="Producto 2">Un solo producto</option>
            <!-- Agregar más opciones según los productos disponibles -->
        </select><br><br>

        <!-- Agregar campo para la cantidad total de productos -->
        <label for="cantidad_total">Cantidad Total de Productos:</label>
        <input type="number" id="cantidad_total" name="cantidad_total" placeholder="Ingrese la cantidad total" required><br><br>

        <!-- Agregar campo para el precio total de los productos -->
        <label for="precio_total">Precio Total de Productos:</label>
        <input type="number" id="precio_total" name="precio_total" placeholder="Ingrese el precio total" required><br><br>

        <label for="duracion">Duración:</label>
        <select id="duracion" name="duracion">
            <option value="3 meses">3 meses</option>
            <option value="1 mes">1 mes</option>
            <option value="1 semana">1 semana</option>
        </select><br><br>

        <input type="button" onclick="calcularAporte()" value="Calcular"><br><br>

        <label for="aporte_usuario">Aporte del Usuario:</label>
        <input type="text" id="aporte_usuario" name="aporte_usuario" placeholder="Ingrese el aporte del usuario" required><br><br>

        <label for="metodo_pago">Método de Pago:</label>
        <select id="metodo_pago" name="metodo_pago">
            <option value="Efectivo">Efectivo</option>
            <option value="Tarjeta">Tarjeta</option>
        </select><br><br>

        <!-- Campo oculto para almacenar el valor total -->
        <input type="hidden" name="total" id="totalHiddenInput" value="">

        <!-- Agregar un campo oculto para almacenar el valor mínimo -->
        <input type="hidden" id="valor_minimo" value="0">

        <button type="button" onclick="submitForm()">Pagar</button>

    </form>

    <?php
    if (isset($_POST['crear_apartado'])) {
        $controller = new ApartadoController();
        $controller->nuevoApartado($_POST['valor_total'], $_POST['duracion'], $_POST['aporte_usuario'], $_POST['metodo_pago'], $_POST['producto'], $_POST['cantidad_total'], $_POST['precio_total']);
    }
    ?>

</body>
</html>
