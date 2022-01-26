<template>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="head-text">
                    <p>¡Encuentra las gasolineras cercanas con los precios más baratos!</p>
                </div>
                <br/>
                <div class="foptions">
                    <!--        Two way binding con v-model            -->
                    <select class="selectComb form-select" aria-label="Default select example"
                            v-model="combustibleEnviar">
                        <option selected>Seleccione el tipo de combustible</option>
                    </select>

                    <input class="form-control" list="datalistOptions" id="exampleDataList"
                           placeholder="Elige el municipio" v-model="municipioEnviar">
                    <datalist id="datalistOptions">

                    </datalist>
                    <!-- Evento toggle click ranking                    -->
                    <button type="button" class="foo btn btn-532E1C" @click="isActive = !isActive; animatePrecio(isActive)">Precio &nbsp;<i class="fas fa-long-arrow-alt-up"></i>

                    </button>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <!--        Los parametros se pasan a el componente hijo CardsCopy, son recogidos a traves de Props            -->
                    <Cardscopy :combustibleRecibido="combustibleEnviar" :municipioRecibido="municipioEnviar"
                               :estadoPrecio="isActive"></Cardscopy>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import Cardscopy from "./Cardscopy";

export default {
    name: "Ranking",
    data() {
        return {
            municipioEnviar: null,
            combustibleEnviar: null,
            isActive: false,
            animatePrecio


        }
    },
    components: {
        Cardscopy
    },
}
var listado = "";

var lista = [];

//AXIOS (Ranking)
axios
    .get('https://sedeaplicaciones.minetur.gob.es/ServiciosRESTCarburantes/PreciosCarburantes/EstacionesTerrestres/')
    .then(response => {
        lista = response.data.ListaEESSPrecio;
        //Carburantes
        var combustibles = getCarburantes(response.data.ListaEESSPrecio[0]);

        for (let i = 0; i < combustibles.length; i++) {
            setCarburantes(combustibles[i]);
        }

        //Municipios
        var municipios = getMunicipios(response.data.ListaEESSPrecio);

        for (let i = 0; i < municipios.length; i++) {
            setMunicipios(municipios[i]);
        }
    })
    .catch(error => console.log(error));


//Functions

function animatePrecio(input) {
    /*$({deg: 0}).animate({deg: 180}, {
        step: function(now, fx){
            $(".fa-long-arrow-alt-up").css({
                transform: "rotate(" + now + "deg)"
            });


        }
    });*/


    let orientation = input ? 180 : 0;

    let sum = orientation - 360;

    console.log("Orientation= " + orientation);
    console.log("Sum= " + sum);


    $({deg: orientation}).animate({deg: sum}, {
        step: function(now, fx){
            $(".fa-long-arrow-alt-up").css({
                transform: "rotate(" + now + "deg)"
            });


        }
    });


}
function getCarburantes(axiosResponse) {
    const reg = /Precio*/;
    var combustibles = [];
    for (const regKey in axiosResponse) {
        if (axiosResponse.hasOwnProperty(regKey)) {
            if (regKey.match(reg))
                combustibles.push(regKey.split("Precio ")[1]);
        }
    }
    return combustibles;
}
//Creacion elemento DOM JQUERY carburante
function setCarburantes(nombreCombustible) {
    $(".selectComb").append($('<option/>', {
        value: nombreCombustible,
        text: nombreCombustible
    }));
}

function getMunicipios(axiosResponse) {
    var municipios = [];
    for (let i = 0; i < axiosResponse.length; i++) {
        municipios.push(axiosResponse[i]["Municipio"])
    }

    //Borrar duplicados
    const municipiosSinDuplicados = new Set(municipios);
    return [...municipiosSinDuplicados];
}

//Creacion elemento DOM JQUERY municipio
function setMunicipios(municipio) {
    $("#datalistOptions").append($('<option>', {
        value: municipio
    }));
}

</script>

<style scoped>

</style>
