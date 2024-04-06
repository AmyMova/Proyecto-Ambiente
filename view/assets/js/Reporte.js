

const ventas_anuales = document.getElementById('ventas_anuales');
const marcas_mas_vendidas = document.getElementById('marcas_mas_vendidas');
const mejores_clientes = document.getElementById('mejores_clientes');
const ventas_semana = document.getElementById('ventas_semana');

  new Chart(ventas_anuales, {
    type: 'line',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      },
      colors: {
        forceOverride: true
      }
    }
  });
  new Chart(marcas_mas_vendidas, {
    type: 'pie',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2],
        borderWidth: 1,
        backgroundColor:['#FF5733', '#3498DB', '#F1C40F', '#2ECC71', '#9B59B6', '#E67E22']
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      },
      colors: {
        forceOverride: true
      }
    }
  });
  new Chart(mejores_clientes, {
    type: 'bar',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      },
      colors: {
        forceOverride: true
      }
    }
  });


  new Chart(ventas_semana, {
    type: 'line',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      },
      colors: {
        forceOverride: true
      }
    }
  });


  