<template>
  <div
    id="carouselExampleIndicators"
    class="carousel slide"
    data-bs-ride="carousel"
  >
    <div class="carousel-inner">
      <div
        class="carousel-item px-3 py-2 bg-warning bg-gradient"
        :class="{ active: index == 0 }"
        v-for="(cuestion, index) in cuestiones"
        :key="cuestion"
      >
        <div class="card w-75 mx-auto">
          <div class="adelante card-body">
            <h3 class="pregunta card-title">
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
    </div>
    <button
      class="carousel-control-prev"
      type="button"
      data-bs-target="#carouselExampleIndicators"
      data-bs-slide="prev"
    >
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button
      class="carousel-control-next"
      type="button"
      data-bs-target="#carouselExampleIndicators"
      data-bs-slide="next"
    >
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</template>

<script>
import { onBeforeMount, reactive } from "@vue/runtime-core";
export default {
  setup() {
    //NO BORRAR
    /* const tarjetas = await getTarjetas();
        const getTarjetas = ()=>{
            return axios.get('/tarjetas');
        } */
    var cuestiones = reactive([]);
    const tarjetas = [
      {
        pregunta: "¿En qué influye un mayor octanaje en el combustible?",
        respuesta:
          "A mayor octanaje mayor resistencia a la explosión. Es decir, la gasolina 98 tiene mayor capacidad de antidenotación por lo que el empuje del pistón es lineal. Por lo tanto, es la indicada para altas cilindradas.",
      },
      {
        pregunta: "¿Te pueden multar por circular con el carnet caducado?",
        respuesta:
          "El carné de conducir tiene una vigencia de 10 años y según la Ley de Tráfico, circular con el carné caducado conlleva una multa de 200 euros. Pero no solo eso, si estamos implicados en algún accidente el seguro probablemente se lave las manos (sea a terceros o todo riesgo). ",
      },
    ];

    const numerosSalidos = [];
    const getCuestiones = () => {
      for (var i = 0; i < 2; ) {
        // numero aleatorio entre 0 y longitud de array tarjetas
        const numRandom = Math.floor(Math.random() * tarjetas.length);
        console.log(numRandom);

        if (!numerosSalidos.includes(numRandom)) {
          console.log(tarjetas[numRandom]);
          numerosSalidos.push(numRandom);
          cuestiones.push(tarjetas[numRandom]);
          i++;
        }
      }
    };
    onBeforeMount(() => {
      getCuestiones();
      console.log(cuestiones);
    });
    return {
      cuestiones,
    };
  },
};
</script>