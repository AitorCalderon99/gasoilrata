<template>
  <div class="container-fluid my-2">
    <vue3-chart-js
        :id="barChart.id"
        :type="barChart.type"
        :data="barChart.data"
        @before-render="beforeRenderLogic"
    ></vue3-chart-js>
  </div>
</template>

<script>
import Vue3ChartJs from '@j-t-mcc/vue3-chartjs'

export default {
  name: 'App',
  components: {
    Vue3ChartJs,
  },
  setup () {
    const barChart = {
      id: 'bar',
      type: 'bar',
      data: {
          //labels es el eje x
        labels: ['Gasóleo A', 'Gasolina95', 'Gasolina 98'],
        datasets: [
          {
            backgroundColor: [
              '#522d1c',
              '#522d1c',
              '#522d1c'
            ],
            // rescatar datos de la api e insertarlo en este array
            data: [1.400, 1.521, 1.677]
          }
        ]
      }
    }
  
    const beforeRenderLogic = (event) => {
      //...
      //if(a === b) {
      //  event.preventDefault()
      //}   
    }    

    return {
      barChart,
      beforeRenderLogic
    }
  },
}
</script>