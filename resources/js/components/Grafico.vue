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
import { computed, reactive, ref } from '@vue/runtime-core';

export default {
  name: 'App',
  components: {
    Vue3ChartJs,
  },
  props: ['g95', 'g98', 'diesel'],
  setup (props) {
    const store = useStore();
    const g95 = reactive(props.g95);
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
            data: [1.5, g95, 1.677]
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