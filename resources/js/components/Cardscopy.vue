<template>
    <div  class="principalContainer">
        jimniopmo0miop
        <button @click="pruebas(allGasolineras[0])">Prueba</button>
        <div v-for="gasolinera in allGasolineras" :key="gasolinera" class="card mb-3" id="principalContainer">
            <div id="cajaDTotal" class="row g-0 row justify-content-center align-items-center">
                <div id="imgContainer" class="col-2 ">
                    <img id="imgLeftCard">
                </div>
                <div class="col-8">
                    <div class="card-body">
                        <p class="card-tex">This is a wider card with supporting text below as a natural lead-in to
                        </p>
                    </div>
                </div>
                <div class="col-2">
                    <p class="precio">
                        1,333€
                    </p>
                </div>
            </div>
        </div>
    </div>

</template>

<script>

import {onMounted, ref} from "vue";
import axios from 'axios';
import {onBeforeMount} from "@vue/runtime-core";

var data = [];


export default {
    name: "Cardscopy",
    setup() {
        let allGasolineras = [];

        const getAllGasolineras = async () => {
            let url = 'https://sedeaplicaciones.minetur.gob.es/ServiciosRESTCarburantes/PreciosCarburantes/EstacionesTerrestres/';
            let response;
            try {
                response = await axios.get(url);
            } catch (err) {
                console.log('Error: ' + err);
                return;
            }
            allGasolineras = response.data.ListaEESSPrecio;
            console.log(response.data.ListaEESSPrecio);
            console.log(allGasolineras);
            console.log(allGasolineras[0]);
        }



        //methods
        const pruebas =(x)=>{
            console.log(x);
        }
        const displayPics = () => {
            var imagesArray = [];

            for (let i = 1; i < 9; i++) {
                imagesArray.push("/images/gasPumps/gas" + i + ".svg")
            }

            var num = Math.floor(Math.random() * (8 - 1 + 1) + 1);
            var img = imagesArray[num - 1];
            //CREACION ELEMENTO CON JQUERY
            $('#imgContainer').prepend('<img id="imageAnimate" src= "' + img + '" class="rounded mx-auto d-block animate" style="width: 50px; height: auto;"/>')

            $('#imageAnimate').mouseover(() => {
                //Efecto jquery
                $('#imageAnimate').addClass('fade')
                setTimeout(function () {
                    $("#imageAnimate").removeClass('fade')
                }, 1000) // 1000 milliseconds
            })


        }

        onMounted(() => {
            displayPics();


        });
        onBeforeMount(()=>{
            getAllGasolineras();
        })

        return{
            allGasolineras,
            pruebas
        }

    }
}
</script>


<style lang="scss" scoped>

#principalContainer {
    margin-top: 1.5em;
}

#cajaDTotal {
    background-color: #c5a880;
    border: 1px solid #532e1c;
    border-radius: 15px 0 15px 0;
    min-width: 35px;

}

.fade {
    animation: fadeinout .5s;
}

@keyframes fadeinout {
    0%, 100% {
        opacity: 1;
    }
    50% {
        opacity: 0;
    }
}

.precio {
    background-color: gray;
    border: 5px none #1C6EA4;
    border-radius: 12px;
    margin-right: 10%;
    width: fit-content;
    padding: 8px 10px;
    display: flex;
    text-align: center;
}

</style>
