<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Gráficos de Ventas Diarias y Apartados Totales</title>
    <style>
        #visual {
            height: 800px;
            width: 800px;
        }

        #ventasChart,
        #apartadosChart {
            height: 400px;
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
        <canvas id="ventasChart"></canvas>
        <canvas id="apartadosChart"></canvas>
    </div>

    <script>
        $(document).ready(function() {
            const ventasChartCanvas = document.getElementById('ventasChart');
            const apartadosChartCanvas = document.getElementById('apartadosChart');

            // Verifica que los contextos estén definidos
            const ventasChartCtx = ventasChartCanvas ? ventasChartCanvas.getContext('2d') : null;
            const apartadosChartCtx = apartadosChartCanvas ? apartadosChartCanvas.getContext('2d') : null;

            // Solicitud AJAX para obtener los datos de ventas diarias
            $.ajax({
                url: '../Controller/NewApartadoController.php?op=VentasDiarias',
                method: 'GET',
                success: function(response) {
                    try {
                        const datos = JSON.parse(response);
                        if (datos.error) {
                            console.error(datos.message);
                            return;
                        }

                        const fechas = [];
                        const ventasData = [];

                        // Llenar las variables con los datos recibidos
                        datos.forEach(item => {
                            fechas.push(item.FechaApartado);
                            ventasData.push(item.TotalVenta);
                        });

                        // Verifica que ctx esté definido antes de crear el gráfico
                        if (ventasChartCtx) {
                            // Crear el gráfico de líneas con los datos de ventas diarias
                            new Chart(ventasChartCtx, {
                                type: 'line',
                                data: {
                                    labels: fechas,
                                    datasets: [{
                                        label: 'Ventas Diarias',
                                        data: ventasData,
                                        fill: false,
                                        borderColor: 'rgb(75, 192, 192)',
                                        tension: 0.1
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
                            console.error('El contexto del canvas (ctx) de ventas no está definido.');
                        }
                    } catch (e) {
                        console.error('Error al parsear la respuesta JSON:', e);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error al obtener los datos para el gráfico de ventas diarias:', error);
                }
            });

            // Solicitud AJAX para obtener los datos de apartados totales
            $.ajax({
                url: '../Controller/NewApartadoController.php?op=DatosParaGrafico',
                method: 'GET',
                success: function(response) {
                    try {
                        const datos = JSON.parse(response);
                        if (datos.error) {
                            console.error(datos.message);
                            return;
                        }

                        const clientes = [];
                        const preciosTotales = [];

                        // Llenar las variables con los datos recibidos
                        datos.forEach(item => {
                            clientes.push(item.NombreCliente);
                            preciosTotales.push(item.PrecioTotal);
                        });

                        // Verifica que ctx esté definido antes de crear el gráfico
                        if (apartadosChartCtx) {
                            // Crear el gráfico de barras con los datos de apartados totales
                            new Chart(apartadosChartCtx, {
                                type: 'bar',
                                data: {
                                    labels: clientes,
                                    datasets: [{
                                        label: 'Apartados Totales',
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
                            console.error('El contexto del canvas (ctx) de apartados no está definido.');
                        }
                    } catch (e) {
                        console.error('Error al parsear la respuesta JSON:', e);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error al obtener los datos para el gráfico de apartados totales:', error);
                    console.log('Código de estado HTTP:', xhr.status);
                    console.log('Texto de estado:', xhr.statusText);
                }
            });
        });
    </script>
</body>

</html>
