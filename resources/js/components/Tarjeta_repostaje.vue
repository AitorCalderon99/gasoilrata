<template>
    <div class="tarjeta">
        <div class="fecha-carburante-container">
            <div class="fecha">{{ repostaje.fecha }}</div>
        </div>
        <h3 class="gasolinera">{{ repostaje.gasolinera }}--{{ repostaje.id_vehiculo }}</h3>
        <div class="total">{{ repostaje.precio_litro * repostaje.litros }} km</div>
        <div class="coste-litro-container">
            <div class="coste-litro">{{ repostaje.precio_litro }} €/L</div>
            <div class="litros">{{ repostaje.litros }} L</div>
        </div>
    </div>
</template>

<script>
export default {
    name: "tarjeta_respostaje",
    props: {
        repostaje: Object,
    },
    /*
    setup(repostaje) {
        console.log(repostaje);
    },
    */
}
</script>

<style scoped>
.tarjeta {
    background-color: #c5a880;
    border: #532e1c solid medium;
    width: 90%;
    margin: 1rem auto;
    border-radius: 10px 0px;

    display: flex;
    flex-flow: row wrap;
    justify-content: space-between;
    gap: 0.5em;
    cursor: pointer;
    transition: all .2s ease-in;
}

.tarjeta:hover {
    box-shadow: 0px 16px 24px 2px rgba(0,0,0,0.14) , 0px 6px 30px 5px rgba(0,0,0,0.12) , 0px 8px 10px -7px rgba(0,0,0,0.2) ;
}

.fecha-carburante-container {
    display: flex;
    flex-flow: column nowrap;
}

.fecha {
    background-color: #532e1c;
    border-radius: 0 0 10px 0;
    text-align: center;
    color: white;
    min-width: 6rem;
}

.gasolinera {
    flex: 1 1 fill;
    text-align:center;
}

.total {
    width: 7rem;
    min-width: fit-content;
    border-radius: 0 10px 0 0;
    text-align: center;
    color: white;
    background: #532e1c;
}

.coste-litro-container {
    display: flex;
    flex-flow: row nowrap;
    justify-content: space-around;

    width: 8rem;
    min-width: fit-content;
    background-color: #532e1c;
    border-radius: 10px 0 0 0;
    color: white;
}
</style>