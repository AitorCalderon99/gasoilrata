<template>
  <div class="tarjetas-container">
    <Tarjeta_consumo v-for="consumo in consumos.value" :key="consumo" :consumo="consumo"></Tarjeta_consumo>
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

    const getConsumos = async() => {
      let response;
        try {
            response = await axios.get('consumo/'+getIdVehiculo);
        } catch (error) {
            Swal.fire(error.title, error.message, "error");
            return;
        }

        // if (response.data != 200) {
        //     //marcar error
        //     return;
        // }
      consumos.value = response.data;
    }

    const getIdVehiculo = computed( () => {
      return id_vehiculo = store.state.id_vehiculo;
    });

    onBeforeMount( () => {
      getConsumos();
    });

    return {
      consumos
    }
  },
};
</script>