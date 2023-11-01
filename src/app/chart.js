var ctx = document.getElementById('lineChart').getContext('2d');
  var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
      datasets: [{
        label: '',
        data: [10, 20, 15, 25, 30],
        borderColor: 'rgba(75, 192, 192, 1)', // Warna garis
        borderWidth: 2,
        fill: false, // Tidak mengisi area di bawah garis
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