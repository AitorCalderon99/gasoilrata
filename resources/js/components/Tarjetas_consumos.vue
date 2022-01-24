<template>
  <div>
    <div>{{datos}}</div>
    <Tarjeta_consumo
      v-for="dato in datos"
      :dato="dato"
      :key="dato.id"
    ></Tarjeta_consumo>
  </div>
</template>

<script>
import { onBeforeMount, inject } from '@vue/runtime-core';
import axios from 'axios';
import Swal from 'sweetalert2';
import Tarjeta_consumo from "./Tarjeta_consumo.vue";

export default {
  setup() {
    const Swal = require('sweetalert2');
    const id_user = inject("id_user");

    const getConsumos = async() => {
      let response;
            try {
                response = await axios.get('/consumos/'+id_user);
            } catch (error) {
                // await Swal.fire(error.title, error.message, "error");
                return;
            }

            if (response.data != 200) {
                //marcar error
                return;
            }
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