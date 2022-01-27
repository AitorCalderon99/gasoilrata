<template>
    <div>
      <TablaPrecio :g95="today95" :g98="today98" :diesel="todayDiesel"/>
      <Grafico :g95="today95" :g98="today98" :diesel="todayDiesel"/>
    </div>
</template>
<script>
import Grafico from './Grafico.vue'
import TablaPrecio from './Tabla_precio.vue'
import { onBeforeMount, ref } from '@vue/runtime-core';
import axios from 'axios';
import {useStore} from "vuex";
export default {
  components: { TablaPrecio, Grafico },
    setup() {
        const store = useStore();

        const today95 = ref(0);
        const today98 = ref(0);
        const todayDiesel = ref(0);

        const data = ref([]);
        const g95 = ref([]);
        const g98 = ref([]);
        const diesel = ref([]);

        const calculateData=()=>{
            let g95Price = 0;
            g95.value.forEach(element => {
                g95Price += parseFloat(element["Precio Gasolina 95 E5"].replace(',','.'));
                console.log(parseFloat(element["Precio Gasolina 95 E5"].replace(',','.')));
                console.log(element["Precio Gasolina 95 E5"]);
            });
            g95Price = g95Price/g95.value.length;
    
            let g98Price = 0;
            g98.value.forEach(element => {
                g98Price += Number(element["Precio Gasolina 98 E5"].replace(',','.'));
            });
            g98Price = g98Price/g98.value.length;

            let dieselPrice = 0;
            diesel.value.forEach(element => {
                dieselPrice += Number(element["Precio Gasoleo A"].replace(',','.'));
            });
            dieselPrice = dieselPrice/diesel.value.length;

            today95.value = g95Price.toFixed(2);
            today98.value = g98Price.toFixed(2);
            todayDiesel.value = dieselPrice.toFixed(2);

            /* store.commit('setg95Price', today95.value); */
            /* store.mutations.setPrice('g98',today98.value);
            store.mutations.setPrice('diesel',todayDiesel.value); */
        }

        const getData =async()=>{
            const url = 'https://sedeaplicaciones.minetur.gob.es/ServiciosRESTCarburantes/PreciosCarburantes/EstacionesTerrestres/';
            let response;
            try {
                response = await axios.get(url);
            } catch (error) {
                
            }
            /* console.log(response.data.ListaEESSPrecio); */
            data.value = response.data.ListaEESSPrecio.slice(0, 51);
            /* console.log(data.value);
            console.log(data.value[0]["Precio Gasolina 95 E5"]); */
            g95.value = data.value.filter(station => 
                station["Precio Gasolina 95 E5"] !== ""
            );
            g98.value = data.value.filter(station => 
                station["Precio Gasolina 98 E5"] !== ""
            );
            diesel.value = data.value.filter(station => 
                station["Precio Gasoleo A"] !== ""
            );

            calculateData();
        }

        onBeforeMount(()=>{
            getData();
        })

        return{
            today95,
            today98,
            todayDiesel
        }
    },
}
</script>