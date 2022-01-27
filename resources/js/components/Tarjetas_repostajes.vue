<template>
  <div class="tarjetas-container">
    <Tarjeta_repostaje v-for="repostaje in repostajes.value" :key="repostaje" :repostaje="repostaje"></Tarjeta_repostaje>
  </div>
</template>

<script>
import { onBeforeMount, reactive } from 'vue';
import axios from 'axios';
import Swal from 'sweetalert2';
import Tarjeta_repostaje from "./Tarjeta_repostaje.vue";

export default {
    name: "Tarjetas_repostajes",

    components: {
        Tarjeta_repostaje,
    },

    setup() {
        const repostajes = reactive([]);
        const id_vehiculo = 1; // traer el id del coche seleccionado aquí

        const getRepostajes = async() => {
            let response;
            try {
                response = await axios.get('repostajes/'+1);
            } catch (error) {
                Swal.fire(error.message, "", "error");
            return;
            }

            // if (response.data != 200) {
            //     //marcar error
            //     return;
            // }

            console.log(response.data);
            repostajes.value = response.data;
        }

        onBeforeMount( () => {
            getRepostajes();
        });

        return {
            repostajes,
        }
    }
}
</script>