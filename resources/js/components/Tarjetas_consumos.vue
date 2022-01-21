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
import Tarjeta_consumo from "./Tarjeta_consumo.vue";

export default {
  setup() {
        // id: 1,
        // fecha: "28-11-2022",
        // viaje: "Bilbao-Valencia",
        // distancia: 748,
        // combustible: "Gasóleo Premium",
        // euro_litro: 1.507,
        // litro: 60.54,
  },
  components: {
    Tarjeta_consumo,
  },

  props: {
        datos: Object,
    }
};
</script>