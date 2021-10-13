<template>
  <div class="row">
    <div class="col-md-12">
      <div class="px-3">
        <Chart
          :chartType="chartType"
          :chartData="chartData"
          :options="chartOptions"
          >
        </Chart>
      </div>
    </div>
  </div>
</template>

<script>
import Chart from '../../Chart.vue'

export default {
 components: { Chart },
 data () {
   return {
    chartType: 'line',
    chartData: {
      labels: ["Mercury", "Venus", "Earth", "Mars"],
      datasets: [
        {
          label: "Number of moons",
          data: [0, 0, 1, 2],
          backgroundColor: "rgba(54, 73, 93, .5)",
          borderColor: "#36495d",
          borderWidth: 3
        },
        {
          label: "Planetary Mass (relative to the Sun x 10^-6)",
          data: [0.166, 2.081, 3.003, 0.323],
          backgroundColor: "rgba(71, 183, 132, .5)",
          borderColor: "#47b784",
          borderWidth: 3
        }
      ]
    },  
    chartOptions: {
      responsive: true,
      lineTension: 1,
      scales: {
        yAxes: [
          {
            ticks: {
              beginAtZero: true,
              padding: 25
            }
          }
        ]
      }
    }
   }
 }
}  
</script>