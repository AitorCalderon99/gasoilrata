<template>
  <div class="tarjetas-container">
    <Tarjeta_consumo v-for="consumo in consumos.value" :key="consumo" :consumo="consumo"></Tarjeta_consumo>
  </div>
</template>

<script>
import { onBeforeMount, inject, reactive } from '@vue/runtime-core';
import axios from 'axios';
import Swal from 'sweetalert2';
import Tarjeta_consumo from "./Tarjeta_consumo.vue";

export default {
  name: "Tarjetas_consumos",

  components: {
    Tarjeta_consumo,
  },

  setup() {
    const Swal = require('sweetalert2');
    const id_user = inject("id_user");
    const consumos = reactive([]);
    var id_vehiculo = this.$store.state.id_vehiculo;

    const getConsumos = async() => {
      let response;
        try {
            response = await axios.get('consumo/'+id_vehiculo);
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

    onBeforeMount( () => {
      getConsumos();
    });

    return {
      consumos
    }
  },
};
</script>