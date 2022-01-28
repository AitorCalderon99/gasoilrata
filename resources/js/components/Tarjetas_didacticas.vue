<template>
  <div id="content">
    <div @click="previousQuestion()" id="prev" ><img :class="{firstCard: firstCard}" src="/images/rightArrow.png" alt=""></div>
    <div id="card">
      <div @click="toggleQuestionAnswer()" v-if="question" id="cardQuestion">{{cuestiones[numPregunta].pregunta}}</div>
      <div @click="toggleQuestionAnswer()" v-if="answer" id="cardAnswer">{{cuestiones[numRespuesta].respuesta}}</div>
    </div>
    
    <div @click="nextQuestion()" id="next" ><img :class="{lastCard: lastCard}" src="/images/rightArrow.png" alt=""></div>
  </div>
</template>

<script>
import { onBeforeMount, reactive, ref } from "@vue/runtime-core";
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
      {
        pregunta: "¿En qué paises es más cara la gasolina?",
        respuesta:
          "Noruega, Islandia y Hong Kong, tienen el precio de la gasolina más caro.",
      },
      {
        pregunta: "¿El automóvil fue conocido como ese medio de transporte limpio capaz de acabar con la contaminación de la epoca. Cuál era esa contaminación?",
        respuesta:
          "Los excrementos de caballo.",
      },
      {
        pregunta: "¿Porqué se invento la velocidad de crucero?",
        respuesta:
          "La velocidad de crucero fue inventada por un ingeniero ciego porque su abogado conducía a 'trompicones'.",
      },
      {
        pregunta: "¿A qué velocidad se circulo en la primera carrera de coches de la historia?",
        respuesta:
          "La primera carrera se disputó en Francia entre lae ciudades de Burdeos y París, en una ida y vuelta a 24 km/h.",
      },
    ];

    const numerosSalidos = [];
    const getCuestiones = () => {
      for (var i = 0; i < 2; ) {
        // numero aleatorio entre 0 y longitud de array tarjetas
        const numRandom = Math.floor(Math.random() * tarjetas.length);
        /*console.log(numRandom);*/

        if (!numerosSalidos.includes(numRandom)) {
          /*console.log(tarjetas[numRandom]);*/
          numerosSalidos.push(numRandom);
          cuestiones.push(tarjetas[numRandom]);
          i++;
        }
      }
    };

    const voltear = () => {
      $(".card").toggleClass("flip-card");
    };

    const numPregunta = ref(0);
    const numRespuesta = ref(0);

    const question = ref(true);
    const answer = ref(false);

    const firstCard = ref(true);
    const lastCard = ref(false);

    const toggleQuestionAnswer = ()=>{
      question.value = !question.value;
      answer.value = !answer.value;
    }

    const nextQuestion = ()=>{
      if (numPregunta.value + 1 >= cuestiones.length) {
        lastCard.value = true;
        return;
      }
      numPregunta.value ++;
      numRespuesta.value ++;
      question.value = true;
      answer.value = false;
      firstCard.value = false;
    }

    const previousQuestion = ()=>{
      if (numPregunta.value <= 0) {
        firstCard.value = true;
        return;
      }
      numPregunta.value --;
      numRespuesta.value --;
      question.value = true;
      answer.value = false;
      lastCard.value = false;
    }

    onBeforeMount(() => {
      getCuestiones();
    });

    return {
      cuestiones,
      voltear,
      numPregunta,
      numRespuesta,
      question,
      answer,
      nextQuestion,
      previousQuestion,
      toggleQuestionAnswer,
      firstCard,
      lastCard
    };
  },

};
</script>
<style lang="scss" scoped>
  #content{
    display: grid;
    grid-template-columns: 1fr 8fr 1fr;
    >#prev{
      cursor: pointer;
      >img{
        transform: rotate(180deg);
        &.firstCard{
          filter: opacity(25%);
        }
      }
    }
    >#card{
      cursor: pointer;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    >#next{
      cursor: pointer;
      >img{
        &.lastCard{
          filter: opacity(25%);
        }
      }
    }
  }
</style>

