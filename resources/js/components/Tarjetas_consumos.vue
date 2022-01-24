<template>
  <div>
    <div>{{consumos}}</div>
    <Tarjeta_consumo
      v-for="consumo in consumos"
      :key="consumo.id_consumo"
    ></Tarjeta_consumo>
  </div>
</template>

<script>
import { onBeforeMount, inject, reactive } from '@vue/runtime-core';
import axios from 'axios';
import Swal from 'sweetalert2';
import Tarjeta_consumo from "./Tarjeta_consumo.vue";

export default {
  setup() {
    const Swal = require('sweetalert2');
    const id_user = inject("id_user");
    const consumos = reactive([]);

    const getConsumos = async() => {
      let response;
        try {
            response = await axios.get('consumo/'+id_user);
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
    })
  },
  components: {
    Tarjeta_consumo,
  },
};
</script>