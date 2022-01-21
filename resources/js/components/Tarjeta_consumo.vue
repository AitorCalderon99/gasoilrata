<template>
    <div class="tarjeta">
        <div class="fecha">{{ dato.fecha }}</div>
        <h3 class="viaje">{{ dato.viaje }}</h3>
        <div class="distancia">{{ dato.distancia }} km</div>
        <div class="combustible">{{ dato.combustible }}</div>
        <div class="euro-litro">{{ dato.euro_litro }} €/L</div>
        <div class="litro">{{ dato.litro }} L</div>
        <div class="coste">{{ dato.litro * dato.euro_litro }} €</div>
    </div>
</template>

<script>
export default {
    setup() {
        // import defineProps from "@vue/runtime-core";
    },
    props: {
        dato: Object,
    }
}
</script>

<style scoped>
.tarjeta {
    border: black solid medium;
    margin: 1rem 4rem;
}
</style>