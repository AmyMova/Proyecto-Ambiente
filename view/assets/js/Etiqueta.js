// Array para almacenar los datos de todos los archivos JSON
const allData = [];

// Función para cargar datos desde un archivo JSON
function loadData(filename) {
    fetch(filename)
        .then(response => response.json())
        .then(data => {
            allData.push(...data);
            updateTable();
        })
        .catch(error => console.error('Error al cargar el archivo JSON:', error));
}

// Función para actualizar la tabla con los datos cargados
function updateTable() {
    const tableBody = document.getElementById('json-table-body');
    tableBody.innerHTML = ''; // Limpiar el cuerpo de la tabla

    // Contador para limitar a 4 filas
    let rowCount = 0;

    // Generar filas y celdas para cada objeto JSON
    allData.forEach(obj => {
        if (rowCount < 4) {
            const row = document.createElement('tr');
            for (let i = 0; i < 6; i++) {
                const cell = document.createElement('td');
                const value = obj[i.toString()]; // Obtiene el valor correspondiente
                cell.textContent = value !== undefined ? value : ''; // Asigna el valor o cadena vacía si no está definido
                row.appendChild(cell);
            }
            tableBody.appendChild(row);
            rowCount++;
        }
    });
}

// Cargar datos desde los archivos JSON
loadData('data1.json');
loadData('data2.json');
loadData('data3.json');
loadData('data4.json');
