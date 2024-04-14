<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráfico de Apartados totales</title>
    <style>
        #visual {
            height: 800px;
            width: 800px;
        }
    </style>
    <!-- Incluye jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Incluye Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div id="visual">
        <canvas id="myChart"></canvas>
    </div>

    <script>
        $(document).ready(function() {
            const canvasElement = document.getElementById('myChart');
            const ctx = canvasElement ? canvasElement.getContext('2d') : null;

            // Solicitud AJAX para obtener los datos para el gráfico
            $.ajax({
                url: '../Controller/NewApartadoController.php?op=DatosParaGrafico',
                method: 'GET',
                success: function(response) {
                    try {
                        // Parsear la respuesta JSON
                        const data = JSON.parse(response);
                        if (data.error) {
                            console.error(data.message);
                            return;
                        }

                        // Verifica que ctx esté definido antes de crear el gráfico
                        if (ctx) {
                            // Variables para almacenar los datos de los clientes y los precios totales
                            const clientes = [];
                            const preciosTotales = [];

                            // Llenar las variables con los datos recibidos
                            data.forEach(item => {
                                clientes.push(item.NombreCliente);
                                preciosTotales.push(item.PrecioTotal);
                            });

                            // Crear el gráfico de barras con los datos
                            new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: clientes,
                                    datasets: [{
                                        label: 'Cobros Totales',
                                        data: preciosTotales,
                                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                        borderColor: 'rgba(75, 192, 192, 1)',
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        } else {
                            console.error('El contexto del canvas (ctx) no está definido.');
                        }
                    } catch (e) {
                        console.error('Error al parsear la respuesta JSON:', e);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error al obtener los datos para el gráfico:', error);
                    console.log('Código de estado HTTP:', xhr.status);
                    console.log('Texto de estado:', xhr.statusText);
                }
            });
        });
    </script>
</body>

</html>
