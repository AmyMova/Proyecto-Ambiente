<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Reporte de Ventas Diarias</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="container">
        <h2>Ventas Diarias</h2>
        <canvas id="ventasChart"></canvas>
    </div>

    <script>
        // Ejemplo de datos de ventas diarias (cambiar a datos reales)
        const ventasDiarias = {
            '2024-04-07': 50,
            '2024-04-08': 75,
            '2024-04-09': 100,
            '2024-04-10': 150,
            '2024-04-11': 200,
            '2024-04-12': 250,
            '2024-04-13': 300
        };

        // Extrae las etiquetas (fechas) y datos (ventas) de ventasDiarias
        const labels = Object.keys(ventasDiarias);
        const data = Object.values(ventasDiarias);

        // Encuentra el día con más ventas
        const maxVentas = Math.max(...data);
        const diaConMasVentas = labels[data.indexOf(maxVentas)];

        console.log(`El día con más ventas es: ${diaConMasVentas} con ${maxVentas} ventas.`);

        // Configuración del gráfico de línea
        const config = {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Ventas Diarias',
                    data: data,
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }]
            }
        };

        // Crear el gráfico de línea
        const ctx = document.getElementById('ventasChart').getContext('2d');
        new Chart(ctx, config);
    </script>
</body>

</html>

