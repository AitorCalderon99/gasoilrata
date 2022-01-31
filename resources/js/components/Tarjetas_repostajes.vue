<template>
  <div class="tarjetas-container">
    <Tarjeta_repostaje v-for="repostaje in repostajes.value" :key="repostaje" :repostaje="repostaje"></Tarjeta_repostaje>
  </div>
</template>

<script>
import { computed, onBeforeMount, reactive } from 'vue';
import axios from 'axios';
import Swal from 'sweetalert2';
import Tarjeta_repostaje from "./Tarjeta_repostaje.vue";
import {useStore} from "vuex";

export default {
    name: "Tarjetas_repostajes",

    components: {
        Tarjeta_repostaje,
    },

    setup() {
        const store = useStore();
        const repostajes = reactive([]);

        const getRepostajes = async() => {
            let response;
            try {
                response = await axios.get('repostajes/'+getIdVehiculo);
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

        const getIdVehiculo = computed( () => {
            return id_vehiculo = this.$store.state.id_vehiculo;
        });

        onBeforeMount( () => {
            getRepostajes();
        });

        return {
            repostajes,
        }
    }
}
</script>