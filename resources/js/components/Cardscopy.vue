<template>
    <!--    <p>Recibido: {{ municipioRecibido }}, {{ combustibleRecibido }}</p>-->
    <!--  bucle para recorrer las gasolineras con los filtros mencionados en el apartado de script  -->
    <div class="principalContainer">
        <div v-for="(gasolinera,index) in filteredGasolineras" :key="gasolinera" class="card mb-3 principalContainer">
            <div class="cajaDTotal row g-0 row justify-content-center align-items-center">
                <div class="col-2 imgContainer">
                    <!--  Se coge una imagen random de una carpeta con una funcion  -->
                    <img :src="'/images/gasPumps/gas'+Math.floor(Math.random() * (8 - 1 + 1) + 1) +'.svg'"
                         class="imageAnimate rounded mx-auto d-block animate"
                         style="width: 50px; height: auto;"/>
                </div>
                <div class="col-8">
                    <div class="card-body">
                        <!--  El codigo despues del & es para tildar la o ya que en la api tienen tildes las palabras            -->
                        <p class="card-text">{{ gasolinera.Direcci&oacute;n }} - {{ gasolinera.Localidad }}
                        </p>
                    </div>
                </div>
                <div class="col-2">
                    <p class="precio" :id="'gas'+index">
                        {{ gasolinera["Precio " + combustibleRecibido] }}€
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
    props: {
        municipioRecibido: null,
        combustibleRecibido: null,
        estadoPrecio: null
    },
    computed: {
        filteredGasolineras: function () {
            //En esta funcion se ordena por precio y filtra las gasolineras por combustible y municipio

            // ORDENAR
            //en este if tenemos un toggle click de precio, por defecto lo ponemos en ordenacion ascendente por precio, si no sera desc
            if (this.estadoPrecio) {
                return this.allGasolineras.sort((a, b) => (a["Precio " + this.combustibleRecibido] < b["Precio " + this.combustibleRecibido] ? 1 : -1))
                    .filter((gasolinera) => {
                        return extracted.call(this, gasolinera);
                    })

            } else {
                return this.allGasolineras.sort((a, b) => (a["Precio " + this.combustibleRecibido] > b["Precio " + this.combustibleRecibido] ? 1 : -1))
                    .filter((gasolinera) => {
                        return extracted.call(this, gasolinera);
                    })
            }

            //FILTRAR

            //este metodo se encarga de devolver las gasolineras, dependiendo de la casuistica devolverá ninguna, todas, solo filtradas por combustible
            // o filtradas tambien por municipio
            function extracted(gasolinera) {
                //en los dos primeros if no devolvemos ningun registro
                if (this.municipioRecibido == null && this.combustibleRecibido == null)
                    return false;
                else if (this.combustibleRecibido == null)
                    return false;
                else {
                    const reg = /Precio*/;
                    for (const fila in gasolinera) {
                        //console.log(gasolinera["Precio "+this.combustibleRecibido])

                        if (fila.includes(this.combustibleRecibido)) {
                            if (gasolinera[fila] !== "") {
                                if (this.municipioRecibido == null)
                                    //Filtramos SOLO por COMBUSTIBLE
                                    return gasolinera;
                                else {
                                    //Filtramos por combustible y municipio
                                    return gasolinera.Municipio.match(this.municipioRecibido);
                                }
                            }
                        }
                    }
                    //Este return nunca se deberia de llegar, pero por si acaso ocurriese un error no returneamos nada
                    return false;
                }
            }
        }
    },
    setup() {
        const allGasolineras = ref([]);

        //AXIOS CON ASYNC AWAIT PARA CONSEGUIR DATOS DE LA API
        const getAllGasolineras = async () => {
            let url = 'https://sedeaplicaciones.minetur.gob.es/ServiciosRESTCarburantes/PreciosCarburantes/EstacionesTerrestres/';
            let response;
            try {
                response = await axios.get(url);

            } catch (err) {
                console.log('Error: ' + err);
                return;

            } finally {
                //displayPics();
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

#gas0 {
    background-color: #FFD700;
}

#gas1 {
    background-color: silver;
}

#gas2 {
    background-color: #cd7f32;
}


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
    background-color: white;
    border: 5px none #1C6EA4;
    border-radius: 12px;
    margin-right: 10%;
    width: fit-content;
    padding: 8px 10px;
    display: flex;
    text-align: center;
}

</style>
