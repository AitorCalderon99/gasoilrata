<template>
    <div class="container">
        <div class="head-text">
            <p>¡Encuentra las gasolineras cercanas con los precios más baratos!</p>
        </div>
        <br/>
        <div class="foptions">
            <select class="selectComb form-select" aria-label="Default select example">
                <option selected>Seleccione el tipo de combustible</option>
            </select>
            <select class="form-select" aria-label="Default select example">
                <option selected>Seleccione el municipio</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <button type="button" class="btn btn-532E1C">Precio &nbsp;<i class="bi bi-arrow-down-short"></i></button>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "Ranking"
}
var listado = "";

//AXIOS
axios
    .get('https://sedeaplicaciones.minetur.gob.es/ServiciosRESTCarburantes/PreciosCarburantes/EstacionesTerrestres/')
    .then(response => {
        //Carburantes
        var combustibles = getCarburantes(response.data.ListaEESSPrecio[0]);

        for (let i = 0; i < combustibles.length; i++) {
            setCarburantes(combustibles[i]);
        }

        //Municipio


    })
    .catch(error => console.log(error));

//Functions
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

function setCarburantes(nombreCombustible) {
    $(".selectComb").append($('<option>', {
        value: nombreCombustible,
        text: nombreCombustible
    }));
}

</script>

<style scoped>

</style>
