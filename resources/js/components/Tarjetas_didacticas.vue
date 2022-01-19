<template>
  <div
    id="carouselExampleIndicators"
    class="carousel slide"
    data-bs-ride="carousel"
  >
    <div class="carousel-inner bg-warning bg-gradient contenedor-amarillo">
      <div
        class="carousel-item"
        :class="{ active: index == 0 }"
        v-for="(cuestion, index) in cuestiones"
        :key="cuestion"
        @click="voltear()"
      >
          <div class="card">
            <div class="card-body">
              <div class="adelante">
                <h3>
                  {{ cuestion.pregunta }}
                </h3>
              </div>
              <div class="atras">
                <p>
                  {{ cuestion.respuesta }}
                </p>
              </div>
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

    const voltear = () => {
      $(".card").toggleClass("flip-card");
    };

    onBeforeMount(() => {
      getCuestiones();
    });

    return {
      cuestiones,
      voltear
    };
  },

};
</script>

<style scoped lang="css">
.carousel-inner {
  height: 15rem;
  margin: 1rem 0;
}

.card {
  width: 100%;
  height: 100%;
  background: white;
  transition: box-shadow ease 0.3s;
}

.card:hover {
  box-shadow: 0px 16px 24px 2px rgba(0,0,0,0.14) , 0px 6px 30px 5px rgba(0,0,0,0.12) , 0px 8px 10px -7px rgba(0,0,0,0.2) ;
  cursor: pointer;
}

.card-body {
  width: 100%;
  height: 100%;
  text-align: center;
  transition: all .8s ease;
  transform-style: preserve-3d;
}

.adelante, .atras {
  width: 100%;
  height: 100%;
  backface-visibility: hidden;
}

.adelante {
  transform: rotateX(0deg);
}

.atras {
  transform: rotateY(180deg);
  position: absolute;
  right: 0;
  left: 0;
  top: 10px;
}

.flip-card {
  transform: rotateY(180deg);
}
</style>