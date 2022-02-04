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
import Vue3ChartJs from '@j-t-mcc/vue3-chartjs';
import {useStore} from "vuex";
import { computed } from 'vue';

export default {
  name: 'App',
  components: {
    Vue3ChartJs,
  },
  setup () {
    const store = useStore();
    const barChart = {
      id: 'bar',
      type: 'bar',
      data: {
          //labels es el eje x
        labels: ['Gasóleo A', 'Gasolina95', 'Gasolina 98'],
        datasets: [
          {
            backgroundColor: [
              '#529d1c',
              '#222d1c',
              '#162d1a'
            ],
            // rescatar datos de la api e insertarlo en este array
            data: [store.state.prices.g95, store.state.prices.g98, store.state.prices.diesel]
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