document.addEventListener('DOMContentLoaded', function() {
  var timeRangeDropdown = document.getElementById('timeRangeDropdown');
  var dropdownItems = document.querySelectorAll(".dropdown-item");
  var myChart;

  dropdownItems.forEach(function(item) {
    item.addEventListener("click", function() {
        var selectedText = this.textContent;
        var selectedTimeRange = this.getAttribute("data-time-range");
        timeRangeDropdown.textContent = selectedText;
        updateChart(selectedTimeRange);
    });
  });

  function updateChart(timeRange) {
    // Generate data based on the selected time range
    var data;
    var newData;
    if (timeRange === 'months') {
      // Data for months
      data = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
          label: 'My First Dataset',
          data: [70, 68, 65, 61, 71, 78, 67],
          fill: false,
          borderColor: 'rgb(75, 192, 192)',
          tension: 0.1
        },
        {
          label: 'My Second Dataset',
          data: [65, 55, 63, 75, 78, 71, 65],
          fill: false,
          borderColor: 'rgb(255, 99, 132)',
          tension: 0.1
        }]
      };

      newData = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
        datasets: [
          {
            label: 'Savings',
            data: [105, 124, 78, 91, 62, 56, 67],
            backgroundColor: ['rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(255, 159, 64, 0.2)',
              'rgba(75, 192, 192, 0.2)',
            ],
            borderColor: [
              'rgba(255,99,132,1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)',
              'rgba(75, 192, 192, 1)',
            ],
            borderWidth: 1
          }
        ]
      };
    } else if (timeRange === 'days') {
      // Data for days
      data = {
        labels: ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5', 'Day 6', 'Day 7'],
        datasets: [{
          label: 'My First Dataset',
          data: [70, 68, 62, 61, 63, 67, 67],
          fill: false,
          borderColor: 'rgb(75, 192, 192)',
          tension: 0.1
        },
        {
          label: 'My Second Dataset',
          data: [60, 61, 56, 60, 67, 68, 65],
          fill: false,
          borderColor: 'rgb(255, 99, 132)',
          tension: 0.1
        }]
      };

      newData = {
        labels: ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5', 'Day 6', 'Day 7'],
        datasets: [
          {
            label: 'Savings',
            data: [100, 68, 62, 94, 63, 44, 67],
            backgroundColor: ['rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(255, 159, 64, 0.2)',
              'rgba(75, 192, 192, 0.2)',
            ],
            borderColor: [
              'rgba(255,99,132,1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)',
              'rgba(75, 192, 192, 1)',
            ],
            borderWidth: 1
          }
        ]
      };
    }
    else if (timeRange === 'All Times') {
      // Data for days
      data = {
        labels: ['2017', '2018', '2019', '2020', '2021', '2022', '2023'],
        datasets: [{
          label: 'My First Dataset',
          data: [65, 68, 65, 61, 70, 74, 67],
          fill: false,
          borderColor: 'rgb(75, 192, 192)',
          tension: 0.1
        },
        {
          label: 'My Second Dataset',
          data: [50, 55, 56, 75, 80, 75, 65],
          fill: false,
          borderColor: 'rgb(255, 99, 132)',
          tension: 0.1
        }]
      };

      newData = {
        labels: ['2017', '2018', '2019', '2020', '2021', '2022', '2023'],
        datasets: [
          {
            label: 'Savings',
            data: [30, 68, 80, 61, 50, 74, 67],
            backgroundColor: ['rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(255, 159, 64, 0.2)',
              'rgba(75, 192, 192, 0.2)',
            ],
            borderColor: [
              'rgba(255,99,132,1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)',
              'rgba(75, 192, 192, 1)',
            ],
            borderWidth: 1
          }
        ]
      };
    }
  
    // Update the chart with the new data
    myChart.data.datasets = data.datasets; // Update datasets
    myChart.data.labels = data.labels; // Update labels
    myChart.update();

    myChart2.data.datasets = newData.datasets;
    myChart2.data.labels = newData.labels;
    myChart2.update();
  }

var ctx = document.getElementById('myChart').getContext('2d');
var labels = ['2017', '2018', '2019', '2020', '2021', '2022', '2023'];
var data = {
  labels: labels,
  datasets: [{
    label: 'Total water use',
    data: [65, 68, 65, 61, 70, 74, 67],
    fill: false,
    borderColor: 'rgb(75, 192, 192)',
    tension: 0.1
  },
  {
    label: 'Total pest',
    data: [50, 55, 56, 75, 80, 75, 65],
    fill: false,
    borderColor: 'rgb(255, 99, 132)',
    tension: 0.1
  }]
};

var options = {
  responsive: true,
  scales: {
    y: {
      beginAtZero: true
    }
  }
};

myChart = new Chart(ctx, {
  type: 'line',
  data: data,
  options: options
});


var ctr = document.getElementById("myChart2");
var myChart2 = new Chart(ctr, {
    type: 'bar',
    data: {
        labels: ['Jan', 'Fab', 'Mar', 'Apr', 'Jun', 'Jul'],
        datasets: [
            {
                label: 'Savings',
                data: [105, 124, 78, 91, 62, 56],
                backgroundColor: ['rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],

                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }
        ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
});