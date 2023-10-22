var ctx = document.getElementById('myChart').getContext('2d');
              var chart = new Chart(ctx, {
                type: 'line',
                data: {
                  labels: ['2016', '2017', '2018', '2019', '2020'],
                  datasets: [{
                    label: '',
                    data: [70, 50, 40, 30, 50],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                  }]
                },
                options: {
                  responsive: true,
                  scales: {
                    yAxes: [{
                      ticks: {
                        beginAtZero: true
                      }
                    }]
                  }
                }
              });