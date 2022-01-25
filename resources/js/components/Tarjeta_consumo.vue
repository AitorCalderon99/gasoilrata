<template>
    <div class="tarjeta">
        <div class="fecha-carburante-container">
            <div class="fecha">{{ consumo.fecha }}</div>
            <div class="carburante">{{ consumo.carburante }}</div>
        </div>
        <h3 class="viaje">{{ consumo.origen }}-{{ consumo.destino }}</h3>
        <div class="kilometros">{{ consumo.kilometros }} km</div>
        <div class="coste-litro-container">
            <div class="coste-litro">{{ consumo.coste_litro }} €/L</div>
            <div class="litros">{{ consumo.litros }} L</div>
            <h1 class="coste">{{ consumo.litros * consumo.coste_litro }} €</h1>
        </div>
    </div>
</template>

<script>
export default {
    name: "tarjeta_consumo",
    props: {
        consumo: Object,
    },
    setup(consumo) {
        console.log(consumo);
    },
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
    font-size: small;

    flex: 1 1 content;
}

.carburante {
    font-size: small;
}

.viaje {
    flex: 1 1 60%;
    text-align: center;
}

.coste-litro-container {
    display: flex;
    flex-flow: row nowrap;
    justify-content: flex-end;

    width: 6rem;
    background-color: #532e1c;
    border-radius: 10px 0 0 0;
}

.coste-litro, .litros {
    display: none;
}

.coste {
    font-size: large;
    padding: 0 1rem;
    color: white;
}
</style>