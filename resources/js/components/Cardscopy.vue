<template>
    <p>Recibido: {{municipioRecibido}}, {{combustibleRecibido}}</p>
    <div class="principalContainer">
        <div v-for="gasolinera in filteredGasolineras" :key="gasolinera" class="card mb-3 principalContainer" >
            <div  class="cajaDTotal row g-0 row justify-content-center align-items-center">
                <div class="col-2 imgContainer">
                    <img src= "/images/gasPumps/gas2.svg" class="imageAnimate rounded mx-auto d-block animate" style="width: 50px; height: auto;"/>
                </div>
                <div class="col-8">
                    <div class="card-body">
                        <p class="card-text">{{ gasolinera.Direcci&oacute;n }} - {{gasolinera.Localidad}}
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

import {onMounted} from "vue";
import axios from 'axios';
import {onBeforeMount, reactive, ref} from "@vue/runtime-core";

var data = [];


export default {
    name: "Cardscopy",
    props:{
        municipioRecibido: null,
        combustibleRecibido: null
    },
    computed:{
        filteredGasolineras: function () {
            return this.allGasolineras.filter((gasolinera) =>{
                if (this.municipioRecibido == null && this.combustibleRecibido == null)
                    return true
                else if (this.combustibleRecibido == null)
                    return gasolinera.Municipio.match(this.municipioRecibido);
                else {
                    const reg = /Precio*/;
                    for (const fila in gasolinera) {

                            if (fila.includes(this.combustibleRecibido)) {
                                if (gasolinera[fila] !== "")
                                {
                                    if (this.municipioRecibido == null)
                                        return gasolinera;
                                    else {
                                        return gasolinera.Municipio.match(this.municipioRecibido);
                                    }
                                }

                            }

                    }

                   return false;
                }


            })
        }
    },
    setup() {
        const allGasolineras = ref([]);

        const getAllGasolineras = async () => {
            let url = 'https://sedeaplicaciones.minetur.gob.es/ServiciosRESTCarburantes/PreciosCarburantes/EstacionesTerrestres/';
            let response;
            try {
                response = await axios.get(url);

            } catch (err) {
                console.log('Error: ' + err);
                return;

            } finally {
                displayPics();
            }
            allGasolineras.value = response.data.ListaEESSPrecio;

        }




        //methods

        const displayPics = () => {
            console.log("Ejecutando display pics");
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

        });
        onBeforeMount(() => {
            getAllGasolineras();

        })


        return {
            allGasolineras,
        }

    }

}

</script>


<style lang="scss" scoped>

.principalContainer {
    margin-top: 1.5em;
}

.cajaDTotal {
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
