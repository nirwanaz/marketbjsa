<template>
  <canvas id="mychart"></canvas>
</template>

<script>
  import Chart from 'chart.js'
  
  export default {
    props: {
      chartType: String,
      chartData: Object,
      chartOptions: Object
    },
    data () {
      return {
        reactive: true
      }
    },
    methods: {
      chartConstructor (chartType, chartData, chartOptions) {
        const chartEl = document.getElementById('mychart')
        const chart = new Chart(chartEl, {
          type: chartType,
          data: chartData,
          options: chartOptions
        })
      }
    },
    mounted () {
      let { chartType, chartData, chartOptions } = this
      this.chartConstructor(chartType, chartData, chartOptions)
    }
  }
</script>