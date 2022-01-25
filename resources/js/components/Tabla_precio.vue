<template>
    <table class="table table-hover table-responsive mt-5">
        <thead>
            <tr>
                <th scope="col">Combustible</th>
                <th scope="col">Hoy</th>
                <!-- <th scope="col">Ayer</th>
                <th scope="col">Semanal</th> -->
            </tr>
        </thead>

        <tbody>
            <tr>
                <th scope="row">Gasolina 95</th>
                <td>{{today95}}</td>
                <!-- <td>1€</td>
                <td>1.010€</td> -->
            </tr>
            <tr>
                <th scope="row">Gasolina 98</th>
                <td>{{today98}}</td>
                <!-- <td>1.234€</td>
                <td>1.010€</td> -->
            </tr>
            <tr>
                <th scope="row">Diesel</th>
                <td>{{todayDiesel}}</td>
               <!--  <td>0.880€</td>
                <td>1.010€</td> -->
            </tr>
        </tbody>
    </table>
</template>
<script>
import { onBeforeMount, ref } from '@vue/runtime-core';
import axios from 'axios';
export default {
    setup() {
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