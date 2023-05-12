document.addEventListener('DOMContentLoaded', function() {
  var timeRangeDropdown = document.getElementById('timeRangeDropdown');
  var myChart;

  timeRangeDropdown.addEventListener('change', function(event) {
    var selectedTimeRange = event.target.value;
    updateChart(selectedTimeRange);
  });

  function updateChart(timeRange) {
    // Generate data based on the selected time range
    debugger
    var data;
    if (timeRange === 'months') {
      // Data for months
      data = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
          label: 'My First Dataset',
          data: [65, 59, 80, 81, 56, 7, 40],
          fill: false,
          borderColor: 'rgb(75, 192, 192)',
          tension: 0.1
        },
        {
          label: 'My Second Dataset',
          data: [7, 55, 56, 81, 80, 59, 65],
          fill: false,
          borderColor: 'rgb(255, 99, 132)',
          tension: 0.1
        }]
      };
    } else if (timeRange === 'days') {
      // Data for days
      data = {
        labels: ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5', 'Day 6', 'Day 7'],
        datasets: [{
          label: 'My First Dataset',
          data: [1, 59, 80, 81, 56, 55, 40],
          fill: false,
          borderColor: 'rgb(75, 192, 192)',
          tension: 0.1
        },
        {
          label: 'My Second Dataset',
          data: [40, 55, 56, 1, 80, 59, 65],
          fill: false,
          borderColor: 'rgb(255, 99, 132)',
          tension: 0.1
        }]
      };
    }

    // Update the chart with the new data
    myChart.data = data;
    myChart.update();
  }

  // Create the initial chart
  var ctx = document.getElementById('myChart').getContext('2d');
  var labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
  var data = {
    labels: labels,
    datasets: [{
      label: 'My First Dataset',
      data: [65, 50, 80, 61, 45, 87, 43],
      fill: false,
      borderColor: 'rgb(75, 192, 192)',
      tension: 0.1
    },      {
      label: 'My Second Dataset',
      data: [40, 55, 56, 81, 80, 59, 65],
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
});