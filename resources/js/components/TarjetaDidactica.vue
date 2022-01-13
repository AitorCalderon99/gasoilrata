<template>
    <div class="tarjetas">
        <div class="tarjeta card" v-for="cuestion in cuestiones" :key="cuestion">
            <div class="adelante">
                <h3 class="pregunta">
                    {{ cuestion.pregunta }}
                </h3>
            </div>
            <div class="atras">
                <p class="respuesta">
                    {{ cuestion.respuesta }}
                </p>
            </div>
        </div>
    </div>
</template>

<script>
    import tarjetas from "../../tarjetas.json";

    var cuestiones = [];

    for (var i = 0 ; i < 2 ; i++) {
        // numero aleatorio entre 0 y longitud de array tarjetas
        var numRandom = Math.floor(Math.random() * (tarjetas.length +1));

        cuestiones.push(tarjetas[numRandom]);
    }

    export default {
        data : function() {
            return {
                cuestiones : cuestiones
            }
        }
    }
</script>