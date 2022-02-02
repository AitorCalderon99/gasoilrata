<template>
  <div class="tarjetas-container">
    <Tarjeta_consumo v-for="consumo in getConsumos()" :key="consumo" :consumo="consumo"></Tarjeta_consumo>
  </div>
</template>

<script>
import { onBeforeMount, reactive, computed } from 'vue';
import axios from 'axios';
import Tarjeta_consumo from "./Tarjeta_consumo.vue";
import {useStore} from "vuex";

export default {
  name: "Tarjetas_consumos",

  components: {
    Tarjeta_consumo,
  },

  setup() {
    const store = useStore();
    const Swal = require('sweetalert2');
    const consumos = reactive([]);
    const numerovehiculo = ref([0]);

    const getIdVehiculo = computed( () => {
      return store.state.id_vehiculo;
    });

    const getConsumos = computed(async() => {
      let response;
        try {
            response = await axios.get('consumo/'+getIdVehiculo.value);
        } catch (error) {
            Swal.fire(error.title, error.message, "error");
            return;
        }

        // if (response.data != 200) {
        //     marcar error
        //     return;
        // }
        console.log(response.data);

        if (response.data.length <= 0) {
          alert("Mala Suerte");
        }
        
        consumos.value = response.data;
        return response.data;
    }
) 
    onBeforeMount( () => {
      getConsumos();
    });

    return {
      consumos,
      getConsumos
    }
  },
};
</script>