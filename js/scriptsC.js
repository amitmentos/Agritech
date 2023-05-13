document.addEventListener('DOMContentLoaded', function() {
  var timeRangeDropdown = document.getElementById('timeRangeDropdown');
  var dropdownItems = document.querySelectorAll(".dropdown-item");
  var myChart;

  // timeRangeDropdown.addEventListener('change', function(event) {
  //   console.log("sadDSAd");
  //   var selectedTimeRange = event.target.value;
  //   updateChart(selectedTimeRange);
  // });

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
    }
  
    // Update the chart with the new data
    myChart.data.datasets = data.datasets; // Update datasets
    myChart.data.labels = data.labels; // Update labels
    myChart.update();
  }

// Create the initial chart
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
});